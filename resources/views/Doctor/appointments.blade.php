<!DOCTYPE html>
<html lang="en">

<head>
	@include('Doctor.css')
</head>

<body>
    @include('Doctor.nav')
    <div class="py-5 px-2 page-header text-center" style="background: url({{asset('assets/img/page-shape-1.png')}}) left / auto no-repeat, linear-gradient(#dfe7ed 0%, #eff3ff);">
        <h1 class="fw-bold">Appointments</h1><span><a href="{{url('/')}}">Home</a><span style="color: var(--second-color);"><i class="fas fa-circle mx-2" style="font-size: 8px;"></i><span>Appointments</span></span></span>
    </div>

    <div class="py-5 px-4">
        <div>
            <div class="row">
                <div class="col-12">
                    <h1>Manage Appointments</h1>
                </div>
            </div>
            <div class="py-5">
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
                                        <td><a href="{{url('doctor/'.$doctor->where('id',$appointment->doctor_id)->value('id'))}}">{{$doctor->where('id',$appointment->doctor_id)->value('first_name') .' '.$doctor->where('id',$appointment->doctor_id)->value('last_name')}}</a></td>
                                        <td>{{$appointment->reason}}</td>
                                        <td>{{$appointment->date}}</td>
                                        <td>{{$appointment->time}}</td>
                                        <td><span class="stat_btn @if ($appointment->status = "in progress") pending @elseif ($appointment->status = "approved") approved @elseif ($appointment->status = "completed") completed @endif">{{$appointment->status}}</span></td>
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
                    @endif
                </div>
            </div>
        </div>
    </div>
    @include('Doctor.footer')
    <script src="{{asset('assets/js/appoint.js')}}"></script>
</body>

</html>
