@extends('layout.client')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="page-title">
                    <h4>Add New Quotation</h4>
                    <h6>Fill in the details to create a new quotation</h6>
                </div>
                <div class="page-btn">
                    <a href="{{ route('client-dash.quotation.all-quotation') }}" class="btn btn-added">
                        <img src="{{ asset('assets/admin/img/icons/back.svg') }}" class="me-2" alt="img">
                        Back to Quotations
                    </a>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <form action="{{ route('client-dash.quotation.store') }}" method="POST">
                        @csrf
                        <!-- Project Name -->
                        <div class="form-group">
                            <label for="project_name">Project Name</label>
                            <input type="text" name="project_name" id="project_name" class="form-control" placeholder="Enter project name" required>
                        </div>

                        <!-- Type -->
                        <div class="form-group">
                            <label for="type">Type</label>
                            <select name="type" id="type" class="form-control" required>
                                <option value="">Select Type</option>
                                <option value="software">Software</option>
                                <option value="cyber">Cyber</option>
                                <option value="social">Social</option>
                            </select>
                        </div>

                        <!-- Sub-Type -->
                        <div class="form-group">
                            <label for="sub_type">Sub-Type</label>
                            <select name="sub_type" id="sub_type" class="form-control" required>
                                <option value="">Select Sub-Type</option>
                                <option value="web">Web</option>
                                <option value="app">App</option>
                            </select>
                        </div>

                        <!-- Number of Screens (for App) -->
                        <div class="form-group" id="screen_group" style="display: none;">
                            <label for="number_of_screens">Number of Screens (for App)</label>
                            <input type="number" name="number_of_screens" id="number_of_screens" class="form-control" placeholder="Enter number of screens">
                        </div>

                        <!-- Number of Pages (for Web) -->
                        <div class="form-group" id="page_group" style="display: none;">
                            <label for="number_of_pages">Number of Pages (for Web)</label>
                            <input type="number" name="number_of_pages" id="number_of_pages" class="form-control" placeholder="Enter number of pages">
                        </div>

                        <!-- Design Category -->
                        <div class="form-group">
                            <label for="design_category">Design Category</label>
                            <select name="design_category" id="design_category" class="form-control" required>
                                <option value="">Select Design Category</option>
                                <option value="normal">Normal</option>
                                <option value="best">Best</option>
                                <option value="animation">Animation</option>
                            </select>
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary">Submit Quotation</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Show/Hide fields based on sub-type selection
        document.getElementById('sub_type').addEventListener('change', function() {
            var subType = this.value;
            var screenGroup = document.getElementById('screen_group');
            var pageGroup = document.getElementById('page_group');

            if (subType === 'app') {
                screenGroup.style.display = 'block';
                pageGroup.style.display = 'none';
            } else if (subType === 'web') {
                screenGroup.style.display = 'none';
                pageGroup.style.display = 'block';
            } else {
                screenGroup.style.display = 'none';
                pageGroup.style.display = 'none';
            }
        });
    </script>
@endsection
