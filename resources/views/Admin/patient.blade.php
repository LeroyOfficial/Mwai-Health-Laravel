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
                    <h3 class="text-dark mb-4">Patient Details</h3>
                    <div class="row mb-3">
                        <div class="col-lg-4">
                            <div class="card mb-3">
                                <div class="card-body text-center shadow">
                                    <img class="rounded-circle mb-3 mt-4" src="{{asset('patients/'.$patient->photo)}}" width="160" height="160">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col">
                                    <div class="card shadow mb-3">
                                        <div class="card-header py-3">
                                            <p class="text-primary m-0 fw-bold">Patient Details</p>
                                        </div>
                                        <div class="card-body">

                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="firstname">
                                                                <strong>First Name</strong>
                                                            </label>
                                                            <input class="form-control" type="text" id="firstname" value="{{$patient->first_name}}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="lastname">
                                                                <strong>Last Name</strong>
                                                            </label>
                                                            <input class="form-control" type="text" id="lastname" value="{{$patient->last_name}}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="phone">
                                                                <strong>Phone</strong>
                                                            </label>
                                                            <input class="form-control" type="text" id="phone" value="{{$patient->phone}}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="email">
                                                                <strong>Email Address</strong>
                                                            </label>
                                                            <input class="form-control" type="email" id="email" value="{{$email}}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="national_id">
                                                                <strong>National ID</strong>
                                                            </label>
                                                            <input class="form-control" type="text" id="national_id" value="{{$patient->national_id}}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="speciality">
                                                                <strong>Scheme Type</strong>
                                                            </label>
                                                            <input class="form-control" type="text" id="speciality" value="{{$patient->scheme_type}}"readonly>
                                                        </div>
                                                    </div>
                                                </div>

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
