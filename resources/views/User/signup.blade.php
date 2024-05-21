<!DOCTYPE html>
<html lang="en">

<head>
	@include('User.css')
</head>

<body>
    @include('User.nav')
    <div class="py-5 px-2 page-header text-center" style="background: url({{asset('assets/img/page-shape-1.png')}}) left / auto no-repeat, linear-gradient(#dfe7ed 0%, #eff3ff);">
        <h1>Signup</h1>
        <span>
            <a href="{{url('/')}}">Home</a>
		    <span style="color: var(--second-color);">
                <i class="fas fa-circle mx-2" style="font-size: 8px;"></i>
                <span>Signup</span>
            </span>
		</span>
    </div>

<div class="py-5 px-4">
    <form method="POST" action="{{ route('register') }}">
        <div class="row">
            <div class="col-md-6"><img src="{{asset('assets/img/register-img.png')}}" /></div>
            <div class="col-md-6">
                <div class="bg-white rounded-2 p-5">
                    <h1 class="header">Signup</h1>
                    <x-validation-errors class="mb-4" />
                    <div id="user_login_info">
                        <p>
                            <label class="form-label" for="fname" value="{{ __('Name') }}">First Name</label>
                            <input id="fname" class="form-control p-2" type="text" name="fname" placeholder="First Name" required autofocus autocomplete="name"/>
                        </p>
                        <p>
                            <label class="form-label" for="lname">Last Name</label>
                            <input id="lname" class="form-control p-2" type="text" name="lname" placeholder="Last Name" required autofocus autocomplete="name"/>
                        </p>
                        <p>
                            <label class="form-label" for="date_of_birth">Age</label>
                            <input id="date_of_birth" class="form-control p-2" required name="dob" type="date" />
                        </p>
                        <div>
                            <label class="form-label">Gender</label>
                            <div class="d-flex justify-content-around">
                                <div>
                                    <input id="male" class="me-1" type="radio" name="gender" value="Male" required />
                                    <label class="form-label" for="male">Male</label>
                                </div>
                                <div>
                                    <input id="female" class="me-1" type="radio" name="gender" value="Female" required />
                                    <label class="form-label" for="female">Female</label>
                                </div>
                            </div>
                        </div>
                        <div id="stepone">
                            <button id="next_btn" class="btn btn-primary w-100 my-2" type="button">Next</button>
                            <span class="me-1">Already have an account?</span>
                            <a href="{{route('login')}}">Login</a>
                        </div>
                    </div>
                    <div id="steptwo" style="display: none;">
                        <p>
                            <label class="form-label" for="national">National ID number</label>
                            <input id="national" class="form-control p-2" type="text" required name="nationalID" placeholder="National ID" />
                        </p>
                        <p>
                            <label class="form-label" for="phone">Phone</label>
                            <input id="phone" class="form-control p-2" type="text" required name="phone" placeholder="Phone Number" />
                        </p>
                        <p>
                            <label class="form-label" for="email" value="{{ __('Email') }}">Email</label>
                            <input id="email" class="form-control p-2" type="text" required name="email" placeholder="Email Address" :value="old('email')" required autocomplete="username" />
                        </p>
                        <p>
                            <label class="form-label" for="address">Address</label>
                            <input id="address" class="form-control p-2" type="text" required name="address" placeholder="Address" />
                        </p>
                        <p>
                            <label class="form-label" for="password" value="{{ __('Password') }}">Password</label>
                            <input id="password" class="form-control p-2" type="password" name="password" autofocus minlength="8" required autocomplete="new-password"/>
                        </p>
                        <p>
                            <label class="form-label" for="password_confirmation" value="{{ __('Password') }}">Password</label>
                            <input id="password_confirmation" class="form-control p-2" type="password" name="password_confirmation" autofocus minlength="8" required autocomplete="new-password"/>
                        </p>
                        <button id="step_next_btn" class="btn btn-primary w-100 my-2" type="button">Next</button>
                    </div>
                </div>
            </div>
        </div>
        <div id="plans" class="py-5 px-4" style="display: none;">
            <div class="text-center pb-5">
                <span class="subheader">Plans &amp; Pricing</span>
                <h1 class="header">No Hidden Charge Choose Your Plan</h1>
            </div>
            <div class="row">
                <div id="plan-1" class="col-4">
                    <div class="card">
                        <div class="card-body">
                            <div>
                                <input id="standard" type="radio" style="height: 20px;width: 20px;" name="plan" value="standard" required />
                            </div>
                            <label class="form-label header fs-1 w-100" for="standard">Standard</label>
                            <span>Message, Phone</span>
                            <div>
                                <span class="text-primary">
                                    <span id="price-1" class="fw-bold" style="font-size: 3.5rem;">$39</span>
                                    <span>/Month</span>
                                </span>
                            </div>
                            <ul class="list-unstyled">
                                <li class="d-flex justify-content-between py-2">
                                    <span>120 Inclusive minutes per user</span>
                                    <i class="fas fa-check checked"></i>
                                </li>
                                <li class="d-flex justify-content-between py-2">
                                    <span>Unlimited consultations</span>
                                    <i class="fas fa-times not_checked"></i>
                                </li>
                                <li class="d-flex justify-content-between py-2">
                                    <span>Unlimited audio conferencing</span>
                                    <i class="fas fa-times not_checked"></i>
                                </li>
                                <li class="d-flex justify-content-between py-2">
                                    <span>Unlimited Video meetings</span>
                                    <i class="fas fa-times not_checked"></i>
                                </li>
                                <li class="d-flex justify-content-between py-2">
                                    <span>Service reports sharing</span>
                                    <i class="fas fa-times not_checked"></i>
                                </li>
                                <li class="d-flex justify-content-between py-2">
                                    <span>Mobile and desktop apps</span>
                                    <i class="fas fa-times not_checked"></i>
                                </li>
                                <li class="d-flex justify-content-between py-2">
                                    <span>24/7 access via text, phone</span>
                                    <i class="fas fa-check checked"></i>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div id="plan-2" class="col-4">
                    <div class="card">
                        <div class="card-body">
                            <div><input id="advanced" type="radio" style="height: 20px;width: 20px;" name="plan" value="Advanced" required /></div><label class="form-label header fs-1 w-100" for="advanced">Advanced</label><span>Message, Video, Phone</span>
                            <div>
                                <span class="text-primary">
                                    <span id="price-2" class="fw-bold" style="font-size: 3.5rem;">$59</span>
                                    <span>/Month</span>
                                </span>
                            </div>
                            <ul class="list-unstyled">
                                <li class="d-flex justify-content-between py-2">
                                    <span>120 Inclusive minutes per user</span>
                                    <i class="fas fa-check checked"></i>
                                </li>
                                <li class="d-flex justify-content-between py-2">
                                    <span>Unlimited consultations</span>
                                    <i class="fas fa-check checked"></i>
                                </li>
                                <li class="d-flex justify-content-between py-2">
                                    <span>Unlimited audio conferencing</span>
                                    <i class="fas fa-times not_checked"></i>
                                </li>
                                <li class="d-flex justify-content-between py-2">
                                    <span>Unlimited Video meetings</span>
                                    <i class="fas fa-times not_checked"></i>
                                </li>
                                <li class="d-flex justify-content-between py-2">
                                    <span>Service reports sharing</span>
                                    <i class="fas fa-times not_checked"></i>
                                </li>
                                <li class="d-flex justify-content-between py-2">
                                    <span>Mobile and desktop apps</span>
                                    <i class="fas fa-check checked"></i>
                                </li>
                                <li class="d-flex justify-content-between py-2">
                                    <span>24/7 access via text, phone</span>
                                    <i class="fas fa-check checked"></i>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div id="plan-3" class="col-4">
                    <div class="card">
                        <div class="card-body">
                            <div>
                                <input id="customized" type="radio" style="height: 20px;width: 20px;" name="plan" value="customized" required />
                            </div>
                            <label class="form-label header fs-1 w-100" for="customized">Customized</label>
                            <span>Message, Video, Phone, Open Platform</span>
                            <div>
                                <span class="text-primary">
                                    <span id="price-3" class="fw-bold" style="font-size: 3.5rem;">$79</span>
                                    <span>/Month</span>
                                </span>
                            </div>
                            <ul class="list-unstyled">
                                <li class="d-flex justify-content-between py-2">
                                    <span>120 Inclusive minutes per user</span>
                                    <i class="fas fa-check checked"></i>
                                </li>
                                <li class="d-flex justify-content-between py-2">
                                    <span>Unlimited consultations</span>
                                    <i class="fas fa-check checked"></i>
                                </li>
                                <li class="d-flex justify-content-between py-2">
                                    <span>Unlimited audio conferencing</span>
                                    <i class="fas fa-check checked"></i>
                                </li>
                                <li class="d-flex justify-content-between py-2">
                                    <span>Unlimited Video meetings</span>
                                    <i class="fas fa-check checked"></i>
                                </li>
                                <li class="d-flex justify-content-between py-2">
                                    <span>Service reports sharing</span>
                                    <i class="fas fa-check checked"></i>
                                </li>
                                <li class="d-flex justify-content-between py-2">
                                    <span>Mobile and desktop apps</span>
                                    <i class="fas fa-check checked"></i>
                                </li>
                                <li class="d-flex justify-content-between py-2">
                                    <span>24/7 access via text, phone</span>
                                    <i class="fas fa-check checked"></i>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center py-4">
                <button class="btn btn-primary" id="plans_btn" type="button">Next</button>
            </div>
        </div>

        <input style="display:none;" id="amount" class="form-control p-2" type="text" required name="address"/>

        <div id="pay_options" class="row py-5" style="display: none;">
            <div id="pay-1" class="col-lg-3 col-sm-6 p-4">
                <div class="bg-white rounded-2 p-2">
                    <div>
                        <input type="radio" id="pay_check-1" style="height: 20px;width: 20px;" name="payment" value="mpamba" required=""></div><label class="form-label p-4" for="pay_check-1"><img class="bg-success p-2" src="assets/img/Mpamba-Logo-2.22297a9f.svg"></label>
                    <p>Send <span id="amount-1" class="text-primary">##</span>&nbsp;to&nbsp;&nbsp;<span style="color: var(--second-color);">0887654321</span>&nbsp;and enter trans ID below</p>
                    <p class="py-2"><input class="form-control" type="text" id="pay_input-1" placeholder="Enter TransID"></p>
                </div>
            </div>
            <div id="pay-2" class="col-lg-3 col-sm-6 p-4">
                <div class="bg-white rounded-2 p-2">
                    <div><input type="radio" id="pay_check-2" style="height: 20px;width: 20px;" name="payment" value="airtel" required=""></div><label class="form-label" for="pay_check-2"><img class="bg-success" src="assets/img/Money-Logo_001.jpg"></label>
                    <p>Send <span id="amount-2" class="text-primary">##</span>&nbsp;to&nbsp;&nbsp;<span class="text-danger" style="color: var(--second-color);">0998765432</span>&nbsp;and enter trans ID below</p>
                    <p class="py-2"><input class="form-control" type="text" id="pay_input-2" placeholder="Enter TransID"></p>
                </div>
            </div>
            <div id="pay-3" class="col-lg-3 col-sm-6 p-4">
                <div class="bg-white rounded-2 p-2">
                    <div><input type="radio" id="pay_check-3" style="height: 20px;width: 20px;" name="payment" value="paypal" required=""></div><label class="form-label" for="pay_check-3"><img class="bg-success" src="assets/img/Custom-dimensions-220x220-px29.png"></label>
                    <p>Send <span id="amount-3" class="text-primary">##</span>&nbsp;to&nbsp;&nbsp;<span class="text-primary">mwai_health.paypal</span>&nbsp; and enter trans ID below</p>
                    <p class="py-2"><input class="form-control" type="text" id="pay_input-3" placeholder="Enter TransID"></p>
                </div>
            </div>
            <div id="pay-4" class="col-lg-3 col-sm-6 p-4">
                <div class="bg-white rounded-2 p-2">
                    <div><input type="radio" id="pay_check-4" style="height: 20px;width: 20px;" name="payment" value="visa" required=""></div><label class="form-label" for="pay_check-4"><img class="bg-success" src="assets/img/Custom-dimensions-220x220-px3.png"></label>
                    <p>Send <span id="amount-4" class="text-primary">##</span>&nbsp;to&nbsp;&nbsp;<span style="color: var(--second-color);">12345678</span>&nbsp;and enter trans ID below</p>
                    <p class="py-2"><input class="form-control" type="text" id="pay_input-4" placeholder="Enter TransID"></p>
                </div>
            </div>
        </div>
        <div class="text-center"><button class="btn btn-primary" id="submit_btn" type="submit" style="display: none;">Signup</button></div>
    </form>
</div>
	@include('User.newsletter')

    @include('User.footer')
    <script src="{{asset('assets/js/signup.js')}}"></script>
</body>


</html>
