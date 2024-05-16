@extends('Admin.layouts.index')
@section('main-content')
    <style>
        .zoom-image {
            transition: all 0.8s ease;
        }

        .zoom-image:hover {
            transform: scale(1.1);
        }
    </style>

    <div class="row">
        <div class=" card col-md-5">
            <div class="d-flex">
                <div>
                    <img class="zoom-image " height="200" width="200" style="border-radius: 20px" src="{{ asset('assets/img/back.png') }}"
                        alt="">
                </div>
                <div>
                <h5 class="text-center">Double Decker Buses</h5>
                <h5 class="text-center">{{$doubleDeck}}</h5>
                </div>
            </div>
        </div>

        <div class="col-md-1"></div>
        <div class="card col-md-5">
            <div class="d-flex">
                <div>
                    <img class="zoom-image " height="200" width="200" style="border-radius: 20px" src="{{ asset('assets/img/regular.jpg') }}"
                        alt="">
                </div>
                <div>
                <h5 class="text-center">Regular Buses</h5>
                <h5 class="text-center">{{$regular}}</h5>
            </div>
            </div>
        </div>

        <div class="col-md-1"></div>

        <div class=" card col-md-5">
            <div class="d-flex">
                <div>
                    <img class="zoom-image " height="200" width="200" style="border-radius: 20px" src="{{ asset('assets/img/school.jpg') }}"
                        alt="">
                </div>
                <div>
                <h5 class="text-center">School Buses</h5>
                <h5 class="text-center">{{$school}}</h5>
            </div>
            </div>
        </div>

        <div class="col-md-1"></div>


        <div class=" card col-md-5">
            <div class="d-flex">
                <div>
                    <img class="zoom-image " height="200" width="200" style="border-radius: 20px" src="{{ asset('assets/img/elec.jpg') }}"
                        alt="">
                </div>
                <div>
                <h5 class="text-center">Electrical Components</h5>
                <h5 class="text-center">{{$elec}}</h5>
            </div>
            </div>
        </div>


        <div class="col-md-1"></div>

        <div class=" card col-md-5">
            <div class="d-flex">
                <div>
                    <img class="zoom-image " height="200" width="200" style="border-radius: 20px" src="{{ asset('assets/img/eng.jpg') }}"
                        alt="">
                </div>
                <div>
                <h5 class="text-center">Engine Components</h5>
                <h5 class="text-center">{{$engine}}</h5>
            </div>
            </div>
        </div>

        <div class="col-md-1"></div>

        <div class=" card col-md-5">
            <div class="d-flex">
                <div>
                    <img class="zoom-image " height="200" width="200" style="border-radius: 20px" src="{{ asset('assets/img/susp.png') }}"
                        alt="">
                </div>
                <div>
                <h5 class="text-center">Suspension components</h5>
                <h5 class="text-center">{{$suspension}}</h5>
            </div>
            </div>
        </div>

        <div class="col-md-1"></div>

        <div class=" card col-md-5">
            <div class="d-flex">
                <div>
                    <img class="zoom-image " height="200" width="200" style="border-radius: 20px" src="{{ asset('assets/img/brake.jpg') }}"
                        alt="">
                </div>
                <div>
                <h5 class="text-center">Brake system</h5>
                <h5 class="text-center">{{$brake}}</h5>
            </div>
            </div>
        </div>

        <div class="col-md-1"></div>

        <div class=" card col-md-5">
            <div class="d-flex">
                <div>
                    <img class="zoom-image " height="200" width="200" style="border-radius: 20px" src="{{ asset('assets/img/trans.jpeg') }}"
                        alt="">
                </div>
                <div>
                <h5 class="text-center">Transmission parts</h5>
                <h5 class="text-center">{{$trans}}</h5>
            </div>
            </div>
        </div>

        <div class="col-md-1"></div>


        <div class=" card col-md-5">
            <div class="d-flex">
                <div>
                    <img class="zoom-image " height="200" width="200" style="border-radius: 20px" src="{{ asset('assets/img/cooling.jpg') }}"
                        alt="">
                </div>
                <div>
                <h5 class="text-center">Cooling System</h5>
                <h5 class="text-center">{{$cooling}}</h5>
            </div>
            </div>
        </div>

        <div class="col-md-1"></div>


        <div class=" card col-md-5">
            <div class="d-flex">
                <div>
                    <img class="zoom-image " height="200" width="200" style="border-radius: 20px" src="{{ asset('assets/img/heat.png') }}"
                        alt="">
                </div>
                <div>
                <h5 class="text-center">Air Conditioning</h5>
                <h5 class="text-center">{{$air}}</h5>
            </div>
            </div>
        </div>

        <div class="col-md-1"></div>

        <div class=" card col-md-5">
            <div class="d-flex">
                <div>
                    <img class="zoom-image " height="200" width="200" style="border-radius: 20px" src="{{ asset('assets/img/body.jpg') }}"
                        alt="">
                </div>
                <div>
                <h5 class="text-center">Body and Interior</h5>
                <h5 class="text-center">{{$body}}</h5>
            </div>
            </div>
        </div>


    </div>


@endsection
