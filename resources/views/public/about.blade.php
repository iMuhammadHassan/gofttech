@extends('layout.app')

@section('bannerShapeImage', 'assets/img/banner/page-banner-shape.webp')
@section('pageTitle', 'About Us')
@section('breadcrumbHomeLink', 'index.html')
@section('breadcrumbCurrent', 'About Us')
@section('bannerImage', 'assets/img/banner/page-banner-img.png')

@section('content')

<!-- About Area Start -->
<div class="about__one section-padding">
    <div class="container">
        <div class="row align-items-center flex-wrap-reverse gy-4">
            <div class="col-xl-6 col-lg-8">
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
                    <p>We are a trailblazing tech company driven by innovation and dedicated to empowering businesses and individuals to thrive in the digital age. Our mission is to transform ideas into reality, providing cutting-edge tech solutions that simplify processes, optimize efficiency, and propel success.</p>
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
                            <span>E-commerce solutions</span>
                        </div>
                    </div>
                    <a href="{{route('about')}}" class="btn-one">Discover More
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About Area End -->

<!-- Brand Area Start -->
<!-- <div class="brand__area section-padding pt-0">
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
                        <h2>WebTech Solutions the <span class="">transfor</span> </h2>
                        <a href="#" class="btn-one">Read More
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
                                        <h4>Nasir Al Shakib </h4>
                                        <span>Content Creator</span>
                                    </div>
                                    <div class="single-slider-user-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star not-rated"></i>
                                    </div>
                                </div>
                                <p>Their product exceeded his my ro expectations. The the quality and attention to  moutstandin an  and it has become an essential most a education the a man who can do tant clearly</p>
                            </div>
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

@endsection()