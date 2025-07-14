@extends('layout.admin')

@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Edit Department</h4>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('department.update', $department->id) }}" method="POST">
                        @csrf
                        @method('POST') <!-- Use POST method for updates -->
                        <div class="row">
                            <div class="col-lg-12 col-sm-12">
                                <div class="form-group">
                                    <label>Department Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ $department->name }}" placeholder="Enter Department Name" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-submit me-2">Update</button>
                                <a href="{{ route('department.all-department') }}" class="btn btn-cancel">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
