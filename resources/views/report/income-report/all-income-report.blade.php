@extends('layout.admin')

@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Income Report</h4>
                    <h6>Manage your Income Report</h6>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-2 col-sm-6 col-12">
                    <div class="form-group">
                        <div class="input-groupicon">
                            <input type="text" placeholder="From Date" class="datetimepicker">
                            <div class="addonset">
                                <img src="{{ asset('assets/admin/img/icons/calendars.svg') }}" alt="img">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-6 col-12">
                    <div class="form-group">
                        <div class="input-groupicon">
                            <input type="text" placeholder="To Date" class="datetimepicker">
                            <div class="addonset">
                                <img src="{{ asset('assets/admin/img/icons/calendars.svg') }}" alt="img">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-sm-6 col-12">
                    <div class="form-group">
                        <select class="select form-control">
                            <option>Choose Status</option>
                            <option>Active</option>
                            <option>Pending</option>
                            <option>Closed</option>
                        </select>
                    </div>
                </div>

                <div class="col-lg-1 col-sm-6 col-12 ms-auto">
                    <div class="form-group">
                        <a class="btn btn-filters ms-auto"><img
                                src="{{ asset('assets/admin/img/icons/search-whites.svg') }}" alt="img"></a>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="table-top">
                            <div class="search-set">
                                <div class="search-input">
                                    <a class="btn btn-searchset">
                                        <img src="{{ asset('assets/admin/img/icons/search-white.svg') }}" alt="search icon">
                                    </a>
                                </div>
                            </div>
                            <div class="wordset">
                                <ul>
                                    <li>
                                        <a href="{{ route('report.income-report.export-pdf') }}" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="pdf">
                                            <img src="{{ asset('assets/admin/img/icons/pdf.svg') }}" alt="pdf icon">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('report.income-report.export-excel') }}" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="excel">
                                            <img src="{{ asset('assets/admin/img/icons/excel.svg') }}" alt="excel icon">
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
                                                <input type="text" placeholder="From Date" class="datetimepicker">
                                                <div class="addonset">
                                                    <img src="assets/img/icons/calendars.svg" alt="img">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-sm-6 col-12">
                                        <div class="form-group">
                                            <div class="input-groupicon">
                                                <input type="text" placeholder="To Date" class="datetimepicker">
                                                <div class="addonset">
                                                    <img src="assets/img/icons/calendars.svg" alt="img">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-1 col-sm-6 col-12 ms-auto">
                                        <div class="form-group">
                                            <a class="btn btn-filters ms-auto"><img src="assets/img/icons/search-whites.svg"
                                                    alt="img"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table datanew">
                                <thead>
                                    <tr>

                                        <th>Customer code</th>
                                        <th>Customer name </th>
                                        <th>Amount</th>
                                        <th>Paid</th>
                                        <th>Amount due</th>
                                        <th>Status</th>
                                        <th>Paument Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>

                                        <td>CT_1001</td>
                                        <td>Thomas21</td>
                                        <td>1500.00</td>
                                        <td>1500.00</td>
                                        <td>1500.00</td>
                                        <td><span class="badges bg-lightgreen">Completed</span></td>
                                        <td><span class="badges bg-lightgreen">Paid</span></td>
                                    </tr>
                                    <tr>

                                        <td>CT_1002</td>
                                        <td>504Benjamin</td>
                                        <td>10.00</td>
                                        <td>10.00</td>
                                        <td>10.00</td>
                                        <td><span class="badges bg-lightgreen">Completed</span></td>
                                        <td><span class="badges bg-lightred">Overdue</span></td>
                                    </tr>
                                    <tr>

                                        <td>CT_1003</td>
                                        <td>James 524</td>
                                        <td>10.00</td>
                                        <td>10.00</td>
                                        <td>10.00</td>
                                        <td><span class="badges bg-lightgreen">Completed</span></td>
                                        <td><span class="badges bg-lightred">Overdue</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    @endsection
