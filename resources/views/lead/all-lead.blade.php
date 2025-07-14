@extends('layout.admin')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="page-title">
                    <h4>All Leads</h4>
                    <h6>Manage your Leads</h6>
                </div>
                <div class="page-btn">
                    <a href="{{ route('lead.add-lead') }}" class="btn btn-added">
                        <img src="{{ asset('assets/admin/img/icons/plus.svg') }}" class="me-2" alt="img">Add New Lead
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
                            <!-- Export and Print Buttons -->
                            <ul>
                                <li>
                                    <a href="{{ route('lead.export-pdf') }}" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="PDF">
                                        <img src="{{ asset('assets/admin/img/icons/pdf.svg') }}" alt="pdf">
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('lead.export-csv') }}" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="CSV">
                                        <img src="{{ asset('assets/admin/img/icons/excel.svg') }}" alt="csv">
                                    </a>
                                </li>
                            </ul>

                        </div>
                    </div>

                    <!-- Filter Section -->
                    <div class="card" id="filter_inputs">
                        <div class="card-body pb-0">
                            <div class="row">
                                <!-- Lead Date Filter -->
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="form-group">
                                        <div class="input-groupicon">
                                            <input type="text" class="datetimepicker cal-icon"
                                                placeholder="Choose Lead Date">
                                            <div class="addonset">
                                                <img src="{{ asset('assets/admin/img/icons/calendars.svg') }}"
                                                    alt="img">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Lead Name Filter -->
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Enter Lead Name">
                                    </div>
                                </div>

                                <!-- Lead Source Filter -->
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="form-group">
                                        <select class="select form-control">
                                            <option value="">Choose Lead Source</option>
                                            <option value="Website">Website</option>
                                            <option value="Referral">Referral</option>
                                            <option value="Social Media">Social Media</option>
                                            <option value="Email Campaign">Email Campaign</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Status Filter -->
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="form-group">
                                        <select class="select form-control">
                                            <option value="">Choose Status</option>
                                            <option value="New">New</option>
                                            <option value="In Progress">In Progress</option>
                                            <option value="Converted">Converted</option>
                                            <option value="Closed">Closed</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Search Button -->
                                <div class="col-lg-1 col-sm-6 col-12 ms-auto">
                                    <div class="form-group">
                                        <a class="btn btn-filters ms-auto">
                                            <img src="{{ asset('assets/admin/img/icons/search-whites.svg') }}"
                                                alt="img">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Leads Table -->
                    <div class="table-responsive">
                        <table class="table datanew">
                            <thead>
                                <tr>

                                    <th>Lead Name</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Status</th>
                                    {{-- <th>Lead Note</th> --}}
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($leads as $lead)
                                    <tr>

                                        <td>{{ $lead->name }}</td>
                                        <td>{{ $lead->email }}</td>
                                        <td>{{ $lead->phone_number }}</td>
                                        {{-- <td>{{ $lead->status }}</td> --}}
                                        <td>
                                            <form action="{{ route('lead.update-status', $lead->id) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <div class="">
                                                    <select name="status" class="select form-control" required
                                                        onchange="this.form.submit()">
                                                        <option value="">Choose Status</option>
                                                        <option value="New"
                                                            {{ $lead->status == 'New' ? 'selected' : '' }}>New</option>
                                                        <option value="In Progress"
                                                            {{ $lead->status == 'In Progress' ? 'selected' : '' }}>In
                                                            Progress</option>
                                                        <option value="Converted"
                                                            {{ $lead->status == 'Converted' ? 'selected' : '' }}>Converted
                                                        </option>
                                                        <option value="Closed"
                                                            {{ $lead->status == 'Closed' ? 'selected' : '' }}>Closed
                                                        </option>
                                                    </select>
                                                </div>
                                            </form>
                                        </td>


                                        <td>

                                            <!-- Convert Button -->
                                            <a href="#" class="me-3"
                                                onclick="event.preventDefault();
                                            document.getElementById('convert-to-client-form-{{ $lead->id }}').submit();">
                                                <img src="{{ asset('assets/admin/img/icons/transfer1.svg') }}"
                                                    style="width:20px;" alt="convert">
                                            </a>
                                            <form id="convert-to-client-form-{{ $lead->id }}"
                                                action="{{ route('lead.convert-to-client', $lead->id) }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                            </form>

                                            <!-- View Button -->
                                            <a href="#" data-bs-toggle="modal"
                                                data-bs-target="#viewModal{{ $lead->id }}" class="me-3">
                                                <img src="{{ asset('assets/admin/img/icons/eye.svg') }}" alt="view">
                                            </a>

                                            <!-- Edit Button -->
                                            <a href="{{ route('lead.edit-lead', $lead->id) }}" class="me-3">
                                                <img src="{{ asset('assets/admin/img/icons/edit.svg') }}" alt="edit">
                                            </a>
                                            <!-- Delete Button -->
                                            <a href="#" data-bs-toggle="modal"
                                                data-bs-target="#deleteModal{{ $lead->id }}" class="me-3">
                                                <img src="{{ asset('assets/admin/img/icons/delete.svg') }}"
                                                    alt="delete">
                                            </a>
                                        </td>
                                    </tr>

                                    <!-- View Modal -->
                                    <div class="modal fade" id="viewModal{{ $lead->id }}" tabindex="-1"
                                        aria-labelledby="viewModalLabel{{ $lead->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="viewModalLabel{{ $lead->id }}">Lead
                                                        Details</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p><strong>Lead Name:</strong> {{ $lead->name }}</p>
                                                    <p><strong>Email:</strong> {{ $lead->email }}</p>
                                                    <p><strong>Phone Number:</strong> {{ $lead->phone_number }}</p>
                                                    <p><strong>Lead Source:</strong> {{ $lead->lead_source }}</p>
                                                    <p><strong>Status:</strong> {{ $lead->status }}</p>
                                                    <p><strong>Lead Note:</strong> {{ $lead->lead_note }}</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-cancel"
                                                        data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Delete Confirmation Modal -->
                                    <div class="modal fade" id="deleteModal{{ $lead->id }}" tabindex="-1"
                                        aria-labelledby="deleteModalLabel{{ $lead->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel{{ $lead->id }}">
                                                        Confirm Delete</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to delete this lead?
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="{{ route('lead.delete', $lead->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-cancel"
                                                            data-bs-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-submit">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
