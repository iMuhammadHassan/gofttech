@extends('layout.app')

@section('bannerShapeImage', asset('assets/img/banner/page-banner-shape.webp'))
@section('pageTitle', 'Our Team')
@section('breadcrumbHomeLink', 'index.html')
@section('breadcrumbCurrent', 'Team')
@section('bannerImage', asset('assets/img/banner/page-banner-img.png'))

@section('content')

    <!-- Team Area Start -->
    <div class="team__one bg-color-2 section-padding">
        <div class="container">
            <div class="row gy-4 justify-content-center">
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="team__one-team-item">
                        <img src="{{ asset('assets/img/team/team1.jpg') }}" alt="image">
                        <div class="team__one-team-item-content">
                            <div class="member-name">
                                <h3>Faisal Khan</h3>
                                <span>Managing Director</span>
                            </div>
                            <div class="team__one-social-wrapper fas fa-share-alt">
                                <div class="share-links">
                                    <a href="#" class="inner-link">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                    <a href="#" class="inner-link">
                                        <i class="flaticon-twitter"></i>
                                    </a>
                                    <a href="#" class="inner-link">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                    <a href="#" class="inner-link">
                                        <i class="fab fa-pinterest-p"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="team__one-team-item">
                        <img src="{{ asset('assets/img/team/team2.jpg') }}" alt="image">
                        <div class="team__one-team-item-content">
                            <div class="member-name">
                                <h3>Musa Ali</h3>
                                <span>Product Manager</span>
                            </div>
                            <div class="team__one-social-wrapper fas fa-share-alt">
                                <div class="share-links">
                                    <a href="#" class="inner-link link-1">
                                        <i class="fab fa-facebook"></i>
                                    </a>
                                    <a href="#" class="inner-link link-2">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a href="#" class="inner-link link-3">
                                        <i class="fab fa-linkedin"></i>
                                    </a>
                                    <a href="#" class="inner-link link-4">
                                        <i class="fab fa-pinterest-p"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="team__one-team-item">
                        <img src="{{ asset('assets/img/team/team3.jpg') }}" alt="image">
                        <div class="team__one-team-item-content">
                            <div class="member-name">
                                <h3>Junaid Khan</h3>
                                <span>HR Manager</span>
                            </div>
                            <div class="team__one-social-wrapper fas fa-share-alt">
                                <div class="share-links">
                                    <a href="#" class="inner-link link-1">
                                        <i class="fab fa-facebook"></i>
                                    </a>
                                    <a href="#" class="inner-link link-2">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a href="#" class="inner-link link-3">
                                        <i class="fab fa-linkedin"></i>
                                    </a>
                                    <a href="#" class="inner-link link-4">
                                        <i class="fab fa-pinterest-p"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="team__one-team-item">
                        <img src="{{ asset('assets/img/team/team4.jpg') }}" alt="image">
                        <div class="team__one-team-item-content">
                            <div class="member-name">
                                <h3>Aqib Khan</h3>
                                <span>Marketing Coordinator</span>
                            </div>
                            <div class="team__one-social-wrapper fas fa-share-alt">
                                <div class="share-links">
                                    <a href="#" class="inner-link link-1">
                                        <i class="fab fa-facebook"></i>
                                    </a>
                                    <a href="#" class="inner-link link-2">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a href="#" class="inner-link link-3">
                                        <i class="fab fa-linkedin"></i>
                                    </a>
                                    <a href="#" class="inner-link link-4">
                                        <i class="fab fa-pinterest-p"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            
            
            </div>
        </div>
    </div>
    <!-- Team Area End -->

@endsection
