<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Blog Hub @yield('title')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="/assets/img/Logo/logo5_22_13654.png" rel="icon">
    <link href="/assets/img/Logo/logo5_22_13654.png" rel="apple-touch-icon">

    {{--jquery--}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
          rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/assets/HomeStyle/animate.css/animate.min.css" rel="stylesheet">
    <link href="/assets/HomeStyle/aos/aos.css" rel="stylesheet">
    <link href="/assets/HomeStyle/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/HomeStyle/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/assets/HomeStyle/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="/assets/HomeStyle/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="/assets/HomeStyle/remixicon/remixicon.css" rel="stylesheet">
    <link href="/assets/HomeStyle/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="/assets/css/style.css" rel="stylesheet">

</head>

<body>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

        {{--<h1 class="logo me-auto"><a href="/"><span>L</span>Y<span>Ne</span></a></h1>--}}
        <h4 class=" me-auto"><a href="/"><span style="color:#ff9904;"><img src="/assets/img/Logo/logo5_22_13654.png"
                                                                           alt="" class="img-fluid"
                                                                           style="width: 40px;height: 40px">Blog Hub</span></a>
        </h4>
        <!-- Uncomment below if you prefer to use an image logo -->
        <a href="index.html" class="logo me-auto me-lg-0"></a>

        <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
                <li><a href="/" id="nave_tab_home">Home</a></li>

                <li hidden class="dropdown"><a href="#"><span>About</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="/about">About Us</a></li>
                        <li><a href="/team">Team</a></li>
                        <li><a href="/testimonials">Testimonials</a></li>
                        <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                            <ul>
                                <li><a href="#">Deep Drop Down 1</a></li>
                                <li><a href="#">Deep Drop Down 2</a></li>
                                <li><a href="#">Deep Drop Down 3</a></li>
                                <li><a href="#">Deep Drop Down 4</a></li>
                                <li><a href="#">Deep Drop Down 5</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li hidden><a href="/services">Services</a></li>
                <li hidden><a href="/portfolio">Portfolio</a></li>
                <li hidden><a href="/pricing">Pricing</a></li>
                <li><a href="/blog" id="nave_tab_blog">Blog</a></li>
                <li><a href="/contact" id="nave_tab_content">Contact</a></li>
                @guest
                    <li class="nav-item">
                        <a id="nave_tab_login" class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a id="nave_tab_register" class="nav-link"
                               href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="dropdown"><a href="#"><span>{{ Auth::user()->name }}</span> <i
                                    class="bi bi-chevron-right"></i></a>
                        <ul>
                            <li><a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </li>
                            <li><a href="/home">My Home</a></li>
                        </ul>
                    </li>

                @endguest

            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

        <div class="header-social-links d-flex">
            <a href="#" class="twitter"><i class="bu bi-twitter"></i></a>
            <a href="#" class="facebook"><i class="bu bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bu bi-instagram"></i></a>
            <a href="#" class="linkedin"><i class="bu bi-linkedin"></i></a>
        </div>

    </div>
</header><!-- End Header -->

<!-- ======= Hero Section ======= -->


@yield('contentBody')

<!-- ======= Footer ======= -->
<footer id="footer">

    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6 footer-contact">
                    <h3 style="color: #ff9904"><img src="/assets/img/Logo/logo5_22_13654.png" alt="" class="img-fluid"
                                                    style="width: 60px;height: 60px">Blog Hub</h3>
                    <p>
                        <br>
                        <br>
                        <br><br>
                        <strong>Phone:</strong> +94 77 98 53 864<br>
                        <strong>Email:</strong> chamodwijesena77@gmail.com<br>
                    </p>
                </div>

                <div class="col-lg-2 col-md-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Our Services</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-6 footer-newsletter">
                    <h4>Join Our Newsletter</h4>
                    <p>You can get new blog updates to your mail</p>
                    <form action="" method="post">
                        <input type="email" name="email"><input type="submit" value="Subscribe">
                    </form>
                </div>

            </div>
        </div>
    </div>

    <div class="container d-md-flex py-4">

        <div class="me-md-auto text-center text-md-start">
            <div class="copyright">
                &copy; Copyright <strong><span>Blog Hub</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                Designed by <a href="#">Dice Solutions</a>
            </div>
        </div>
        <div class="social-links text-center text-md-right pt-3 pt-md-0">
            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
            <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
            <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
        </div>
    </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="/assets/HomeStyle/aos/aos.js"></script>
<script src="/assets/HomeStyle/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/assets/HomeStyle/glightbox/js/glightbox.min.js"></script>
<script src="/assets/HomeStyle/isotope-layout/isotope.pkgd.min.js"></script>
<script src="/assets/HomeStyle/php-email-form/validate.js"></script>
<script src="/assets/HomeStyle/swiper/swiper-bundle.min.js"></script>
<script src="/assets/HomeStyle/waypoints/noframework.waypoints.js"></script>

<!-- Template Main JS File -->
<script src="/assets/js/main.js"></script>
@yield('content_script')
</body>

</html>