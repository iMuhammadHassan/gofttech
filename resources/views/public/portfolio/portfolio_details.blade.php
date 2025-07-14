@extends('layout.app')

{{-- Banner and breadcrumb details (uncomment if necessary) --}}
{{-- 
@section('bannerShapeImage', 'assets/img/banner/page-banner-shape.webp')
@section('pageTitle', 'Our Portfolio')
@section('breadcrumbHomeLink', 'index.html')
@section('breadcrumbCurrent', 'Portfolio')
@section('bannerImage', 'assets/img/banner/page-banner-img.png')
--}}

@section('content')

<!-- Project Details Area Start -->
<div class="project__details section-padding">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <!-- Display the main image from the portfolio -->
                <div class="project__details-thumb">

                        <img src="{{ asset('storage/' . $portfolio->main_image) }}" alt="{{ $portfolio->project_title }}">
                    
                    <div class="project-info">
                        <div class="project-info-top">
                            <h4>Project Details</h4>
                        </div>
                        <ul>
                            <li>Name: <span>{{ $portfolio->project_title }}</span></li>
                            <li>Domain: <span>{{ $portfolio->domain }}</span></li>
                            <li>Date: <span>{{ $portfolio->date }}</span></li>
                                <li>Description: <span>{{ $portfolio->main_description }}</span></li
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-xl-8">
                <div class="project__details-content">
                    <div class="project__details-content-mid">
                        <!-- Display main description -->
                        <p>{{ $portfolio->main_description }}</p>

                        <!-- Display Inner Descriptions if available -->
    
                            <h3>Inner Description 1</h3>
                            <p>{{ $portfolio->inner_description_1 }}</p>


    
                            <h3>Inner Description 2</h3>
                            <p>{{ $portfolio->inner_description_2 }}</p>
     
                    </div>
                </div>
            </div>

            <div class="project__details-images">
                <!-- Display inner images if available -->
         
                    <img src="{{ asset('storage/' . $portfolio->inner_image_1) }}" alt="Inner Image 1">
   
           
                    <img src="{{ asset('storage/' . $portfolio->inner_image_2) }}" alt="Inner Image 2">
              
            </div>

            <div class="col-xl-12">
                <div class="project__details-content">
                    <div class="project__details-content-bottom">
                        <!-- Display final descriptive content -->
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Project Details Area End -->

@endsection
