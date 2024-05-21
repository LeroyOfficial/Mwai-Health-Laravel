<!DOCTYPE html>
<html lang="en">

<head>
	@include('User.css')
</head>

<body>
    @include('User.nav2')

    @auth
        <div class="py-0 px-2 px-lg-4">
            <div id="chat" class="row bg-white py-0 px-1">
                <div class="d-none d-lg-block col-lg-3 py-0">
                    <div class="text-center">
                        <img class="rounded-circle mb-2" src="{{asset ('Doctors/'. $doctor->where('national_id',$chat->doctor)->value('photo') )}}" alt="Dr {{$doctor->where('national_id',$chat->doctor)->value('first_name')}}'s image" style="width: 100px;height: 100px;">
                        <h3>Dr {{$doctor->where('national_id',$chat->doctor)->value('first_name')}} {{$doctor->where('national_id',$chat->doctor)->value('last_name')}}</h3>
                        <p class="subheader">{{$doctor->where('national_id',$chat->doctor)->value('specialization')}} Specialist</p>
                        <span>
                            <i class="fas fa-circle mx-2 @if($doc_online_check < 1) active @else text-danger @endif" style="font-size: 10px;"></i>
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
                        @foreach ($grouped_messages as $date => $messages )
                            <div id="date" class="py-2 row justify-content-center">
                                <div class="bg-white p-1 rounded-4 col-2 text-capitalize text-center" style="border-radius: 10px;">
                                    @if (\Carbon\Carbon::parse($date)->isToday())
                                        <p class="m-0">Today</p>
                                    @elseif (\Carbon\Carbon::parse($date)->isYesterday())
                                        <p class="m-0">Yesterday</p>
                                    @else
                                        <p class="m-0">{{$date}}</p>
                                    @endif
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
                                        @if ($message->image)
                                            <a href="{{url('Message_Pics/'. $message->image)}}">
                                                <img style="cursor:pointer;" src="{{asset ('Message_Pics/'. $message->image)}}">
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
                        @endforeach

                        <div id="chat_end"></div>
                    </div>
                    <div id="new_message" class="bg-white">
                        <form action="{{url('/patient/new_message')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div id="preview_div" class="row" style="display: none;">
                                <div class="col-6 p-2 text-center d-flex" style="margin-top: -40vh;z-index: 10;">
                                    <img id="preview" src="assets/img/solutions-img.jpg" style="max-height: 40vh;">
                                    <span>
                                        <i class="fas fa-times p-2 text-danger" id="cancel_img_icon" style="cursor: pointer;"></i>
                                    </span>
                                </div>
                            </div>
                            <input style="display:none;" type="text" name="chat_id" value="{{$chat->id}}">

                            <input style="display:none;" type="tel" name="receiver_id" value="{{$doctor->where('national_id',$chat->doctor)->value('national_id')}}">

                            <div class="row py-2">
                                <div class="col-8 col-lg-10">
                                    <textarea class="form-control" name="message" autocomplete="none" placeholder="Write your message..." required=""></textarea></div>
                                <div class="text-center col-2 col-lg-1">
                                    <i class="fas fa-camera-retro" id="image_icon" style="font-size: 30px;margin-top: 10px;cursor: pointer;"></i>
                                    <input class="form-control" type="file" id="image_input" style="display: none;" name="image" accept="image/*">
                                </div>
                                <div class="col-2 col-lg-1">
                                    <button class="btn btn-primary" type="submit">Send</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endauth
    @include('User.footer')
    <script src="{{asset('assets/js/new_chat.js')}}"></script>
</body>

</html>
