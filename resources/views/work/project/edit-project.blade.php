@extends('layout.admin')

@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Edit Project</h4>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('work.project.update', $project->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Short Code</label>
                                    <input type="text" name="short_code" class="form-control" value="{{ old('short_code', $project->short_code) }}" placeholder="Enter Short Code" required>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Project Name</label>
                                    <input type="text" name="project_name" class="form-control" value="{{ old('project_name', $project->project_name) }}" placeholder="Enter Project Name" required>
                                </div>
                            </div>
                        
                             <!-- Start Date -->
                             <div class="col-lg-4 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Start Date</label>
                                    <div class="input-groupicon">
                                        <input type="text" name="start_date" value="{{ old('start_date', $project->start_date ? \Carbon\Carbon::parse($project->start_date)->format('d-m-Y') : '') }}" placeholder="Choose Start Date" class="datetimepicker form-control" required>
                                        <div class="addonset">
                                            <img src="{{ asset('assets/admin/img/icons/calendars.svg') }}" alt="img">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Deadline -->
                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Deadline</label>
                                    <div class="input-groupicon">
                                        <input type="text" name="deadline" value="{{ old('deadline', $project->deadline ? \Carbon\Carbon::parse($project->deadline)->format('d-m-Y') : '') }}" placeholder="Choose Deadline" class="datetimepicker form-control" required>
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
                                            <option value="{{ $department->id }}" {{ $project->department_id == $department->id ? 'selected' : '' }}>
                                                {{ $department->name }}
                                            </option>
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
                                            <option value="{{ $employee->id }}" {{ $project->member_id == $employee->id ? 'selected' : '' }}>
                                                {{ $employee->employee_name }}
                                            </option>
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
                                            <option value="{{ $client->id }}" {{ $project->client_id == $client->id ? 'selected' : '' }}>
                                                {{ $client->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Price -->
                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Price</label>
                                    <div class="input-groupicon">
                                        <input type="text" name="price" class="form-control" 
                                               value="{{ old('price', $project->price) }}" 
                                               placeholder="Enter Price" required>
                                        <div class="addonset">
                                            <img src="{{ asset('assets/admin/img/icons/dollar.svg') }}" alt="img">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Initial Requirement</label>
                                    <input type="text" name="initial_requirement" class="form-control" value="{{ old('initial_requirement', $project->initial_requirement) }}" placeholder="Enter Initial Requirement" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-submit me-2">Update</button>
                                <a href="{{ route('work.project.all-project') }}" class="btn btn-cancel">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
