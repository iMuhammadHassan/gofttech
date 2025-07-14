@extends('layout.admin')

@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Add Client</h4>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <!-- Display Global Validation Errors -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('client.store-client') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <!-- Salutation -->
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Salutation</label>
                                    <select class="select" name="salutation">
                                        <option value="">Choose Salutation</option>
                                        <option value="Mr" {{ old('salutation') == 'Mr' ? 'selected' : '' }}>Mr</option>
                                        <option value="Mrs" {{ old('salutation') == 'Mrs' ? 'selected' : '' }}>Mrs</option>
                                    </select>
                                    @if($errors->has('salutation'))
                                        <small class="text-danger">{{ $errors->first('salutation') }}</small>
                                    @endif
                                </div>
                            </div>

                            <!-- Name -->
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter Name" value="{{ old('name') }}">
                                    @if($errors->has('name'))
                                        <small class="text-danger">{{ $errors->first('name') }}</small>
                                    @endif
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Enter Email" value="{{ old('email') }}">
                                    @if($errors->has('email'))
                                        <small class="text-danger">{{ $errors->first('email') }}</small>
                                    @endif
                                </div>
                            </div>

                            <!-- Phone No -->
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Phone No</label>
                                    <input type="text" class="form-control" name="phone_no" placeholder="Enter Phone Number" value="{{ old('phone_no') }}">
                                    @if($errors->has('phone_no'))
                                        <small class="text-danger">{{ $errors->first('phone_no') }}</small>
                                    @endif
                                </div>
                            </div>

                            <!-- Password -->
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="Enter Password">
                                    @if($errors->has('password'))
                                        <small class="text-danger">{{ $errors->first('password') }}</small>
                                    @endif
                                </div>
                            </div>

                            <!-- Profile -->
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Profile</label>
                                    <input type="file" class="form-control" name="profile">
                                    @if($errors->has('profile'))
                                        <small class="text-danger">{{ $errors->first('profile') }}</small>
                                    @endif
                                </div>
                            </div>

                            <!-- Country -->
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Country</label>
                                    <input type="text" class="form-control" name="country" placeholder="Enter Country" value="{{ old('country') }}">
                                    @if($errors->has('country'))
                                        <small class="text-danger">{{ $errors->first('country') }}</small>
                                    @endif
                                </div>
                            </div>

                            <!-- Note -->
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Note</label>
                                    <textarea class="form-control" name="note" placeholder="Enter Note">{{ old('note') }}</textarea>
                                    @if($errors->has('note'))
                                        <small class="text-danger">{{ $errors->first('note') }}</small>
                                    @endif
                                </div>
                            </div>

                            <!-- Submit and Cancel Buttons -->
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-submit me-2">Submit</button>
                                <a href="{{ route('client.all-client') }}" class="btn btn-cancel">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
