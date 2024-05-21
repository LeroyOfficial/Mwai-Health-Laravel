<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Chat;
use App\Models\Doctor;
use App\Models\User;
use App\Models\Patient;
use App\Models\Appointment;
use App\Models\Message;
use App\Models\Prescription;
use App\Models\Payments;
use App\Models\Drug;
use App\Models\Cart;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class DoctorChatComponent extends Component
{
    public $selected_chat = false;
    public $chat;
    public $grouped_messages;
    public $messages;
    public $chat_id;
    public $sender_id;
    public $receiver_id;
    public $message;
    public $image;
    public $read;

    public $patient;
    public $pat_last_seen;
    public $pat_online_check;
    public $pat_last_int;

    public function selectchat($id)
        {
            $this->selected_chat = $id;
            $this->mount();
        }

    public function new_message()
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

            $this->reset(['message','image']);

            $this->selected_chat = $this->chat_id;

            $this->mount();
        }

    public function mount()
        {
            if ($this->selected_chat)
                {
                    $id = $this->selected_chat;
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

                    $this->chat = $chat;
                    $this->chat_id = $id;
                    $this->receiver_id = $pat_last_seen;
                    // $this->grouped_messages = $grouped_messages;
                    $this->messages = $messages;
                    $this->patient = $patient;
                    $this->pat_last_seen = $pat_last_seen;
                    $this->pat_online_check = $pat_online_check;
                    $this->pat_last_int = $pat_last_int;
                }
            else
                {
                    $chats = Chat::where('doctor',Auth::user()->national_id)->get();
                    $chatcount = Chat::where('doctor',Auth::user()->national_id)->count();
                    $message = Message::orderBy('id', 'DESC')->get();
                    $patient = Patient::all();

                    $this->chats = $chats;

                    $this->chatcount = $chatcount;
                    $this->message = $message;
                    $this->patient = $patient;
                }

        }

    public function render()
        {
            return view('livewire.doctor-chat-component');
        }
}
