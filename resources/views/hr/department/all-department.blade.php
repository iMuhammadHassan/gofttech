@extends('layout.admin')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="page-title">
                    <h4>All Departments</h4>
                    <h6>Manage your Departments</h6>
                </div>
                <div class="page-btn">
                    <a href="{{ route('department.add-department') }}" class="btn btn-added">
                        <img src="{{ asset('assets/admin/img/icons/plus.svg') }}" class="me-2" alt="img">Add New Department
                    </a>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table datanew">
                            <thead>
                                <tr>

                                    <th>Department Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($departments as $department)
                                    <tr>

                                        <td>{{ $department->name }}</td>
                                        <td>
                                            <a class="me-3" href="{{ route('department.edit-department', $department->id) }}">
                                                <img src="{{ asset('assets/admin/img/icons/edit.svg') }}" alt="img">
                                            </a>
                                            <!-- Delete Button Trigger -->
                                            <form action="{{ route('department.destroy', $department->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-delete" onclick="return confirm('Are you sure you want to delete this department?');" style="border: none; background: none; cursor: pointer;">
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
