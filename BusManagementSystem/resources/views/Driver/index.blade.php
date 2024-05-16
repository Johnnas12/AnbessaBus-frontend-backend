<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<title>Anbessa City Bus Management System</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta content="Premium Multipurpose Admin & Dashboard Template" name="description">
	<meta content="Themesbrand" name="author">
	<!-- App favicon -->
	<link rel="shortcut icon" href="{{asset('/images/anbessa.png')}}">
	
	<!-- Bootstrap Css -->
	<link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css">
	
	{{-- Data Tables --}}
	<link href="{{asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">

	<!-- Responsive datatable examples -->
	<link href="{{asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">  

	<!-- Icons Css -->
	<link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css">
	<!-- App Css-->
	<link href="{{asset('assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" />
    <link rel="stylesheet" href="{{asset('css/leaflet-routing-machine.css')}}" />
    <link rel="stylesheet" href="{{asset('css/index.css')}}" />


	
</head>
<body>


    <div id="map" class="map"></div>
    <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"></script>
    <script src="{{asset('js/leaflet-routing-machine.js')}}"></script>
    <script src="{{asset('js/Control.Geocoder.js')}}"></script>
    <script src="{{asset('js/config.js')}}"></script>
    <script src="{{asset('js/index.js')}}"></script>


	        <!-- JAVASCRIPT -->
			<script src="{{asset('assets/libs/jquery/jquery.min.js')}}"></script>
			<script src="{{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
			<script src="{{asset('assets/libs/metismenu/metisMenu.min.js')}}"></script>
			<script src="{{asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
			<script src="{{asset('assets/libs/node-waves/waves.min.js')}}"></script>
	
			<!-- apexcharts -->
			<script src="{{asset('assets/libs/apexcharts/apexcharts.min.js')}}"></script>
	
			<script src="{{asset('assets/js/pages/dashboard.init.js')}}"></script>
	
			
			<!-- Required datatable js -->
			<script src="{{asset('assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
			<script src="{{asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
			<!-- Buttons examples -->
			<script src="{{asset('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
			<script src="{{asset('assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
			<script src="{{asset('assets/libs/jszip/jszip.min.js')}}"></script>
			<script src="{{asset('assets/libs/pdfmake/build/pdfmake.min.js')}}"></script>
			<script src="{{asset('assets/libs/pdfmake/build/vfs_fonts.js')}}"></script>
			<script src="{{asset('assets/libs/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
			<script src="{{asset('assets/libs/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
			<script src="{{asset('assets/libs/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>
			
			<!-- Responsive examples -->
			<script src="{{asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
			<script src="{{asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>
	
			<!-- Datatable init js -->
			<script src="{{asset('assets/js/pages/datatables.init.js')}}"></script>    
	
			<!-- App js -->
			<script src="{{asset('assets/js/app.js')}}"></script>
</body>



</html>