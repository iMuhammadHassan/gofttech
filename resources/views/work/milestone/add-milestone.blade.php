@extends('layout.admin')

@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Add Milestone</h4>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('work.milestone.store-milestone') }}" method="POST">
                        @csrf
                        <div class="row">
                            <!-- Project Name -->
                            <div class="col-lg-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="project-name">Project Name</label>
                                    <select id="project-name" name="project_id" class="select" required>
                                        <option value="">Choose Project</option>
                                        @foreach($projects as $project)
                                            <option value="{{ $project->id }}">{{ $project->project_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Milestone Name -->
                            <div class="col-lg-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="milestone-name">Milestone Name</label>
                                    <input type="text" id="milestone-name" name="milestone_name" placeholder="Enter Milestone Name" class="form-control">
                                </div>
                            </div>

                            <!-- Milestone Delivery Date -->
                            <div class="col-lg-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="milestone-delivery-date">Milestone Delivery Date</label>
                                    <div class="input-groupicon">
                                        <input type="text" id="milestone-delivery-date" name="milestone_delivery_date" placeholder="Choose Delivery Date" class="datetimepicker form-control">
                                        <div class="addonset">
                                            <img src="{{ asset('assets/admin/img/icons/calendars.svg') }}" alt="img">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Milestone Status -->
                            <div class="col-lg-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="milestone-status">Milestone Status</label>
                                    <select id="milestone-status" name="milestone_status" class="select" required>
                                        <option value="">Choose Status</option>
                                        <option value="Not Started">Not Started</option>
                                        <option value="In Progress">In Progress</option>
                                        <option value="Completed">Completed</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Description -->
                            <div class="col-lg-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea id="description" name="description" placeholder="Enter Description" class="form-control" rows="4"></textarea>
                                </div>
                            </div>
                            
                            <!-- Action Buttons -->
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-submit me-2">Submit</button>
                                <a href="{{ url('milestonelist') }}" class="btn btn-cancel">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
