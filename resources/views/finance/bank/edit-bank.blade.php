@extends('layout.admin')

@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Edit Bank</h4>
                    <h6>Modify the bank details</h6>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('finance.bank.update', $bank->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-lg-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="bankName">Bank Name</label>
                                    <input type="text" class="form-control" id="bankName" name="name" value="{{ old('name', $bank->name) }}" placeholder="Enter Bank Name">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="accountHolder">Account Holder</label>
                                    <input type="text" class="form-control" id="accountHolder" name="account_holder" value="{{ old('account_holder', $bank->account_holder) }}" placeholder="Enter Account Holder Name">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="accountNumber">Account Number</label>
                                    <input type="text" class="form-control" id="accountNumber" name="account_number" value="{{ old('account_number', $bank->account_number) }}" placeholder="Enter Account Number">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="contactNumber">Contact Number</label>
                                    <input type="text" class="form-control" id="contactNumber" name="contact_number" value="{{ old('contact_number', $bank->contact_number) }}" placeholder="Enter Contact Number">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-select" id="status" name="status">
                                        <option value="Active" {{ old('status', $bank->status) == 'Active' ? 'selected' : '' }}>Active</option>
                                        <option value="Inactive" {{ old('status', $bank->status) == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12 d-flex justify-content-between">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('finance.bank.all-bank') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
