    <footer class="pt-5 px-4">
        <div class="row">
            <div class="col-md-3">
                <div class="col-12"><a class="d-inline-flex" href="index.html">
                    <img class="me-1" src="{{asset("assets/img/logo.png")}}">
                        <h2 class="fw-bold">Mwai Health</h2>
                    </a></div>
                <p>Sed porttitor lectus nibh. Curabitur aliquet quam id dui posuere blandit. vivamus suscipit tortor ege.</p>
                <ul class="list-inline d-flex justify-content-center">
                    <li class="list-inline-item p-1">
						<a href="www.twitter.com"><i class="fab fa-twitter hover-color text-white bg-second p-2 rounded-circle"></i></a>
					</li>
                    <li class="list-inline-item p-1">
						<a href="www.facebook.com"><i class="fab fa-facebook-f hover-color text-white bg-second p-2 rounded-circle"></i></a>
					</li>
                    <li class="list-inline-item p-1">
						<a href="www.instagram.com"><i class="fab fa-instagram hover-color text-white bg-second p-2 rounded-circle"></i></a>
					</li>
                    <li class="list-inline-item p-1">
						<a href="www.whatsapp.com"><i class="fab fa-whatsapp hover-color text-white bg-second p-2 rounded-circle"></i></a>
					</li>
                </ul>
            </div>
            <div class="col-md-3">
                <h3 class="fw-bold">Contacts Info</h3>
                <ul class="list-unstyled">
                    <li class="py-2">
						<span class="me-1 text-primary fw-bold">Address:</span>
						<span>312 Clinton Circle Atlantic City, M2 080522</span>
					</li>
                    <li class="py-2">
						<span class="me-1 text-primary fw-bold">Phone:</span>
						<a href="tel:+265991234567">+265991234567</a>
					</li>
                    <li class="py-2">
						<span class="me-1 text-primary fw-bold">Email:</span>
						<a href="mailto:information@tefri.com">information@tefri.com</a>
					</li>
                    <li class="py-2">
						<span class="me-1 text-primary fw-bold">Time:</span>
						<span>Every day 24 hours<br></span>
					</li>
                </ul>
            </div>
            <div class="col-md-3">
                <h3 class="fw-bold">Quick Link</h3>
                <ul class="list-unstyled">
                    <li class="py-2">
						<i class="far fa-square text-primary bg-primary me-2" style="font-size: 10px;"></i>
						<a href="{{url('/about')}}">About Us</a>
					</li>
                    <li class="py-2">
						<i class="far fa-square text-primary bg-primary me-2" style="font-size: 10px;"></i>
						<a href="{{url('/services')}}">Services</a>
					</li>
                    @auth
                    <li class="py-2">
						<i class="far fa-square text-primary bg-primary me-2" style="font-size: 10px;"></i>
						<a href="{{url('/shop')}}">Shop</a>
					</li>
                    @endauth
                    <li class="py-2">
						<i class="far fa-square text-primary bg-primary me-2" style="font-size: 10px;"></i>
						<a href="{{url('/contact')}}">Contact Us</a>
					</li>
                </ul>
            </div>
            <div class="col-md-3">
                <h3 class="fw-bold">Apps Download</h3><span>Download today and get your free copy from Apple and Play Store</span>
                <div class="mt-4">
					<a class="btn btn-dark w-100 mb-1" role="button" href="{{url('/coming_soon')}}">
						<i class="fas fa-play me-2"></i>Play Store
					</a>
					<a class="btn btn-secondary w-100 mb-1" role="button" href="{{url('/coming_soon')}}">
						<i class="fab fa-apple me-2"></i>App Store
					</a>
				</div>
            </div>
        </div>
        <div class="pt-5 pb-3"><span>Copyright @ {{ date('Y') }} Mwai Health. All Rights Reserved</span></div>
    </footer>
    <script src="{{asset("assets/js/jquery.min.js")}}"></script>
	<script src="{{asset("assets/js/jquery.dataTables.min.js")}}"></script>
	<script src="{{asset("assets/js/table.js")}}"></script>
    <script src="{{asset("assets/bootstrap/js/bootstrap.min.js")}}"></script>
    <script src="{{asset("assets/js/app.js")}}"></script>
    <script src="{{asset("assets/js/Loading-Page-Animation-Style.js")}}"></script>
