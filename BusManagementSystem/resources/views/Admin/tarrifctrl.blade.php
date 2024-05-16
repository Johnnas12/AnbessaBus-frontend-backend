@extends('Admin.layouts.index')
@section('main-content')
    <div class="container mt-2">
        <div class="card shadow-lg mt-1">
            <div id="panel-2" class="panel">
                <div class="panel-hdr">
                    <h6 class="pt-3 px-3">
                        Tarrif <span class="fw-300"><i>Creating Form</i></span>
                    </h6>
                    <hr>
                </div>
                <div class="panel-container show m-1 p-4" >
                    <div class="panel-content p-0">
                        <form class="needs-validation" novalidate action="{{ route('storeTarrif') }}"
                            enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="panel-content">
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label" for="validationCustom01">Bus Number<span
                                                class="text-danger">*</span> </label>
                                        <input class="form-control" id="validationCustom01"  type="number" name="busnum"
                                            required>

                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        @error('fname')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-2"></div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label" for="validationCustom01">From<span
                                                class="text-danger">*</span> </label>
                                        <input class="form-control" id="validationCustom01" type="text" name="from"
                                            required>

                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        @error('fname')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-4 mb-3">
                                        <label class="form-label" for="validationCustom01">To<span
                                                class="text-danger">*</span> </label>
                                        <input class="form-control" id="validationCustom01" type="text" name="to" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        @error('fname')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-4 mb-3">
                                        <label class="form-label" for="validationCustom01">Via<span
                                                class="text-danger">*</span> </label>

                                        <input type="text" class="form-control" name="via">

                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        @error('fname')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-2"></div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label" for="validationCustom01">Distance (KM)<span
                                                class="text-danger">*</span> </label>
                                        <input type="number" class="form-control" min="0" 
                                        max="1000" step="0.01" name="distance">

                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        @error('fname')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>



                                    <div class="col-md-2"></div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label" for="validationCustom01">Price<span
                                                class="text-danger">*</span> </label>
                                        <input type="number" class="form-control" min="0" 
                                        max="1000" step="0.01" name="price">


                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        @error('fname')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="col-md-4"></div>
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4 text-center">
                                        <button class="btn btn-primary" style="background: #F36D44">Create Tarrif</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
