@extends('layout.admin')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="page-title">
                    <h4>All Banks</h4>
                    <h6>Manage your banks</h6>
                </div>
                <div class="page-btn">
                    <a href="{{ route('finance.bank.add-bank') }}" class="btn btn-added">
                        <img src="{{ asset('assets/admin/img/icons/plus.svg') }}" class="me-2" alt="Add New Bank Icon">Add
                        New Bank
                    </a>
                </div>
            </div>

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
                                    <a href="{{ route('finance.bank.export-pdf') }}" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="PDF">
                                        <img src="{{ asset('assets/admin/img/icons/pdf.svg') }}" alt="pdf">
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('finance.bank.export-csv') }}" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="CSV">
                                        <img src="{{ asset('assets/admin/img/icons/excel.svg') }}" alt="csv">
                                    </a>
                                </li>
                            </ul>

                        </div>
                    </div>

                    <div class="card" id="filter_inputs">
                        <div class="card-body pb-0">
                            <div class="row">
                                <div class="col-lg-2 col-sm-6 col-12">
                                    <div class="form-group">
                                        <input type="text" placeholder="Bank Name">
                                    </div>
                                </div>
                                <div class="col-lg-2 col-sm-6 col-12">
                                    <div class="form-group">
                                        <input type="text" placeholder="Account Holder">
                                    </div>
                                </div>
                                <div class="col-lg-2 col-sm-6 col-12">
                                    <div class="form-group">
                                        <input type="text" placeholder="Account Number">
                                    </div>
                                </div>
                                <div class="col-lg-2 col-sm-6 col-12">
                                    <div class="form-group">
                                        <input type="text" placeholder="Contact Number">
                                    </div>
                                </div>
                                <div class="col-lg-2 col-sm-6 col-12">
                                    <div class="form-group">
                                        <select class="select">
                                            <option>Choose Status</option>
                                            <option>Active</option>
                                            <option>Inactive</option>
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

                    <div class="table-responsive">
                        <table class="table datanew">
                            <thead>
                                <tr>

                                    <th>Bank Name</th>
                                    <th>Account Holder</th>
                                    <th>Account Number</th>
                                    <th>Contact Number</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($banks as $bank)
                                    <tr>

                                        <td>{{ $bank->name }}</td>
                                        <td>{{ $bank->account_holder }}</td>
                                        <td>{{ $bank->account_number }}</td>
                                        <td>{{ $bank->contact_number }}</td>
                                        <td>
                                            <form action="{{ route('finance.bank.update-status', $bank->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <div class="">
                                                    <select name="status" class="select form-control" required
                                                        onchange="this.form.submit()">
                                                        <option value="Active"
                                                            {{ $bank->status == 'Active' ? 'selected' : '' }}>Active
                                                        </option>
                                                        <option value="Inactive"
                                                            {{ $bank->status == 'Inactive' ? 'selected' : '' }}>Inactive
                                                        </option>
                                                    </select>
                                                </div>
                                            </form>
                                        </td>

                                        <td>
                                            <a class="me-3" href="{{ route('finance.bank.edit-bank', $bank->id) }}">
                                                <img src="{{ asset('assets/admin/img/icons/edit.svg') }}" alt="Edit Icon">
                                            </a>
                                            <a class="me-3 confirm-text" href="javascript:void(0);"
                                                data-id="{{ $bank->id }}">
                                                <img src="{{ asset('assets/admin/img/icons/delete.svg') }}"
                                                    alt="Delete Icon">
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
