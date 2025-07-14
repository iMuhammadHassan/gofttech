@extends('layout.admin')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="page-title">
                    <h4>All Projects</h4>
                    <h6>Manage your projects</h6>
                </div>
                <div class="page-btn">
                    <a href="{{ route('work.project.add-project') }}" class="btn btn-added">
                        <img src="{{ asset('assets/admin/img/icons/plus.svg') }}" class="me-2" alt="Add New Project"> Add New
                        Project
                    </a>
                </div>
            </div>

            <!-- Filters -->
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
                            <!-- Export and PDF Buttons -->
                            <ul>
                                <li>
                                    <a href="{{ route('work.project.export-pdf') }}" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="PDF">
                                        <img src="{{ asset('assets/admin/img/icons/pdf.svg') }}" alt="PDF">
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('work.project.export-excel') }}" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="CSV">

                                        <img src="{{ asset('assets/admin/img/icons/excel.svg') }}" alt="CSV">
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Filter Inputs -->
                    <div class="card" id="filter_inputs">
                        <div class="card-body pb-0">
                            <form action="#" method="GET">
                                <div class="row">
                                    <!-- Start Date Filter -->
                                    <div class="col-lg-2 col-sm-6 col-12">
                                        <div class="form-group">
                                            <div class="input-groupicon">
                                                <input type="text" name="start_date"
                                                    class="datetimepicker form-control cal-icon"
                                                    placeholder="Choose Start Date" data-date-format="dd-mm-yyyy">
                                                <div class="addonset">
                                                    <img src="{{ asset('assets/admin/img/icons/calendars.svg') }}"
                                                        alt="Date">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Deadline Filter -->
                                    <div class="col-lg-2 col-sm-6 col-12">
                                        <div class="form-group">
                                            <div class="input-groupicon">
                                                <input type="text" name="deadline"
                                                    class="datetimepicker form-control cal-icon"
                                                    placeholder="Choose Deadline" data-date-format="dd-mm-yyyy">
                                                <div class="addonset">
                                                    <img src="{{ asset('assets/admin/img/icons/calendars.svg') }}"
                                                        alt="Date">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Search Button -->
                                    <div class="col-lg-1 col-sm-6 col-12 ms-auto">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-filters ms-auto">
                                                <img src="{{ asset('assets/admin/img/icons/search-whites.svg') }}"
                                                    alt="Search">
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Project Table -->
                    <div class="table-responsive">
                        <table class="table datanew">
                            <thead>
                                <tr>

                                    <th>Short Code</th>
                                    <th>Project Name</th>
                                    <th>Start Date</th>
                                    <th>Deadline</th>
                                    <th>Price</th>
                                    <th>Department</th>
                                    <th>Client</th>
                                    <th>Assigned Member</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($projects as $project)
                                    <tr>

                                        <td>{{ $project->short_code }}</td>
                                        <td>{{ $project->project_name }}</td>
                                        <td>{{ \Carbon\Carbon::parse($project->start_date)->format('d M Y') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($project->deadline)->format('d M Y') }}</td>
                                        <td>{{ $project->price }}</td>
                                        <td>{{ $project->department->name }}</td>
                                        <td>{{ $project->client->name }}</td>
                                        <td>{{ $project->member->employee_name }}</td>
                                        <td>
                                            <a class="me-3"
                                                href="{{ route('work.project.edit', ['id' => $project->id]) }}">
                                                <img src="{{ asset('assets/admin/img/icons/edit.svg') }}" alt="Edit">
                                            </a>
                                            <form id="delete-form-{{ $project->id }}"
                                                action="{{ route('work.project.delete', ['id' => $project->id]) }}"
                                                method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-link text-danger p-0"
                                                    onclick="return confirm('Are you sure you want to delete this project?')">
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

                    <!-- Pagination Links -->
                    <div class="pagination-links">
                        {{ $projects->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include Bootstrap Datepicker -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

    <!-- Initialize Datepicker -->
    <script>
        $(document).ready(function() {
            $('.datetimepicker').datepicker({
                format: 'dd-mm-yyyy', // Set the format to 'dd-mm-yyyy'
                autoclose: true,
                todayHighlight: true
            });
        });
    </script>
@endsection
