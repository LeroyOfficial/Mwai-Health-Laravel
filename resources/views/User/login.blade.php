<!DOCTYPE html>
<html lang="en">

<head>
	@include('User.css')
</head>

<body>
    @include('User.nav')
    <div class="py-5 px-2 page-header text-center" style="background: url({{asset('assets/img/page-shape-1.png')}}) left / auto no-repeat, linear-gradient(#dfe7ed 0%, #eff3ff);">
        <h1>Login</h1><span><a href="{{url('/')}}">Home</a>
		<span style="color: var(--second-color);">
			<i class="fas fa-circle mx-2" style="font-size: 8px;"></i>
			<span>Login</span></span>
		</span>
    </div>

<div class="row py-5 px-4">
    <div class="col-md-6"><img src="{{asset('assets/img/login-img.png')}}" /></div>
    <div class="col-md-6">
        <div class="bg-white rounded-2 p-5">
            <h1 class="header">Login</h1>

            <x-validation-errors class="mb-4" />

            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
             @endif
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <p>
					<label for="email" class="form-label" value="{{ __('Email') }}">Email</label>
					<input id="email" class="form-control p-2" type="email" name="email" placeholder="User Email" :value="old('email')" required autofocus autocomplete="username"/>
					</p>
                <p>
					<label for="password" value="{{ __('Password') }}" class="form-label">Password</label>
					<input id="password" class="form-control p-2" type="password" name="password" placeholder="********" autocomplete="current-password"/>
				</p>

                @if (Route::has('password.request'))
				    <a class="float-end my-2" href="{{ route('password.request') }}">Forgot your password?</a>
                @endif

				<button class="btn btn-primary w-100 my-2" type="submit">Login</button>

				<span class="me-1">New user?</span>
				<a href="{{url('/register')}}">Create an account</a>
            </form>
        </div>
    </div>
</div>
	@include('User.newsletter')

    @include('User.footer')
</body>


</html>
