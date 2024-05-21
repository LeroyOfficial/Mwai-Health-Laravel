<div id="newsletter" class="p-2 py-lg-5 px-lg-4">
    <div class="p-2 p-md-3 p-lg-5 bg-primary" style="border-radius: 10px;background: url({{asset('assets/img/subscribe-shape.png')}}) center / auto space;">
        <div class="row p-2 p-md-3 p-lg-5">
            <div class="col-lg-6">
                <h1 class="text-white fw-bold">Subscribe to the updates!</h1>
                <p class="text-white">Sign up to our newsletter and be the first to know about the latest news, special offers, events, and discounts.</p>
            </div>
            <div class="col-lg-6">
                <div class="d-flex align-items-center h-100 w-100">
                    <form class="d-inline-flex p-1 bg-white w-100" style="border-radius: 5px;" method="post" action="{{url('/subscribe')}}">
                        @csrf
                        <input class="form-control" type="email" name="email" placeholder="Your email address" @auth value="{{Auth::user()->email}}" @else @endauth style="border-style: none;" required>
                        <button class="btn btn-primary py-2 px-4" type="submit">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
