@extends('Admin.layouts.index')
@section('main-content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Tarrif</h4>
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
                                <th>Bus Number</th>
                                <th>Starting Point</th>
                                <th>Via</th>
                                <th>Destination</th>
                                <th>driver</th>
                                <th>Available Seats</th>
                                <th>price</th>
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
                                <td><a href="javascript: void(0);" class="text-body font-weight-bold">{{$data->busnum}}</a> </td>
                                <td>{{$data->from}}</td>
                                <td>{{$data->via}}</td>
                                <td>{{$data->to}}</td>
                                <td>
                                    {{$data->driver}} 

                                    {{-- <span class="badge badge-pill badge-soft-success font-size-12">Paid</span> --}}
                                </td>
                                <td>{{$data->availableseats}}</td>
                                <td>
                                    <i class="fab fa-money mr-1"></i> {{$data->price}} ETB
                                </td>
                                <td>
                                    <!-- Button trigger modal -->
                                    <div class="d-flex">
                                    <a href="{{route('routeEdit', $data->id)}}" style="color:#FFAD4E "><i class="fa fa-pencil-alt"></i></a>
                                    <form action="{{ route('routeDelete', ['id' => $data->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this route?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="d-flex" style="color: red"><i class="fa fa-trash-alt"></i></button>
                                    </form>
                                    {{-- <a href="" style="color: red"><i class="fa fa-trash-alt"></i></a>     --}}
                                </div>
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