<!DOCTYPE html>
<html lang="en">

<head>
	@include('User.css')
</head>

<body>
    @include('User.nav')
    <div style="height: 120px;"></div>
    <div class="py-5 px-2 text-center" style="background: url(&quot;assets/img/page-shape-1.png&quot;) left / auto no-repeat, linear-gradient(#dfe7ed 0%, #eff3ff);height: 40vh;">
        <h1>Product</h1>
        <span>
            <a href="{{url('/')}}">Home</a>
                <span>
                    <i class="fas fa-circle mx-2" style="font-size: 8px;"></i>
                    <a href="{{url('patient/shop')}}">Products</a>
                </span>
                <span style="color: var(--second-color);">
                    <i class="fas fa-circle mx-2" style="font-size: 8px;"></i>
                    <span>{{$drug->name}}</span>
                </span>
            </span>
    </div>
    <div class="row">
        <div class="col-md-6 fadeInUp">
            <img src="{{asset ('Drugs/'.$drug->image)}}">
        </div>
        <div class="col-md-6 fadeInUp">
            <h1>Anti-septic Dry Hand Gel</h1>
            <p>
                <span class="fs-1" style="color: var(--second-color);">{{$drug->price}}</span>
            </p>
            <p>{{$drug->description}}</p>
            <ul class="list-unstyled">
                <li class="py-2">
                    <span class="me-1 fw-bold">SKU:</span>
                    <span>{{$drug->id}}</span>
                </li>
                <li class="py-2">
                    <span class="me-1 fw-bold">
                        <strong>Category: </strong></span>
                    <span>{{$drug->type}}</span>
                </li>
                <li class="py-2">
                    <span class="my-2">
                        <a href="{{url('order_drug/'.$drug->id)}}" class="btn btn-primary">Buy</a>
                    </span>
                </li>
            </ul>
        </div>
    </div>

    @include('User.newsletter')

    @include('User.footer')
</body>

</html>
