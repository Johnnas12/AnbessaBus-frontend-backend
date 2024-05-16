@extends('Admin.layouts.index')
@section('main-content')
<div class="container p-4">
    <div class="card">
        <div class="card-header text-center bg-dark">
            <h3 class="text-center text-warning">User Registeration Form</h3>
            <h3>
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        <h3> {{ session('success') }}</h3>
                    </div>
                @endif
            </h3>
            <h4 class="card-title">User Profile</h4>

        </div>
        <div class="card-body">
            <form class="form-sample" method="POST" action="{{ route('federalAccount.update', $user->id) }}"
                enctype="multipart/form-data">


                @csrf
                @method('put')
                <div class="col-sm-12">
                    <div class="row row-cols-2">
                        <div class="col">
                            <label for="fname">First Name</label>
                            <input class="form-control" type="text" name="fname" value="{{$user->fname}}" id="fname">
                            @error('fname')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="mname">Middle Name</label>
                            <input class="form-control" type="text" name="mname" value="{{$user->mname}}" id="mname">
                            @error('mname')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="lname">Last Name</label>
                            <input class="form-control" type="text" name="lname" value="{{$user->lname}}" id="lname">
                            @error('lname')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col">
                            <div class="row row-cols-2">
                                <div class="col">
                                    <label for="gender">Gender</label>
                                </div>
                                <div class="col ">
                                    <label class="radio">
                                        <input value="male" name="gender" type="radio" checked>
                                        <span>Male</span>
                                    </label>
                                    <label class="radio">
                                        <input value="female" name="gender" type="radio">
                                        <span>Female</span>
                                    </label>
                                </div>
                            </div>

                            @error('gender')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="region">Region</label>

                            <select class="form-control" name="region" value="{{$user->region}}" id="region">
                                <option value="Addis Ababa">Addis Ababa</option>
                                <option value="Dire Dawa">Dire Dawa</option>
                                <option value="Oromia">Oromia</option>
                                <option value="Amhara">Amhara</option>
                                <option value="Benishengul">Benishengul</option>
                                <option value="Sidama">Sidama</option>
                                <option value="Harar">Harar</option>
                                <option value="Gambela">Gambela</option>
                                <option value="South Nation">South Nation</option>
                                <option value="Afar">Afar</option>
                                <option value="Tigray">Tigray</option>
                                <option value="Somale">Somale</option>

                            </select>

                            @error('region')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="city">City</label>
                            <input class="form-control" type="text" name="city" value="{{$user->city}}" id="city">
                            @error('city')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="position">Position</label>
                            <input class="form-control" type="text" name="position" value="{{$user->position}}" id="position">
                            @error('position')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="email">Email</label>
                            <input class="form-control" type="email" name="email" value="{{$user->email}}" id="email">
                            @error('email')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="phone">Phone Number</label>
                            {{-- <input type="tel" name="phone"  required value="{{$user->phone}}" > --}}
                            <input class="form-control" type="tel" name="phone" pattern="\+?[0-9]+{13}" onkeypress="return isPhoneNumber(event)" value="{{$user->phone}}" id="phone">
                            @error('phone')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col">
                            <label for="type">Role</label>
                            <select class="form-control" name="type" value="{{$user->type}}" id="type" aria-selected="{{$user->type}}" disabled>
                                <option value="">Select Role</option>
                                <option value="0" {{ $user->type == 0 ? 'selected' : '' }}>User</option>
                                <option value="2" {{ $user->type == 2 ? 'selected' : '' }}>Admin</option>
                                <option value="1" {{ $user->type == 1 ? 'selected' : '' }}>SuperAdmin</option>
                            </select>
                            @error('type')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="password">Password</label>
                            <input class="form-control" type="password" name="password" value="" id="password">
                            @error('password')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="cpassword">Confirm Password</label>
                            <input class="form-control" type="password" name="cpassword" value="" id="cpassword">
                            @error('cpassword')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="cpassword">UserName</label>
                            <input class="form-control" type="text" name="username" value="{{$user->username}}" id="username">
                            @error('username')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="profile">Profile</label>
                            <input class="form-control" type="file" name="profile" value="{{$user->profile}}" id="profile">
                            <img src="{{asset('images/'.$user->profile)}}" alt="" style="width: 60px; height: auto;" class="mt-3">
                            @error('profile')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                        {{-- <input type="button" value="submit" class="btn btn-info justify-content-center mt-5 p-3 " style="border-radius: 20px; justify-self: end;"> --}}
                        <button type="submit" class="btn btn-info justify-content-center mt-5 p-3"
                            style="border-radius: 20px; justify-self: end;">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection