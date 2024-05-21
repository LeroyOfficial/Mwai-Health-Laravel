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
                    <h3 class="text-dark mb-4">{{$search}} -  Search Results</h3>

                    <div class="card shadow mb-5">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">Patient results for - {{$search}}</p>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table data_table my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Date of Birth</th>
                                            <th>Gender</th>
                                            <th>National ID</th>
                                            <th>Phone Number</th>
                                            <th>Email</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($patients as $patient)
                                            <tr>
                                                <td><a href="{{url('admin/patient/'.$patient->id)}}">{{$patient->first_name}} {{$patient->last_name}}</a></td>
                                                <td>{{$patient->dob}}</td>
                                                <td>{{$patient->gender}}</td>
                                                <td>{{$patient->national_id}}</td>
                                                <td><a href="tel:{{$patient->phone}}">{{$patient->phone}}</a></td>
                                                <td><a href="mailto:{{$user->where('national_id',$patient->national_id)->value('email')}}">{{$user->where('national_id',$patient->national_id)->value('email')}}</a></td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>

                    <div class="card shadow mb-5">
                        <div class="card-header py-3 d-flex justify-content-between">
                            <p class="text-primary m-0 fw-bold">Doctor results for - {{$search}}</p>
                            <div class="col-md-4 text-end">

                            </div>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table data_table my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>National ID</th>
                                            <th>Specialization</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($doctors as $doctor)
                                            <tr>
                                                <td><a href="{{url('admin/doctor/'.$doctor->id)}}">
                                                        <img class="rounded-circle me-2" width="30" height="30" src="{{asset('Doctors/'.$doctor->photo)}}">
                                                        {{$doctor->first_name}} {{$doctor->last_name}}
                                                    </a>
                                                </td>
                                                <td>{{$doctor->national_id}}</td>
                                                <td>{{$doctor->specialization}}</td>
                                            </tr>
                                        @endforeach
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card shadow mb-5">
                        <div class="card-header py-3 d-flex justify-content-between">
                            <p class="text-primary m-0 fw-bold">Product reslts for - {{$search}}</p>
                            <div class="col-md-4 text-end">

                            </div>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table data_table my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Type</th>
                                            <th>Price</th>
                                            <th>Stock</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                            <tr>
                                                <td>
                                                    <a href="{{url('admin/product/'.$product->id)}}">
                                                        <img class="rounded-circle me-2" width="30" height="30" src="{{asset('Drugs/'.$product->image)}}">
                                                        {{$product->name}}
                                                    </a>
                                                </td>
                                                <td>{{$product->type}}</td>
                                                <td>{{$product->price}}</td>
                                                <td>{{$product->stock}}</td>
                                            </tr>
                                        @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('Admin.footer')
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>

</body>

</html>
