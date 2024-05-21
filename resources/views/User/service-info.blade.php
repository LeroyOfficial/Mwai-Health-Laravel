<!DOCTYPE html>
<html lang="en">

<head>
	@include('User.css')
</head>

<body>
    @include('User.nav')
    <div class="py-5 px-2 text-center" style="background: url({{asset('assets/img/page-shape-1.png')}}) left / auto no-repeat, linear-gradient(#dfe7ed 0%, #eff3ff);height: 40vh;">
        <h1>Service Info</h1>
            <span>
            <a href="{{url('/')}}">Home</a>
            <span style="color: var(--second-color);">
                <i class="fas fa-circle mx-2" style="font-size: 8px;"></i>
                <a href="services.html">Services</a>
            </span>
                <span style="color: var(--second-color);">
                    <i class="fas fa-circle mx-2" style="font-size: 8px;"></i>
                    <span>Name</span>
                </span>
            </span>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <img src="{{asset('assets/img/services-1.png')}}"></div>
        <div class="col-lg-6">
            <span class="subheader">Telehealth and COVID-19</span>
            <h1 class="header">All the telehealth services that we provide during COVID-19.</h1>
            <p>Sed porttitor lectus nibh. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Nulla quis lorem ut libero malesuada feugiat. Curabitur non nulla sit amet porttitor lectus nibh. Vivamus magna justo, lacinia eget consectetur sed, convallis.<br><br>Nulla quis lorem ut libero malesuada feugiat. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Pellentesque in ipsum id orci porta dapibus. Vestibulum ante lorem ut libero malesuada feugiat. Praesent sapien massa, convallis a pellentesque nec.</p>
        </div>
    </div>
    <div class="row py-5 px-2">
        <div class="col-lg-4 d-none d-lg-block"></div>
        <div class="col-lg-8">
            <img src="{{asset('assets/img/services-2.jpg')}}"></div>
        <div class="col-lg-7 bg-primary text-white h-75 p-4 rounded-1 lowerdiv">
            <span class="subheader text-white">Who We Are</span>
            <h2 class="header text-white">We conduct all kinds of activities to get safe telehealth and telemedicine at home.</h2>
            <p>Sed porttitor lectus nibh. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Nulla quis lorem ut libero malesuada feugiat. Curabitur non nulla sit amet nisl ac lectus.<br><br>Nulla quis lorem ut libero malesuada feugiat. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Pellentesque in ipsum id orci porta dapibus. Vestibulum ante ipsum primis in faucibus.</p>
        </div>
        <div class="col-lg-5 d-none d-lg-block lowerdiv"></div>
    </div>
    <div class="row">
        <div class="col-lg-6"><img src="{{asset('assets/img/services-3.png')}}"></div>
        <div class="col-lg-6">
            <h1 class="header">How telehealth helps people with long COVID</h1>
            <p>Sed porttitor lectus nibh. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Nulla quis lorem ut libero malesuada feugiat. Curabitur non nulla sit amet porttitor lectus nibh. Vivamus magna justo, lacinia eget consectetur sed, convallis.</p>
            <ul class="list-unstyled">
                <li class="py-2">
                    <i class="fas fa-circle mx-2 subheader" style="font-size: 8px;">
                    </i><span>Sed porttitor lectus nibh vivamus magna justo.</span>
                </li>
                <li class="py-2">
                    <i class="fas fa-circle mx-2 subheader" style="font-size: 8px;">
                    </i><span>Lacinia eget consectetur sed, convallis at tellus.</span>
                </li>
                <li class="py-2">
                    <i class="fas fa-circle mx-2 subheader" style="font-size: 8px;">
                    </i><span>Nulla quis lorem ut libero malesuada feugiat.</span>
                </li>
                <li class="py-2">
                    <i class="fas fa-circle mx-2 subheader" style="font-size: 8px;">
                    </i><span>Curabitur non nulla sit amet nisl ac lectus.</span>
                </li>
            </ul>
        </div>
    </div>
@include('User.appoint')
@include('User.newsletter')
    @include('User.footer')
</body>

</html>
