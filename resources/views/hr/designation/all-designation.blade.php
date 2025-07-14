@extends('layout.admin')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="page-title">
                    <h4>All Designations</h4>
                    <h6>Manage your designations</h6>
                </div>
                <div class="page-btn">
                    <a href="{{ route('designation.add-designation') }}" class="btn btn-added">
                        <img src="{{ asset('assets/admin/img/icons/plus.svg') }}" class="me-2" alt="img">Add New Designation
                    </a>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table datanew">
                            <thead>
                                <tr>

                                    <th>Designation Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($designations as $designation)
                                    <tr>

                                        <td>{{ $designation->name }}</td>
                                        <td>
                                            <a class="me-3" href="{{ route('designation.edit-designation', $designation->id) }}">
                                                <img src="{{ asset('assets/admin/img/icons/edit.svg') }}" alt="img">
                                            </a>
                                            <form action="{{ route('designation.destroy', $designation->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-link confirm-text" style="border: none; background: none;">
                                                    <img src="{{ asset('assets/admin/img/icons/delete.svg') }}" alt="img">
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
