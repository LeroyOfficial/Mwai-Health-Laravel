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
use App\Models\Contact;
use App\Models\Appointment;
use App\Models\Message;
use App\Models\Chat;
use App\Models\Prescription;
use App\Models\Payments;
use App\Models\Drug;
use App\Models\Cart;
use App\Models\Order;

class PatientController extends Controller
{
    //
    public function index()
        {
            $doctorcount = Doctor::count();

            $doctorcount = Doctor::count();
            $doctors = Doctor::latest()->take(4)->get();

            $patient = Patient::where('national_id',Auth::user()->national_id)->get();
            return view ('User.home',compact('doctors','doctorcount','patient'));
        }

    public function about()
		{
            $doctorcount = Doctor::count();

            $doctorcount = Doctor::count();
            $doctors = Doctor::latest()->take(4)->get();
            return view ('User.about',compact('doctors','doctorcount'));
        }

    public function services()
		{
            return view ('User.services');
        }

    public function service()
		{
            return view ('User.service-info');
        }

    public function shop()
		{
            $drugs = Drug::all();
            $drugcount = Drug::count();
            return view ('User.shop',compact('drugs','drugcount'));
        }

    public function contact()
		{
            return view ('User.contact');
        }


	public function updateLastSeen()
        {
            if (Cache::has('user-is-online-' . $user->id)) {
            // User is online
            } else {
                // User is offline
            }
        }

    public function doctors()
        {
            $doctorcount = Doctor::count();
            $doctors = Doctor::all();
            return view ('User.doctors',compact('doctors','doctorcount'));
        }

    public function doctorinfo($id)
        {
            $doctor = Doctor::find($id);
            return view ('User.doctor_info',compact('doctor'));
        }

    public function Drug($id)
        {
            $drug = Drug::find($id);
            return view('User.product', compact('drug'));
        }

    public function appointments()
		{
            $appointments = Appointment::where('user_id', Auth::user()->id)->get();
            $appointcount = Appointment::where('user_id', Auth::user()->id)->count();

            $doctor = Doctor::all();
            //$docID =  Doctor::where('id',$appointment->doctor_id)->value('id');
            return view ('User.appointments',compact('appointments','appointcount','doctor'));
        }

    public function new_appointment()
		{
            $doctorcount = Doctor::count();

            $doctorcount = Doctor::count();
            $doctors = Doctor::latest()->take(4)->get();
            return view ('User.appointment',compact('doctors','doctorcount'));
        }

    public function set_appointment(Request $request)
		{
            $user_id = Auth::user()->id;

            $data = new Appointment;
            $data->user_id = $user_id;
            $data->doctor_id = $request->doctor_id;
            $data->date = $request->date;
            $data->time = $request->time;
            $data->reason = $request->reason;
            $data->status = "in progress";
            $data->save();

            $docID = $request->doctor_id;
            $docF = Doctor::where('id', $docID)->value('first_name');
            $docL = Doctor::where('id', $docID)->value('last_name');
            $doctorname = $docF.' '.$docL;

            return redirect()->back()->with('message','you have successfully set a new appointment with '. $doctorname .' on '. $request->date);
        }

    public function cancel_appointment($id)
        {
            $data = Appointment::find($id);
            $data->status = "cancelled";
            $data->save();

            $docID = $data->doctor_id;
            $docF = Doctor::where('id', $docID)->value('first_name');
            $docL = Doctor::where('id', $docID)->value('last_name');
            $doctorname = $docF.' '.$docL;
            return redirect()->back()->with('message','you have cancelled an appointment with '. $doctorname);
        }

    public function chats()
        {
            $chats = Chat::where('patient',Auth::user()->national_id)->get();
            $chatcount = Chat::where('patient',Auth::user()->national_id)->count();
            $message = Message::orderBy('id', 'DESC')->get();
            $doctor = Doctor::all();
            return view('user.chat_list',compact('chats','chatcount','message','doctor'));
        }

    public function start_chat()
        {

            $doctors = Doctor::all();
            return view('user.new_chat',compact('doctors'));
        }

    public function new_chat($id)
        {
            $doctorID = $id;
            $doctor = Doctor::find($id);
            $patientID = Auth::user()->national_id;
            $patientname = Auth::user()->name;
            $patient = Patient::where('national_id',Auth::user()->national_id)->get();

            $check1 = Chat::where('doctor',$id)->where('patient',$patientID)->count();

            if (!$check1 > 0)
                {
                    $data = new Chat;
                    $data->name = $patientname. "'s conversation with Dr " . $doctor->first_name .' '. $doctor->last_name;
                    $data->doctor = $doctor->national_id;
                    $data->patient = $patientID;
                    $data->save();

                    $chat_id = Chat::where('doctor',$doctor->national_id)->where('patient',$patientID)->value('id');
                }
            else
                {
                    $chat_id = Chat::where('doctor',$doctor->national_id)->where('patient',$patientID)->value('id');
                }

            return redirect('patient/chat/'.$chat_id);
        }

    public function chat_live()
        {
            return view('user.chat_live');
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
            $doctor = Doctor::all();
            $doc_nat_id = $chat->doctor;
            $doc_last_seen = User::where('national_id',$doc_nat_id)->value('last_seen');
            $doc_last_int = Carbon::parse($doc_last_seen);
            $doc_online_check = Carbon::now()->diffInMinutes($doc_last_int);

            if ($check_read > 0 )
                {
                    $not_seen_id = Message::where('chat_id',$id)->where('receiver_id',Auth::user()->national_id)->where('read','not yet')->value('id');
                    $data = Message::find($not_seen_id);
                    $data->read = "yes";
                    $data->save();
                }

            return view('user.chat',compact('chat','grouped_messages','messages','doctor','doc_last_seen','doc_online_check','doc_last_int'));
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
                    $patFname = Patient::where('national_id',Auth::user()->national_id)->value('first_name');
                    $patLname = Patient::where('national_id',Auth::user()->national_id)->value('last_name');
                    $patientname = $patFname.'_'.$patLname;

                    $docFname = Doctor::where('national_id',$request->receiver_id)->value('first_name');
                    $docLname = Doctor::where('national_id',$request->receiver_id)->value('last_name');
                    $docname = $docFname . '_' . $docLname;

                    $imagename = $patientname.'_chat_with_'. $docname .'_'.time().'.'.$image->getClientoriginalExtension();
                    $image->move('Message_Pics',$imagename);
                    $data->image = $imagename;
                }

            $data->read = 'not yet';
            $data->save();

            return redirect()->back()->with('message','Message Sent');
        }

    public function video_chat(Request $request,$id)
        {
            $patient_ip = $request->ip();

            $doctor_id = User::where('national_id',$id)->value('id');

            // Retrieve the user's ID
            $userId = $doctor_id;

            // Retrieve the user record by ID
            $user = User::find($userId);

            // Retrieve the session ID associated with the user's current team
            $sessionId = optional($user->currentTeam)->session_id;

            // If a session ID was found, retrieve the session data
            if ($sessionId) {
                $sessionData = Session::getHandler()->read($sessionId);

                // Access any data from the session, for example:
                $ipAddress = $sessionData['_previous']['_ip'] ?? null;

                $doctor_ip = $ipAddress;
                }
            else {
                $doctor_ip = "unable to get doc IP";
            }


            return view('user.video',compact('patient_ip','doctor_ip'));
        }

    public function order_drug($id)
        {
            $data = new Order;
            $data->patient_id = Auth::user()->national_id;
            $data->product_id = $id;
            $data->save();

            $data = Drug::find($id);
            $data->stock = $data->stock-1;
            $data->save();

            return redirect()->back()->with('message','you have successfully ordered this medicine');
        }

    public function MyOrders()
        {

            $nat_id = Auth::user()->national_id;
            $count = Cart::where('patient_id',$nat_id)->count();
            $orders = Order::where('patient_id',$nat_id)->get();
            return view('user.orders', compact('orders','count'));

        }
}
