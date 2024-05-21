<!DOCTYPE html>
<html lang="en">

<head>
	@include('User.css')
</head>

<body>
    @include('User.nav')
    <div class="py-5 px-2 page-header text-center" style="background: url({{asset('assets/img/page-shape-1.png')}}) left / auto no-repeat, linear-gradient(#dfe7ed 0%, #eff3ff);">
        <h1>About Us</h1>
            <span>
                <a href="{{url('/')}}">Home</a>
                <span style="color: var(--second-color);">
                    <i class="fas fa-circle mx-2" style="font-size: 8px;"></i>
                    <span>About Us</span>
                </span>
            </span>
    </div>
    <div class="row py-5 px-2">
        <div class="col-lg-8"><img src="{{asset('assets/img/about-img.jpg')}}"></div>
        <div class="col-lg-4 d-none d-lg-block"></div>
        <div class="col-lg-5 d-none d-lg-block lowerdiv"></div>
        <div class="col-lg-7 bg-white h-75 p-4 rounded-1 lowerdiv"><span class="subheader">Who We Are</span>
            <h2 class="header">We conduct all kinds of activities to get safe telehealth and telemedicine at home.</h2>
            <p>Sed porttitor lectus nibh. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Nulla quis lorem ut libero malesuada feugiat. Curabitur non nulla sit amet nisl ac lectus.<br><br>Nulla quis lorem ut libero malesuada feugiat. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Pellentesque in ipsum id orci porta dapibus. Vestibulum ante ipsum primis in faucibus.</p>
        </div>
    </div>
    <div id="features" class="py-4 py-5" style="min-height: 100vh;">
        <div class="text-center"><span class="subheader">What We Do</span>
            <h1 class="fw-bold" style="color: var(--black-color);">Features Providers and Patients Love</h1>
        </div>
        <div class="row px-2">
            <div class="col-lg-3 col-sm-6 py-2">
                <div class="card">
                    <div class="card-body hover-bg"><img src="{{asset('assets/img/do-1.png')}}">
                        <h4 class="header py-2">24/7 Support</h4>
                        <p>Donec rutrum congue leo eget malesuada. Proin eget tortor risus. Quisque velit nisi pretium ut lacinia in elementum id enim.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 py-2">
                <div class="card">
                    <div class="card-body hover-bg"><img src="{{asset('assets/img/do-2.png')}}">
                        <h4 class="header py-2">Maximize Revenue</h4>
                        <p>Donec rutrum congue leo eget malesuada. Proin eget tortor risus. Quisque velit nisi pretium ut lacinia in elementum id enim.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 py-2">
                <div class="card">
                    <div class="card-body hover-bg"><img src="{{asset('assets/img/do-3.png')}}">
                        <h4 class="header py-2">Health Plans<br></h4>
                        <p>Donec rutrum congue leo eget malesuada. Proin eget tortor risus. Quisque velit nisi pretium ut lacinia in elementum id enim.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 py-2">
                <div class="card">
                    <div class="card-body hover-bg"><img src="{{asset('assets/img/do-4.png')}}">
                        <h4 class="header py-2">Intuitive Scheduling</h4>
                        <p>Donec rutrum congue leo eget malesuada. Proin eget tortor risus. Quisque velit nisi pretium ut lacinia in elementum id enim.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="provide" class="row py-5">
        <div class="col-md-6"><img src="{{asset('assets/img/what-we-provide-img.png')}}"></div>
        <div class="col-md-6"><span class="subheader">What We Provide</span>
            <h1 class="header">Resolves the disease by making face-to-face contact with patients on the telehealth platform.</h1>
            <p>Nulla porttitor accumsan tincidunt. Curabitur aliquet quam id dui posuere blandit. Vestibulum ac diam sit amet vehicula elementum.</p>
            <ul class="list-unstyled">
                <li class="mb-4">
                    <div class="row" style="background: var(--white-color);">
                        <div class="col-2 text-center align-items-center" style="background: var(--second-color);"><span class="fs-1" style="color: var(--white-color);">80%</span></div>
                        <div class="col-10 pt-3">
                            <p>Of patients are interested in using telemedicine</p>
                        </div>
                    </div>
                </li>
                <li class="mb-4">
                    <div class="row" style="background: var(--white-color);">
                        <div class="col-2 text-center align-items-center" style="background: var(--second-color);"><span class="fs-1" style="color: var(--white-color);">90%</span></div>
                        <div class="col-10 pt-3">
                            <p>Of patients are interested in using telemedicine</p>
                        </div>
                    </div>
                </li>
                <li class="mb-4">
                    <div class="row" style="background: var(--white-color);">
                        <div class="col-2 text-center align-items-center" style="background: var(--second-color);"><span class="fs-1" style="color: var(--white-color);">40%</span></div>
                        <div class="col-10 pt-3">
                            <p>Of patients use telemedicine due to short travel time</p>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div id="stats" class="py-5">
        <div class="row" style="background: var(--bs-blue);min-height: 40vh;">
            <div class="d-flex align-items-center col-md-6 py-5 px-0" style="background: url({{asset('assets/img/counter-shape-1.png')}}) center / cover no-repeat;">
                <div class="justify-content-around row w-100">
                    <div class="col-sm-6 text-center d-flex flex-column py-2 py-lg-0" style="color: var(--white-color);"><span class="fs-2"><strong>35,200</strong><br></span><span>Virtual Consultations Completed</span></div>
                    <div class="col-sm-6 text-center d-flex flex-column py-2 py-lg-0" style="color: var(--white-color);"><span class="fs-2"><strong>8,520</strong><br></span><span>Homes Clinically Supported</span></div>
                </div>
            </div>
            <div class="d-flex align-items-center col-md-6 py-5 px-0" style="background: url({{asset('assets/img/counter-shape-2.png')}}) center / cover no-repeat;">
                <div class="justify-content-around row w-100">
                    <div class="col-sm-6 text-center d-flex flex-column py-2 py-lg-0" style="color: var(--white-color);"><span class="fs-2"><strong>3,571</strong><br></span><span>Virtual Care Solutions</span></div>
                    <div class="col-sm-6 text-center d-flex flex-column py-2 py-lg-0" style="color: var(--white-color);"><span class="fs-2">99.9%<br></span><span>Connections Success Rate</span></div>
                </div>
            </div>
        </div>
    </div>
    <div id="patients" class="py-5">
        <div class="row">
            <div class="col-md-6"><span class="subheader">How We Help Patients</span>
                <h1 class="header">We help patients with all the online-based services of Telehealth &amp; Telemedicine.</h1>
                <p>Nulla porttitor accumsan tincidunt. Curabitur aliquet quam id dui posuere blandit. Vestibulum ac diam sit amet vehicula elementum.</p>
                <div class="row">
                    <div class="col-lg-6 py-2">
                        <div class="card">
                            <div class="card-body"><i class="far fa-check-circle me-2" style="color: var(--second-color);"></i><span class="fw-bold">Pay Less</span></div>
                        </div>
                    </div>
                    <div class="col-lg-6 py-2">
                        <div class="card">
                            <div class="card-body"><i class="far fa-check-circle me-2" style="color: var(--second-color);"></i><span class="fw-bold">Time Saved</span></div>
                        </div>
                    </div>
                    <div class="col-lg-6 py-2">
                        <div class="card">
                            <div class="card-body"><i class="far fa-check-circle me-2" style="color: var(--second-color);"></i><span class="fw-bold">Quality Compared</span></div>
                        </div>
                    </div>
                    <div class="col-lg-6 py-2">
                        <div class="card">
                            <div class="card-body"><i class="far fa-check-circle me-2" style="color: var(--second-color);"></i><span class="fw-bold">TeleHealth During COVID-19</span></div>
                        </div>
                    </div>
                    <div class="col-lg-6 py-2">
                        <div class="card">
                            <div class="card-body"><i class="far fa-check-circle me-2" style="color: var(--second-color);"></i><span class="fw-bold">Share Documents Securely</span></div>
                        </div>
                    </div>
                    <div class="col-lg-6 py-2">
                        <div class="card">
                            <div class="card-body"><i class="far fa-check-circle me-2" style="color: var(--second-color);"></i><span class="fw-bold">Primary Care &amp; Urgently Care</span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6"><img src="{{asset('assets/img/patients-img.png')}}"></div>
        </div>
    </div>
    <div id="partners" class="partners px-2 px-lg-5 py-5">
        <div class="row justify-content-center py-0 py-lg-5 px-3" style="background: var(--white-color);border-radius: 10px;">
            <div class="col-lg-3 col-md-3 col-sm-6 text-center py-4 py-lg-0"><a href="#"><img src="{{asset('assets/img/partner-1.png')}}"></a></div>
            <div class="col-lg-3 col-md-3 col-sm-6 text-center py-4 py-lg-0"><a href="#"><img src="{{asset('assets/img/partner-2.png')}}"></a></div>
            <div class="col-lg-3 col-md-3 col-sm-6 text-center py-4 py-lg-0"><a href="#"><img src="{{asset('assets/img/partner-3.png')}}"></a></div>
            <div class="col-lg-3 col-md-3 col-sm-6 text-center py-4 py-lg-0"><a href="#"><img src="{{asset('assets/img/partner-4.png')}}"></a></div>
        </div>
    </div>

    @include('User.doctors')

    @include('User.newsletter')

@include('User.footer')
</body>

</html>
