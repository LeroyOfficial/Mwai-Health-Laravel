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
                    <h3 class="text-dark mb-4">Order Details</h3>
                    <div class="row mb-3">
                        <div class="col-lg-4">
                            <div class="card mb-3">
                                <div class="card-body text-center shadow">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <a href="{{url('admin/patient/'.$patient->id)}}" class="form-label">
                                                    <span>{{$patient->first_name}} {{$patient->last_name}}</span>
                                                </a>
                                            </div>
                                            <div class="mb-3" class="form-label">
                                                <span>{{$patient->address}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col">
                                    <div class="card shadow mb-3">
                                        <div class="card-header py-3">
                                            <p class="text-primary m-0 fw-bold">Order Details</p>
                                        </div>
                                        <div class="card-body">

                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="name">
                                                                <strong>Product Name</strong>
                                                            </label>
                                                            <input class="form-control" type="text" id="name" value="{{$product->where('product_id',$order->product_id)->value('name')}}" readonly>
                                                        </div>
                                                    </div>


                                                </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="card mb-3">
                            <div class="card-header py-3">
                                <p class="text-primary m-0 fw-bold">Recent Orders from this Customer</p>
                            </div>
                            <div class="card-body shadow">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-3 table-responsive table">
                                            <table class="table data_table my-0" id="dataTable">
                                                <thead>
                                                    <tr>
                                                        <th>Product Name</th>
                                                        <th>Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($recentOrders as $order)
                                                        <tr>
                                                            <td>
                                                                <a href="{{url('admin/product/'.$order->product_id)}}">
                                                                    <img class="rounded-circle me-2" width="30" height="30" src="{{asset('Drugs/'.$product->where('product_id',$order->product_id)->value('image'))}}">
                                                                    {{$product->where('id',$order->product_id)->value('name')}}
                                                                </a>
                                                            </td>
                                                            <td>{{$order->created_at}}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

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
