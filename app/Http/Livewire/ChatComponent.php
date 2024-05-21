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

use Livewire\WithFileUploads;

class ChatComponent extends Component
{
    use WithFileUploads;

    public $chats;
    public $chatcount;

    public $selected_chat = false;
    public $chat;
    public $grouped_messages;
    public $messages;
    public $doctor;
    public $doc_last_seen;
    public $doc_online_check;
    public $doc_last_int;

    public $chat_id;
    public $sender_id;
    public $receiver_id;
    public $message;
    public $image;
    public $read;


    protected $rules = [
        'message' => 'required|min:1|max:1000',
    ];


    public function new_message()
        {
            $data = new Message;
            $data->chat_id = $this->chat_id;
            $nat_id = Auth::user()->national_id;
            $data->sender_id = $nat_id;
            $receiver_id = $this->receiver_id;
            $data->receiver_id = $receiver_id;
            $data->message = $this->message;

            $image = $this->image;
            if ($image)
                {
                    $patFname = Patient::where('national_id',$nat_id)->value('first_name');
                    $patLname = Patient::where('national_id',$nat_id)->value('last_name');
                    $patientname = $patFname.'_'.$patLname;

                    $docFname = Doctor::where('national_id',$receiver_id)->value('first_name');
                    $docLname = Doctor::where('national_id',$receiver_id)->value('last_name');
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

    public function selectchat($id)
        {
            $this->selected_chat = $id;
            $this->mount();
        }

    public function mount()
        {
            $this->loading = true;
            if ($this->selected_chat)
                {
                    $id = $this->selected_chat;
                    $chat = Chat::find($id);
                    $nat_id = Auth::user()->national_id;
                    $messages = Message::where('chat_id',$id)->get();
                    // $grouped_messages = $messages->groupBy(function($message)
                    //     {
                    //         return $message->created_at->format('Y-m-d');
                    //     });

                    $doc_nat_id = $chat->doctor;
                    $doctor = Doctor::all();
                    $doc_last_seen = User::where('national_id',$doc_nat_id)->value('last_seen');
                    $doc_last_int = Carbon::parse($doc_last_seen);
                    $doc_online_check = Carbon::now()->diffInMinutes($doc_last_int);

                    $check_read = Message::where('chat_id',$id)->where('receiver_id',$nat_id)->where('read','not yet')->count();

                    if ($check_read > 0 )
                        {
                            $not_seen_id = Message::where('chat_id',$id)->where('receiver_id',$nat_id)->where('read','not yet')->value('id');
                            $data = Message::find($not_seen_id);
                            $data->read = "yes";
                            $data->save();
                        }

                    $this->chat = $chat;
                    $this->chat_id = $id;
                    $this->receiver_id = $doc_nat_id;
                    // $this->grouped_messages = $grouped_messages;
                    $this->messages = $messages;
                    $this->doctor = $doctor;
                    $this->doc_last_seen = $doc_last_seen;
                    $this->doc_online_check = $doc_online_check;
                    $this->doc_last_int = $doc_last_int;
                }
            else
                {
                    $nat_id = Auth::user()->national_id;
                    $chats = Chat::where('patient',$nat_id)->get();
                    $chatcount = Chat::where('patient',$nat_id)->count();
                    $message = Message::orderBy('id', 'DESC')->get();
                    $doctor = Doctor::all();

                    $this->chats = $chats;

                    $this->chatcount = $chatcount;
                    $this->message = $message;
                    $this->doctor = $doctor;
                }

                $this->loading = false;

        }

    public function render()
        {
            return view('livewire.chat-component');
        }
}
