@extends('layout.admin')

@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Expense Report</h4>
                    <h6>Manage your Expense Report</h6>
                </div>
            </div>

            <!-- Filter Form -->
            <form method="GET" action="{{ route('report.expense-report') }}">
                <div class="row">
                    <!-- From Date -->
                    <div class="col-lg-2 col-sm-6 col-12">
                        <div class="form-group">
                            <div class="input-groupicon">
                                <input type="text" placeholder="From Date" name="from_date"
                                    value="{{ request()->from_date }}" class="datetimepicker">
                                <div class="addonset">
                                    <img src="{{ asset('assets/admin/img/icons/calendars.svg') }}" alt="Calendar Icon">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- To Date -->
                    <div class="col-lg-2 col-sm-6 col-12">
                        <div class="form-group">
                            <div class="input-groupicon">
                                <input type="text" placeholder="To Date" name="to_date" value="{{ request()->to_date }}"
                                    class="datetimepicker">
                                <div class="addonset">
                                    <img src="{{ asset('assets/admin/img/icons/calendars.svg') }}" alt="Calendar Icon">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Category Filter -->
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <select class="select form-control" name="category">
                                <option value="">Choose Category</option>
                                <option value="office_supplies"
                                    {{ request()->category == 'office_supplies' ? 'selected' : '' }}>Office Supplies
                                </option>
                                <option value="fixed" {{ request()->category == 'fixed' ? 'selected' : '' }}>Fixed</option>
                                <option value="daily" {{ request()->category == 'daily' ? 'selected' : '' }}>Daily</option>
                            </select>
                        </div>
                    </div>

                    <!-- Project Filter -->
                    <div class="col-lg-2 col-sm-6 col-12">
                        <div class="form-group">
                            <select class="select form-control" name="project">
                                <option value="">Choose Project</option>
                                @foreach ($projects as $project)
                                    <option value="{{ $project->id }}"
                                        {{ request()->project == $project->id ? 'selected' : '' }}>
                                        {{ $project->project_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Filter Button -->
                    <div class="col-lg-2 col-sm-6 col-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </div>
                    </div>
                </div>
            </form>

            <!-- Table Header -->
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
                                    <a href="{{ route('report.expense-report.export-pdf') }}" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Export PDF">
                                        <img src="{{ asset('assets/admin/img/icons/pdf.svg') }}" alt="PDF icon">
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('report.expense-report.export-excel') }}" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Export Excel">
                                        <img src="{{ asset('assets/admin/img/icons/excel.svg') }}" alt="Excel icon">
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Expense Table -->
                    <div class="table-responsive">
                        <table class="table datanew">
                            <thead>
                                <tr>

                                    <th>Expense ID</th>
                                    <th>Title</th>
                                    <th>Price</th>
                                    <th>Purchased Date</th>
                                    <th>Category</th>
                                    <th>Project</th>
                                    <th>Bank</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($expenses->isEmpty())
                                    <tr>
                                        <td colspan="10" class="text-center">No expenses found</td>
                                    </tr>
                                @else
                                    @foreach ($expenses as $expense)
                                        <tr>

                                            <td>{{ $expense->id }}</td>
                                            <td>{{ $expense->title }}</td>
                                            <td>{{ $expense->price }}</td>
                                            <td>{{ $expense->purchased_date }}</td>
                                            <td>{{ ucfirst(str_replace('_', ' ', $expense->category)) }}</td>
                                            <!-- Format category -->
                                            <td>{{ $expense->project }}</td>
                                            <td>{{ $expense->bank }}</td>
                                            <td>{{ $expense->description }}</td>
                                            <td>
                                                <span
                                                    class="badges {{ $expense->status == 'Paid' ? 'bg-lightgreen' : 'bg-lightred' }}">
                                                    {{ $expense->status }}
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
