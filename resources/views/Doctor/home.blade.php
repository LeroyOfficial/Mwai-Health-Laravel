<!DOCTYPE html>
<html lang="en">

<head>
	@include('Doctor.css')
</head>

<body>
    @include('Doctor.nav')

    <div id="banner" class="banner row px-0 px-lg-0 py-4 py-5">
        <div class="col-md-7 text-center text-lg-start py-2"><span style="color: var(--second-color);">Start Your Journey</span>
            <h1 class="fadeInUp animated delay-0-4s">We provide Remote Health Care Services</h1>
            <p>Sed porttitor lectus nibh. Curabitur aliquet quam id dui posuere blandit. Vivamus suscipit tortor eget felis porttitor volutpat.</p>
            <div>
                <a @auth href="{{url('patient/new_appointment')}}" @else  href="{{url('/register')}}" @endauth class="btn btn-primary me-3 py-2 px-3" role="button">Get Started</a>
                <a class="btn" role="button">
                    <i class="fas fa-phone-alt video-btn p-2 me-2"></i>
                    <span class="fw-bold" style="color: rgb(0, 202, 153);">Call us today</span>
                </a>
            </div>
            <p class="fw-bold">Have question?<a class="ms-1" href="#">Please contact us<br></a> </p>
            <ul class="list-unstyled d-inline-flex">
                <li class="me-2">Social -</li>
                <li class="mx-1">
                    <a href="https://www.twitter.com" target="_blank"><i class="fab fa-twitter"></i></a>
                </li>
                <li class="mx-1">
                    <a href="https://www.twitter.com"><i class="fab fa-twitter"></i></a>
                </li>
                <li class="mx-1">
                    <a href="https://www.twitter.com"><i class="fab fa-twitter"></i></a>
                </li>
                <li class="mx-1">
                    <a href="https://www.twitter.com"><i class="fab fa-twitter"></i></a>
                </li>
            </ul>
        </div>
        <div class="col-md-5">
            <div class="banner-img animated fadeInUp py-2 justify-content-center">
                <img class="banner-img-1" src="{{asset("assets/img/banner-img-1.png")}}">
                <img class="banner-shape-1" src="{{asset("assets/img/banner-img-shape-1.png")}}">
                <img class="banner-shape-2" src="{{asset("assets/img/banner-img-shape-2.png")}}">
            </div>
        </div>
    </div>
    <div id="partners" class="partners px-2 px-lg-5 py-5">
        <div class="row justify-content-center py-0 py-lg-5 px-3" style="background: var(--white-color);border-radius: 10px;">
            <div class="col-lg-3 col-md-3 col-sm-6 text-center py-4 py-lg-0"><a href="#"><img src="{{asset("assets/img/partner-1.png")}}"></a></div>
            <div class="col-lg-3 col-md-3 col-sm-6 text-center py-4 py-lg-0"><a href="#"><img src="{{asset("assets/img/partner-2.png")}}"></a></div>
            <div class="col-lg-3 col-md-3 col-sm-6 text-center py-4 py-lg-0"><a href="#"><img src="{{asset("assets/img/partner-3.png")}}"></a></div>
            <div class="col-lg-3 col-md-3 col-sm-6 text-center py-4 py-lg-0"><a href="#"><img src="{{asset("assets/img/partner-4.png")}}"></a></div>
        </div>
    </div>
    <div id="features" class="py-4 py-5" style="min-height: 100vh;">
        <div class="text-center"><span class="subheader">What We Do</span>
            <h1 class="fw-bold" style="color: var(--black-color);">Features Providers and Patients Love</h1>
        </div>
        <div class="row px-2">
            <div class="col-lg-3 col-sm-6 py-2">
                <div class="card">
                    <div class="card-body hover-bg"><img src="{{asset("assets/img/do-1.png")}}">
                        <h4 class="header py-2">24/7 Support</h4>
                        <p>Donec rutrum congue leo eget malesuada. Proin eget tortor risus. Quisque velit nisi pretium ut lacinia in elementum id enim.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 py-2">
                <div class="card">
                    <div class="card-body hover-bg"><img src="{{asset("assets/img/do-2.png")}}">
                        <h4 class="header py-2">Maximize Revenue</h4>
                        <p>Donec rutrum congue leo eget malesuada. Proin eget tortor risus. Quisque velit nisi pretium ut lacinia in elementum id enim.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 py-2">
                <div class="card">
                    <div class="card-body hover-bg"><img src="{{asset("assets/img/do-3.png")}}">
                        <h4 class="header py-2">Health Plans<br></h4>
                        <p>Donec rutrum congue leo eget malesuada. Proin eget tortor risus. Quisque velit nisi pretium ut lacinia in elementum id enim.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 py-2">
                <div class="card">
                    <div class="card-body hover-bg"><img src="{{asset("assets/img/do-4.png")}}">
                        <h4 class="header py-2">Intuitive Scheduling</h4>
                        <p>Donec rutrum congue leo eget malesuada. Proin eget tortor risus. Quisque velit nisi pretium ut lacinia in elementum id enim.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="provide" class="row py-5">
        <div class="col-md-6"><img src="{{asset("assets/img/what-we-provide-img.png")}}"></div>
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
            <div class="d-flex align-items-center col-md-6 py-5 px-0" style="background: url({{("assets/img/counter-shape-1.png")}}) center / cover no-repeat;">
                <div class="justify-content-around row w-100">
                    <div class="col-sm-6 text-center d-flex flex-column py-2 py-lg-0" style="color: var(--white-color);"><span class="fs-2"><strong>35,200</strong><br></span><span>Virtual Consultations Completed</span></div>
                    <div class="col-sm-6 text-center d-flex flex-column py-2 py-lg-0" style="color: var(--white-color);"><span class="fs-2"><strong>8,520</strong><br></span><span>Homes Clinically Supported</span></div>
                </div>
            </div>
            <div class="d-flex align-items-center col-md-6 py-5 px-0" style="background: url({{("assets/img/counter-shape-2.png")}}) center / cover no-repeat;">
                <div class="justify-content-around row w-100">
                    <div class="col-sm-6 text-center d-flex flex-column py-2 py-lg-0" style="color: var(--white-color);"><span class="fs-2"><strong>3,571</strong><br></span><span>Virtual Care Solutions</span></div>
                    <div class="col-sm-6 text-center d-flex flex-column py-2 py-lg-0" style="color: var(--white-color);"><span class="fs-2">99.9%<br></span><span>Connections Success Rate</span></div>
                </div>
            </div>
        </div>
    </div>
    <div id="services" class="py-5 px-4"><span class="subheader">Our Services</span>
        <h1 class="header">Telemedicine Professional Services</h1>
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="card-body"><img src="{{asset("assets/img/intestine.png")}}">
                        <h3 class="fw-bold">Digestive Health</h3>
                        <p>Donec rutrum congue leo eget malesuada. Proin eget tortor risus. Quisque velit nisi pretium ut lacinia in elementum id enim.<br></p>
                        <a href="{{url('service/1')}}" class="btn" type="button" style="border-color: var(--main-color);">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="card-body"><img src="{{asset("assets/img/covid-test.png")}}">
                        <h3 class="fw-bold py-2">COVID-19 Consulting</h3>
                        <p>Donec rutrum congue leo eget malesuada. Proin eget tortor risus. Quisque velit nisi pretium ut lacinia in elementum id enim.<br></p>
                        <a href="{{url('service/1')}}" class="btn" type="button" style="border-color: var(--main-color);">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="card-body"><img src="{{asset("assets/img/covid-call.png")}}">
                        <h3 class="fw-bold py-2">Special Follow Up</h3>
                        <p>Donec rutrum congue leo eget malesuada. Proin eget tortor risus. Quisque velit nisi pretium ut lacinia in elementum id enim.<br></p>
                        <a href="{{url('service/1')}}" class="btn" type="button" style="border-color: var(--main-color);">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="card-body"><img src="{{asset("assets/img/baby-sleeping.png")}}">
                        <h3 class="fw-bold py-2">Pediatric Services</h3>
                        <p>Donec rutrum congue leo eget malesuada. Proin eget tortor risus. Quisque velit nisi pretium ut lacinia in elementum id enim.<br></p>
                        <a href="{{url('service/1')}}" class="btn" type="button" style="border-color: var(--main-color);">Read More</a>
                    </div>
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
            <div class="col-md-6"><img src="{{asset("assets/img/patients-img.png")}}"></div>
        </div>
    </div>

    <div id="solutions" class="row py-5 px-2">
        <div class="col-md-6"><span class="subheader">Consumer Telehealth Solutions<br><br></span>
            <h1 class="header">The telehealth platform provides solutions to all sorts of problems<br></h1>
            <ul class="list-unstyled" id="solution_list">
                <li class="pb-2">
                    <div>
                        <h4 class="fw-bold" style="cursor: pointer;"><i class="fas fa-plus text-white rounded-circle me-1 p-2" style="background: var(--second-color);font-size: 14px;"></i>Improved Health Access</h4>
                        <p>Nulla porttitor accumsan tincidunt. Curabitur non nulla sit amet nisl tempus convallis lectus. Donec sollicitudin molestie malesuada. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus.
                            <a href="{{url('contact_us')}}" style="color: var(--second-color);">Contact Us.</a>
                        </p>
                    </div>
                </li>
                <li class="pb-2">
                    <div>
                        <h4 class="fw-bold" style="cursor: pointer;"><i class="fas fa-plus text-white rounded-circle me-1 p-2" style="background: var(--second-color);font-size: 14px;"></i>Appointment Management</h4>
                        <p>Nulla porttitor accumsan tincidunt. Curabitur non nulla sit amet nisl tempus convallis lectus. Donec sollicitudin molestie malesuada. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus.
                            <a href="{{url('contact_us')}}" style="color: var(--second-color);">Contact Us.</a>
                        </p>
                    </div>
                </li>
                <li class="pb-2">
                    <div>
                        <h4 class="fw-bold" style="cursor: pointer;"><i class="fas fa-plus text-white rounded-circle me-1 p-2" style="background: var(--second-color);font-size: 14px;"></i>Clinical Data Management</h4>
                        <p>Nulla porttitor accumsan tincidunt. Curabitur non nulla sit amet nisl tempus convallis lectus. Donec sollicitudin molestie malesuada. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus.
                            <a href="{{url('contact_us')}}" style="color: var(--second-color);">Contact Us.</a>
                        </p>
                    </div>
                </li>
                <li class="pb-2">
                    <div>
                        <h4 class="fw-bold" style="cursor: pointer;"><i class="fas fa-plus text-white rounded-circle me-1 p-2" style="background: var(--second-color);font-size: 14px;"></i>Dedicated Quality Assurance</h4>
                        <p>Nulla porttitor accumsan tincidunt. Curabitur non nulla sit amet nisl tempus convallis lectus. Donec sollicitudin molestie malesuada. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus.
                            <a href="{{url('contact_us')}}" style="color: var(--second-color);">Contact Us.</a>
                        </p>
                    </div>
                </li>
            </ul>
        </div>
        <div class="col-md-6"><img src="{{asset("assets/img/solutions-img.jpg")}}"></div>
    </div>
@include('Doctor.footer')
</body>

</html>
