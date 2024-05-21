<!DOCTYPE html>
<html lang="en">

<head>
	@include('User.css')
</head>

<body>
    @include('User.nav')
    <div class="py-5 px-2 page-header text-center" style="background: url({{asset('assets/img/page-shape-1.png')}}) left / auto no-repeat, linear-gradient(#dfe7ed 0%, #eff3ff);">
        <h1 class="fw-bold">Appointments</h1><span><a href="{{url('/')}}">Home</a><span style="color: var(--second-color);"><i class="fas fa-circle mx-2" style="font-size: 8px;"></i><span>Appointments</span></span></span>
    </div>

    <div class="py-5 px-4">
        <div>
            <div class="row">
                <div class="col-lg-9 col-md-6">
                    <h1>Manage Appointments</h1>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <a href="{{url('patient/new_appointment')}}" class="btn btn-primary text-capitalize" role="button">Book An Appointment</a></div>
            </div>
            <div class="py-5">
                @include('user.message_N_Error')
                <div class="table-responsive text-center">
                    @if ($appointcount > 0)
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Doctor</th>
                                    <th>Reason</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($appointments as $appointment)
                                    <tr>
                                        <td>
											<a href="{{url('doctor/'.$doctor->where('id',$appointment->doctor_id)->value('id'))}}">
												<img class="rounded-circle me-2" width="30" height="30" src="{{('Doctors/'.$doctor->where('id',$appointment->doctor_id)->value('image'))}}">
												{{$doctor->where('id',$appointment->doctor_id)->value('first_name') .' '.$doctor->where('id',$appointment->doctor_id)->value('last_name')}}
											</a>
										</td>
                                        <td>{{$appointment->reason}}</td>
                                        <td>{{$appointment->date}}</td>
                                        <td>{{$appointment->time}}</td>
                                        <td><span class="stat_btn @if ($appointment->status = "in progress") pending @elseif ($appointment->status = "cancelled") cancelled @elseif ($appointment->status = "approved") approved @elseif ($appointment->status = "completed") completed @endif">{{$appointment->status}}</span></td>
                                        @if ($appointment->status = "in progress")
                                            <td><a href="{{url('cancel_appoint/'.$appointment->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure that you want to cancel this appointment?')" role="button">Cancel</a></td>
                                        @else
                                            <td></td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <h4>You do not have any appointment records</h4>
                        <a href="{{url('patient/new_appointment')}}">
                            <p class="text-primary">click this link to book an appointment</p>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @include('User.newsletter')
    @include('User.footer')
    <script src="{{asset('assets/js/appoint.js')}}"></script>
</body>

</html>
