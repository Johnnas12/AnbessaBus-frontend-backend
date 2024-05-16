<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css">
    <link href="{{asset('css/profile.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css">
    
    <title>Profile</title>
</head>
<body>
    <div class="container">
        <div class="main-body">
        
              <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex flex-column align-items-center text-center">
                        <img src="{{asset('images/'. Auth::user()->profile)}}" alt="Admin" class="rounded-circle" width="150">
                        <div class="mt-3">
                          <h4>{{Auth::user()->name}}</h4>
                          <p class="text-secondary mb-1">{{Auth::user()->position}}</p>
                          <p class="text-muted font-size-sm">{{Auth::user()->email}}</p>
                          <a style="background: #F36D44"  href="{{route('changepw')}}" class="btn btn-primary">Change password</a>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
                <div class="col-md-8">
                  <div class="card mb-3">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Full Name</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                          {{Auth::user()->name. " ". Auth::user()->mname}}
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Email</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{Auth::user()->email}}
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Phone</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{Auth::user()->phone}}
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Age</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                          {{Auth::user()->age}}
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Address</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                          Addis Ababa, Piassa
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-12">
                          <a class="btn btn-info" style="background: #F36D44; width:100px;" href="{{route('editProfile')}}">Edit Profile</a>
                        </div>
                      </div>
                    </div>
                  </div>
    
             
    
    
    
                </div>
              </div>
    
            </div>
        </div>
</body>
</html>