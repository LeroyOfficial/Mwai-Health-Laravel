<!DOCTYPE html>
<html>

<head>
    @include('Admin.css')
</head>

<body id="page-top">
    <div id="wrapper">
        @include('Admin.nav')
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                @include('Admin.nav2')

                <div class="container-fluid">
                    <h3 class="text-dark mb-4">Product Details</h3>
                    <form method="GET" action="{{url('admin/update_product')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-lg-4">
                                <div class="card mb-3">
                                    <div class="card-body text-center shadow">
                                        <img class="rounded-circle mb-3 mt-4" id="img_input" src="{{asset('products/'.$product->image)}}" width="160" height="160">

                                        <div class="mb-3">
                                            <button id="img_btn" class="btn btn-primary btn-sm" type="button">Change Photo</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col">
                                        <div class="card shadow mb-3">
                                            <div class="card-header py-3">
                                                <p class="text-primary m-0 fw-bold">Product Details</p>
                                            </div>
                                            <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="name">
                                                                    <strong>Name</strong>
                                                                </label>
                                                                <input class="form-control" type="text" id="name" value="{{$product->name}}" placeholder="first name" name="name">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="description">
                                                                    <strong>Description</strong>
                                                                </label>
                                                                <textarea class="form-control" type="text" id="description" placeholder="description" name="description">{{$product->description}}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="price">
                                                                    <strong>Price</strong>
                                                                </label>
                                                                <input class="form-control" type="text" id="price" value="{{$product->price}}" placeholder="price" name="price">
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="type">
                                                                    <strong>Type</strong>
                                                                </label>
                                                                <input class="form-control" type="text" id="type" value="{{$product->type}}" placeholder="type" name="type">
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="stock">
                                                                    <strong>Stock</strong>
                                                                </label>
                                                                <input class="form-control" type="number" id="stock" value="{{$product->stock}}" placeholder="Stock" name="stock">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <button class="btn btn-primary btn-sm" type="submit" onclick="return confirm('Are you sure that you want to update this product details?')">Update Product</button>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
            @include('Admin.footer')
        </div>
        <a class="border rounded d-inline scroll-to-top" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>
    </div>

    <script>
        $(document).ready(function() {
            $('#img_btn').click(function(){
                $('#img_input').trigger('click');
            });

            $('#img_input').change(function(){
                var input = this;
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#img_preview').attr('src', e.target.result);
                        $('#img_previed_div').show();
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            });
        });
    </script>

</body>

</html>
