@extends('layout.admin')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="page-title">
                    <h4>All Milestones</h4>
                    <h6>Manage your Milestones</h6>
                </div>
                <div class="page-btn">
                    <a href="{{ route('work.milestone.add-milestone') }}" class="btn btn-added">
                        <img src="{{ asset('assets/admin/img/icons/plus.svg') }}" class="me-2" alt="img">Add New
                        Milestone
                    </a>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-top">
                        <div class="search-set">
                            <div class="search-path">
                                <a class="btn btn-filter" id="filter_search">
                                    <img src="{{ asset('assets/admin/img/icons/filter.svg') }}" alt="img">
                                    <span><img src="{{ asset('assets/admin/img/icons/closes.svg') }}" alt="img"></span>
                                </a>
                            </div>
                            <div class="search-input">
                                <a class="btn btn-searchset">
                                    <img src="{{ asset('assets/admin/img/icons/search-white.svg') }}" alt="img">
                                </a>
                            </div>
                        </div>
                        <div class="wordset">
                            <!-- Export and PDF Buttons -->
                            <ul>
                                <li>
                                    <a href="{{ route('work.milestone.export-pdf') }}" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="PDF">
                                        <img src="{{ asset('assets/admin/img/icons/pdf.svg') }}" alt="pdf">
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('work.milestone.export-csv') }}" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="CSV">
                                        <img src="{{ asset('assets/admin/img/icons/excel.svg') }}" alt="csv">
                                    </a>
                                </li>
                            </ul>

                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table datanew">
                            <thead>
                                <tr>
                                    
                                    <th>Project</th>
                                    <th>Milestone</th>
                                    <th>Delivery Date</th>
                                    <th>Status</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($milestones as $milestone)
                                    <tr>

                                        <td>{{ $milestone->project->project_name }}</td>
                                        <td>{{ $milestone->milestone_name }}</td>
                                        <td>{{ \Carbon\Carbon::parse($milestone->milestone_delivery_date)->format('d M Y') }}
                                        </td>
                                        <td>
                                            <form action="{{ route('work.milestone.update-status', $milestone->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')
                                                <select name="milestone_status" class="select form-control" required
                                                    onchange="this.form.submit()">
                                                    <option value="Not Started"
                                                        {{ $milestone->milestone_status == 'Pending' ? 'selected' : '' }}>
                                                        Not Started</option>
                                                    <option value="In Progress"
                                                        {{ $milestone->milestone_status == 'In Progress' ? 'selected' : '' }}>
                                                        In Progress</option>
                                                    <option value="Completed"
                                                        {{ $milestone->milestone_status == 'Completed' ? 'selected' : '' }}>
                                                        Completed</option>
                                                </select>
                                            </form>
                                        </td>
                                        <td>{{ $milestone->description }}</td>
                                        <td>
                                            <a class="me-3"
                                                href="{{ route('work.milestone.edit-milestone', $milestone->id) }}">
                                                <img src="{{ asset('assets/admin/img/icons/edit.svg') }}" alt="img">
                                            </a>
                                            <!-- Delete Form -->
                                            <form action="{{ route('work.milestone.delete-milestone', $milestone->id) }}"
                                                method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-delete"
                                                    onclick="return confirm('Are you sure you want to delete this milestone?');"
                                                    style="border:none; background:none; cursor:pointer;">
                                                    <img src="{{ asset('assets/admin/img/icons/delete.svg') }}"
                                                        alt="img">
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
