@extends('layout.admin')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="page-title">
                    <h4>All Tasks</h4>
                    <h6>Manage your tasks</h6>
                </div>
                <div class="page-btn">
                    <a href="{{ route('work.task.add-task') }}" class="btn btn-added">
                        <img src="{{ asset('assets/admin/img/icons/plus.svg') }}" class="me-2" alt="img">Add New Task
                    </a>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-top">
                        <div class="search-set">
                            <div class="search-path">
                                <a class="btn btn-filter" id="filter_search">
                                    <img src="{{ asset('assets/admin/img/icons/filter.svg') }}" alt="Filter">
                                    <span><img src="{{ asset('assets/admin/img/icons/closes.svg') }}" alt="Close"></span>
                                </a>
                            </div>
                            <div class="search-input">
                                <a class="btn btn-searchset">
                                    <img src="{{ asset('assets/admin/img/icons/search-white.svg') }}" alt="Search">
                                </a>
                            </div>
                        </div>
                        <div class="wordset">
                            <!-- Export and PDF Buttons -->
                            <ul>
                                <li>
                                    <a href="{{ route('work.task.export-pdf') }}" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="PDF">
                                        <img src="{{ asset('assets/admin/img/icons/pdf.svg') }}" alt="PDF">
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('work.task.export-excel') }}" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="CSV">
                                        <img src="{{ asset('assets/admin/img/icons/excel.svg') }}" alt="CSV">
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Task Table -->
                    <div class="table-responsive">
                        <table class="table datanew">
                            <thead>
                                <tr>

                                    <th>Project Name</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Assigned To</th>
                                    <th>Status</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tasks as $task)
                                    <tr>

                                        <td>{{ $task->project->project_name }}</td>
                                        <td>{{ \Carbon\Carbon::parse($task->start_date)->format('d M Y') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($task->end_date)->format('d M Y') }}</td>
                                        <td>{{ $task->employee->employee_name }}</td>
                                        <td>
                                            <form action="{{ route('work.task.update-status', $task->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <select name="status" class="select form-control" required
                                                    onchange="this.form.submit()">
                                                    <option value="Pending"
                                                        {{ $task->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                                    <option value="In Progress"
                                                        {{ $task->status == 'In Progress' ? 'selected' : '' }}>In Progress
                                                    </option>
                                                    <option value="Completed"
                                                        {{ $task->status == 'Completed' ? 'selected' : '' }}>Completed
                                                    </option>
                                                </select>
                                            </form>
                                        </td>
                                        <td>{{ $task->description }}</td>
                                        <td>
                                            <a class="me-3" href="{{ route('work.task.edit-task', $task->id) }}">
                                                <img src="{{ asset('assets/admin/img/icons/edit.svg') }}" alt="Edit">
                                            </a>
                                            <form action="{{ route('work.task.destroy', $task->id) }}" method="POST"
                                                style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-link text-danger p-0"
                                                    onclick="return confirm('Are you sure you want to delete this task?')">
                                                    <img src="{{ asset('assets/admin/img/icons/delete.svg') }}"
                                                        alt="Delete">
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
