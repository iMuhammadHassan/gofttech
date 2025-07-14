@extends('layout.app')

@section('bannerShapeImage', 'assets/img/banner/page-banner-shape.webp')
@section('pageTitle', 'Our Portfolio')
@section('breadcrumbHomeLink', 'index.html')
@section('breadcrumbCurrent', 'Portfolio')
@section('bannerImage', 'assets/img/banner/page-banner-img.png')

@section('content')

    <!-- Portfolio Two Area Start --> 
    <div class="portfolio__two section-padding">
        <div class="container">
            <div class="row">
                @foreach($portfolios as $portfolio)
                <div class="col-xl-6">
                    <div class="portfolio__two-single-item">
                        <div class="portfolio__two-single-item-img-wrapper">
                            <!-- Display the main image of the portfolio item -->
                            <img src="{{ asset('storage/' . $portfolio->main_image) }}" alt="{{ $portfolio->project_title }}">
                        </div>
                        <div class="portfolio__two-single-item-content">
                            <div class="portfolio__two-single-item-content-left">
                                <h3>{{ $portfolio->project_title }}</h3>
                                <!-- Display the main description of the portfolio item -->
                                <p>{{ $portfolio->domain }}</p>
                            </div>
                            <div class="portfolio__two-single-item-content-right">
                                <a href="{{ route('portfolio_details', ['id' => $portfolio->id]) }}">
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Portfolio Two Area End -->

@endsection
