@extends('layout.admin')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="page-title">
                    <h4>All Orders</h4>
                    <h6>Manage your orders</h6>
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
                                    <a href="{{ route('order.export-pdf') }}" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="PDF">
                                        <img src="{{ asset('assets/admin/img/icons/pdf.svg') }}" alt="pdf">
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('order.export-csv') }}" data-bs-toggle="tooltip"
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

                                    <th>Customer Name</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Package Name</th>
                                    <th>Message</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>

                                        <td>{{ $order->name }}</td>
                                        <td>{{ $order->email }}</td>
                                        <td>{{ $order->phone_number }}</td>
                                        <td>{{ $order->package->name }}</td> <!-- Linked package name -->
                                        <td>{{ Str::limit($order->message, 50) }}</td>
                                        <td>{{ $order->created_at->format('d M Y') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    @if ($orders->isEmpty())
                        <p class="text-center mt-3">No orders found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
