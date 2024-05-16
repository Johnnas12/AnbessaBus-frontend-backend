@extends('Admin.layouts.index')
@section('main-content')
    <div class="row">
        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">passenger name</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{ $data->passenger }}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">lost Item Category</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{ $data->category }}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Additional Description</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{ $data->decsription }}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Contact Information</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{ $data->contactInfo }}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Date Reported</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{ $data->created_at }}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Status</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{ $data->status }}
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </div>
@endsection
