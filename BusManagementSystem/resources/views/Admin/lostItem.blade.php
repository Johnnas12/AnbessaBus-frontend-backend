@extends('Admin.layouts.index')
@section('main-content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Lost Items</h4>
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
                                <th>passenger</th>
                                <th>Category</th>
                                <th>date reported</th>
                                <th>contact info</th>
                                <th>status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($datas as $i => $data)
                            <tr>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck2">
                                        <label class="custom-control-label" for="customCheck2">&nbsp;</label>
                                    </div>
                                </td>
                                <td><a href="javascript: void(0);" class="text-body font-weight-bold">{{$data->passenger}}</a> </td>
                                <td>{{$data->category}}</td>
                                
                                <td>{{$data->created_at}}</td>
                                <td>
                                    {{$data->contactInfo}} 
                                    {{-- <span class="badge badge-pill badge-soft-success font-size-12">Paid</span> --}}
                                </td>

                                <td>
                                    <form action="{{route('update.status', $data->id)}}" method="post">
                                        @csrf
                                        @method('PUT')
                                       <button  class="badge  {{ $data->status === 'Pending' ? 'badge-primary' : 'badge-danger' }}">{{ $data->status }}</button>

                                    </form>
                                    {{-- <button class="status-btn" data-id="{{ $data->id }}" data-status="{{ $data->status }}">
                                        <span class="badge {{ $data->status === 'Pending' ? 'badge-primary' : 'badge-danger' }}">{{ $data->status }}</span>
                                    </button> --}}
                                </td>
                                <td>
                                    <a href="{{route('showlLostItems', $data->id)}}" style="color: rgba(148, 207, 212, 0.854)"><i class="fa fa-eye"></i></a>

                                </td>


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


