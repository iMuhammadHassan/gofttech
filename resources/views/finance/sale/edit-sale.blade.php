@extends('layout.admin')

@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Edit Sale</h4>
                    <h6>Modify the sale details</h6>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="expenseCategory">Expense Category</label>
                                    <select class="form-select" id="expenseCategory" name="category">
                                        <option selected disabled>Choose Category</option>
                                        <option value="1">Category 1</option>
                                        <option value="2">Category 2</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="expenseDate">Expense Date</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control datetimepicker" id="expenseDate" name="date" placeholder="Choose Date">
                                        <span class="input-group-text">
                                            <img src="{{ asset('assets/admin/img/icons/calendars.svg') }}" alt="calendar">
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="amount">Amount</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="amount" name="amount" placeholder="Enter Amount">
                                        <span class="input-group-text">
                                            <img src="{{ asset('assets/admin/img/icons/dollar.svg') }}" alt="dollar">
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="referenceNo">Reference No.</label>
                                    <input type="text" class="form-control" id="referenceNo" name="reference_no" placeholder="Enter Reference No.">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="expenseFor">Expense For</label>
                                    <input type="text" class="form-control" id="expenseFor" name="expense_for" placeholder="Enter Expense Details">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter Description"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12 d-flex justify-content-between">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="" class="btn btn-secondary">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
