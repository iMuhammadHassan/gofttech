@extends('layout.admin')

@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Edit Portfolio</h4>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('portfolio.update', ['id' => $portfolio->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <!-- Title Field -->
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" class="form-control" name="project_title" placeholder="Enter Title" value="{{ $portfolio->project_title }}">
                                </div>
                            </div>

                            <!-- Image 1 -->
                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Main Image</label>
                                    <input type="file" class="form-control" name="main_image">
                                    @if($portfolio->main_image)
                                        <img src="{{ asset('storage/' . $portfolio->main_image) }}" alt="Main Image" class="img-thumbnail mt-2">
                                    @else
                                        <img src="{{ asset('assets/admin/img/default-image.jpg') }}" alt="Main Image" class="img-thumbnail mt-2">
                                    @endif
                                </div>
                            </div>
                            <!-- Inner Image 1 -->
                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Inner Image 1</label>
                                    <input type="file" class="form-control" name="inner_image_1">
                                    @if($portfolio->inner_image_1)
                                        <img src="{{ asset('storage/' . $portfolio->inner_image_1) }}" alt="Inner Image 1" class="img-thumbnail mt-2">
                                    @else
                                        <img src="{{ asset('assets/admin/img/default-image.jpg') }}" alt="Inner Image 1" class="img-thumbnail mt-2">
                                    @endif
                                </div>
                            </div>
                            <!-- Inner Image 2 -->
                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Inner Image 2</label>
                                    <input type="file" class="form-control" name="inner_image_2">
                                    @if($portfolio->inner_image_2)
                                        <img src="{{ asset('storage/' . $portfolio->inner_image_2) }}" alt="Inner Image 2" class="img-thumbnail mt-2">
                                    @else
                                        <img src="{{ asset('assets/admin/img/default-image.jpg') }}" alt="Inner Image 2" class="img-thumbnail mt-2">
                                    @endif
                                </div>
                            </div>

                            <!-- Domain Field -->
                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Domain</label>
                                    <input type="text" class="form-control" name="domain" placeholder="Enter Domain" value="{{ $portfolio->domain }}">
                                </div>
                            </div>
                            <!-- Main Description Field -->
                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Main Description</label>
                                    <textarea class="form-control" name="main_description" placeholder="Enter Main Description">{{ $portfolio->main_description }}</textarea>
                                </div>
                            </div>
                            <!-- Inner Description 1 Field -->
                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Inner Description 1</label>
                                    <textarea class="form-control" name="inner_description_1" placeholder="Enter Inner Description 1">{{ $portfolio->inner_description_1 }}</textarea>
                                </div>
                            </div>
                            <!-- Inner Description 2 Field -->
                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Inner Description 2</label>
                                    <textarea class="form-control" name="inner_description_2" placeholder="Enter Inner Description 2">{{ $portfolio->inner_description_2 }}</textarea>
                                </div>
                            </div>

                            <!-- Date Field -->
                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Date</label>
                                    <input type="date" class="form-control" name="date" value="{{ $portfolio->date->format('Y-m-d') }}">
                                </div>
                            </div>

                            <!-- Update and Cancel Buttons -->
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-submit me-2">Update</button>
                                <a href="{{ route('portfolio.all-portfolio') }}" class="btn btn-cancel">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
