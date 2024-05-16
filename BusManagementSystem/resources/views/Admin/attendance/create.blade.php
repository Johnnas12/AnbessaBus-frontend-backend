@extends('Admin.layouts.index')
@section('main-content')
<form method="POST" class="wizard-form" action="{{ route('attendances.store') }}">
    @csrf
    <fieldset>
    <div class="card m-2 p-4">
    <div class="row ">
    <div class="col-md-6">
        <div class="form-group">
        <label for="user_id">Emoloyee <span class="text-danger">*</span></label>
        <select name="user_id" id="user_id" class="select form-control">
            @foreach ($users as $user)
            <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
        </div> 
    </div>


    <div class="col-md-6">
        <div class="form-group">  
   
        <label for="date" >Date</label>
        <input  class=" form-control" type="date" name="date" id="date" required>
        </div>
    </div>
    
    <div class="col-md-6">
    <div class="form-group">
        <label for="in_time">In Time</label>
        <input class=" form-control" type="time" name="in_time" id="in_time" required>
    </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
  
        <label for="out_time">Out Time</label>
        <input class=" form-control" type="time" name="out_time" id="out_time" required>
    </div>
    </div>
    <div class="col-md-4"></div>
    <button class="btn btn-primary" style="background-color: #F13A03" type="submit">Save Attendance</button>
    </div>
</div>
</form>

</fieldset>

@endsection