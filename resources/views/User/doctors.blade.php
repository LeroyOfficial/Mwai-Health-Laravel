<div id="doctors" class="py-5">
    <div class="text-center"><span class="subheader">Our Doctors</span>
        <h1 class="header">Meet Our Specialized Doctors</h1>
    </div>
    <div class="row justify-content-center">
        @if ($doctorcount > 0)
            @foreach ($doctors as $doctor)
                <div class="col-lg-3 col-sm-6 animated fadeInUp">
                    <div class="card">
                        <div class="card-body text-center">
                                <img class="mb-2" src="{{asset ('Doctors/'.$doctor->photo)}}" alt="{{$doctor->first_name}}'s image">
                                <a href="{{url('patient/new_chat/'.$doctor->id)}}">
                                    <h3 class="fw-bold">Dr {{$doctor->first_name .' ' . $doctor->last_name}}</h3>
                                </a>
                                <span>{{$doctor->specialization}} Specialist</span>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="col-12 text-center pt-3 animated fadeInUp">
                <a @auth href="{{url('patient/doctors')}}" @else href="{{url('doctors')}}" @endauth class="btn btn-primary">See More Doctors</a>
            </div>
        @else
            <div class="text-center">
                <br>
                <br>
                <h2>No doctors added yet</h2>
                <p class="fs-4">tell admin to log in and add doctors</p>
            </div>
        @endif
    </div>
</div>
