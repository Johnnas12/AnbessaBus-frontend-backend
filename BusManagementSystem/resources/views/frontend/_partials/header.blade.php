

  <!-- ======= Header ======= -->

  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">

         <h1><a href="/"><img class="img-fluid" type="logo" src="{{asset('images/anbessa.png')}}" alt="logo"></a><span style="font-size:20px; color: #FF7900; ">{{__('landing.Anbessa')}}</span></h1>
        
        <!-- <a href="/"><img src="images/logo1.png" alt="" class="img-fluid"></a> -->

      </div>

      <nav id="navbar" class="navbar font-weight-bold">
        <ul class="font-weight-bold">
     
          <li class="nav-item">
            <a href="#hero">{{__('landing.home')}}</a>
          </li>
          <li class="nav-item">
            <a href="#about">{{__('landing.about')}}</a>
          </li>
          <li>
            <a href="#latest">{{__('landing.news')}}</a>
          </li>
          <li class="nav-item">
            <a href="#contact">{{__('landing.contact')}}</a>
          </li>

      
          <div class="dropdown d-inline-block">
            <button type="button" class="btn header-item waves-effect" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   <img class="" src="{{asset('assets/images/flags/'. Config::get('languages')[App::getLocale()]['flag-icon'])}}" alt="Header Language" height="16"> <span style="color: grey">{{ Config::get('languages')[App::getLocale()]['display'] }}</span>
               </button> 
               <div class="dropdown-menu dropdown-menu-right ">
                   @foreach (Config::get('languages') as $lang => $language)
                   @if ($lang != App::getLocale())
                  
                   <a style="" href="{{ route('lang.switch', $lang) }}" class="text-center">
                       <img src="{{asset('assets/images/flags/'.$language['flag-icon'] )}}" alt="user-image" class="m-0 p-0" height="12"> <span class="text-center" style="color:black; font-size: 13px; padding-right:10px">{{$language['display']}}</span>
                   </a>
                   

                   @endif
                   @endforeach
             
               </div>
           </div>

         

          <li>
      
          @guest
          @if (Route::has('login'))
              <li class="nav-item">
                  <a class="getstarted scrollto nav-link" href="{{ route('login') }}">{{__('landing.login')}}</a>
              </li>
          @endif


      @else
          <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle text-success" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>

                    <img class="img-xs rounded-circle" width="20px" height="20px" src="{{asset('images/'.Auth::user()->profile)}}" alt="">
                     {{ Auth::user()->fname }}</p>

              </a>
              <div class="dropdown">
              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{route('admin.home')}}">Dashboard</a>
                <a class="dropdown-item" href="{{route ('profile')}}">Profile</a>
                  <a class="dropdown-item" href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>

              </div>
              </div>

             
          </li>
      @endguest
      </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
