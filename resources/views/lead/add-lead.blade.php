@extends('layout.admin')

@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Add Lead</h4>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('lead.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <!-- Name Field -->
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter Name" required>
                                </div>
                            </div>
                            
                            <!-- Email Field -->
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
                                </div>
                            </div>

                            <!-- Phone Number Field -->
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input type="text" name="phone_number" class="form-control" placeholder="Enter Phone Number" required>
                                </div>
                            </div>
                            
                            <!-- Lead Source Field (Dropdown) -->
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Lead Source</label>
                                    <select name="lead_source" class="select form-control" required>
                                        <option value="">Choose Lead Source</option>
                                        <option value="Website">Website</option>
                                        <option value="Referral">Referral</option>
                                        <option value="Social Media">Social Media</option>
                                        <option value="Email Campaign">Email Campaign</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Status Field (Dropdown) -->
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="select form-control" required>
                                        <option value="">Choose Status</option>
                                        <option value="New">New</option>
                                        <option value="In Progress">In Progress</option>
                                        <option value="Converted">Converted</option>
                                        <option value="Closed">Closed</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Lead Note Field (Text Area) -->
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Lead Note</label>
                                    <textarea name="lead_note" class="form-control" rows="4" placeholder="Enter Lead Note"></textarea>
                                </div>
                            </div>
                            
                            <!-- Submit and Cancel Buttons -->
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-submit me-2">Submit</button>
                                <a href="{{ route('lead.all-lead') }}" class="btn btn-cancel">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
