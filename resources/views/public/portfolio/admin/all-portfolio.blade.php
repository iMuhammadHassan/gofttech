@extends('layout.admin')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="page-title">
                    <h4>All Portfolios</h4>
                    <h6>Manage your portfolios</h6>
                </div>
                <div class="page-btn">
                    <a href="{{ route('portfolio.add-portfolio') }}" class="btn btn-added">
                        <img src="{{ asset('assets/admin/img/icons/plus.svg') }}" class="me-2" alt="Add New Portfolio">Add
                        New Portfolio
                    </a>
                </div>
            </div>

            <!-- Filter and Search Section -->
            <div class="card">
                <div class="card-body">
                    <div class="table-top">
                        <div class="search-set">
                            <div class="search-path">
                                <a class="btn btn-filter" id="filter_search">
                                    <img src="{{ asset('assets/admin/img/icons/filter.svg') }}" alt="Filter">
                                    <span><img src="{{ asset('assets/admin/img/icons/closes.svg') }}" alt="Close"></span>
                                </a>
                            </div>
                            <div class="search-input">
                                <a class="btn btn-searchset">
                                    <img src="{{ asset('assets/admin/img/icons/search-white.svg') }}" alt="Search">
                                </a>
                            </div>
                        </div>
                        <div class="wordset">
                            <!-- Export Buttons -->
                            <ul>
                                <li>
                                    <a href="{{ route('portfolio.export-pdf') }}" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="PDF">
                                        <img src="{{ asset('assets/admin/img/icons/pdf.svg') }}" alt="PDF">
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('portfolio.export-csv') }}" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="CSV">
                                        <img src="{{ asset('assets/admin/img/icons/excel.svg') }}" alt="CSV">
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Filter Section -->
                    <div class="card" id="filter_inputs">
                        <div class="card-body pb-0">
                            <div class="row">
                                <!-- Project Title Filter -->
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Enter Project Title">
                                    </div>
                                </div>

                                <!-- Date Filter -->
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="form-group">
                                        <div class="input-groupicon">
                                            <input type="text" class="datetimepicker cal-icon" placeholder="Choose Date">
                                            <div class="addonset">
                                                <img src="{{ asset('assets/admin/img/icons/calendars.svg') }}"
                                                    alt="Calendar">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Domain Filter -->
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Enter Domain">
                                    </div>
                                </div>

                                <!-- Search Button -->
                                <div class="col-lg-1 col-sm-6 col-12 ms-auto">
                                    <div class="form-group">
                                        <a class="btn btn-filters ms-auto">
                                            <img src="{{ asset('assets/admin/img/icons/search-whites.svg') }}"
                                                alt="Search">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Portfolio Table -->
                    <div class="table-responsive">
                        <table class="table datanew">
                            <thead>
                                <tr>

                                    <th>Project Title</th>
                                    <th>Date</th>
                                    <th>Domain</th>
                                    <th>Main Description</th>
                                    <th>Inner Description 1</th>
                                    <th>Inner Description 2</th>
                                    <th>Main Image</th>
                                    <th>Inner Image 1</th>
                                    <th>Inner Image 2</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($portfolios as $portfolio)
                                    <tr>

                                        <td>{{ $portfolio->project_title }}</td>
                                        <td>{{ \Carbon\Carbon::parse($portfolio->date)->format('d M Y') }}</td>
                                        <td>{{ $portfolio->domain }}</td>
                                        <td>{{ $portfolio->main_description }}</td>
                                        <td>{{ $portfolio->inner_description_1 }}</td>
                                        <td>{{ $portfolio->inner_description_2 }}</td>
                                        <td><img src="{{ asset('storage/' . $portfolio->main_image) }}" alt="Main Image"
                                                width="50"></td>
                                        <td><img src="{{ asset('storage/' . $portfolio->inner_image_1) }}"
                                                alt="Inner Image 1" width="50"></td>
                                        <td><img src="{{ asset('storage/' . $portfolio->inner_image_2) }}"
                                                alt="Inner Image 2" width="50"></td>
                                        <td>
                                            <a href="{{ route('portfolio.edit-portfolio', $portfolio->id) }}"
                                                class="me-3">
                                                <img src="{{ asset('assets/admin/img/icons/edit.svg') }}" alt="Edit">
                                            </a>
                                            <form action="{{ route('portfolio.destroy', $portfolio->id) }}" method="POST"
                                                style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-link p-0 confirm-text"
                                                    onclick="return confirm('Are you sure you want to delete this portfolio?')">
                                                    <img src="{{ asset('assets/admin/img/icons/delete.svg') }}"
                                                        alt="Delete">
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // "Select All" checkbox functionality
        document.getElementById('select-all').addEventListener('change', function() {
            const checkboxes = document.querySelectorAll('input[type="checkbox"]');
            checkboxes.forEach(checkbox => {
                checkbox.checked = this.checked;
            });
        });
    </script>
@endpush
