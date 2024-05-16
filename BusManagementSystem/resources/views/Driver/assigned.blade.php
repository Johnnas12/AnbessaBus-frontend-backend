@extends('Driver.layouts.index')
@section('main-content')

<div class="container text-center">
    <h3>Assigned route for {{Auth::user()->name}}</h3>

<div class="route-container mb-3">
    <div class="route-line"></div>
    <div class="bus-icon"><img src="{{asset('images/bussss.png')}}" height="50px" alt=""></div>
</div>
</div>
<div class="row">
  @foreach ($datas as $data)
  <div class="col-md-6">
    <div class="card mb-3">
      <div class="card-body">
        <div class="row">
          <div class="col-sm-3">
            <h6 class="mb-0">From</h6>
          </div>
          <div class="col-sm-9 text-secondary">
            {{$data->from}}
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-3">
            <h6 class="mb-0">Via</h6>
          </div>
          <div class="col-sm-9 text-secondary">
            {{$data->via}}
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-3">
            <h6 class="mb-0">To</h6>
          </div>
          <div class="col-sm-9 text-secondary">
            {{$data->to}}
          </div>
        </div>
        <hr>  <div class="row">
          <div class="col-sm-3">
            <h6 class="mb-0">Start Time</h6>
          </div>
          <div class="col-sm-9 text-secondary">
              {{$data->starttime}}
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-3">
            <h6 class="mb-0">Departure Time</h6>
          </div>
          <div class="col-sm-9 text-secondary">
            {{$data->departuretime}}
          </div>
        </div>


      </div>
    </div>
  </div>
  @endforeach
</div>




   




@endsection

{{-- <!DOCTYPE html>
<html>
<head>
  <style>
    .route-container {
      position: relative;
      width: 300px;
      height: 150px;
      border: 2px solid #ccc;
      overflow: hidden;
    }

    .route-line {
      position: absolute;
      top: 50%;
      left: 0;
      width: 100%;
      height: 2px;
      background-color: #ccc;
      transform: translateY(-50%);
      transition: background-color 2s linear;
    }

    .bus-icon {
      position: absolute;
      top: 50%;
      left: 0;
      width: 70px;
      height: 70px;
      background-color: #f1c40f;
      border-radius: 50%;
      transform: translateY(-50%);
      transition: left 10s linear;
    }
  </style>
</head>
<body>
  <div class="route-container">
    <div class="route-line"></div>
    <div class="bus-icon"><img src="{{asset('images/bussss.png')}}" height="50px" alt=""></div>
  </div>

  <script>
    function showRoute() {
      var routeLine = document.querySelector('.route-line');
      var busIcon = document.querySelector('.bus-icon');

      var routeContainerWidth = document.querySelector('.route-container').offsetWidth;
      var destinationPosition = routeContainerWidth - busIcon.offsetWidth;

      busIcon.style.left = '0';
      routeLine.style.backgroundColor = '#00ff00';

      function animateBus() {
        busIcon.style.left = destinationPosition + 'px';
        routeLine.style.backgroundColor = '#ff0000';

 
            setTimeout(function() {
                busIcon.style.left = '0';
                routeLine.style.backgroundColor = '#00ff00';
                animateBus(); // Repeat the animation
                }, 1000);

        
    
      }

      animateBus();
    }

    showRoute();
  </script>
</body>
</html> --}}