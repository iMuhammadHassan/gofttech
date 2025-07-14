@extends('layout.client')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="page-title">
                    <h4>All Quotations</h4>
                    <h6>Manage your Quotations</h6>
                </div>
                <div class="page-btn">
                    <a href="{{ route('client-dash.quotation.add-quotation') }}" class="btn btn-added">
                        <img src="{{ asset('assets/admin/img/icons/plus.svg') }}" class="me-2" alt="img">
                        Add New Quotation
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
                            <ul>
                                <li>
                                    <a href="{{ route('client-dash.quotation.export-pdf') }}" data-bs-toggle="tooltip" data-bs-placement="top" title="PDF">
                                        <img src="{{ asset('assets/admin/img/icons/pdf.svg') }}" alt="pdf">
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('client-dash.quotation.export-excel') }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Excel">
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
                                    <th>ID</th>
                                    <th>Project Name</th>
                                    <th>Type</th>
                                    <th>Sub-Type</th>
                                    <th>Screens/Pages</th>
                                    <th>Design Category</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($quotations as $quotation)
                                    <tr>
                                        <td>{{ $quotation->id }}</td>
                                        <td>{{ $quotation->project_name }}</td>
                                        <td>{{ ucfirst($quotation->type) }}</td>
                                        <td>{{ ucfirst($quotation->sub_type) }}</td>
                                        <td>
                                            @if($quotation->sub_type === 'app')
                                                {{ $quotation->number_of_screens }} Screens
                                            @elseif($quotation->sub_type === 'web')
                                                {{ $quotation->number_of_pages }} Pages
                                            @endif
                                        </td>
                                        <td>{{ ucfirst($quotation->design_category) }}</td>
                                        <td>{{ $quotation->created_at->format('Y-m-d') }}</td>
                                        <td>
                                            <a class="me-3" href="{{ route('client-dash.quotation.edit-quotation', $quotation->id) }}">
                                                <img src="{{ asset('assets/admin/img/icons/edit.svg') }}" alt="Edit">
                                            </a>
                                            <form action="{{ route('client-dash.quotation.delete-quotation', $quotation->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-link">
                                                    <img src="{{ asset('assets/admin/img/icons/delete.svg') }}" alt="Delete">
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="pagination-wrapper">
                        {{ $quotations->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
