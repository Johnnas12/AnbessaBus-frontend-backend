
<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Anbessa City Bus</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset ('images/anbessa.png') }}" rel="icon">
	<link href="{{asset('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css">
	
</head>


    <body data-sidebar="light">
        <div id="layout-wrapper">
			@include("storeKeeper.layouts.header")
            @include("storeKeeper.layouts.sidebar")
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">
        
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
        
                                        <h4 class="card-title mb-4">Number of Spare Parts in Pie Chart</h4>
        
                                        <canvas id="pie" height="260"></canvas>
        
                                    </div>
                                </div>
                            </div> <!-- end col -->
        
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
        
                                        <h4 class="card-title mb-4">Number of Buses Donut Chart</h4>
        
                                        <canvas id="doughnut" height="260"></canvas>
        
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->


                    </div> 
                </div>
        

                
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>document.write(new Date().getFullYear())</script> 
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-right d-none d-sm-block">
                                    Developed by Haramaya Univeristy 2016 Graduating class
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>

        </div>
       
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="{{asset('assets/libs/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('assets/libs/metismenu/metisMenu.min.js')}}"></script>
        <script src="{{asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{asset('assets/libs/node-waves/waves.min.js')}}"></script>

        <!-- Chart JS -->
        <script src="{{asset('assets/libs/chart.js/Chart.bundle.min.js')}}"></script>
        <script src="{{asset('assets/js/pages/chartjs.init.js')}}"></script> 

        <!-- App js -->
        <script src="{{asset('assets/js/app.js')}}"></script>
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    </body>
</html>
