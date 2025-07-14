@extends('layout.app')

@section('bannerShapeImage', 'assets/img/banner/page-banner-shape.webp')
@section('pageTitle', 'Our Blog')
@section('breadcrumbHomeLink', 'index.html')
@section('breadcrumbCurrent', 'Blog')
@section('bannerImage', 'assets/img/banner/page-banner-img.png')


@section('content')

<!-- Blog Area Start -->
<div class="blog__one section-padding pt-120">
    <div class="container">
        <div class="row justify-content-center gy-5">
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
                                <i class="fas fa-user"></i>
                                by Admin
                            </span>
                            <span>
                                <i class="fas fa-comments"></i>
                                Comments (05)
                            </span>
                        </div>
                        <a href="{{route('blog_details')}}" class="blog-heading">Technology-driven success best guaranteed</a>
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
                                <i class="fas fa-user"></i>
                                by Admin
                            </span>
                            <span>
                                <i class="fas fa-comments"></i>
                                Comments (05)
                            </span>
                        </div>
                        <a href="#" class="blog-heading">Enhance your productivity with IT expertise</a>
                        <a href="#" class="btn-three">Read More
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
                                <i class="fas fa-user"></i>
                                by Admin
                            </span>
                            <span>
                                <i class="fas fa-comments"></i>
                                Comments (05)
                            </span>
                        </div>
                        <a href="#" class="blog-heading">Empowering businesses the through IT</a>
                        <a href="#" class="btn-three">Read More
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
                                <i class="fas fa-user"></i>
                                by Admin
                            </span>
                            <span>
                                <i class="fas fa-comments"></i>
                                Comments (05)
                            </span>
                        </div>
                        <a href="#" class="blog-heading">Empowering businesses the through IT</a>
                        <a href="#" class="btn-three">Read More
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
                                <i class="fas fa-user"></i>
                                by Admin
                            </span>
                            <span>
                                <i class="fas fa-comments"></i>
                                Comments (05)
                            </span>
                        </div>
                        <a href="#" class="blog-heading">Empowering businesses the through IT</a>
                        <a href="#" class="btn-three">Read More
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
                                <i class="fas fa-user"></i>
                                by Admin
                            </span>
                            <span>
                                <i class="fas fa-comments"></i>
                                Comments (05)
                            </span>
                        </div>
                        <a href="#" class="blog-heading">Empowering businesses the through IT</a>
                        <a href="#" class="btn-three">Read More
                            <i class="fas fa-angle-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Blog Area End -->


@endsection()