@extends('layout.admin')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="page-title">
                    <h4>All Expenses</h4>
                    <h6>Manage your expenses</h6>
                </div>
                <div class="page-btn">
                    <a href="{{ route('finance.expense.add-expense') }}" class="btn btn-added">
                        <img src="{{ asset('assets/admin/img/icons/plus.svg') }}" class="me-2" alt="Add New Expense"> Add New
                        Expense
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
                                    <img src="{{ asset('assets/admin/img/icons/filter.svg') }}" alt="Filter Icon">
                                    <span><img src="{{ asset('assets/admin/img/icons/closes.svg') }}"
                                            alt="Close Icon"></span>
                                </a>
                            </div>
                            <div class="search-input">
                                <a class="btn btn-searchset">
                                    <img src="{{ asset('assets/admin/img/icons/search-white.svg') }}" alt="Search Icon">
                                </a>
                            </div>
                        </div>
                        <div class="wordset">
                            <!-- Export and PDF Buttons -->
                            <ul>
                                <li>
                                    <a href="{{ route('finance.expense.export-pdf') }}" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="PDF">
                                        <img src="{{ asset('assets/admin/img/icons/pdf.svg') }}" alt="pdf">
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('finance.expense.export-excel') }}" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="CSV">
                                        <img src="{{ asset('assets/admin/img/icons/excel.svg') }}" alt="csv">
                                    </a>
                                </li>
                            </ul>

                        </div>
                    </div>

                    <!-- Filter Inputs -->
                    <div class="card" id="filter_inputs">
                        <div class="card-body pb-0">
                            <div class="row">
                                <div class="col-lg-2 col-sm-6 col-12">
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
                                <div class="col-lg-2 col-sm-6 col-12">
                                    <div class="form-group">
                                        <input type="text" placeholder="Enter Reference">
                                    </div>
                                </div>
                                <div class="col-lg-2 col-sm-6 col-12">
                                    <div class="form-group">
                                        <select class="select">
                                            <option>Choose Category</option>
                                            <option>Category 1</option>
                                            <option>Category 2</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-sm-6 col-12">
                                    <div class="form-group">
                                        <select class="select">
                                            <option>Choose Status</option>
                                            <option>Complete</option>
                                            <option>In Progress</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-1 col-sm-6 col-12 ms-auto">
                                    <div class="form-group">
                                        <a class="btn btn-filters ms-auto">
                                            <img src="{{ asset('assets/admin/img/icons/search-whites.svg') }}"
                                                alt="Search Icon">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Expense Table -->
                    <div class="table-responsive">
                        <table class="table datanew">
                            <thead>
                                <tr>

                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Date</th>
                                    <th>Amount</th>
                                    <th>Project</th>
                                    <th>Bank</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($expenses as $expense)
                                    <tr>

                                        <td>{{ $expense->title }}</td>
                                        <td>{{ $expense->category }}</td>
                                        <td>{{ \Carbon\Carbon::parse($expense->purchased_date)->format('d M Y') }}</td>
                                        <td>{{ $expense->price }}</td>
                                        <td>{{ $expense->project }}</td>
                                        <td>{{ $expense->bank }}</td>
                                        <td>{{ $expense->description }}</td>
                                        <td>
                                            <a class="me-3"
                                                href="{{ route('finance.expense.edit-expense', $expense->id) }}">
                                                <img src="{{ asset('assets/admin/img/icons/edit.svg') }}" alt="Edit">
                                            </a>
                                            <a class="me-3 confirm-text" href="javascript:void(0);"
                                                data-id="{{ $expense->id }}">
                                                <img src="{{ asset('assets/admin/img/icons/delete.svg') }}" alt="Delete">
                                            </a>
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
