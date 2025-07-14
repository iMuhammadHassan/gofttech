@extends('layout.main')

@section('content')
    <!-- Brand Area Start -->
    <!-- <div class="brand__area pt-115">
        <div class="container">
            <div class="row brand__area-border">
                <div class="col-xl-12">
                    <div class="swiper brand__slider">
                        <div class="swiper-wrapper">
                            <div class="brand__area-item swiper-slide">
                                <img src="{{asset('assets/img/brand/brand-1.png')}}" alt="image">
                            </div>
                            <div class="brand__area-item swiper-slide">
                                <img src="assets/img/brand/brand-2.png" alt="image">
                            </div>
                            <div class="brand__area-item swiper-slide">
                                <img src="assets/img/brand/brand-3.png" alt="image">
                            </div>
                            <div class="brand__area-item swiper-slide">
                                <img src="assets/img/brand/brand-4.png" alt="image">
                            </div>
                            <div class="brand__area-item swiper-slide">
                                <img src="assets/img/brand/brand-5.png" alt="image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Brand Area End -->

    <!-- About Area Start -->
    <div class="about__one section-padding">
        <div class="container">
            <div class="row align-items-center flex-wrap-reverse gy-4">
                <div class="col-xl-6 col-lg-5">
                    <div class="about__one-image">
                        <div class="experience-bar animate-y-axis-slider">
                            <i class="flaticon-consultant"></i>
                            <div class="experience-bar-right">
                                <div class="experience-bar-counter">
                                    <h4 class="counter">5</h4>
                                    <span>+</span>
                                </div>
                                <span>Years Experience</span>
                            </div>
                        </div>
                        <div class="about__one-image-wrapper">
                            <img src="assets/img/about/about-1.webp" alt="" class="image-1">
                            <img src="assets/img/about/about-2.webp" alt="" class="image-2">
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-7 col-md-9">
                    <div class="about__one-content">
                        <span class="subtitle-one">About us</span>
                        <h2>Transform Business to Technology</h2>
                        <p>We are a trailblazing tech company driven by innovation and dedicated to empowering businesses
                            and individuals to thrive in the digital age. Our mission is to transform ideas into reality,
                            providing cutting-edge tech solutions that simplify processes, optimize efficiency, and propel
                            success.</p>
                        <div class="about__one-content-service">
                            <div class="service">
                                <i class="far fa-check-circle"></i>
                                <span>Data Management Experts</span>
                            </div>
                            <div class="service">
                                <i class="far fa-check-circle"></i>
                                <span>Mobile App Developments</span>
                            </div>
                            <div class="service">
                                <i class="far fa-check-circle"></i>
                                <span>IT Infrastructure Solutions</span>
                            </div>
                            <div class="service">
                                <i class="far fa-check-circle"></i>
                                <span>E-commerace solutions</span>
                            </div>
                        </div>
                        <a href="{{route('about')}}" class="btn-one">Discover More<i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About Area End -->

    <!-- Why Choose us Area Start -->
    <div class="why-choose-us__one section-padding">
        <div class="container">
            <div class="row gy-4 align-items-center">
                <div class="col-xl-6 col-lg-7 col-md-9">
                    <div class="why-choose-us__one-left">
                        <div class="why-choose-us__one-title">
                            <span class="subtitle-one">Why Chose Us</span>
                            <h2>Tailored IT Strategies for Your Business</h2>
                            <p>Craft personalized action plans harnessing the latest IT innovations to support your business
                                objectives driving growth advantage</p>
                        </div>
                        <div class="why-choose-us__one-quality">
                            <div class="why-choose-us__one-quality-single">
                                <div class="icon">
                                    <i class="flaticon-machine-repair"></i>
                                </div>
                                <div class="why-choose-us__one-quality-single-content">
                                    <h4>Innovative Tech Leader</h4>
                                    <p>Harness ingenuity and foresight, we consistently pioneer advanced solutions that set
                                        industry</p>
                                </div>
                            </div>
                            <div class="why-choose-us__one-quality-single">
                                <div class="icon">
                                    <i class="flaticon-web-research"></i>
                                </div>
                                <div class="why-choose-us__one-quality-single-content">
                                    <h4>Reliable Global Support</h4>
                                    <p>Day or night, our global support team stands ready, providing reliable assistance and
                                        technical</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 offset-xl-1 col-lg-6 col-md-10">
                    <div class="why-choose-us__one-image">
                        <div class="why-choose-us__one-image-shape">
                            <div class="shape shape-1 animate-x-axis"></div>
                            <div class="shape shape-2 animate-x-axis"></div>
                            <img src="assets/img/shape/why-choose-shape.png" alt=""
                                class="shape shape-3 animate-y-axis">
                        </div>
                        <img src="assets/img/why-choose-us/why-choose.webp" alt="image">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Why choose us Area End -->

    <!-- Services Area Start -->
    <div class="services__one section-padding">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-xl-7 col-lg-7 col-md-9 services__one-title">
                    <span class="subtitle-one">Core Features</span>
                    <h2>Innovative IT Strategies and Solutions</h2>
                </div>
            </div>
            <div class="row align-items-center justify-content-center">
                <div class="col-xl-3">
                    <div class="row">
                        <div class="col-xl-12 col-md-6">
                            <div class="single-service">
                                <div class="services__one-single-service-icon">
                                    <i class="flaticon-global-network"></i>
                                </div>
                                <div class="services__one-single-service-content">
                                    <h4>E-Commerce Solutions</h4>
                                    <p>Tailored e-commerce solutions to enhance your online store and boost sales.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-md-6 xl-mb-30">
                            <div class="single-service">
                                <div class="services__one-single-service-icon">
                                    <i class="flaticon-analytics"></i>
                                </div>
                                <div class="services__one-single-service-content">
                                    <h4>Digital Marketing</h4>
                                    <p>Effective digital marketing strategies to grow your brand and reach your audience.
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-xl-6 col-lg-7">
                    <div class="services-image-wrapper">
                        <img src="assets/img/service/services.webp" alt="image">
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="row">
                        <div class="col-xl-12 col-md-6">
                            <div class="single-service">
                                <div class="services__one-single-service-icon">
                                    <i class="flaticon-idea"></i>
                                </div>
                                <div class="services__one-single-service-content">
                                    <h4>Custom Software Development</h4>
                                    <p>Our services build reliable, scalable, and innovative</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-md-6">
                            <div class="single-service">
                                <div class="services__one-single-service-icon">
                                    <i class="flaticon-it"></i>
                                </div>
                                <div class="services__one-single-service-content">
                                    <h4>Machine Learning Implementation</h4>
                                    <p>Harnessing the power of artificial intelligence</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Services Area End -->

    <!-- Portfolio Area Start -->
    <div class="portfolio__one section-padding">
        <div class="container">
            <div class="row gy-4 align-items-end justify-content-between mb-5">
                <div class="col-xl-6 col-lg-7 col-md-9 col-sm-10">
                    <div class="portfolio__one-content-left">
                        <span class="subtitle-one">Tech Portfolio</span>
                        <h2>Case Studies in Ingenious IT Portfolio</h2>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4">
                    <div class="portfolio__one-content-right text-lg-end">
                        <a href="{{route('portfolio')}}" class="btn-one">All Portfolio
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container custom__container">
            <div class="portfolio__one-slider swiper py-5">
                <div class="swiper-wrapper portfolio-items align-items-center">
                    <div class="swiper-slide portfolio__one-single-portfolio single-portfolio">
                        <img src="assets/img/portfolio/portfolio-1.webp" alt="image">
                        <div class="portfolio__one-single-portfolio-content">
                            <h4>Real-Time Monitoring</h4>
                            <span>network analysis</span>
                        </div>
                    </div>
                    <div class="swiper-slide portfolio__one-single-portfolio active single-portfolio">
                        <img src="assets/img/portfolio/portfolio-2.webp" alt="image">
                        <div class="portfolio__one-single-portfolio-content">
                            <h4>Growth technology</h4>
                            <span>Software Planning</span>
                        </div>
                    </div>
                    <div class="swiper-slide portfolio__one-single-portfolio single-portfolio">
                        <img src="assets/img/portfolio/portfolio-3.webp" alt="image">
                        <div class="portfolio__one-single-portfolio-content">
                            <h4>Innovative Solutions</h4>
                            <span>System Integration</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Portfolio Area End -->

    <!-- Pricing Plan Area Start -->
    {{-- <div class="pricing-plan__one section-padding">
		<div class="container">
			<div class="row justify-content-center text-center">
				<div class="col-xl-6 col-lg-7 col-md-8">
					<div class="pricing-plan__one-title">
						<span class="subtitle-one">Flexible Plans</span>
						<h2 class="mb-40">Pricing Made Simple</h2>
						<ul class="nav nav-pills mb-65 justify-content-center" id="pills-tab" role="tablist">
							<li class="nav-item" role="presentation">
							  <button class="nav-link active" id="monthly-pricing-tab" data-bs-toggle="pill" data-bs-target="#monthly-pricing" type="button" role="tab" aria-controls="monthly-pricing" aria-selected="true">Monthly</button>
							</li>
							<li class="nav-item" role="presentation">
							  <button class="nav-link" id="yearly-pricing-tab" data-bs-toggle="pill" data-bs-target="#yearly-pricing" type="button" role="tab" aria-controls="yearly-pricing" aria-selected="false">Yearly</button>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="pricing-plans tab-content">
				<div class="row justify-content-center gy-4 tab-pane fade show active" id="monthly-pricing" role="tabpanel" aria-labelledby="monthly-pricing-tab">
					<div class="col-xl-4 col-lg-4 col-md-6">
						<div class="pricing-plan__one-single-pricing-wrapper">
							<div class="pricing-plan__one-single-pricing-plan">
								<h3 class="pricing-plan__one-single-pricing-plan-title">Basic</h3>
								<h2 class="pricing-plan__one-single-pricing-plan-price">$29
									<span>/mo</span>
								</h2>
								<p>Essential Security Suite Perfect for startups and small teams</p>
								<div class="pricing-plan__one-single-pricing-plan-benefits">
									<span>
										<i class="fas fa-angle-double-right"></i>
										Mistakes To Avoid
									</span>
									<span>
										<i class="fas fa-angle-double-right"></i>
										Your Startup
									</span>
									<span>
										<i class="fas fa-angle-double-right"></i>
										Knew About Fonts
									</span>
								</div>
								<a href="request-quote.html" class="btn-one">Get Started
									<i class="fas fa-chevron-right"></i>
								</a>
							</div>
						</div>
					</div>
					<div class="col-xl-4 col-lg-4 col-md-6">
						<div class="pricing-plan__one-single-pricing-wrapper">
							<div class="pricing-plan__one-single-pricing-plan active">
								<h3 class="pricing-plan__one-single-pricing-plan-title">Premium</h3>
								<h2 class="pricing-plan__one-single-pricing-plan-price">$69
									<span>/mo</span>
								</h2>
								<p>Data Analytics Tools Ideal for growing businesses requiring</p>
								<div class="pricing-plan__one-single-pricing-plan-benefits">
									<span>
										<i class="fas fa-angle-double-right"></i>
										Mistakes To Avoid
									</span>
									<span>
										<i class="fas fa-angle-double-right"></i>
										Your Startup
									</span>
									<span>
										<i class="fas fa-angle-double-right"></i>
										Knew About Fonts
									</span>
								</div>
								<a href="request-quote.html" class="btn-two">Get Started
									<i class="fas fa-chevron-right"></i>
								</a>
							</div>
						</div>
					</div>
					<div class="col-xl-4 col-lg-4 col-md-6">
						<div class="pricing-plan__one-single-pricing-wrapper">
							<div class="pricing-plan__one-single-pricing-plan">
								<h3 class="pricing-plan__one-single-pricing-plan-title">Enterprise</h3>
								<h2 class="pricing-plan__one-single-pricing-plan-price">$89
									<span>/mo</span>
								</h2>
								<p>Personalized On boarding For large organizations desiring</p>
								<div class="pricing-plan__one-single-pricing-plan-benefits">
									<span>
										<i class="fas fa-angle-double-right"></i>
										Mistakes To Avoid
									</span>
									<span>
										<i class="fas fa-angle-double-right"></i>
										Your Startup
									</span>
									<span>
										<i class="fas fa-angle-double-right"></i>
										Knew About Fonts
									</span>
								</div>
								<a href="request-quote.html" class="btn-one">Get Started
									<i class="fas fa-chevron-right"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="row justify-content-center gy-4 tab-pane fade" id="yearly-pricing" role="tabpanel" aria-labelledby="yearly-pricing-tab">
					<div class="col-xl-4 col-lg-4 col-md-6">
						<div class="pricing-plan__one-single-pricing-wrapper">
							<div class="pricing-plan__one-single-pricing-plan">
								<h3 class="pricing-plan__one-single-pricing-plan-title">Basic</h3>
								<h2 class="pricing-plan__one-single-pricing-plan-price">$82
									<span>/year</span>
								</h2>
								<p>Essential Security Suite Perfect for startups and small teams</p>
								<div class="pricing-plan__one-single-pricing-plan-benefits">
									<span>
										<i class="fas fa-angle-double-right"></i>
										Mistakes To Avoid
									</span>
									<span>
										<i class="fas fa-angle-double-right"></i>
										Your Startup
									</span>
									<span>
										<i class="fas fa-angle-double-right"></i>
										Knew About Fonts
									</span>
								</div>
								<a href="request-quote.html" class="btn-one">Get Started
									<i class="fas fa-chevron-right"></i>
								</a>
							</div>
						</div>
					</div>
					<div class="col-xl-4 col-lg-4 col-md-6">
						<div class="pricing-plan__one-single-pricing-wrapper">
							<div class="pricing-plan__one-single-pricing-plan active">
								<h3 class="pricing-plan__one-single-pricing-plan-title">Premium</h3>
								<h2 class="pricing-plan__one-single-pricing-plan-price">$113
									<span>/year</span>
								</h2>
								<p>Data Analytics Tools Ideal for growing businesses requiring</p>
								<div class="pricing-plan__one-single-pricing-plan-benefits">
									<span>
										<i class="fas fa-angle-double-right"></i>
										Mistakes To Avoid
									</span>
									<span>
										<i class="fas fa-angle-double-right"></i>
										Your Startup
									</span>
									<span>
										<i class="fas fa-angle-double-right"></i>
										Knew About Fonts
									</span>
								</div>
								<a href="request-quote.html" class="btn-two">Get Started
									<i class="fas fa-chevron-right"></i>
								</a>
							</div>
						</div>
					</div>
					<div class="col-xl-4 col-lg-4 col-md-6">
						<div class="pricing-plan__one-single-pricing-wrapper">
							<div class="pricing-plan__one-single-pricing-plan">
								<h3 class="pricing-plan__one-single-pricing-plan-title">Enterprise</h3>
								<h2 class="pricing-plan__one-single-pricing-plan-price">$187
									<span>/year</span>
								</h2>
								<p>Personalized On boarding For large organizations desiring</p>
								<div class="pricing-plan__one-single-pricing-plan-benefits">
									<span>
										<i class="fas fa-angle-double-right"></i>
										Mistakes To Avoid
									</span>
									<span>
										<i class="fas fa-angle-double-right"></i>
										Your Startup
									</span>
									<span>
										<i class="fas fa-angle-double-right"></i>
										Knew About Fonts
									</span>
								</div>
								<a href="request-quote.html" class="btn-one">Get Started
									<i class="fas fa-chevron-right"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> --}}
    <!-- Pricing Plan Area End -->

    <!-- Work process Area Start -->
    <div class="work-process-area__one section-padding"
        style="background-image: url(assets/img/work-process/work-process-bg.png);">
        <div class="container">
            <div class="row align-items-end work-process-area__one-title">
                <div class="col-xl-7 col-lg-7">
                    <div class="work-process-area__one-content-left">
                        <span class="subtitle-one">Work Process</span>
                        <h2>Efficient and Agile Development</h2>
                    </div>
                </div>
                <div class="col-xl-4 offset-xl-1 col-lg-4 offset-lg-1">
                    <div class="work-process-area__one-content-right">
                        <p>Leverage best practices in SDLC and DevOps to streamline development, ensure continuous
                            integration, and deliver high-quality software solutions.</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center gy-4">
                <div class="col-xl-6">
                    <div class="work-process-area__one-single-work">
                        <span>01</span>
                        <div class="work-process-area__one-single-work-content">
                            <h4>Requirements Gathering</h4>
                            <p>Collaborate closely with stakeholders to gather and analyze requirements, ensuring alignment
                                with business goals and user needs.</p>
                        </div>
                    </div>
                    <div class="work-process-area__one-single-work">
                        <span>02</span>
                        <div class="work-process-area__one-single-work-content">
                            <h4>Design and Development</h4>
                            <p>Adopt agile methodologies for iterative design and development, incorporating feedback to
                                build robust and scalable solutions.</p>
                        </div>
                    </div>
                    <div class="work-process-area__one-single-work">
                        <span>03</span>
                        <div class="work-process-area__one-single-work-content">
                            <h4>Testing and Deployment</h4>
                            <p>Implement continuous integration and testing to ensure quality. Deploy solutions with
                                automated processes for efficiency and reliability.</p>
                        </div>
                    </div>
                    <div class="work-process-area__one-single-work">
                        <span>04</span>
                        <div class="work-process-area__one-single-work-content">
                            <h4>Maintenance and Support</h4>
                            <p>Provide ongoing support and maintenance, utilizing DevOps practices to monitor and optimize
                                performance for continuous improvement.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="work-process-area__one-right-img">
                        <img src="assets/img/portfolio/portfolio-2.webp" alt="image">
                    </div>
                    <div class="work-process-area__one-right-counter-img">
                        <div class="img-counter">
                            <div class="counter-only">
                                <h2 class="counter">5</h2>
                                <h2>+</h2>
                            </div>
                            <span>years of experience</span>
                        </div>
                        <img src="assets/img/work-process/work-process-2.webp" alt="image">
                    </div>
                    <div class="work-process-area__one-right-counter-img">
                        <div class="img-counter">
                            <div class="counter-only">
                                <h2 class="counter">25</h2>
                                <h2>+</h2>
                            </div>
                            <span>successful projects delivered</span>
                        </div>
                        <img src="assets/img/work-process/work-process-1.webp" alt="image">
                    </div>
                    <div class="work-process-area__one-right-counter-img">
                        <div class="img-counter">
                            <div class="counter-only">
                                <h2 class="counter">100</h2>
                                <h2>+</h2>
                            </div>
                            <span>clients served</span>
                        </div>
                        <img src="assets/img/portfolio/portfolio-3.webp" alt="image">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Work process Area End -->


   <!-- Testimonial Area Start -->
<div class="testimonial__one section-padding">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6">
                <div class="testimonial__one-left">
                    <div class="testimonial__one-left-title">
                        <span class="subtitle-one">Client Testimonial</span>
                        <h2><span class="">Transforming Your Digital Experience</span></h2>
                        <a href="{{route('contact')}}" class="btn-one">Get Support
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6">
                <div class="testimonial__one-right">
                    <div class="swiper testimonial__one-slider-active">
                        <div class="swiper-wrapper">
                            <div class="single-slider swiper-slide">
                                <div class="single-slider-user">
                                    <div class="single-slider-user-name">
                                        <h4>M. Ashraf</h4>
                                        <span>Business Owner</span>
                                    </div>
                                    <div class="single-slider-user-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star not-rated"></i>
                                    </div>
                                </div>
                                <p>Their product exceeded my expectations. The quality and attention to detail are outstanding, and it has become an essential tool in my daily work.</p>
                            </div>
							<div class="single-slider swiper-slide">
                                <div class="single-slider-user">
                                    <div class="single-slider-user-name">
                                        <h4>DQCB</h4>
                                        <span>Govt of Punjab</span>
                                    </div>
                                    <div class="single-slider-user-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                </div>
                                <p>Their product exceeded my expectations. The quality and attention to detail are outstanding, and it has become an essential tool in my daily work.</p>
                            </div>
							<div class="single-slider swiper-slide">
                                <div class="single-slider-user">
                                    <div class="single-slider-user-name">
                                        <h4>M. Zain</h4>
                                        <span>Business Owner</span>
                                    </div>
                                    <div class="single-slider-user-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star not-rated"></i>
                                    </div>
                                </div>
                                <p>Their product exceeded my expectations. The quality and attention to detail are outstanding, and it has become an essential tool in my daily work.</p>
                            </div>
                            <!-- Add more slides as needed -->
                        </div>
                    </div>
                    <div class="testimonial__one-right-bottom">
                        <div class="slider-arrow">
                            <i class="swiper-button-prev fas fa-arrow-left"></i>
                            <i class="swiper-button-next fas fa-arrow-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial Area End -->


    <!-- Blog Area Start -->
    <div class="blog__one section-padding pt-lg-0">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-xl-6 col-lg-6">
                    <div class="blog__one-title">
                        <span class="subtitle-one">Blog And news</span>
                        <h2>Exploring Technology</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center gy-4">
                <div class="col-xl-4 col-lg-6">
                    <div class="blog__one-single-blog">
                        <div class="blog__one-single-blog-image">
                            <img src="assets/img/blog/blog-1.png" alt="image">
                        </div>
                        <div class="blog__one-single-blog-date">
                            <span class="date">09</span>
                            <span class="month">Mar</span>
                        </div>
                        <div class="blog__one-single-blog-content">
                            <div class="blog__one-single-blog-content-top">
                                <span>
                                    <i class="far fa-user"></i>
                                    by Admin
                                </span>
                                <span>
                                    <i class="far fa-comment-dots"></i>
                                    Comments (05)
                                </span>
                            </div>
                            <a href="{{route('blog_details')}}" class="blog-heading">Software Development Agility a Primer</a>
                            <a href="{{route('blog_details')}}" class="btn-three">Read More
                                <i class="fas fa-angle-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6">
                    <div class="blog__one-single-blog">
                        <div class="blog__one-single-blog-image">
                            <img src="assets/img/blog/blog-2.png" alt="image">
                        </div>
                        <div class="blog__one-single-blog-date">
                            <span class="date">09</span>
                            <span class="month">Mar</span>
                        </div>
                        <div class="blog__one-single-blog-content">
                            <div class="blog__one-single-blog-content-top">
                                <span>
                                    <i class="far fa-user"></i>
                                    by Admin
                                </span>
                                <span>
                                    <i class="far fa-comment-dots"></i>
                                    Comments (05)
                                </span>
                            </div>
                            <a href="blog-details.html" class="blog-heading">UX/UI Designing the Future Web Design</a>
                            <a href="blog-details.html" class="btn-three">Read More
                                <i class="fas fa-angle-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6">
                    <div class="blog__one-single-blog">
                        <div class="blog__one-single-blog-image">
                            <img src="assets/img/blog/blog-3.png" alt="image">
                        </div>
                        <div class="blog__one-single-blog-date">
                            <span class="date">09</span>
                            <span class="month">Mar</span>
                        </div>
                        <div class="blog__one-single-blog-content">
                            <div class="blog__one-single-blog-content-top">
                                <span>
                                    <i class="far fa-user"></i>
                                    by Admin
                                </span>
                                <span>
                                    <i class="far fa-comment-dots"></i>
                                    Comments (05)
                                </span>
                            </div>
                            <a href="blog-details.html" class="blog-heading">Pioneering Contactless Payment
                                Technologies</a>
                            <a href="blog-details.html" class="btn-three">Read More
                                <i class="fas fa-angle-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog Area End -->

@endsection
