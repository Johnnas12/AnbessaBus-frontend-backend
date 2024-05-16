@extends('Admin.layouts.index')
@section('main-content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Contacts</h4>
                <div class="table-responsive">
                    <table class="table table-centered table-nowrap mb-0">
                        <thead class="thead-light">
                            <tr>
                                <th style="width: 20px;">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">&nbsp;</label>
                                    </div>
                                </th>
                                <th>Sender Name</th>
                                <th>Email</th>
                                <th>phone</th>
                                <th>subject</th>
                                <th>Message</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($contacts as $i => $data)
                            <tr>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck2">
                                        <label class="custom-control-label" for="customCheck2">&nbsp;</label>
                                    </div>
                                </td>
                                <td><a href="javascript: void(0);" class="text-body font-weight-bold">{{$data->sender_name}}</a> </td>
                                
                                
                                <td>{{$data->email}}</td>
                                <td>
                                    {{$data->phone}} 
                                    {{-- <span class="badge badge-pill badge-soft-success font-size-12">Paid</span> --}}
                                </td>
                                <td>{{$data->subject}}</td>
                                <td>{{$data->message}}</td>




                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- end table-responsive -->
            </div>
        </div>
    </div>
</div>

@endsection


