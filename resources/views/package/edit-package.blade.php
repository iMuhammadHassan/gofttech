@extends('layout.admin')

@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Edit Package</h4>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('package.update', $package->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <!-- Package Name Field -->
                            <div class="col-lg-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="name">Package Name</label>
                                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $package->name) }}" placeholder="Enter Package Name" required>
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
                                        <input type="text" id="price" name="price" class="form-control" value="{{ old('price', $package->price) }}" placeholder="Enter Price" required>
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
                                    <textarea id="description" name="description" class="form-control" placeholder="Enter Description">{{ old('description', $package->description) }}</textarea>
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
                                    @if ($package->image)
                                        <div class="mt-2">
                                            <img src="{{ asset('storage/' . $package->image) }}" alt="Package Image" width="100">
                                        </div>
                                    @endif
                                    @error('image')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Submit and Cancel Buttons -->
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-submit me-2">Update</button>
                                <a href="{{ route('package.all-package') }}" class="btn btn-cancel">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
