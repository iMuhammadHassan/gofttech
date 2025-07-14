@extends('layout.admin')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="page-title">
                    <h4>All Appreciation</h4>
                    <h6>Manage your appreciations</h6>
                </div>
                <div class="page-btn">
                    <a href="{{ route('appreciation.add-appreciation') }}" class="btn btn-added">
                        <img src="{{ asset('assets/admin/img/icons/plus.svg') }}" class="me-2" alt="img">Add New
                        Appreciation
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
                                    <a href="{{ route('appreciation.export-pdf') }}" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="PDF">
                                        <img src="{{ asset('assets/admin/img/icons/pdf.svg') }}" alt="pdf">
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('appreciation.export-csv') }}" data-bs-toggle="tooltip"
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

                                    <th>Award Name</th>
                                    <th>Appreciation Amount</th>
                                    <th>Given To</th>
                                    <th>Date</th>
                                    <th>Summary</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($appreciations as $appreciation)
                                    <tr>

                                        <td>{{ $appreciation->award_name }}</td>
                                        <td>{{ $appreciation->appreciation_amount }}</td>
                                        <td>{{ $appreciation->employee->employee_name }}</td>
                                        <td>{{ \Carbon\Carbon::parse($appreciation->date)->format('d M Y') }}</td>
                                        <td>{{ $appreciation->summary }}</td>
                                        <td>
                                            <a class="me-3"
                                                href="{{ route('appreciation.edit-appreciation', ['id' => $appreciation->id]) }}">
                                                <img src="{{ asset('assets/admin/img/icons/edit.svg') }}" alt="img">
                                            </a>

                                            <!-- Delete Button as Form -->
                                            <form action="{{ route('appreciation.destroy', $appreciation->id) }}"
                                                method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-delete"
                                                    onclick="return confirm('Are you sure you want to delete this appreciation?');"
                                                    style="border: none; background: none; cursor: pointer;">
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
