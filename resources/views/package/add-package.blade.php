@extends('layout.admin')

@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Add Package</h4>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('package.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <!-- Package Name Field -->
                            <div class="col-lg-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="name">Package Name</label>
                                    <input type="text" id="name" name="name" class="form-control" placeholder="Enter Package Name" value="{{ old('name') }}" required>
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                              <!-- Price Field -->
                              <div class="col-lg-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <div class="input-groupicon">
                                        <input type="text" id="price" name="price" class="form-control" placeholder="Enter Price" value="{{ old('price') }}" required>
                                        <div class="addonset">
                                            <img src="{{ asset('assets/admin/img/icons/dollar.svg') }}" alt="Dollar Icon">
                                        </div>
                                    </div>
                                    @error('price')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                            <!-- Description Field -->
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea id="description" name="description" class="form-control" placeholder="Enter Description">{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                          
                            <!-- Image Upload Field -->
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" id="image" name="image" class="form-control">
                                    @error('image')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Submit and Cancel Buttons -->
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-submit me-2">Submit</button>
                                <a href="{{ route('package.all-package') }}" class="btn btn-cancel">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
