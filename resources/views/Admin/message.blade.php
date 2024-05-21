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
                    <h3 class="text-dark mb-4">Contact Us Message Details</h3>
                    <div class="row mb-3">
                        <div class="col-lg-4">
                            <div class="card mb-3">
                                <div class="card-body text-center shadow">
                                    @if ($auth)
                                        <img class="rounded-circle mb-3 mt-4" src="{{asset('patients/'.$patient->where('email',$message->email)->value('photo'))}}" width="160" height="160">
                                    @else
                                    <img class="rounded-circle mb-3 mt-4" src="" width="160" height="160">
                                        <h4 class="text-dark mb-4">sent by guest user</h4>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col">
                                    <div class="card shadow mb-3">
                                        <div class="card-header py-3">
                                            <p class="text-primary m-0 fw-bold">Sender Details</p>
                                        </div>
                                        <div class="card-body">

                                                <div class="row">
                                                    @if ($auth)
                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="firstname">
                                                                <strong>First Name</strong>
                                                            </label>
                                                            <input class="form-control" type="text" id="firstname" value="{{$message->first_name}}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="lastname">
                                                                <strong>Last Name</strong>
                                                            </label>
                                                            <input class="form-control" type="text" id="lastname" value="{{$message->last_name}}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 text-center">
                                                        <div class="mb-4">
                                                            <a href="{{url('admin/patient/'.$patient->where('email',$message->email)->value('id'))}}" class="text-primary m-0 fw-bold">See More Patient Details</a>
                                                        </div>
                                                    </div>
                                                    @else
                                                        <div class="col-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="firstname">
                                                                    <strong>First Name</strong>
                                                                </label>
                                                                <input class="form-control" type="text" id="firstname" value="{{$message->first_name}}" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="lastname">
                                                                    <strong>Last Name</strong>
                                                                </label>
                                                                <input class="form-control" type="text" id="lastname" value="{{$message->last_name}}" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="phone">
                                                                    <strong>Phone</strong>
                                                                </label>
                                                                <input class="form-control" type="text" id="phone" value="{{$message->phone}}" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="email">
                                                                    <strong>Email Address</strong>
                                                                </label>
                                                                <input class="form-control" type="email" id="email" value="{{$message->email}}" readonly>
                                                            </div>
                                                        </div>
                                                    @endif
                                                        <div class="col-12">
                                                            <div class="mb-3">
                                                                <label class="form-label">
                                                                    <strong>Message</strong>
                                                                </label>
                                                                <textarea class="form-control" style="height: 30vh;" readonly>{{$message->message}}</textarea>
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
