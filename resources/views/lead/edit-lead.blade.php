@extends('layout.admin')

@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Edit Lead</h4>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('lead.update', $lead->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <!-- Name Field -->
                            <div class="col-lg-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name', $lead->name) }}" placeholder="Enter Name" required>
                                </div>
                            </div>
                            <!-- Email Field -->
                            <div class="col-lg-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" value="{{ old('email', $lead->email) }}" placeholder="Enter Email" required>
                                </div>
                            </div>
                            <!-- Phone Number Field -->
                            <div class="col-lg-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input type="text" name="phone_number" class="form-control" value="{{ old('phone_number', $lead->phone_number) }}" placeholder="Enter Phone Number" required>
                                </div>
                            </div>
                            <!-- Lead Source Field (Dropdown) -->
                            <div class="col-lg-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label>Lead Source</label>
                                    <select name="lead_source" class="select form-control" required>
                                        <option value="">Choose Lead Source</option>
                                        <option value="Website" {{ old('lead_source', $lead->lead_source) == 'Website' ? 'selected' : '' }}>Website</option>
                                        <option value="Referral" {{ old('lead_source', $lead->lead_source) == 'Referral' ? 'selected' : '' }}>Referral</option>
                                        <option value="Social Media" {{ old('lead_source', $lead->lead_source) == 'Social Media' ? 'selected' : '' }}>Social Media</option>
                                        <!-- Add more options as needed -->
                                    </select>
                                </div>
                            </div>
                            <!-- Status Field -->
                            <div class="col-lg-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="select form-control" required>
                                        <option value="">Choose Status</option>
                                        <option value="New" {{ old('status', $lead->status) == 'New' ? 'selected' : '' }}>New</option>
                                        <option value="In Progress" {{ old('status', $lead->status) == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                                        <option value="Converted" {{ old('status', $lead->status) == 'Converted' ? 'selected' : '' }}>Converted</option>
                                        <option value="Closed" {{ old('status', $lead->status) == 'Closed' ? 'selected' : '' }}>Closed</option>
                                        <!-- Add more options as needed -->
                                    </select>
                                </div>
                            </div>
                            <!-- Lead Note Field (Textarea) -->
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Lead Note</label>
                                    <textarea name="lead_note" class="form-control" placeholder="Enter Lead Note Details" rows="4">{{ old('lead_note', $lead->lead_note) }}</textarea>
                                </div>
                            </div>
                            <!-- Buttons -->
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-submit me-2">Update</button>
                                <a href="{{ route('lead.all-lead') }}" class="btn btn-cancel">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
