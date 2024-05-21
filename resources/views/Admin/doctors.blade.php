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
                    <h3 class="text-dark mb-4">Doctors</h3>
                    <div class="card shadow">
                        <div class="card-header py-3 d-flex justify-content-between">
                            <p class="text-primary m-0 fw-bold">Doctors Info</p>
                            <div class="col-md-4 text-end">
                                <a href="{{url('admin/new_doctor')}}" class="btn btn-primary">Add a New Doctor</a>
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
                </div>
            </div>
            @include('Admin.footer')
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>

</body>

</html>
