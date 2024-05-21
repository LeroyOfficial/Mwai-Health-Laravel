<div>
    @if($selected_chat)
        <div class="py-0 px-2 px-lg-4">

            <div id="chat" class="row bg-white py-0 px-1">

                <div class="d-none d-lg-block col-lg-3 py-0">
                    <div class="text-center">
                        <img class="rounded-circle mb-2" src="{{asset ('Doctors/'. $doctor->where('national_id',$chat->doctor)->value('photo') )}}" alt="Dr {{$doctor->where('national_id',$chat->doctor)->value('first_name')}}'s image" style="width: 100px;height: 100px;">
                        <h3>Dr {{$doctor->where('national_id',$chat->doctor)->value('first_name')}} {{$doctor->where('national_id',$chat->doctor)->value('last_name')}}</h3>
                        <p class="subheader">{{$doctor->where('national_id',$chat->doctor)->value('specialization')}} Specialist</p>
                        <span>
                            <i class="fas fa-circle mx-2 @if($doc_online_check < 2) active @else text-danger @endif" style="font-size: 10px;"></i>
                            @if($doc_online_check < 2)
                                <span>Active Now</span>
                            @else
                            <span>Last Seen</span>
                            <br>
                                @if ($doc_last_int->isToday())
                                    <span>Today at {{$doc_last_int->format('H:i')}}</span>
                                @elseif ($doc_last_int->isYesterday())
                                <span>Yesterday at {{$doc_last_int->format('H:i')}}</span>
                                @else
                                    <span>{{$doc_last_int->toDateTimeString()}}</span>
                                @endif
                            @endif
                        </span>
                    </div>
                    <div class="text-center py-4">
                        <a href="{{url('patient/video_chat/'.$chat->doctor)}}" style="color: var(--second-color);">
                            <i class="fas fa-video" style="font-size: 30px;"></i>
                            <p>Start a Video Call</p>
                        </a>
                    </div>
                </div>

                <div id="chat_section" class="col-lg-9 px-0" style="background: url({{asset('assets/img/jt4AoG.jpg')}});">

                    <div id="mobile" class="p-0 d-flex d-lg-none justify-content-center">
                        <div class="bg-white py-1 px-2 d-flex rounded-4 col-12 col-md-4 text-capitalize text-center" style="border-radius: 10px;">
                            <div class="col-11">
                                <div class="text-start">
                                    <img class="rounded-circle" src="{{asset ('Doctors/'. $doctor->where('national_id',$chat->doctor)->value('photo') )}}" alt="Dr {{$doctor->where('national_id',$chat->doctor)->value('first_name')}}'s image" style="width: 30px;height: 30px;">
                                    <span>Dr {{$doctor->where('national_id',$chat->doctor)->value('first_name')}} {{$doctor->where('national_id',$chat->doctor)->value('last_name')}} - </h3>
                                    <span class="subheader">{{$doctor->where('national_id',$chat->doctor)->value('specialization')}} Specialist</span>
                                </div>
                                <div class="text-start ps-3">
                                    <span style="font-size:12px;">
                                        @if($doc_online_check < 2)
                                        <i class="fas fa-circle mx-2 @if($doc_online_check < 2) active @else text-danger @endif" style="font-size: 10px;"></i>
                                        <span>Online</span>
                                        @else
                                        <span>Last Seen - </span>
                                            @if ($doc_last_int->isToday())
                                                <span>Today at {{$doc_last_int->format('H:i')}}</span>
                                            @elseif ($doc_last_int->isYesterday())
                                            <span>Yesterday at {{$doc_last_int->format('H:i')}}</span>
                                            @else
                                                <span>{{$doc_last_int->toDateTimeString()}}</span>
                                            @endif
                                        @endif
                                    </span>
                                </div>
                            </div>
                            <div class="col-1 py-2">
                                <a href="{{url('patient/video_chat/'.$chat->doctor)}}" style="color: var(--second-color);">
                                    <i class="fas fa-video" style="font-size: 30px;"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div id="message_list" class="px-2" style="height: 70vh; overflow-x: hidden; overflow-y: scroll;">
                        <div id="end_to_end" class="py-2 row justify-content-center">
                            <div class="bg-white p-1 rounded-4 col-8 col-md-4 text-capitalize text-center" style="border-radius: 10px;">
                                <p class="m-0">Chats are protected with end to end encryption</p>
                            </div>
                        </div>
                        @foreach ($messages as $message)
                                <div id="message-{{$message->id}}" class="py-2 row
                                    @if ($message->receiver_id == Auth::user()->national_id)
                                        justify-content-start
                                    @else
                                        justify-content-end
                                    @endif">
                                    <div class="bg-white p-2 rounded-4" style="border-radius: 10px; width:auto; max-width:70%;">
                                        @if ($message['image'])
                                            <a href="{{url('Message_Pics/'. $message['image'])}}">
                                                <img style="cursor:pointer;" src="{{asset ('Message_Pics/'. $message['image'])}}">
                                            </a>
                                        @endif
                                        <p>{{$message->message}}</p>

                                        <span class="w-100">
                                            <span class="float-end">
                                                <span>{{$message->created_at->format('H:i')}}</span>
                                                @if ($message->sender_id == Auth::user()->national_id)
                                                    <i class="fas fa-check-double px-1 col @if($message->sender_id === Auth::user()->national_id && $message->read === 'yes') seen @else d-none @endif"></i>
                                                @endif
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            @endforeach

                        <div id="chat_end"></div>
                    </div>

                    <div id="new_message" class="bg-white">

                        <form wire:submit.prevent="new_message">
                            @csrf
                            <div id="preview_div" class="row" style="display: none;">
                                <div class="col-6 p-2 text-center d-flex" style="margin-top: -40vh;z-index: 10;">
                                    <img id="preview" src="assets/img/solutions-img.jpg" style="max-height: 40vh;">
                                    <span>
                                        <i class="fas fa-times p-2 text-danger" id="cancel_img_icon" style="cursor: pointer;"></i>
                                    </span>
                                </div>
                            </div>
                            <input style="display:none;" type="text" wire:model="chat_id">

                            <input style="display:none;" type="tel" wire:model="receiver_id">

                            <div class="row py-2">
                                <div class="col-8 col-lg-10">
                                    <textarea class="form-control" wire:model="message" autocomplete="none" placeholder="Write your message..." required=""></textarea>
                                </div>
                                <div class="text-center col-2 col-lg-1">
                                    <i class="fas fa-camera-retro" id="image_icon" style="font-size: 30px;margin-top: 10px;cursor: pointer;"></i>
                                    <input class="form-control" type="file" id="image_input" style="display: none;" wire:model="image" accept="image/*">
                                </div>
                                <div class="col-2 col-lg-1">
                                    <button class="btn btn-primary" type="submit" class="down_btn">Send</button>
                                </div>
                            </div>
                        </form>

                    </div>

                </div>

            </div>

        </div>

        @push('scripts')
        <script>
            document.addEventListener('livewire:load', function() {
            var messageList = document.getElementById("messagelist");
            messageList.scrollTop = messageList.scrollHeight;
            });
        </script>
        @endpush
    @else
        <div class="">
            <div id="new_chat">
                <div class="text-center py-3">
                    <a href='{{url('patient/start_chat')}}' class="btn" role="button" id="new_chat_btn" style="border: 1px solid var(--main-color) ;">Start a new chat</a>
                </div>
                <div id="doctor_list" class="row" style="display: none;">
                    <div class="text-center py-3">
                        <h4>Choose a Doctor</h4>
                    </div>
                    @foreach ($doctor as $doctor)
                        <div class="col-lg-3 col-sm-6 animated fadeInUp">
                            <a href="{{url('patient/new_chat/'.$doctor->id)}}">
                            <div class="card">
                                <div class="card-body text-center">
                                    <img class="mb-2" src="{{asset ('Doctors/'.$doctor['photo'])}}" alt="Dr {{$doctor->first_name}}'s image">
                                    <h3 class="fw-bold">Dr {{$doctor->first_name .' ' . $doctor->last_name}}</h3>
                                    <span>{{$doctor->specialization}} Specialist</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
            <div id="recent_chats" class="row py-5 px-4">
                <div class="col-12 text-center py-3">
                    @if ($chatcount < 1)
                        <h1>You do not have any Recent Chats</h1>
                    @else
                        <h1>Recent Chats</h1>
                    @endif
                </div>
                @if ($chatcount > 0)
                    <div class="col-md-3 p-0">

                            @foreach ($chats as $chat)
                                <a wire:click="selectchat({{$chat['id']}})">
                                    <div class="">
                                        <div class="p-2">
                                            <img class="rounded-circle" src="{{asset ('Doctors/'. $doctor->where('national_id',$chat->doctor)->value('photo') )}}" style="height: 50px; width: 50px;">
                                        </div>
                                        <div class="">
                                            <h5>Dr {{$doctor->where('national_id',$chat->doctor)->value('first_name')}} {{$doctor->where('national_id',$chat->doctor)->value('last_name')}}</h5>

                                            @if ($message->where('chat_id',$chat->id)->count() > 0)
                                                <p style="width:100%; height: 24px;overflow: hidden;">
                                                    @if ($message->where('chat_id',$chat->id)->value('sender_id') == Auth::user()->national_id)
                                                        <span>You: </span>
                                                    @else
                                                    <span>Dr {{$doctor->where('national_id',$chat->doctor)->value('first_name')}}: </span>
                                                    @endif
                                                    {{-- @if ($message->where('chat_id',$chat->id)->where('image',null)->first())
                                                        <i class="fas fa-camera-retro"></i>
                                                    @endif --}}
                                                    {{$message->where('chat_id',$chat->id)->value('message')}}

                                                    @if(!$message->where('chat_id',$chat->id)->where('receiver_id',Auth::user()->national_id)->where('read','not yet')->count() > 0)
                                                    @else
                                                        <span class="text-white bg-primary px-1 float-end" style="font-size:12px; border-radius:50%; margin-top:2px;">{{$message->where('chat_id',$chat->id)->where('receiver_id',Auth::user()->national_id)->where('read','not yet')->count()}}</span>
                                                    @endif
                                                </p>
                                            @else
                                            <p style="height: 24px;overflow: hidden;">no messages in this chat</p>
                                            @endif
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                    </div>

                    <div class="col-md-9 d-none d-md-block" style="background: url({{asset ('assets/img/jt4AoG.jpg')}});">
                        <div id="message_list" class="px-2" style="height: 70vh;overflow-x: hidden;overflow-y: scroll;">
                            {{-- <div id="end_to_end" class="py-2 row justify-content-center">
                                <div class="bg-white p-1 rounded-4 col-4 text-capitalize text-center" style="border-radius: 10px;">
                                    <p class="m-0">Chats are protected with end to end encryption</p>
                                </div>
                            </div> --}}
                            <div id="end_to_end-1" class="py-2 row justify-content-center">
                                <div class="bg-white p-1 rounded-4 col-4 text-capitalize text-center" style="border-radius: 10px;">
                                    <p class="m-0">Choose a Conversation to start messaging</p>
                                </div>
                            </div>
                            <div id="chat_end"></div>
                        </div>
                    </div>
                @else

                @endif
            </div>
        </div>


    @endif
</div>




