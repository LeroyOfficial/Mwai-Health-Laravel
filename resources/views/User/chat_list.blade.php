<!DOCTYPE html>
<html lang="en">

<head>
	@include('User.css')
</head>

<body>
    @include('User.nav')

    @auth
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
                                <img class="mb-2" src="{{asset ('Doctors/'.$doctor->photo)}}" alt="Dr {{$doctor->first_name}}'s image">
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
                            <a href="{{url('patient/chat/'.$chat->id)}}">
                                <div class="d-inline-flex">
                                    <div class="p-2">
                                        <img class="rounded-circle" src="{{asset ('Doctors/'. $doctor->where('national_id',$chat->doctor)->value('photo') )}}" style="height: 50px; width: 50px;">
                                    </div>
                                    <div class="">
                                        <h5>Dr {{$doctor->where('national_id',$chat->doctor)->value('first_name')}} {{$doctor->where('national_id',$chat->doctor)->value('last_name')}}</h5>

                                        @if ($message->where('chat_id',$chat->id)->count() > 0)
                                            <p class="text-truncate">
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
    @endauth

    @include('User.newsletter')
    @include('User.footer')
    <script src="{{asset('assets/js/new_chat.js')}}"></script>
</body>

</html>

