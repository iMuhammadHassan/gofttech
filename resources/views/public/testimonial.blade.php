@extends('layout.app')

@section('bannerShapeImage', 'assets/img/banner/page-banner-shape.webp')
@section('pageTitle', 'Testimonials')
@section('breadcrumbHomeLink', 'index.html')
@section('breadcrumbCurrent', 'Testimonials')
@section('bannerImage', 'assets/img/banner/page-banner-img.png')


@section('content')

<!-- Testimonial Area Start -->
<div class="testimonial__five section-padding">
    <div class="container">
        <div class="row">
            <div class="col-xl-6">
                <div class="testimonial__five-card">
                    <div class="testimonial__five-card-top mb-40">
                        {{-- <img src="assets/img/testimonial/testimonial-quote-two.png" alt="image"> --}}
                        <div class="testimonial-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                    <p>Their product exceeded his my ro expectationsa The the quality and attention to moutstandin an and it has become an essential active</p>
                    <div class="testimonial__five-card-profile">
                        <img src="assets/img/testimonial/user-pic-2.png" alt="image">
                        <div class="testimonial__five-card-profile-content">
                            <h4>M.Ashraf</h4>
                            <span>Business Owner</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="testimonial__five-card">
                    <div class="testimonial__five-card-top mb-40">
                        {{-- <img src="assets/img/testimonial/testimonial-quote-two.png" alt="image"> --}}
                        <div class="testimonial-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                    <p>Their product exceeded his my ro expectationsa The the quality and attention to moutstandin an and it has become an essential active</p>
                    <div class="testimonial__five-card-profile">
                        <img src="assets/img/testimonial/user-pic-2.png" alt="image">
                        <div class="testimonial__five-card-profile-content">
                            <h4>DQCB</h4>
                            <span>Govt of Punjab</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="testimonial__six section-padding">
    <div class="container">
        <div class="row justify-content-center text-center mb-50">
            <div class="col-xl-7 col-lg-7 col-md-9">
                <span class="subtitle-one">Praise & Feedback</span>
                <h2>Customer Experiencess</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4">
                <div class="testimonial__six-card">
                    <h4>M.Zain</h4>
                    <span>Business Owner</span>
                    <p>Their professionals demonstrated a deep understanding of our business needs and provided tailored solutions that</p>
                    <div class="testimonial-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="testimonial__six-card">
                    <h4>M.Aswad</h4>
                    <span>Pvt.Ltd</span>
                    <p>Their professionals demonstrated a deep understanding of our business needs and provided tailored solutions that</p>
                    <div class="testimonial-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="testimonial__six-card">
                    <h4>M.Ashraf</h4>
                    <span>Business owner</span>
                    <p>Their professionals demonstrated a deep understanding of our business needs and provided tailored solutions that</p>
                    <div class="testimonial-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Testimonial Area End -->
@endsection()