@extends('layout.admin')

@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Add Portfolio</h4>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('portfolio.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <!-- Project Title Field -->
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Project Title</label>
                                    <input type="text" name="project_title" class="form-control" value="{{ old('project_title') }}">
                                </div>
                            </div>

                            <!-- Main Image -->
                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Main Image</label>
                                    <input type="file" name="main_image" class="form-control">
                                </div>
                            </div>
                            <!-- Inner Image 1 -->
                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Inner Image 1</label>
                                    <input type="file" name="inner_image_1" class="form-control">
                                </div>
                            </div>
                            <!-- Inner Image 2 -->
                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Inner Image 2</label>
                                    <input type="file" name="inner_image_2" class="form-control">
                                </div>
                            </div>

                            <!-- Date Field -->
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Date</label>
                                    <div class="input-groupicon">
                                        <input type="text" name="date" placeholder="Choose Date" class="datetimepicker" value="{{ old('date') }}">
                                        <div class="addonset">
                                            <img src="{{ asset('assets/admin/img/icons/calendars.svg') }}" alt="img">
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- Domain Dropdown -->
                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Domain</label>
                                    <select class="form-control select" name="domain" required>
                                        <option value="">Select Domain</option>
                                        <option value="App" {{ old('domain') == 'App' ? 'selected' : '' }}>App</option>
                                        <option value="Web" {{ old('domain') == 'Web' ? 'selected' : '' }}>Web</option>
                                        <option value="AI" {{ old('domain') == 'AI' ? 'selected' : '' }}>AI</option>
                                        <option value="UI" {{ old('domain') == 'UI' ? 'selected' : '' }}>UI</option>
                                        <option value="Cyber" {{ old('domain') == 'Cyber' ? 'selected' : '' }}>Cyber</option>
                                        <!-- Add other options as needed -->
                                    </select>
                                </div>
                            </div>

                            <!-- Main Description -->
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Main Description</label>
                                    <textarea name="main_description" class="form-control">{{ old('main_description') }}</textarea>
                                </div>
                            </div>
                            <!-- Inner Description 1 -->
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Inner Description 1</label>
                                    <textarea name="inner_description_1" class="form-control">{{ old('inner_description_1') }}</textarea>
                                </div>
                            </div>
                            <!-- Inner Description 2 -->
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Inner Description 2</label>
                                    <textarea name="inner_description_2" class="form-control">{{ old('inner_description_2') }}</textarea>
                                </div>
                            </div>

                            <!-- Submit and Cancel Buttons -->
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-submit me-2">Submit</button>
                                <a href="{{ route('portfolio.all-portfolio') }}" class="btn btn-cancel">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
