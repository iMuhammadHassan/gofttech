@extends('layout.admin')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="page-title">
                    <h4>Add Task</h4>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('work.task.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-sm-12">
                                <div class="form-group">
                                    <label for="project_id">Project</label>
                                    <select name="project_id" id="project_id" class="form-control select" required>
                                        <option value="">Choose Project</option>
                                        @foreach($projects as $project)
                                            <option value="{{ $project->id }}">{{ $project->project_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Start Date with Custom Date Picker -->
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="start_date">Start Date</label>
                                    <div class="input-groupicon">
                                        <input type="text" id="start_date" name="start_date" placeholder="Choose Start Date" class="datetimepicker form-control" required>
                                        <div class="addonset">
                                            <img src="{{ asset('assets/admin/img/icons/calendars.svg') }}" alt="img">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- End Date with Custom Date Picker -->
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="end_date">End Date</label>
                                    <div class="input-groupicon">
                                        <input type="text" id="end_date" name="end_date" placeholder="Choose End Date" class="datetimepicker form-control" required>
                                        <div class="addonset">
                                            <img src="{{ asset('assets/admin/img/icons/calendars.svg') }}" alt="img">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Assign To Dropdown -->
                            <div class="col-lg-6 col-sm-12">
                                <div class="form-group">
                                    <label for="assigned_to">Assign To</label>
                                    <select name="assigned_to" id="assigned_to" class="form-control select" required>
                                        <option value="">Choose Assignee</option>
                                        @foreach($employees as $employee)
                                            <option value="{{ $employee->id }}">{{ $employee->employee_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Status Dropdown -->
                            <div class="col-lg-6 col-sm-12">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control select" required>
                                        <option value="Pending">Pending</option>
                                        <option value="In Progress">In Progress</option>
                                        <option value="Completed">Completed</option>
                                        <option value="On Hold">On Hold</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Description -->
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" class="form-control" rows="4" placeholder="Enter task description" required></textarea>
                                </div>
                            </div>

                            <!-- Submit and Cancel Buttons -->
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-submit me-2">Submit</button>
                                <a href="{{ route('work.task.all-task') }}" class="btn btn-cancel">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            // Initialize the datetime picker
            $('.datetimepicker').datepicker({
                format: 'dd-mm-yyyy', // Change the format as needed
                autoclose: true,
                todayHighlight: true
            });
        });
    </script>
@endsection
