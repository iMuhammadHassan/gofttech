@extends('layout.app')

@section('bannerShapeImage', 'assets/img/banner/page-banner-shape.webp')
@section('pageTitle', 'Our Packages')
@section('breadcrumbHomeLink', 'index.html')
@section('breadcrumbCurrent','Services')
@section('bannerImage', 'assets/img/banner/page-banner-img.png')

@section('content')

<!-- Packages Area Start -->
<div class="services__four section-padding">
    <div class="container">
        <div class="row gy-4 justify-content-center">
            @foreach ($packages as $package)
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="services__four-single-service">
                        <div class="services__four-single-service-icon">
                            @if($package->image)
                                <img src="{{ asset('storage/' . $package->image) }}" alt="{{ $package->name }}" style="max-width: 100%;">
                            @else
                                <i class="flaticon-software-development"></i> <!-- Default icon if no image -->
                            @endif
                        </div>
                        <div class="services__four-single-service-content">
                            <h4>{{ $package->name }}</h4>
                            <p>{{ Str::limit($package->description, 100) }}</p>
                            <p><strong>Price: </strong>{{ $package->formatted_price }}</p> <!-- Display formatted price -->
                            <button class="btn-three" data-bs-toggle="modal" data-bs-target="#orderModal" 
                                    data-package-id="{{ $package->id }}">
                                Order <i class="fas fa-chevron-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Packages Area End -->

<!-- Order Modal -->
<div class="modal fade" id="orderModal" tabindex="-1" aria-labelledby="orderModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="orderModalLabel">Order Package</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="contact__two-form">
                    <!-- Form to Submit the Order -->
                    <form action="{{ route('order.store') }}" method="POST">
                        @csrf
                        <!-- Hidden Input to Store Package ID -->
                        <input type="hidden" id="packageIdInput" name="package_id">

                        <div class="row gy-4 mb-4">
                            <div class="col-xl-6">
                                <input type="text" name="name" placeholder="Your Name" class="form-control border border-dark" required>
                            </div>
                            <div class="col-xl-6">
                                <input type="email" name="email" placeholder="Your E-mail" class="form-control border border-dark" required>
                            </div>
                            <div class="col-xl-6">
                                <input type="tel" name="phone_number" placeholder="Phone Number" class="form-control border border-dark" required>
                            </div>
                        </div>
                        <textarea name="message" placeholder="Your Message" class="form-control border border-dark" required></textarea>
                        <button type="submit" class="btn-two mt-3">
                            Submit Now
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
document.addEventListener('DOMContentLoaded', function () {
    // Listen for when the modal is shown
    var orderModal = document.getElementById('orderModal');
    orderModal.addEventListener('show.bs.modal', function (event) {
        // Get the button that triggered the modal
        var button = event.relatedTarget;
        // Extract the package ID from the button's data attribute
        var packageId = button.getAttribute('data-package-id');
        
        // Insert the package ID into the hidden input field inside the modal form
        var packageIdInput = document.getElementById('packageIdInput');
        packageIdInput.value = packageId;
    });
});
</script>

@endsection