@extends('layout.admin')

@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Edit Appreciation</h4>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('appreciation.update', $appreciation->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Award Name</label>
                                    <select name="award_name" class="select">
                                        <option value="">Choose Award</option>
                                        <option value="Best Performer" {{ $appreciation->award_name == 'Best Performer' ? 'selected' : '' }}>Best Performer</option>
                                        <option value="Employee of the Month" {{ $appreciation->award_name == 'Employee of the Month' ? 'selected' : '' }}>Employee of the Month</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Appreciation Amount</label>
                                    <div class="input-groupicon">
                                        <input type="text" name="appreciation_amount" placeholder="Enter Amount" class="form-control" value="{{ $appreciation->appreciation_amount }}">
                                        <div class="addonset">
                                            <img src="{{ asset('assets/admin/img/icons/dollar.svg') }}" alt="img">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Given To</label>
                                    <select name="employee_id" class="select">
                                        <option value="">Choose Employee</option>
                                        @foreach($employees as $employee)
                                            <option value="{{ $employee->id }}" {{ $appreciation->employee_id == $employee->id ? 'selected' : '' }}>{{ $employee->employee_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Date</label>
                                    <div class="input-groupicon">
                                        <input type="text" name="date" placeholder="Choose Date" class="datetimepicker form-control" value="{{ $appreciation->date }}">
                                        <div class="addonset">
                                            <img src="{{ asset('assets/admin/img/icons/calendars.svg') }}" alt="img">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Summary</label>
                                    <textarea name="summary" class="form-control" placeholder="Enter Summary">{{ $appreciation->summary }}</textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-submit me-2">Update</button>
                                <a href="{{ route('appreciation.all-appreciation') }}" class="btn btn-cancel">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
