<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('meta-description')">
    <!-- title -->
    <title>@yield('title')</title>

    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="{{asset('assets/img/favicon.ico')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets/img/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets/img/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/img/favicon-16x16.png')}}">
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <!-- fontawesome -->
    <link rel="stylesheet" href="{{asset('assets/css/all.min.css')}}">
    <!-- bootstrap -->
    <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}">
    <!-- owl carousel -->
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.css')}}">
    <!-- magnific popup -->
    <link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}">
    <!-- animate css -->
    <link rel="stylesheet" href="{{asset('assets/css/animate.css')}}">
    <!-- mean menu css -->
    <link rel="stylesheet" href="{{asset('assets/css/meanmenu.min.css')}}">
    <!-- main style -->
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
    <!-- responsive -->
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">

    @yield('css')

</head>

<body>

    <!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->

    <!-- header -->
    <div class="top-header-area" id="sticker">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 text-center">
                    <div class="main-menu-wrap">
                        <!-- logo -->
                        <div class="site-logo">
                            <a href="/">
                                <img src="{{asset('assets/img/logo.png')}}" alt="" width="60" height="60">
                            </a>
                        </div>
                        <!-- logo -->

                        <!-- menu start -->
                        <nav class="main-menu">
                            <ul>
                                <li><a href="/">BERANDA</a>
                                </li>
                                <li><a href="#">TENTANG SESPIM</a>
                                    <ul class="sub-menu">
                                        <li><a href="{{route('front.sejarah')}}">SEJARAH</a></li>
                                        <li><a href="{{route('front.profil')}}">PROFIL</a></li>
                                        <li><a href="{{route('front.struktur')}}">STRUKTUR</a></li>
                                        <li><a href="{{route('front.kurikulum')}}">KURIKULUM</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">KABAR SESPIM</a>
                                    <ul class="sub-menu">
                                        <li><a href="{{route('front.kabar-sespim', ['id' => 1])}}">SESPIM</a></li>
                                        <li><a href="{{route('front.kabar-sespim', ['id' => 2])}}">SESPIMA</a></li>
                                        <li><a href="{{route('front.kabar-sespim', ['id' => 3])}}">SESPIMEN</a></li>
                                        <li><a href="{{route('front.kabar-sespim', ['id' => 4])}}">SESPIMTI</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">GALERI</a>
                                    <ul class="sub-menu">
                                        <li><a href="{{route('front.galeri')}}">Foto</a></li>
                                        <li><a href="{{route('front.galeri.video')}}">Video</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{route('front.perpustakaan')}}">PERPUSTAKAAN</a>
                                </li>
                                <li><a class="shopping-cart" href="#">LOGIN</a>
                                    <ul class="sub-menu">
                                        <li><a href="/login">ADMIN</a></li>
                                        <li><a href="/login">PESERTA DIDIK</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="header-icons">
                                        <a href="https://www.facebook.com/sespimpolri58/" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                        <a href="https://twitter.com/@sespim_polri/" target="_blank"><i class="fab fa-twitter"></i></a>
                                        <a href="https://www.instagram.com/sespimlemdiklatpolri/" target="_blank"><i class="fab fa-instagram"></i></a>
                                        <a href="https://youtube.com/@sespimlemdiklatpolri3387" target="_blank"><i class="fab fa-youtube"></i></a>F
                                    </div>
                                </li>
                            </ul>
                        </nav>
                        <div class="mobile-menu"></div>
                        <!-- menu end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end header -->

    <!-- search area -->
    <div class="search-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <span class="close-btn"><i class="fas fa-window-close"></i></span>
                    <div class="search-bar">
                        <div class="search-bar-tablecell">
                            <h3>Search For:</h3>
                            <input type="text" placeholder="Keywords">
                            <button type="submit">Search <i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end search area -->

    @yield('content')
    <!-- footer -->
    <div class="footer-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-6">
                    <div class="footer-box get-in-touch">
                        <h2 class="widget-title">Alamat SESPIM</h2>
                        <ul>
                            <li>Jl. Maribaya No 54 Desa Kayu Ambon Kecamatan Lembang, Kabupaten Bandung Barat 40391</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-box pages">
                        <img src="{{asset('assets/img/footer-logo.png')}}" alt="" width="300" height="160">
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-box pages">
                        <h2 class="widget-title">Pengunjung </h2>
                        <p>Total Pengunjung Website : {{$visitors}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end footer -->

    <!-- copyright -->
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <p>Copyrights &copy; 2023 - <a href="/">SESPIM LEMDIKLAT POLRI</p>
                </div>
                <div class="col-lg-6 text-right col-md-12">
                    <div class="social-icons">
                        <ul>
                            <li><a href="https://www.facebook.com/sespimpolri58/" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="https://twitter.com/@sespim_polri/" target="_blank"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="https://www.instagram.com/sespimlemdiklatpolri/" target="_blank"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="https://youtube.com/@sespimlemdiklatpolri3387" target="_blank"><i class="fab fa-youtube"></i></a></li>F
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end copyright -->

    <!-- jquery -->
    <script src="{{asset('assets/js/jquery-1.11.3.min.js')}}"></script>
    <!-- bootstrap -->
    <script src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- count down -->
    <script src="{{asset('assets/js/jquery.countdown.js')}}"></script>
    <!-- isotope -->
    <script src="{{asset('assets/js/jquery.isotope-3.0.6.min.js')}}"></script>
    <!-- waypoints -->
    <script src="{{asset('assets/js/waypoints.js')}}"></script>
    <!-- owl carousel -->
    <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
    <!-- magnific popup -->
    <script src="{{asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
    <!-- mean menu -->
    <script src="{{asset('assets/js/jquery.meanmenu.min.js')}}"></script>
    <!-- sticker js -->
    <script src="{{asset('assets/js/sticker.js')}}"></script>
    <!-- main js -->
    <script src="{{asset('assets/js/main.js')}}"></script>

    @yield('script')
</body>

</html>