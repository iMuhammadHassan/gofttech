@extends('layout.admin')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="page-title">
                    <h4>Edit Expense</h4>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('finance.expense.update', $expense->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" name="title" placeholder="Enter Title" value="{{ old('title', $expense->title) }}" class="form-control">
                                    @error('title')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Price</label>
                                    <div class="input-groupicon">
                                        <input type="text" name="price" placeholder="Enter Price" value="{{ old('price', $expense->price) }}" class="form-control">
                                        <div class="addonset">
                                            <img src="{{ asset('assets/admin/img/icons/dollar.svg') }}" alt="img">
                                        </div>
                                    </div>
                                    @error('price')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Purchased Date</label>
                                    <div class="input-groupicon">
                                        <input type="text" name="purchased_date" placeholder="Choose Date" class="datetimepicker form-control" value="{{ old('purchased_date', \Carbon\Carbon::parse($expense->purchased_date)->format('d-m-Y')) }}">
                                        <div class="addonset">
                                            <img src="{{ asset('assets/admin/img/icons/calendars.svg') }}" alt="img">
                                        </div>
                                    </div>
                                    @error('purchased_date')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Category Dropdown -->
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Category</label>
                                    <select class="select form-control" name="category">
                                        <option value="">Choose Category</option>
                                        <option value="office_supplies" {{ old('category', $expense->category) == 'office_supplies' ? 'selected' : '' }}>Office Supplies</option>
                                        <option value="fixed" {{ old('category', $expense->category) == 'fixed' ? 'selected' : '' }}>Fixed</option>
                                        <option value="daily" {{ old('category', $expense->category) == 'daily' ? 'selected' : '' }}>Daily</option>
                                    </select>
                                    @error('category')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Project</label>
                                    <input type="text" name="project" placeholder="Enter Project" value="{{ old('project', $expense->project) }}" class="form-control">
                                    @error('project')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Bank</label>
                                    <input type="text" name="bank" placeholder="Enter Bank" value="{{ old('bank', $expense->bank) }}" class="form-control">
                                    @error('bank')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Receipt</label>
                                    <input type="file" name="receipt" class="form-control">
                                    @if($expense->receipt)
                                        <a href="{{ Storage::url($expense->receipt) }}" target="_blank">View Current Receipt</a>
                                    @endif
                                    @error('receipt')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" name="description" placeholder="Enter Description">{{ old('description', $expense->description) }}</textarea>
                                    @error('description')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-submit me-2">Update</button>
                                <a href="{{ route('finance.expense.all-expense') }}" class="btn btn-cancel">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
