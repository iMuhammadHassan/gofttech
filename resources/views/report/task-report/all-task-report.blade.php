@extends('layout.admin')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="page-title">
                    <h4>Task Report</h4>
                </div>
            </div>

            <!-- Filter Form -->
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('report.task-report.filter') }}" method="GET">
                        <div class="row">
                            <!-- Status Filter -->
                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="status">Task Status</label>
                                    <select name="status" id="status" class="form-control select">
                                        <option value="">All Statuses</option>
                                        <option value="Pending">Pending</option>
                                        <option value="In Progress">In Progress</option>
                                        <option value="Completed">Completed</option>
                                        <option value="On Hold">On Hold</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Project Filter -->
                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="project_id">Project</label>
                                    <select name="project_id" id="project_id" class="form-control select">
                                        <option value="">All Projects</option>
                                        @foreach ($projects as $project)
                                            <option value="{{ $project->id }}">{{ $project->project_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Employee Filter -->
                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="assigned_to">Assigned To</label>
                                    <select name="assigned_to" id="assigned_to" class="form-control select">
                                        <option value="">All Employees</option>
                                        @foreach ($employees as $employee)
                                            <option value="{{ $employee->id }}">{{ $employee->employee_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Filter Button -->
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-primary">Filter</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Task Report Table -->
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
                                    <a href="{{ route('report.task-report.export-pdf') }}" data-bs-toggle="tooltip"
                                        title="pdf">
                                        <img src="{{ asset('assets/admin/img/icons/pdf.svg') }}" alt="pdf icon">
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('report.task-report.export-excel') }}" data-bs-toggle="tooltip"
                                        title="excel">
                                        <img src="{{ asset('assets/admin/img/icons/excel.svg') }}" alt="excel icon">
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Task</th>
                                    <th>Project</th>
                                    <th>Assigned To</th>
                                    <th>Status</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($tasks->isEmpty())
                                    <tr>
                                        <td colspan="6" class="text-center">No tasks found</td>
                                    </tr>
                                @else
                                    @foreach ($tasks as $task)
                                        <tr>
                                            <td>{{ $task->description }}</td>
                                            <td>{{ $task->project->project_name }}</td>
                                            <td>{{ $task->employee->employee_name }}</td>
                                            <td>{{ $task->status }}</td>
                                            <td>{{ $task->start_date }}</td>
                                            <td>{{ $task->end_date }}</td>
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
