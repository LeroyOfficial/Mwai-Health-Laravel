<!DOCTYPE html>
<html lang="en">

<head>
	@include('User.css')
</head>

<body>
    @include('User.nav')
    <div class="py-5 px-2 page-header text-center" style="background: url({{asset('assets/img/page-shape-1.png')}}) left / auto no-repeat, linear-gradient(#dfe7ed 0%, #eff3ff);">
        <h1>Contact Us</h1>
        <span>
            <a href="{{url('/')}}">Home</a>
            <span style="color: var(--second-color);">
                <i class="fas fa-circle mx-2" style="font-size: 8px;"></i>
                <span>Contact Us</span>
            </span>
        </span>
    </div>

    <div id="appointment" class="py-5">
        <div class="row">
            <div class="col-md-6">
                <img src="{{asset('assets/img/appointment-img.png')}}">
            </div>
            <div class="col-md-6">
                <span class="subheader">Send Us A Message</span>
                <h1 class="header">Contact us for any medical help</h1>
                <form method="post" action="{{url('/post_message')}}">
                    @csrf
                    @include('User.message_N_error')
                    <div class="row">
                        @auth
                        <h4 class="header mb-4">Hey {{Auth::user()->name}} send us a message below</h4>
                        @else
                            <div class="col-lg-6 pb-4 pe-4">
                                <label class="form-label" for="fname">First Name</label>
                                <input id="fname" class="form-control p-2" name="fname" type="text" placeholder="First Name" required/>
                            </div>
                            <div class="col-lg-6 pb-4 pe-4">
                                <label class="form-label" for="lname">Last Name</label>
                                <input id="lname" class="form-control p-2" name="lname" type="text" placeholder="Last Name" required/>
                            </div>
                            <div class="col-lg-6 pb-4 pe-4">
                                <label class="form-label" for="phone">Phone</label>
                                <input id="phone" class="form-control p-2" name="phone" type="text" placeholder="Phone" required/>
                            </div>
                            <div class="col-lg-6 pb-4 pe-4">
                                <label class="form-label" for="email">Email</label>
                                <input id="email" class="form-control p-2" name="email" type="email" placeholder="Email" required/>
                            </div>
                        @endauth
                        <div class="col-12 pb-4 pe-4">
                            <label class="form-label" for="message">Message</label>
                            <textarea id="message" style="height: 30vh;" class="form-control" name="message" placeholder="message" required></textarea>
                        </div>
                        <div class="col-lg-6 pb-4 pe-4">
                            <button class="btn btn-primary" type="submit">Send</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    @include('User.footer')
</body>


</html>
