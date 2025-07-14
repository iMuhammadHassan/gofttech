@extends('layout.admin')

@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Edit Employee</h4>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('employee.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <!-- Employee Name -->
                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Employee Name</label>
                                    <input type="text" class="form-control" name="employee_name"
                                        value="{{ old('employee_name', $employee->employee_name) }}"
                                        placeholder="Enter Employee Name" required>
                                </div>
                            </div>
                            <!-- Email -->
                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email"
                                        value="{{ old('email', $employee->email) }}" placeholder="Enter Email" required>
                                </div>
                            </div>
                            <!-- Password -->
                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password"
                                        placeholder="Enter Password">
                                    <small class="form-text text-muted">Leave blank if you don't want to change the
                                        password.</small>
                                </div>
                            </div>
                            <!-- Gender -->
                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Gender</label>
                                    <select class="form-control select" name="gender" required>
                                        <option value="">Select Gender</option>
                                        <option value="Male"
                                            {{ old('gender', $employee->gender) == 'Male' ? 'selected' : '' }}>Male</option>
                                        <option value="Female"
                                            {{ old('gender', $employee->gender) == 'Female' ? 'selected' : '' }}>Female
                                        </option>
                                        <option value="Other"
                                            {{ old('gender', $employee->gender) == 'Other' ? 'selected' : '' }}>Other
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <!-- Date of Birth (Custom Date Picker) -->
                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="dob">Date of Birth</label>
                                    <div class="input-groupicon">
                                        <input type="text" id="dob" name="dob" placeholder="Choose Date of Birth" 
                                            class="datetimepicker form-control" 
                                            value="{{ old('dob', $employee->dob ? \Carbon\Carbon::parse($employee->dob)->format('d-m-Y') : '') }}" required>
                                        <div class="addonset">
                                            <img src="{{ asset('assets/admin/img/icons/calendars.svg') }}" alt="img">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Join Date (Custom Date Picker) -->
                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="join_date">Join Date</label>
                                    <div class="input-groupicon">
                                        <input type="text" id="join_date" name="join_date" placeholder="Choose Join Date" 
                                            class="datetimepicker form-control"
                                            value="{{ old('join_date', $employee->join_date ? \Carbon\Carbon::parse($employee->join_date)->format('d-m-Y') : '') }}" required>
                                        <div class="addonset">
                                            <img src="{{ asset('assets/admin/img/icons/calendars.svg') }}" alt="img">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Department -->
                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Department</label>
                                    <select class="form-control select" name="department" required>
                                        <option value="">Select Department</option>
                                        @foreach ($departments as $department)
                                            <option value="{{ $department->id }}"
                                                {{ old('department', $employee->department_id) == $department->id ? 'selected' : '' }}>
                                                {{ $department->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- Designation -->
                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Designation</label>
                                    <select class="form-control select" name="designation" required>
                                        <option value="">Select Designation</option>
                                        @foreach ($designations as $designation)
                                            <option value="{{ $designation->id }}"
                                                {{ old('designation', $employee->designation_id) == $designation->id ? 'selected' : '' }}>
                                                {{ $designation->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- Mobile No -->
                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Mobile No</label>
                                    <input type="text" class="form-control" name="mobile_no"
                                        value="{{ old('mobile_no', $employee->mobile_no) }}" placeholder="Enter Mobile No"
                                        required>
                                </div>
                            </div>
                            
                            <!-- Picture -->
                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Upload Picture</label>
                                    <input type="file" class="form-control" name="picture" accept="image/*">
                                    @if ($employee->picture)
                                        <img src="{{ asset('storage/' . $employee->picture) }}" alt="Current Picture"
                                            class="img-thumbnail mt-2" style="width: 150px;">
                                    @else
                                        <img src="{{ asset('assets/admin/img/placeholder.png') }}" alt="Current Picture"
                                            class="img-thumbnail mt-2" style="width: 150px;">
                                    @endif
                                </div>
                            </div>
                            <!-- Address -->
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea class="form-control" name="address" rows="3" placeholder="Enter Address" required>{{ old('address', $employee->address) }}</textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('employee.all-employee') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
