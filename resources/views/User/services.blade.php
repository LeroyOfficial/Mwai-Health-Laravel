<!DOCTYPE html>
<html lang="en">

<head>
	@include('User.css')
</head>

<body>
    @include('User.nav')
    <div class="py-5 px-2 page-header text-center" style="background: url({{asset('assets/img/page-shape-1.png')}}) left / auto no-repeat, linear-gradient(#dfe7ed 0%, #eff3ff);">
        <h1>Services</h1><span><a href="{{url('/')}}">Home</a><span style="color: var(--second-color);"><i class="fas fa-circle mx-2" style="font-size: 8px;"></i><span>Services</span></span></span>
    </div>
    <div id="services" class="py-5 px-4">
        <div class="text-center"><span class="subheader">Our Services</span>
            <h1 class="header">Telemedicine Professional Services</h1>
        </div>
        <div class="row">
            <div class="col-lg-4 col-sm-6 mb-2">
                <div class="card">
                    <div class="card-body"><img src="{{asset('assets/img/intestine.png')}}">
                        <h3 class="fw-bold">Digestive Health</h3>
                        <p>Donec rutrum congue leo eget malesuada. Proin eget tortor risus. Quisque velit nisi pretium ut lacinia in elementum id enim.</p>
                        <a href="{{url('/service/1')}}" class="btn" type="button" style="border-color: var(--main-color);">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 mb-2">
                <div class="card">
                    <div class="card-body"><img src="{{asset('assets/img/covid-test.png')}}">
                        <h3 class="fw-bold py-2">COVID-19 Consulting</h3>
                        <p>Donec rutrum congue leo eget malesuada. Proin eget tortor risus. Quisque velit nisi pretium ut lacinia in elementum id enim.</p>
                        <a href="{{url('/service/1')}}" class="btn" type="button" style="border-color: var(--main-color);">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 mb-2">
                <div class="card">
                    <div class="card-body"><img src="{{asset('assets/img/covid-call.png')}}">
                        <h3 class="fw-bold py-2">Special Follow Up</h3>
                        <p>Donec rutrum congue leo eget malesuada. Proin eget tortor risus. Quisque velit nisi pretium ut lacinia in elementum id enim.</p>
                        <a href="{{url('/service/1')}}" class="btn" type="button" style="border-color: var(--main-color);">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 mb-2">
                <div class="card">
                    <div class="card-body"><img src="{{asset('assets/img/baby-sleeping.png')}}">
                        <h3 class="fw-bold py-2">Pediatric Services</h3>
                        <p>Donec rutrum congue leo eget malesuada. Proin eget tortor risus. Quisque velit nisi pretium ut lacinia in elementum id enim.</p>
                        <a href="{{url('/service/1')}}" class="btn" type="button" style="border-color: var(--main-color);">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 mb-2">
                <div class="card">
                    <div class="card-body"><img src="{{asset('assets/img/digital.png')}}">
                        <h3 class="fw-bold py-2">Digital Pharmacy</h3>
                        <p>Donec rutrum congue leo eget malesuada. Proin eget tortor risus. Quisque velit nisi pretium ut lacinia in elementum id enim.</p>
                        <a href="{{url('/service/1')}}" class="btn" type="button" style="border-color: var(--main-color);">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 mb-2">
                <div class="card">
                    <div class="card-body"><img src="{{asset('assets/img/mental.png')}}">
                        <h3 class="fw-bold py-2">Mental Health</h3>
                        <p>Donec rutrum congue leo eget malesuada. Proin eget tortor risus. Quisque velit nisi pretium ut lacinia in elementum id enim.</p>
                        <a href="{{url('/service/1')}}" class="btn" type="button" style="border-color: var(--main-color);">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('User.appoint')
@include('User.newsletter')

    @include('User.footer')
</body>


</html>
