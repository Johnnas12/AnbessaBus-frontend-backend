
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{ config('app.name','ICMS AA Police') }}</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset ('user/assets/img/favico.png') }}" rel="icon">
  <link href="{{asset ('user/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset ('user/assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{asset ('user/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{asset ('user/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{asset ('user/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{asset ('user/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{asset ('user/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{asset ('user/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset ('user/assets/css/style.css') }}" rel="stylesheet">

</head>

<body>


@include('frontend\_partials\header')
<!-- pre loader -->


<!-- end pre loader -->
<!-- ======= welcome Section ======= -->
<br><br>
<section id="hero" class="d-flex align-items-center">

    <div class="container">
        <div class="row ">
            <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
                <h3 data-aos="fade-up" style="color:#262626; font-size:2em; font-weight:bold;">"Safety and security of Our Community  "</h3>

                <p data-aos="fade-up" data-aos-delay="400" style="color:#4c630f; font-size:1em; justify-items: center" >
                ensuring the promotion, respect and protection of People in the City <br>
                maintain peace
                and security of the dwellers under the city administration
                by complying to and enforcing the constitution and other
                laws of the country by preventing crime based on the
                participation of the people </p>
                <div data-aos="fade-up" data-aos-delay="800">
                    <a href="report" class="btn-get-started scrollto">Tell Us What Happen</a>
                </div>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left" data-aos-delay="200">
                <img src="images/children2.jpg" class="img-fluid animate" alt="">
            </div>
        </div>
    </div>

</section><!-- End welcome -->



<main id="main">


        {{--  @include('frontend.reports.report')  --}}




    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
        <div class="container">

            <div class="section-title" data-aos="fade-up">
                <h2>About Us</h2>
            </div>

            <div class="row content">
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="150">
                    <p>
                        Addis Ababa Police Incident and Crime Report Management System
                    </p>
                    <ul>
                        <li><i class="ri-check-double-line"></i> keep people safety
                        </li>
                        <li><i class="ri-check-double-line"></i> Help woman by advicing and protecting from against Incident and Crime
                    </li>
                        <li><i class="ri-check-double-line"></i> Facilitate Automate and reliable communication between organization work for woman and children right
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-up" data-aos-delay="300">
                    <p>
                       Incident And Crime Report Management System
                    </p>
                    <ul>
                        <li><i class="ri-check-double-line"></i> Facilitate Fast and Secure Incident and Crime Report
                        </li>
                        <li><i class="ri-check-double-line"></i> Help People
                    </li>
                        <li><i class="ri-check-double-line"></i> Facilitate Automate and reliable communication between Police and People
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
                <h2>Latest Posts</h2>
                <p>Our latest news</p>
            </div>

            <div class="row">


    <!-- ======= More Services Section ======= -->
    <section id="index" class="more-services">
        <div class="container">



            <div class="row">

                @foreach ($data as $data)
                <div class="col-md-6 d-flex align-items-stretch">
                    <div class="card" style='background-image: url("{{asset('images/'.$data->image)}}");'
                        data-aos="fade-up" data-aos-delay="100">
                        <div class="card-body">
                            <h5 class="card-title"><a href="">{{ $data->title }}</a></h5>
                            <p class="card-text">{{ $data->description }}</p>
                            <div class="read-more"><a href="#"><i class="bi bi-arrow-right"></i> Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach


            </div>

        </div>
    </section><!-- End More Services Section -->



    <!-- service section -->
    <div id="service" class="section-title" data-aos="fade-up">
                <h2>Services</h2>
            </div>


    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                        <div class="icon"><i class="bx bxl-children"></i></div>
                        <h4 class="title"><a href="home"> Protect Safety of Community in our City</a></h4>
                        <p class="description">

                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
                        <div class="icon"><i class="bx bx-woman"></i></div>
                        <h4 class="title"><a href="">Crime and Incident Protection </a></h4>
                        <p class="description">

                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
                        <div class="icon"><i class="bx tachometer"></i></div>
                        <h4 class="title"><a href=""> Education about Traffic Incident </a></h4>
                        <p class="description">

                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
                        <div class="icon"><i class="bx bx-world"></i></div>
                        <h4 class="title"><a href=""> Pre-Protection of Crime and Incidents</a></h4>
                        <p class="description"> </p>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Services Section -->
    <!-- end service section -->





    <!-- ======= F.A.Q Section ======= -->
    <section id="faq" class="faq">
        <div class="container">

            <div class="section-title" data-aos="fade-up">
                <h2>Frequently Asked Questions</h2>
            </div>

            <div class="row faq-item d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                <div class="col-lg-5">
                    <i class="ri-question-line"></i>
                    <h4>how do we report crimes that are committed against women and children ?</h4>
                </div>
                <div class="col-lg-7">
                    <p>
                        To report any crimes that regards women and children use the following link stated below and enter the speciied information
                        <br>
                        <a href="report" class="btn-get-started scrollto">Report</a>
                        <a href=""></a>
                    </p>
                </div>
            </div><!-- End F.A.Q Item-->

            <div class="row faq-item d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                <div class="col-lg-5">
                    <i class="ri-question-line"></i>
                    <h4>How do you authenticate the reporter?</h4>
                </div>
                <div class="col-lg-7">
                    <p>
                    The authentication process is done through physical credentials that the reporter owns for example kebele ID card and other identification papers and that requires the reporter to come to office personally to verify that and that process makes reporters to abort the process of reporting.
                    </p>
                </div>
            </div><!-- End F.A.Q Item-->

            <div class="row faq-item d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
                <div class="col-lg-5">
                    <i class="ri-question-line"></i>
                    <h4>What your relation with police looks like?</h4>
                </div>
                <div class="col-lg-7">
                    <p>
                    The relation with police stations starts when we receive a report that involves crimes that requires police to investigate up to it finishes its legal process. But communication is a big problem with these parts of government. there is no communication mechanism that enables us to work reliably.
                    </p>
                </div>
            </div><!-- End F.A.Q Item-->

            <div class="row faq-item d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="400">
                <div class="col-lg-5">
                    <i class="ri-question-line"></i>
                    <h4>The relationship between the institution and lawyers?</h4>
                </div>
                <div class="col-lg-7">
                    <p>
                    The relationship with lawyers starts when they volunteer to work with the organization to handle and help victims that need legal advice
                    </p>
                </div>
            </div><!-- End F.A.Q Item-->
<!-- End F.A.Q Item-->

        </div>
    </section><!-- End F.A.Q Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container">

            <div class="section-title" data-aos="fade-up">
                <h2>Contact Us</h2>
            </div>

            <div class="row">

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="contact-about">
                        <h3>Incident and Crime Report Management System</h3>
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
                            <p>Ethiopia Addis Ababa <br>Addis Ababa , Bole</p>
                        </div>

                        <div>
                            <i class="ri-mail-send-line"></i>
                            <p>incidentcrimereportmgt@aapolice.com</p>
                        </div>

                        <div>
                            <i class="ri-phone-line"></i>
                            <p>+1123374745</p>
                        </div>

                    </div>
                </div>

                <div class="col-lg-5 col-md-12 aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
                    <label for="msg" class="col-md-8">Contact Us </label>
                    <form action="{{ route('suggestion') }}" method="post" role="form" >
                        @csrf

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


                        <div class="text-center m-3 "><button type="submit" class="btn btn-success">Send Message</button></div>

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

</body>
</html>
