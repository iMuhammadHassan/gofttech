@extends('layout.app')

@section('bannerShapeImage', 'assets/img/banner/page-banner-shape.webp')
@section('pageTitle', 'Contact Us')
@section('breadcrumbHomeLink', 'index.html')
@section('breadcrumbCurrent', 'Contact')
@section('bannerImage', 'assets/img/banner/page-banner-img.png')

@section('content')
<!-- Contact Two Start -->
<div class="contact__two section-padding">
    <div class="container">
        <div class="row gy-4 align-items-center">
            <div class="col-xl-6">
                <div class="contact__two-content">
                    <div class="contact__two-title">
                        <span class="subtitle-one">Contact us</span>
                        <h2>Do you have any question?</h2>
                        <p>We are here to help you with all your queries, services, and support. Reach out to us, and let's discuss how we can assist you in achieving your goals.</p>
                    </div>
                    <div class="contact__two-form">
                        <form action="{{ route('contact.submit') }}" method="POST">
                            @csrf
                            <div class="row gy-4 mb-4">
                                <div class="col-xl-6">
                                    <input type="text" name="name" placeholder="Your Name" required>
                                </div>
                                <div class="col-xl-6">
                                    <input type="email" name="email" placeholder="Your E-mail" required>
                                </div>
                                <div class="col-xl-6">
                                    <input type="tel" name="phone_number" placeholder="Phone Number" required>
                                </div>
                            </div>
                            <textarea name="message" placeholder="Your Message" required></textarea>
                            <button type="submit" class="btn-two">
                                Submit Now
                                <i class="fas fa-chevron-right"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="contact__two-contact-info">
                    <div class="contact__two-single-info">
                        <div class="contact__two-single-info-icon">
                            <img src="assets/img/icon//service-1.png" alt="image">
                        </div>
                        <div class="contact__two-single-info-content">
                            <h4>Email</h4>
                            <span>info@goftechsolutions.com</span>
                        </div>
                    </div>
                    <div class="contact__two-single-info">
                        <div class="contact__two-single-info-icon">
                            <img src="assets/img/icon//service-2.png" alt="image">
                        </div>
                        <div class="contact__two-single-info-content">
                            <h4>Contacts</h4>
                            <span>+92 335 5265622</span>
                        </div>
                    </div>
                    <div class="contact__two-single-info">
                        <div class="contact__two-single-info-icon">
                            <img src="assets/img/icon//service-3.png" alt="image">
                        </div>
                        <div class="contact__two-single-info-content">
                            <h4>Open</h4>
                            <span>Monday to Saturday</span>
                            <span>10.00 Am To 6.00 Pm</span>
                        </div>
                    </div>
                    <div class="contact__two-single-info">
                        <div class="contact__two-single-info-icon">
                            <img src="assets/img/icon/service-4.png" alt="image">
                        </div>
                        <div class="contact__two-single-info-content">
                            <h4>Location</h4>
                            <span>T-1, Third Floor, Business Hub, Gulberg Greens, Islamabad</span>
                        </div>    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact Two End -->

<!-- Contact Location Start -->
<div class="location-map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2382.8044324830935!2d73.1551251!3d33.5987695!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38df9648de766aaf%3A0x4a58a4a18dd1bb0d!2sFlat%20F-1%2C%20Fourth%20Floor%2C%20Business%20Hub%20Plaza%2C%20Gulberg%20Greens%2C%20Islamabad!5e0!3m2!1sen!2sbd!4v1710843885835!5m2!1sen!2sbd" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
<!-- Contact Location End -->

@endsection
