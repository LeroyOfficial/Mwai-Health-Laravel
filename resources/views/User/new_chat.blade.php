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
                <a href='{{url('patient/chats')}}' class="btn" role="button" style="border: 1px solid var(--main-color) ;">Back</a>
            </div>
            <div id="doctor_list" class="row" style="">
                <div class="text-center py-3">
                    <h4>Choose a Doctor</h4>
                </div>
                @foreach ($doctors as $doctor)
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
    @endauth

    @include('User.newsletter')
    @include('User.footer')
</body>

</html>

