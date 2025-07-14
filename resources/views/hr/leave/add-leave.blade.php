@extends('layout.admin')

@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Add Leave</h4>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('leave.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <!-- Choose Employee Dropdown -->
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Choose Employee</label>
                                <select class="select" name="employee_id">
                                    <option>Choose Employee</option>
                                    @foreach($employees as $employee)
                                        <option value="{{ $employee->id }}">{{ $employee->employee_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Leave Type Dropdown -->
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Leave Type</label>
                                <select class="select" name="leave_type">
                                    <option>Choose Leave Type</option>
                                    <option value="casual">Casual</option>
                                    <option value="sick">Sick</option>
                                    <option value="earned">Earned</option>
                                </select>
                            </div>
                        </div>

                        <!-- Status Dropdown -->
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Status</label>
                                <select class="select" name="status">
                                    <option>Choose Status</option>
                                    <option value="approved">Approved</option>
                                    <option value="pending">Pending</option>
                                    <option value="rejected">Rejected</option>
                                </select>
                            </div>
                        </div>

                        <!-- Date Picker -->
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Date</label>
                                <div class="input-groupicon">
                                    <input type="text" name="date" placeholder="Choose Date" class="datetimepicker">
                                    <div class="addonset">
                                        <img src="{{ asset('assets/admin/img/icons/calendars.svg') }}" alt="img">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Reason of Absence Textarea -->
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Reason of Absence</label>
                                <textarea class="form-control" name="reason" placeholder="Enter the reason for absence" rows="4"></textarea>
                            </div>
                        </div>

                        <!-- Submit and Cancel Buttons -->
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-submit me-2">Submit</button>
                            <a href="{{ route('leave.all-leave') }}" class="btn btn-cancel">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
