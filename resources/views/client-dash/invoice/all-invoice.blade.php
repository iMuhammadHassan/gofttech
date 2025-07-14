@extends('layout.client')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="page-title">
                    <h4>All Invoices</h4>
                </div>
            </div>

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
                            <ul>
                                <li>
                                    <a href="{{ route('finance.invoice.export-pdf') }}" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="PDF">
                                        <img src="{{ asset('assets/admin/img/icons/pdf.svg') }}" alt="PDF">
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('finance.invoice.export-excel') }}" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Excel">
                                        <img src="{{ asset('assets/admin/img/icons/excel.svg') }}" alt="Excel">
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
                                        <div class="input-groupicon">
                                            <input type="text" class="datetimepicker cal-icon" placeholder="Choose Date">
                                            <div class="addonset">
                                                <img src="{{ asset('assets/admin/img/icons/calendars.svg') }}"
                                                    alt="Calendar Icon">
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
                                            <option>Computers</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-sm-6 col-12">
                                    <div class="form-group">
                                        <select class="select">
                                            <option>Choose Status</option>
                                            <option>Complete</option>
                                            <option>Inprogress</option>
                                        </select>
                                    </div>
                                </div>
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

                    <div class="table-responsive">
                        <table class="table datanew">
                            <thead>
                                <tr>

                                    <th>Invoice Number</th>
                                    <th>Date</th>
                                    <th>Due Date</th>
                                    <th>Currency</th>
                                    <th>Client</th>
                                    <th>Project</th>
                                    <th>Bank Account</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Thank You Note</th>
                                    <th>Signature</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($invoices as $invoice)
                                    <tr>

                                        <td>{{ $invoice->invoice_number }}</td>
                                        <td>{{ \Carbon\Carbon::parse($invoice->date)->format('d M Y') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($invoice->due_date)->format('d M Y') }}</td>
                                        <td>{{ $invoice->currency }}</td>
                                        <td>{{ $invoice->client->name }}</td>
                                        <td>{{ $invoice->project->project_name }}</td>
                                        <td>{{ $invoice->bank->name }} ({{ $invoice->bank->account_number }})</td>
                                        <td>${{ number_format($invoice->total, 2) }}</td>
                                        <td><span
                                                class="badges {{ $invoice->paid_amount ? 'bg-lightgreen' : 'bg-lightred' }}">{{ $invoice->paid_amount ? 'Paid' : 'Unpaid' }}</span>
                                        </td>
                                        <td>{{ $invoice->thank_you_note }}</td>
                                        <td>{{ $invoice->signature }}</td>
                                        <td>

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
