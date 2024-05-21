<nav class="py-3 fixed-top" style="background: var(--white-color);">
	<div class="row">
		<div class="col-9 col-sm-10 col-lg-3">
            <a class="d-inline-flex" href="{{url('/')}}">
                <img class="me-1" src="{{asset('assets/img/logo.png')}}">
				<h2 class="fw-bold">Mwai Health</h2>
			</a>
        </div>
		<div class="col-lg-9 d-none d-lg-block">
			<div class="row">
				<div class="col-8">
					<ul class="list-unstyled d-flex justify-content-center fw-bold fs-5 text-capitalize pt-1">
						<li class="mx-2"><a href="{{url('/')}}">Home</a></li>
						<li class="mx-2"><a @auth href="{{url('patient/about')}}" @else href="{{url('/about')}}" @endauth>About</a></li>
						<li class="mx-2"><a @auth href="{{url('patient/services')}}" @else href="{{url('/services')}}" @endauth>Services</a></li>
						<li class="mx-2"><a @auth href="{{url('patient/contact_us')}}" @else href="{{url('/contact_us')}}" @endauth>Contact</a></li>
                            @auth
                                <li class="mx-2"><a href="{{url('patient/appointments')}}">Appointments</a></li>
                                <li class="mx-2"><a href="{{url('patient/chats')}}">Chat</a></li>
                                <li class="mx-2"><a href="{{url('patient/shop')}}">Shop</a></li>
                            @endauth
					</ul>
				</div>

				<div class="col-4 d-inline-flex justify-content-end">

                    @auth
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" aria-expanded="true" data-bs-toggle="dropdown" type="button">{{Auth::user()->name}}</button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{url('user/profile')}}">Edit Profile</a>
                                <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                <form id="logout-form" hidden="" method="POST" action="{{route('logout')}}">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    @else
                        <a href="{{url('/login')}}" class="btn mx-1" role="button" style="border-color: var(--second-color);color: var(--second-color);">Login</a>
                        <a href="{{url('/register')}}" class="btn mx-1" role="button" style="background: var(--second-color);color: rgb(255,255,255);">Sign up</a>
                    @endauth


                </div>
			</div>
		</div>
		<div class="col-3 col-sm-2 d-block d-lg-none">
			<div class="dropdown"><button class="btn dropdown-toggle" aria-expanded="false" data-bs-toggle="dropdown" type="button"><i class="fas fa-align-justify"></i></button>
				<div class="dropdown-menu"><a class="dropdown-item" href="#">First Item</a><a class="dropdown-item" href="#">Second Item</a><a class="dropdown-item" href="#">Third Item</a></div>
			</div>
		</div>
	</div>
</nav>

<div style="height: 120px;"></div>
