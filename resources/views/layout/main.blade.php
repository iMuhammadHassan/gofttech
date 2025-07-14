<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Start Meta -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="GOFTECH">
    <meta name="keywords" content="Software Planning, Cyber Security, App Development, Search Engine Optimization, Social Media Management">
    <meta name="author" content="goftechcompany">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Title of Site -->
    <title>@yield('title', 'GOFTECH')</title>

    <!-- Favicons -->
    <link rel="icon" type="image/png" href="{{ asset('assets/img/logo.png') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/all.css') }}">

    <!-- Flat Icon CSS -->
    <link rel="stylesheet" href="{{ asset('assets/webfonts/flat-icon/flaticon_bantec.css') }}">

    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">

    <!-- Swiper Bundle CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.min.css') }}">

    <!-- Slick CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">

    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">

    <!-- Mean Menu CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/meanmenu.min.css') }}">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/sass/style.css') }}">
</head>


<body>
	<!-- Preloader Start -->
	 <div class="loader">
		 <span class="loader-container"></span>
	 </div>
	<!-- Preloader End -->

	<!-- Top Bar Start -->
<div class="top__bar">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-md-6">
                <div class="top__bar-left">
                    <a href="tel:+923355265622"><i class="fas fa-phone-alt"></i>+92 335 526 5622   </a>
                    <a href="mailto:info@goftechsolutions.com"><i class="fas fa-envelope"></i>info@goftechsolutions.com</a>
                </div>
            </div>
            <div class="col-xl-6 col-md-6">
                <div class="top__bar-right">
                    <a href="https://www.google.com/maps?q=T-1,+Third+Floor,+Business+Hub,+Gulberg+Greens,+Islamabad"><i class="fas fa-map-marker-alt"></i>T-1, Third Floor, Business Hub, Gulberg Greens, Islamabad</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Top Bar End -->


	<!-- Header Area Start -->
	<div class="header__area header__sticky">
		<div class="container">
            <div class="header__area-menubar">
                <div class="header__area-menubar-left">
                    <div class="header__area-menubar-left-logo">
                        <a href="{{route('home')}}"><img class="dark-n" src="{{asset ('assets/img/gof_logo.png')}}" alt="image"></a>
                    </div>
                </div>
				<div class="header__area-menubar-center">
                    <div class="header__area-menubar-center-menu menu-responsive">
                        <ul id="mobilemenu">
							<li><a href="{{route('home')}}">Home</a></li>

							<li><a href="{{route('services')}}">Service</a></li>

							<li><a href="{{route('team')}}">Team</a></li>

							<li><a href="{{route('packages')}}">Package</a></li>

							<li><a href="{{route('portfolio')}}">Portfolio</a></li>

                            {{-- <li class="menu-item-has-children"><a href="#">Portfolio <i class="fas fa-angle-down"></i></a>
                                <ul class="sub-menu">
									{{-- <li><a href="{{route('portfoliodetails')}}">Details</a></li>
                                </ul>
                            </li> --}}

							<li><a href="{{route('about')}}">About Us</a></li>

							<li><a href="{{route('contact')}}">Contact</a></li>

                            <li><a href="{{route('auth.sign-in')}}">Sign In</a></li>

                        </ul>
                    </div>
				</div>
                <div class="header__area-menubar-right">
                    <div class="header__area-menubar-right-box">
                        {{-- <div class="header__area-menubar-right-box-search">
							<div class="search">
								<span class="header__area-menubar-right-box-search-icon open"><i class="flaticon-loupe"></i></span>
							</div>
							<div class="header__area-menubar-right-box-search-box">
								<form>
									<input type="search" placeholder="Search Here.....">
									<button type="submit"><i class="flaticon-loupe"></i>
									</button>
								</form> <span class="header__area-menubar-right-box-search-box-icon"><i class="fal fa-times"></i></span>
							</div>
						</div> --}}
                        <div class="header__area-menubar-right-box-sidebar">
                            <div class="header__area-menubar-right-box-sidebar-popup-icon">
								<span class="bar-1"></span>
								<span class="bar-2"></span>
								<span class="bar-3"></span>
							</div>
                        </div>
						<div class="header__area-menubar-right-box-btn">
							<a class="btn-one" href="request-quote.html">Get Quote<i class="fas fa-arrow-right"></i></a>
						</div>
                        <!-- sidebar Menu Start -->
                        <div class="header__area-menubar-right-sidebar-popup">
                            <div class="sidebar-close-btn"><i class="fal fa-times"></i></div>
                            <div class="header__area-menubar-right-sidebar-popup-logo">
                                <a href="index.html"> <img src="{{asset ('assets/img/gof_logo.png')}}" alt="image"> </a>
                            </div>
                            <p>Welcome to GOFTECH, where innovation meets excellence. We specialize in delivering cutting-edge web and app development solutions that bring your digital ideas to life. Our team is passionate about creating user-friendly and effective technology that drives your success.</p>
							<div class="header__area-menubar-right-sidebar-popup-contact">
								<h4 class="mb-30">Get In Touch</h4>
								<div class="header__area-menubar-right-sidebar-popup-contact-item">
									<div class="header__area-menubar-right-sidebar-popup-contact-item-icon">
										<i class="fal fa-phone-alt icon-animation"></i>
									</div>
									<div class="header__area-menubar-right-sidebar-popup-contact-item-content">
										<span>Call Now</span>
										<h6><a href="tel:+92 335 5265622">+92 335 5265622</a></h6>
									</div>
								</div>
								<div class="header__area-menubar-right-sidebar-popup-contact-item">
									<div class="header__area-menubar-right-sidebar-popup-contact-item-icon">
										<i class="fal fa-envelope"></i>
									</div>
									<div class="header__area-menubar-right-sidebar-popup-contact-item-content">
										<span>Quick Email</span>
										<h6><a href="mailto:info@goftechsolutions.com">info@goftechsolutions.com</a></h6>
									</div>
								</div>
								<div class="header__area-menubar-right-sidebar-popup-contact-item">
									<div class="header__area-menubar-right-sidebar-popup-contact-item-icon">
										<i class="fal fa-map-marker-alt"></i>
									</div>
									<div class="header__area-menubar-right-sidebar-popup-contact-item-content">
										<span>Office Address</span>
										<h6><a href="https://www.google.com/maps">T-1, Third Floor, Business Hub, Gulberg Greens, Islamabad</a></h6>
									</div>
								</div>
							</div>
							<div class="header__area-menubar-right-sidebar-popup-social">
								<ul>
									<li><a href="https://www.facebook.com/profile.php?id=100095189804409"><i class="fab fa-facebook-f"></i></a></li>
									<li><a href="https://www.linkedin.com/company/gof-tech-solutions/"><i class="fab fa-linkedin"></i></a></li>
									<li><a href="https://www.instagram.com/gof_tech/"><i class="fab fa-instagram"></i></a></li>
								</ul>
							</div>
                        </div>
                        <div class="sidebar-overlay"></div>
                        <!-- sidebar Menu Start -->
                    </div>
					<div class="responsive-menu"></div>
                </div>
            </div>
        </div>
    </div>
	<!-- Header Area End -->

<!-- Banner Area Start -->
<div class="banner__one">
	<div class="banner-shape">
		<div class="shape banner-shape-1"></div>
		<div class="shape banner-shape-2"></div>
		<div class="shape banner-shape-3"></div>
		<div class="shape banner-shape-4"></div>
		{{-- <img class="shape banner-shape-5" src="assets/img/shape/banner-shape.png" alt="image"> --}}
		{{-- <div class="shape banner-shape-7"></div> --}}
		<div class="shape banner-shape-6"></div>
	</div>
	<div class="container">
		<div class="row align-items-center gy-4 justify-content-center">
			<div class="col-xl-6 col-lg-6">
				<div class="banner__one-content">
					<span class="subtitle-one">Welcome to GOFTECH Family</span>
					<h2>Innovative.<span>Reliable.</span></h2>
					<p>Our team about exploring new possibilities and embracing emerging trends to deliver transformative IT solutions</p>
					<a href="{{route('services')}}" class="btn-two">Find Solutions
						<i class="fas fa-arrow-right"></i>
					</a>
				</div>
			</div>
			<div class="col-xl-5 offset-xl-1 col-lg-6 col-md-9">
				<div class="banner__one-image">
					<div class="banner__one-image-wrapper">
						{{-- <div class="banner__one-image-wrapper-shapes animate-rotate">
							<div class="shape shape-1"></div>
							<div class="shape shape-2"></div>
						</div> --}}
						<img src="assets/img/banner/banner-right-img.png" alt="image">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Banner Area End -->


	@yield('content')

	<!-- Footer Two Area Start -->
	<div class="footer__two" style="padding-top: 50px;">
		{{-- <img class="footer__two-shape" src="assets/img/shape/footer-two-bg.png" alt="image"> --}}
		<div class="container">
			<div class="row gy-4 justify-content-between">
				<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
					<div class="footer__two-widget">
						<div class="footer__two-widget-about">
							<a href="#"><img src="assets/img/gof_logo.png" alt="GOFTECH Logo"></a>
							<p>GOFTECH delivers cutting-edge solutions tailored to your needs.</p>
							<div class="footer__two-widget-about-location">
								<div class="footer__two-widget-about-location-item">
									<div class="footer__two-widget-about-location-item-icon">
										<i class="flaticon-telephone-call"></i>
									</div>
									<div class="footer__two-widget-about-location-item-info">
										<span>Phone Number</span>
										<a href="tel:+923355265622">+92 335 526 5622</a>
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
					<div class="footer__two-widget ml-85">
						<h4>Quick Link</h4>
						<div class="footer__two-widget-solution">
							<ul>
								<li><a href="{{route('blogs')}}"><i class="far fa-chevron-double-right"></i>Blogs</a></li>
								<li><a href="{{route('faq')}}"><i class="far fa-chevron-double-right"></i>FAQ</a></li>
								<li><a href="{{route('testimonial')}}"><i class="far fa-chevron-double-right"></i>Testimonial</a></li>
								<li><a href="{{route('about')}}"><i class="far fa-chevron-double-right"></i>About Us</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
					<div class="footer__two-widget">
						<h4>Our Services</h4>
						<div class="footer__two-widget-solution">
							<ul>
								<li><a href="service-details.html"><i class="far fa-chevron-double-right"></i>Hosting Solution</a></li>
								<li><a href="service-details.html"><i class="far fa-chevron-double-right"></i>Cyber Security</a></li>
								<li><a href="service-details.html"><i class="far fa-chevron-double-right"></i>Network Analysis</a></li>
								<li><a href="service-details.html"><i class="far fa-chevron-double-right"></i>Data Recovery</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
					<div class="footer__two-widget">
						<h4>Follow Us</h4>
						<div class="footer__two-widget-subscribe">
							 <div class="footer__two-widget-social">
								<ul>
									<li><a href="https://www.facebook.com/profile.php?id=100095189804409"><i class="fab fa-facebook-f"></i></a></li>
									<li><a href="https://www.linkedin.com/company/gof-tech-solutions/"><i class="fab fa-linkedin"></i></a></li>
									<li><a href="https://www.instagram.com/gof_tech/"><i class="fab fa-instagram"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="copyright__one">
			<div class="container">
				<div class="row justify-content-between copyright__one-container-area">
					<div class="col-xl-5 col-lg-6">
						<div class="copyright__one-left">
							<p>© GOFTECH  2024 | All Rights Reserved</p>
						</div>
					</div>
					<div class="col-xl-5 col-lg-6">
						<div class="copyright__one-right">
							<a href="{{route('about')}}">Privacy Policy</a>
							<a href="{{route('contact')}}">Contact Us</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Footer Two Area End -->

	<!-- Scroll Btn Start -->
	<div class="scroll-up">
		<svg class="scroll-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102"><path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" /> </svg>
	</div>
	<!-- Scroll Btn End -->
	<!-- Main JS -->
	<script src="assets/js/jquery-3.6.0.min.js"></script>
	<!-- Bootstrap JS -->
	<script src="assets/js/bootstrap.min.js"></script>
	<!-- Counter Up JS -->
	<script src="assets/js/jquery.counterup.min.js"></script>
	<!-- Popper JS -->
	<script src="assets/js/popper.min.js"></script>
	<!-- Progressbar JS -->
	<script src="assets/js/progressbar.min.js"></script>
	<!-- Magnific Popup JS -->
	<script src="assets/js/jquery.magnific-popup.min.js"></script>
	<!-- Swiper Bundle JS -->
	<script src="assets/js/swiper-bundle.min.js"></script>
	<!-- Slick JS -->
	<script src="assets/js/slick.min.js"></script>
    <!-- Isotope JS -->
	<script src="assets/js/isotope.pkgd.min.js"></script>
	<!-- Waypoints JS -->
	<script src="assets/js/jquery.waypoints.min.js"></script>
	<!-- Mean Menu JS -->
	<script src="assets/js/jquery.meanmenu.min.js"></script>
	<!-- Custom JS -->
	<script src="assets/js/custom.js"></script>
</body>
</html>
