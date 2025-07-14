@extends('layout.admin')

@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Add Appreciation</h4>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('appreciation.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Award Name</label>
                                    <select name="award_name" class="select">
                                        <option value="">Choose Award</option>
                                        <option value="Best Performer">Best Performer</option>
                                        <option value="Employee of the Month">Employee of the Month</option>
                                        <!-- Add more options as needed -->
                                    </select>
                                    @error('award_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Appreciation Amount</label>
                                    <div class="input-groupicon">
                                        <input type="text" name="appreciation_amount" placeholder="Enter Amount" class="form-control">
                                        <div class="addonset">
                                            <img src="{{ asset('assets/admin/img/icons/dollar.svg') }}" alt="img">
                                        </div>
                                    </div>
                                    @error('appreciation_amount')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Given To</label>
                                    <select name="employee_id" class="select">
                                        <option value="">Choose Employee</option>
                                        @foreach($employees as $employee)
                                            <option value="{{ $employee->id }}">{{ $employee->employee_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('employee_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Date</label>
                                    <div class="input-groupicon">
                                        <input type="text" name="date" placeholder="Choose Date" class="datetimepicker form-control">
                                        <div class="addonset">
                                            <img src="{{ asset('assets/admin/img/icons/calendars.svg') }}" alt="img">
                                        </div>
                                    </div>
                                    @error('date')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Summary</label>
                                    <textarea name="summary" class="form-control" placeholder="Enter Summary"></textarea>
                                    @error('summary')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-submit me-2">Submit</button>
                                <a href="{{ route('appreciation.all-appreciation') }}" class="btn btn-cancel">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
