<!DOCTYPE html>
<html lang="en">

<head>
	@include('User.css')
</head>

<body>
    @include('User.nav')
    <div class="py-5 px-2 page-header text-center" style="background: url({{asset('assets/img/page-shape-1.png')}}) left / auto no-repeat, linear-gradient(#dfe7ed 0%, #eff3ff);">
        <h1 class="fw-bold">Appointment</h1><span><a href="{{url('/')}}">Home</a><span style="color: var(--second-color);"><i class="fas fa-circle mx-2" style="font-size: 8px;"></i><span>Appointment</span></span></span>
    </div>
    @include('User.appoint')

    @include('User.newsletter')
    @include('User.footer')
    <script src="{{asset('assets/js/appoint.js')}}"></script>
</body>

</html>
