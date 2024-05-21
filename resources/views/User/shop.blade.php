<!DOCTYPE html>
<html lang="en">

<head>
	@include('User.css')
</head>

<body>
    @include('User.nav')
    <div class="py-5 px-2 text-center" style="background: url(&quot;assets/img/page-shape-1.png&quot;) left / auto no-repeat, url(&quot;assets/img/page-shape-2.png&quot;) right no-repeat, linear-gradient(#dfe7ed 0%, #eff3ff);height: 40vh;">
        <h1 class="fw-bold">Shop</h1><span><a href="{{url('/')}}">Home</a><span style="color: var(--second-color);"><i class="fas fa-circle mx-2" style="font-size: 8px;"></i><span>Shop</span></span></span>
    </div>
    <div class="py-5 px-4">
        <div class="d-flex flex-column align-items-center justify-content-center flex-lg-row justify-content-lg-between"><span>Showing 1-12 of 12 Results</span><select class="d-none">
                <option value="default" selected="">Default Sorting</option>
                <option value="13">This is item 2</option>
                <option value="14">This is item 3</option>
            </select></div>
        <div id="prod-list" class="row py-3">

            @if($drugcount > 0)
                @foreach ($drugs as $drug)
                    <div id="poduct-1" class="col-lg-3 col-md-4 col-sm-6 fadeInUp">
                        <div class="bg-white text-center">
                            <img class="mb-4" src="{{asset('drugs/'.$drug->image)}}">
                            <a href="{{url('patient/shop/drug/'.$drug->id.'/'.$drug->name)}}">
                                <h4 class="hover-color">{{$drug->name}}</h4>
                            </a>
                            <span>${{$drug->price}}</span>
                            <div>
                                <a href="{{url('order_drug/'.$drug->id)}}" class="btn btn-primary" role="button">Buy</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="text-center">
                    <br>
                    <br>
                    <h2>No drugs added yet</h2>
                    <p class="fs-4">tell admin to log in and add drugs</p>
                </div>
            @endif


        </div>
        <div class="d-flex justify-content-center">
            @if($drugcount > 0)
                {{-- {{ $drugs->links('pagination::bootstrap-5') }} --}}
            @else

            @endif

        </div>
    </div>
    @include('User.newsletter')

    @include('User.footer')
</body>


</html>
