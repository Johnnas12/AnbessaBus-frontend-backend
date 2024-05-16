<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Anbessa City Bus</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="{{asset ('images/anbessa.png') }}" rel="icon">
        
        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css">
        <link href="{{asset('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css">
        <script src="//unpkg.com/alpinejs" defer></script>
        <!-- Icons Css -->
        <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css">
        <!-- App Css-->
        <link href="{{asset('assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css">
        
    </head>

    <body data-sidebar="light">

        <div id="layout-wrapper">
            @include("storeKeeper.layouts.header")
            @include("StoreKeeper.layouts.sidebar")
        
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">
                    <x-flash-message />
                    @yield('main-content')
                </div>
            </div>

            @include('storeKeeper.layouts.modal')
            @include('storeKeeper.layouts.footer')
        </div>
    </div>
    {{-- @include('StoreKeeper.layouts.rightsidebar') --}}

        
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


    
    </body>