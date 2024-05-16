<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Anbessa City Bus</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- App favicon -->
	<link rel="shortcut icon" href="{{asset('assets/images/anbessa.png')}}">
	
	<!-- Bootstrap Css -->
	<link href="{{asset('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css">
	
    <script src="//unpkg.com/alpinejs" defer></script>
	<!-- Icons Css -->
	<link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css">
	<!-- App Css-->
	<link href="{{asset('assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css">
	

</head>


    <body data-sidebar="light">

        <!-- Begin page -->
        <div id="layout-wrapper">

			@include("Admin.layouts.header")
            @include("Admin.layouts.sidebar")
         
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">
                        <x-flash-message />
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0 font-size-18">{{__('admin.anal')}}</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Charts and tables</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
        
                                        <h4 class="card-title mb-4">{{__('admin.linechart')}}</h4>
                                       
                                    
        
                                        <canvas id="lineChart" height="300"></canvas>
        
                                    </div>
                                </div>
                            </div> <!-- end col -->
        
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
        
                                        <h4 class="card-title mb-4">Bar Chart</h4>
        
                                        <canvas id="bar" height="300"></canvas>
        
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
        
        
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
        
                                        <h4 class="card-title mb-4">{{__('admin.spare')}}</h4>
                                        <canvas id="pie" height="260"></canvas>
        
                                    </div>
                                </div>
                            </div> <!-- end col -->
        
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
        
                                        <h4 class="card-title mb-4">{{__('admin.donut')}}</h4>

                                        <canvas id="doughnut" height="260"></canvas>
        
                                    </div>
                                </div>
                            </div> 
                            
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">{{__('admin.rev')}}</h4>
                                        <div class="table-responsive">
                                            <table class="table table-centered table-nowrap mb-0">
                                                <thead class="thead-light">
                                                    <tr>
                                                        
                                                        <th>{{__('admin.days')}}</th>
                                                        <th>{{__('admin.generated')}}</th>
                                                        <th>{{__('admin.soldticket')}}</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th>{{__('admin.today')}}</th>
                                                        <th>{{$sumToday}} ETB</th>
                                                        <th>{{$countToday}}</th>
                                                    </tr>

                                                    <tr>
                                                        <th>{{__('admin.yest')}}</th>
                                                        <th>{{$sumYesterday}} ETB</th>
                                                        <th>{{$countYesterday}}</th>
                                                    </tr>

                                                    <tr>
                                                        <th>{{__('admin.last7')}}</th>
                                                        <th>{{$sumLastWeek}} ETB</th>
                                                        <th>{{$countLastWeek}}</th>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- end table-responsive -->
                                    </div>
                                </div>
                            </div><!-- end col -->
                        </div> <!-- end row -->
        


                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                
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
            <!-- end main content-->

        </div>
        <!-- Right bar overlay-->
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
