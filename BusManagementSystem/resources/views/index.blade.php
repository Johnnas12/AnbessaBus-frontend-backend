
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Landing Page</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset ('images/anbessa.png') }}" rel="icon">
  <link href="{{asset ('user/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <script src="{{ asset('global_assets/js/main/jquery.min.js') }} "></script>
  <script src="{{ asset('global_assets/js/main/bootstrap.bundle.min.js') }} "></script>

  <link href="{{asset ('user/assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{asset ('user/assets/vendor/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
  <link href="{{asset ('user/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{asset ('user/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{asset ('user/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{asset ('user/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{asset ('user/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset ('user/assets/css/style.css') }}" rel="stylesheet">

  <style>
    .animated-image {
    position: relative;
    animation: bounce 4s ease infinite;
  }

  @keyframes bounce {
    0% {
      top: 0;
    }
    50% {
      top: 20px;
    }
    100% {
      top: 0;
    }
  }

  </style>

</head>

<body>


@include('frontend\_partials\header')

<br><br>
<section id="hero" class="d-flex align-items-center">

    <div class="container">
        <div class="row ">
            <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
                <h3 data-aos="fade-up" style="color:#FF7900; font-size:2em; font-weight:bold;">{{__('landing.number1')}}</h3>

                <p data-aos="fade-up" data-aos-delay="400" style="color:black; font-size:1em; justify-items: center" >
                   <br>
                   {{__('landing.desc')}}</p>
            </div>
            <div class="col-lg-6 rounded order-1 order-lg-2 hero-img" data-aos="fade-left" data-aos-delay="200">
                <img  style="border-radius: 50px" src="{{ asset('assets/img/back.png') }}" class="animated-image" alt="">
            </div>
        </div>
    </div>

</section>

<main id="main">




    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
        <div class="container">

            <div class="section-title" data-aos="fade-up">
                <h2>{{__('landing.abt')}}</h2>
            </div>

            <div class="row content">
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="150">
   
                    <ul>
                        <li><i class="ri-check-double-line"></i>{{__('landing.abt1')}}
                        </li>
                        <li><i class="ri-check-double-line"></i>{{__('landing.abt2')}}
                        </li>

                        
                        <li><i class="ri-check-double-line"></i> {{__('landing.abt3')}}
                    </li>

                    </ul>
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-up" data-aos-delay="300">
                 
                    <ul>
                        <li><i class="ri-check-double-line"></i> {{__('landing.abt4')}}
                        </li>
                        <li><i class="ri-check-double-line"></i>{{__('landing.abt5')}}
                    </li>
                       
                    </ul>
                </div>
            </div>

        </div>
    </section><!-- End About Us Section -->




    <!-- ======= latest Section ======= -->
    <section id="latest" class="services">


        <div class="container">

            <div class="section-title" data-aos="fade-up">
                <h2>{{__('landing.news')}}</h2>
                <p>{{__('landing.our')}}</p>
            </div>

            <div class="row">


    <!-- ======= More Services Section ======= -->
    <section id="index" class="more-services">
        <div class="container">



            <div class="row">

                @foreach ($data as $data)
                <div class="col-md-6 d-flex align-items-stretch">
                    <div class="card" style='background-image: url("{{asset('images/'.$data->profile)}}");'
                        data-aos="fade-up" data-aos-delay="100">
                        <div class="card-body">
                            <h5 class="card-title"><a href="">{{ $data->title }}</a></h5>
                            <p class="card-text">{{ $data->description }}</p>
                        </div>
                    </div>
                </div>
                @endforeach


            </div>

        </div>
    </section><!-- End More Services Section -->



    <!-- service section -->
    <div id="service" class="section-title" data-aos="fade-up">
                <h2>{{__('landing.services')}}</h2>
            </div>


    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                        <div class="icon"><i class="bx bx-wrench"></i></div>
                        <h4 class="title"><a href="home">{{__('landing.serve1')}}</a></h4>
                        <p class="description">

                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
                        <div class="icon"><i class="bx bx-certification"></i></div>
                        <h4 class="title"><a href="">{{__('landing.serve2')}}</a></h4>
                        <p class="description">

                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
                        <div class="icon"><i class="bx bx-car"></i></div>
                        <h4 class="title"><a href="">{{__('landing.serve3')}}</a></h4>
                        <p class="description">

                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
                        <div class="icon"><i class="bx bx-world"></i></div>
                        <h4 class="title"><a href="">{{__('landing.serve4')}}</a></h4>
                        <p class="description"> </p>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Services Section -->
    <!-- end service section -->


    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container">

            <div class="section-title" data-aos="fade-up">
                <h2>{{__('landing.contact')}}</h2>
            </div>

            <div class="row">

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="contact-about">
                        <h3>{{__('landing.anb')}}</h3>
                        <p></p>
                        <div class="social-links">
                            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="200">
                    <div class="info">
                        <div>
                            <i class="ri-map-pin-line"></i>
                            <p>Ethiopia Addis Ababa  <br> Kality</p>
                        </div>

                        <div>
                            <i class="ri-mail-send-line"></i>
                            <p>anbessacitybus@gmail.com</p>
                        </div>

                        <div>
                            <i class="ri-phone-line"></i>
                            <p>+2519911334311</p> 
                            
                        </div>

                    </div>
                </div>

                <div class="col-lg-5 col-md-12 aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
                    <label for="msg" class="col-md-8">Contact Us </label>
                    <form action="{{route('storeContacts')}}" method="post" role="form" >
                        @csrf
                        @method('POST')

                        <div class="row row align-items-center mb-2">
                        <div class="col-sm ">
                            <input type="text" name="sender_name" class="form-control" id="name"
                                placeholder="Your Name" required="">
                        </div>
                        <div class="col-sm">
                            <input type="email" class="form-control" name="email" id="email"
                                placeholder="Your Email" required="">
                        </div>
                        </div>
                        <div class="col-sm mb-2">
                            <input type="tel" class="form-control" name="phone" id="phone"
                                placeholder="Your phone" required="">
                        </div>
                        <div class="col-sm mb-2">
                            <input type="text" class="form-control" name="subject" id="subject"
                                placeholder="Subject" required="">
                        </div>
                        <div class="col-sm mb-2">
                            <textarea class="form-control" name="message" rows="5" placeholder="Message" required=""></textarea>
                        </div>


                        <div class="text-center m-3 "><button type="submit" style="background-color: #F68044; color:white;" class="btn">Send Message</button></div>

                    </form>
                    <div>

                        @if (session('status'))
                        <h3> {{ session('status') }}</h3>

                        @endif
                    </div>

                </div>

            </div>

        </div>
    </section><!-- End Contact Section -->






</main><!-- End #main -->

@include('frontend\_partials\footer')

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
  <script src="{{asset('assets/libs/jquery/jquery.min.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>

