@extends('layout.admin')

@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Edit Proposal</h4>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('finance.proposal.update', $proposal->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <!-- Lead Name -->
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Lead Name</label>
                                    <select name="lead_name" class="select">
                                        <option value="">Select Lead</option>
                                        @foreach($leads as $lead)
                                            <option value="{{ $lead->name }}" {{ $proposal->lead_name == $lead->name ? 'selected' : '' }}>
                                                {{ $lead->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            <!-- Valid Till -->
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Valid Till</label>
                                    <div class="input-groupicon">
                                        <input type="text" name="valid_till" value="{{ $proposal->valid_till }}" placeholder="Choose Date" class="datetimepicker">
                                        <div class="addonset">
                                            <img src="{{ asset('assets/admin/img/icons/calendars.svg') }}" alt="Calendar Icon">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Currency -->
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Currency</label>
                                    <select name="currency" class="select">
                                        <option value="USD" {{ $proposal->currency == 'USD' ? 'selected' : '' }}>USD</option>
                                        <option value="PKR" {{ $proposal->currency == 'PKR' ? 'selected' : '' }}>PKR</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Project -->
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Project</label>
                                    <select name="project" class="select">
                                        <option value="">Select Project</option>
                                        @foreach($projects as $project)
                                            <option value="{{ $project->project_name }}" {{ $proposal->project == $project->project_name ? 'selected' : '' }}>
                                                {{ $project->project_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Amount -->
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Amount</label>
                                    <div class="input-groupicon">
                                        <input type="text" name="amount" value="{{ $proposal->amount }}">
                                        <div class="addonset">
                                            <img src="{{ asset('assets/admin/img/icons/dollar.svg') }}" alt="Dollar Icon">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Description -->
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control" placeholder="Enter Description">{{ $proposal->description }}</textarea>
                                </div>
                            </div>

                            <!-- Signature -->
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Signature</label>
                                    <input type="text" name="signature" value="{{ $proposal->signature }}" placeholder="Enter Signature">
                                </div>
                            </div>

                            <!-- Customer Signature -->
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Customer Signature (Optional)</label>
                                    <input type="text" name="customer_signature" value="{{ $proposal->customer_signature }}" placeholder="Enter Customer Signature">
                                </div>
                            </div>

                            <!-- Thank You Note -->
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Thank You Note</label>
                                    <input type="text" name="thank_you_note" value="{{ $proposal->thank_you_note }}" placeholder="Enter Thank You Note">
                                </div>
                            </div>

                            <!-- Require Customer Signature -->
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>
                                        <input type="checkbox" name="require_customer_signature" value="1" {{ $proposal->require_customer_signature ? 'checked' : '' }}>
                                        <span class="checkmark"></span> Require Customer Signature for Approval
                                    </label>
                                </div>
                            </div>

                            <!-- Submit and Cancel Buttons -->
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-submit me-2">Update</button>
                                <a href="{{ route('finance.proposal.all-proposal') }}" class="btn btn-cancel">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
