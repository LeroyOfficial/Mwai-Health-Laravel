<div id="appointment" class="py-5">
    <div class="row">
        <div class="col-md-6"><img src="{{asset('assets/img/appointment-img.png')}}">
        </div>
        <div class="col-md-6"><span class="subheader">Make An Appointment</span>
            @auth
                <h1 class="header">Contact us for any medical help and fill out an appointment form</h1>
                <form method="post" action="{{url('patient/set_appointment')}}">
                    @csrf
                    @include('User.message_N_error')
                    <div class="row">
                        @auth
                            <input class="form-control" type="hidden" id="name" name="user_id" value="{{Auth::user()->id}}" required="">
                        @endauth
                        @guest
                            <div class="col-lg-6 pb-4 pe-4">
                                <label class="form-label" for="name">Full Name</label>
                                <input class="form-control" type="text" id="name" name="name" required="">
                            </div>
                            <div class="col-lg-6 pb-4 pe-4">
                                <label class="form-label" for="email">Email Address</label>
                                <input id="email" class="form-control" type="email" name="name" required="">
                            </div>
                            <div class="col-lg-6 pb-4 pe-4">
                                <label class="form-label" for="phone">Phone Number</label>
                                <input id="phone" class="form-control" type="tel" name="name" required="">
                            </div>
                        @endguest
                        <div class="col-lg-6 pb-4 pe-4">
                            <label class="form-label" for="appoint_date">Date</label>
                            <input id="appoint_date" class="form-control p-2" name="date" type="date" required/>
                        </div>
                        <div class="col-lg-6 pb-4 pe-4">
                            <label class="form-label" for="appoint_time">Time</label>
                            <input id="appoint_time" class="form-control p-2" name="time" type="time" required/>
                        </div>
                        <div class="col-lg-6 pb-4 pe-4">
                            <label class="form-label" for="name">Doctor</label>
                            @if ($doctorcount > 0)
                                <select class="form-select" name="doctor_id" required="">
                                    <option value="" selected>-- select doctor --</option>
                                    @foreach ($doctors as $doctor)
                                        <option value="{{$doctor->id}}">{{$doctor->first_name.' '.$doctor->last_name . ' - ' . $doctor->specialization . ' Specialist' }}</option>
                                    @endforeach
                                </select>
                            @else
                                <h5>No doctors added yet</h5>
                                <p class="fs-6">tell admin to log in and add doctors</p>
                            @endif
                        </div>
                        <div class="col-lg-12 pb-4 pe-4">
                            <label class="form-label" for="reason">Reason</label>
                            <textarea class="form-control p-2" name="reason" id="reason" cols="20" rows="10"></textarea>
                        </div>

                        @guest
                            <div class="col-lg-6 pb-4 pe-4">
                                <label class="form-label" for="name">Gender</label>
                                <div class="d-flex">
                                    <div class="form-check me-2">
                                        <input class="form-check-input" type="radio" id="formCheck-1" name="gender" value="Male" @if ($gender = "Male") checked @endif required="">
                                        <label class="form-check-label" for="formCheck-1">Male</label>
                                    </div>
                                    {{$gender}}
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="formCheck-2" name="gender" value="Female" @if ($gender = "Female") checked @endif required="">
                                        <label class="form-check-label" for="formCheck-2">Female</label>
                                    </div>
                                </div>
                            </div>
                        @endguest
                        <div class="col-lg-6 pb-4 pe-4">
                            <button class="btn btn-primary" type="submit">Confirm Appointment</button>
                        </div>
                    </div>
                </form>

                <script src="{{asset('assets/js/appoint.js')}}"></script>
            @else
                <div class="text-center">
                    <h2>sign up or Log in to be able to book appointments</h2>
                    {{-- <p class="fs-4">tell admin to log in and add doctors</p> --}}
                </div>
            @endauth
        </div>
    </div>
</div>

