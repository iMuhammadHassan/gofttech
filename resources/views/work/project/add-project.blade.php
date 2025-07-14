@extends('layout.admin')

@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Add Project</h4>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('work.project.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Short Code</label>
                                    <input type="text" name="short_code" class="form-control" placeholder="Enter Short Code" required>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Project Name</label>
                                    <input type="text" name="project_name" class="form-control" placeholder="Enter Project Name" required>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Start Date</label>
                                    <div class="input-groupicon">
                                        <input type="text" name="start_date" placeholder="Choose Start Date" class="datetimepicker" required>
                                        <div class="addonset">
                                            <img src="{{ asset('assets/admin/img/icons/calendars.svg') }}" alt="img">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Deadline</label>
                                    <div class="input-groupicon">
                                        <input type="text" name="deadline" placeholder="Choose Deadline" class="datetimepicker" required>
                                        <div class="addonset">
                                            <img src="{{ asset('assets/admin/img/icons/calendars.svg') }}" alt="img">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Department</label>
                                    <select name="department_id" class="select" required>
                                        <option value="">Choose Department</option>
                                        @foreach($departments as $department)
                                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Add Member</label>
                                    <select name="member_id" class="select" required>
                                        <option value="">Choose Member</option>
                                        @foreach($employees as $employee)
                                            <option value="{{ $employee->id }}">{{ $employee->employee_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Client Name</label>
                                    <select name="client_id" class="select" required>
                                        <option value="">Choose Client</option>
                                        @foreach($clients as $client)
                                            <option value="{{ $client->id }}">{{ $client->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="form-group">
                                        <label for="price">Price</label>
                                        <div class="input-groupicon">
                                            <input type="text" id="price" name="price" class="form-control" placeholder="Enter Price" value="{{ old('price') }}" required>
                                            <div class="addonset">
                                                <img src="{{ asset('assets/admin/img/icons/dollar.svg') }}" alt="Dollar Icon">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>    
           
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Initial Requirement</label>
                                    <input type="text" name="initial_requirement" class="form-control" placeholder="Enter Initial Requirement" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-submit me-2">Submit</button>
                                <a href="{{ route('work.project.all-project') }}" class="btn btn-cancel">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
