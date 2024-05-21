<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Appointment;
use App\Models\Message;
use App\Models\Chat;
use App\Models\Prescription;
use App\Models\Payments;
use App\Models\Drug;
use App\Models\Cart;
use App\Models\Order;

class DoctorController extends Controller
{
    //
	public function index()
        {
            return view ('Doctor.home');
        }

    public function appointments()
		{
            $appointments = Appointment::where('doctor_id', Auth::user()->id)->get();
            $appointcount = Appointment::where('doctor_id', Auth::user()->id)->count();

            $doctor = Doctor::all();
            //$docID =  Doctor::where('id',$appointment->doctor_id)->value('id');
            return view ('Doctor.appointments',compact('appointments','appointcount','doctor'));
        }

    public function chats()
        {
            $chats = Chat::where('doctor',Auth::user()->national_id)->get();
            $chatcount = Chat::where('doctor',Auth::user()->national_id)->count();
            $message = Message::orderBy('id', 'DESC')->get();
            $patient = Patient::all();
            return view('Doctor.chat_list',compact('chats','chatcount','message','patient'));
        }

    public function chat_live()
        {
            return view('Doctor.chat_live');
        }

    public function chat($id)
        {
            $chat = Chat::find($id);
            $messages = Message::where('chat_id',$id)->get();
            $grouped_messages = $messages->groupBy(function($message)
                {
                    return $message->created_at->format('Y-m-d');
                });

            $check_read = Message::where('chat_id',$id)->where('receiver_id',Auth::user()->national_id)->where('read','not yet')->count();
            $patient = Patient::all();
            $pat_nat_id = $chat->doctor;
            $pat_last_seen = User::where('national_id',$pat_nat_id)->value('last_seen');
            $pat_last_int = Carbon::parse($pat_last_seen);
            $pat_online_check = Carbon::now()->diffInMinutes($pat_last_int);

            if ($check_read > 0 )
                {
                    $not_seen_id = Message::where('chat_id',$id)->where('receiver_id',Auth::user()->national_id)->where('read','not yet')->value('id');
                    $data = Message::find($not_seen_id);
                    $data->read = "yes";
                    $data->save();
                }

            return view('doctor.chat',compact('chat','grouped_messages','messages','patient','pat_last_seen','pat_online_check','pat_last_int'));
        }

    public function new_message(Request $request)
        {
            $data = new Message;
            $data->chat_id = $request->chat_id;
            $data->sender_id = Auth::user()->national_id;
            $data->receiver_id = $request->receiver_id;
            $data->message = $request->message;

            $image = $request->image;
            if ($image)
                {
                    $patFname = Patient::where('national_id',$request->receiver_id)->value('first_name');
                    $patLname = Patient::where('national_id',$request->receiver_id)->value('last_name');
                    $patientname = $patFname.'_'.$patLname;

                    $docFname = Doctor::where('national_id',Auth::user()->national_id)->value('first_name');
                    $docLname = Doctor::where('national_id',Auth::user()->national_id)->value('last_name');
                    $docname = $docFname . '_' . $docLname;

                    $imagename = $patientname.'_chat_with_'. $docname .'_'.time().'.'.$image->getClientoriginalExtension();
                    $image->move('Message_Pics',$imagename);
                    $data->image = $imagename;
                }

            $data->read = 'not yet';
            $data->save();

            return redirect()->back()->with('message','Message Sent');
        }
}
