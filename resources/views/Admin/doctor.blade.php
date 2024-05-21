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
                    <h3 class="text-dark mb-4">Doctor Details</h3>
                    <form method="GET" action="{{url('admin/update_doctor')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-lg-4">
                                <div class="card mb-3">
                                    <div class="card-body text-center shadow">
                                        <img class="rounded-circle mb-3 mt-4" src="{{asset('Doctors/'.$doctor->photo)}}" width="160" height="160">

                                        <div class="mb-3">
                                            <button id="img_btn" class="btn btn-primary btn-sm" type="button">Change Photo</button>

                                            <input style="display: none;" type="file" name="image" id="img_input" accept="image/*">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col">
                                        <div class="card shadow mb-3">
                                            <div class="card-header py-3">
                                                <p class="text-primary m-0 fw-bold">Doctor Details</p>
                                            </div>
                                            <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="firstname">
                                                                    <strong>First Name</strong>
                                                                </label>
                                                                <input class="form-control" type="text" id="firstname" value="{{$doctor->first_name}}" placeholder="first name" name="fname">
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="lastname">
                                                                    <strong>Last Name</strong>
                                                                </label>
                                                                <input class="form-control" type="text" id="lastname" value="{{$doctor->last_name}}" placeholder="last name" name="lname">
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="phone">
                                                                    <strong>Phone</strong>
                                                                </label>
                                                                <input class="form-control" type="text" id="phone" value="{{$doctor->phone}}" placeholder="" name="phone">
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="email">
                                                                    <strong>Email Address</strong>
                                                                </label>
                                                                <input class="form-control" type="email" id="email" value="{{$email}}" placeholder="" name="email">
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="national_id">
                                                                    <strong>National ID</strong>
                                                                </label>
                                                                <input class="form-control" type="text" id="national_id" value="{{$doctor->national_id}}" placeholder="" name="national_id">
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="speciality">
                                                                    <strong>Speciality</strong>
                                                                </label>
                                                                <input class="form-control" type="text" id="speciality" value="{{$doctor->specialization}}" placeholder="" name="speciality">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <button class="btn btn-primary btn-sm" type="submit" onclick="return confirm('Are you sure that you want to update this doctor details?')">Update Doctor</button>
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
