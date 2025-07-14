@extends('layout.admin')

@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Edit Leave</h4>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('leave.update', $leave->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <!-- Choose Employee Dropdown -->
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Choose Employee</label>
                                <select class="select" name="employee_id">
                                    <option>Choose Employee</option>
                                    @foreach($employees as $employee)
                                        <option value="{{ $employee->id }}" {{ $leave->employee_id == $employee->id ? 'selected' : '' }}>
                                            {{ $employee->employee_name }}
                                        </option>
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
                                    <option value="casual" {{ $leave->leave_type == 'casual' ? 'selected' : '' }}>Casual</option>
                                    <option value="sick" {{ $leave->leave_type == 'sick' ? 'selected' : '' }}>Sick</option>
                                    <option value="earned" {{ $leave->leave_type == 'earned' ? 'selected' : '' }}>Earned</option>
                                </select>
                            </div>
                        </div>

                        <!-- Status Dropdown -->
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Status</label>
                                <select class="select" name="status">
                                    <option>Choose Status</option>
                                    <option value="approved" {{ $leave->status == 'approved' ? 'selected' : '' }}>Approved</option>
                                    <option value="pending" {{ $leave->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="rejected" {{ $leave->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                                </select>
                            </div>
                        </div>

                        <!-- Date Picker -->
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Date</label>
                                <div class="input-groupicon">
                                    <input type="text" name="date" placeholder="Choose Date" class="datetimepicker" value="{{ \Carbon\Carbon::parse($leave->date)->format('d-m-Y') }}">
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
                                <textarea class="form-control" name="reason" placeholder="Enter the reason for absence" rows="4">{{ $leave->reason }}</textarea>
                            </div>
                        </div>

                        <!-- Submit and Cancel Buttons -->
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-submit me-2">Update</button>
                            <a href="{{ route('leave.all-leave') }}" class="btn btn-cancel">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
