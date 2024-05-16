{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('admin/css/loginStyles.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Anbessa Login Page</title>
</head>

<body>
    <div class="container">
        <div class="container-fluid mt-4 justify-content-center align-items-center custom-container">
            @if(session()->has('message'))

            <div x-data= "{show: true}"  x-init="setTimeout(()=> show= false, 6000)" x-show="show" class="fixed text-center text-dark top-0 alert alert-success" role="alert" >
                    {{session('message')}}
            </div>

        @endif
        
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-md-6  mb-5 p-3 logo_and_text">
                    <div class="text-center">
                        <img class="justify-content-center align-items-center animated-image"
                            src="{{ asset('assets/img/back.png') }}"  alt="" height="320"
                            width="320" style="border-radius: 30px">
                            
                    </div>

                    {{-- <div class="d-none d-md-block">
                    <h3 class="text-center ">እንኳን ወደ </h3><h1 class="text-center pb-3 pt-3 sign_in " style="font-weight: 700;">ICMS</h1><h3 class="text-center">ሲስተም በደህና መጡ</h3>
                    </div> --}}
                </div>

                <div class="col-md-6 mt-2 p-3">
                    <div class="p-4 m-4">

                        <div class="text-center">
                        <img src="{{asset('images/anbessa.png')}}" class="" style="margin-bottom: 10px" height="100" width="100" alt="">
                        <h5 style="color: grey" class="text-center pb-4 sign_in">Welcome To Anbessa City Bus</h5>

                      </div>
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form method="post" action="{{ route('login') }}">

                            @csrf

                            <div class="input-group form-group">

                                <input type="text" class="form-control rounded @error('email') is-invalid @enderror"
                                    placeholder="Email" type="email" id="email" name="email"
                                    value="{{ old('email') }}" />
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fas fa-envelope"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="text-danger">
                                @error('email')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="input-group form-group">
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    placeholder="password" type="password" id="password" name="password" />

                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fas fa-key"></i>
                                    </span>
                                </div>



                            </div>
                            <div class="text-danger ">
                                @error('password')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
        

                            <div class="form-group">
                                <input type="submit" class="btn btn-primary sign_in_btn" value="Log In" />
                            </div>


                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
</body>

</html>

<script>
  // You can also control the animation using JavaScript
  const image = document.querySelector('.animated-image');
  let direction = 1;

  setInterval(() => {
    const top = parseFloat(getComputedStyle(image).top);
    if (top >= 20 || top <= 0) {
      direction *= -1;
    }
    image.style.top = `${top + (2 * direction)}px`;
  }, 50);
</script>
