<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Dashboard | Skote - Responsive Bootstrap 4 Driver Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Driver & Dashboard Template" name="description">
        <meta content="Themesbrand" name="author">
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        
        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css">
        <link href="{{asset('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css">
        
        
        <!-- Icons Css -->
        <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css">
        <!-- App Css-->
        <link href="{{asset('assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css">

        {{-- form style --}}
        <link id="vendorsbundle" rel="stylesheet" media="screen, print" href="{{asset('tamplate/css/vendors.bundle.css')}}">
        <link id="appbundle" rel="stylesheet" media="screen, print" href="{{asset('tamplate/css/app.bundle.css')}}">
        
    </head>

    <body data-sidebar="light">

        <div id="layout-wrapper">
            @include("Driver.layouts.header")
            @include("Driver.layouts.sidebar")
        
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">
                    @yield('main-content')
                </div>
            </div>

            @include('Driver.layouts.modal')
            @include('Driver.layouts.footer')
        </div>
    </div>
    {{-- @include('Driver.layouts.rightsidebar') --}}

        
        <!-- JAVASCRIPT -->
        <script src="{{asset('assets/libs/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('assets/libs/metismenu/metisMenu.min.js')}}"></script>
        <script src="{{asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{asset('assets/libs/node-waves/waves.min.js')}}"></script>

        <!-- apexcharts -->
        <script src="{{asset('assets/libs/apexcharts/apexcharts.min.js')}}"></script>

        <script src="{{asset('assets/js/pages/dashboard.init.js')}}"></script>

        <!-- App js -->
        <script src="{{asset('assets/js/app.js')}}"></script>

        <script>
            // Example starter JavaScript for disabling form submissions if there are invalid fields
            (function()
            {
                'use strict';
                window.addEventListener('load', function()
                {
                    // Fetch all the forms we want to apply custom Bootstrap validation styles to
                    var forms = document.getElementsByClassName('needs-validation');
                    // Loop over them and prevent submission
                    var validation = Array.prototype.filter.call(forms, function(form)
                    {
                        form.addEventListener('submit', function(event)
                        {
                            if (form.checkValidity() === false)
                            {
                                event.preventDefault();
                                event.stopPropagation();
                            }
                            form.classList.add('was-validated');
                        }, false);
                    });
                }, false);
            })();

        </script>
    </body>