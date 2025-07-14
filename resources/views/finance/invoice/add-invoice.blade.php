@extends('layout.admin')

@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Add Invoice</h4>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('finance.invoice.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <!-- Invoice Number -->
                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="invoiceNumber">Invoice Number</label>
                                    <input type="text" id="invoiceNumber" name="invoice_number" class="form-control"
                                        placeholder="GOF#" required>
                                </div>
                            </div>
                      
                            <!-- Date -->
                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Date</label>
                                    <div class="input-groupicon">
                                        <input type="text" name="date" placeholder="Choose Date"
                                            class="datetimepicker" required>
                                        <div class="addonset">
                                            <img src="{{ asset('assets/admin/img/icons/calendars.svg') }}"
                                                alt="Calendar Icon">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Due Date -->
                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Due Date</label>
                                    <div class="input-groupicon">
                                        <input type="text" name="due_date" placeholder="Choose Due Date"
                                            class="datetimepicker" required>
                                        <div class="addonset">
                                            <img src="{{ asset('assets/admin/img/icons/calendars.svg') }}"
                                                alt="Calendar Icon">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Currency -->
                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="currency">Currency</label>
                                    <select class="form-control select" id="currency" name="currency" required>
                                        <option value="">Choose Currency</option>
                                        <option value="USD">USD</option>
                                        <option value="PKR">PKR</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Client -->
                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="client">Client</label>
                                    <select class="form-control select" id="client" name="client_id" required>
                                        <option value="">Select Client</option>
                                        @foreach ($clients as $client)
                                            <option value="{{ $client->id }}">{{ $client->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- Project -->
                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="project">Project</label>
                                    <select class="form-control select" id="project" name="project_id" required>
                                        <option value="">Select Project</option>
                                        @foreach ($projects as $project)
                                            <option value="{{ $project->id }}">{{ $project->project_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- Bank Account -->
                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="bankAccount">Bank Account</label>
                                    <select class="form-control select" id="bankAccount" name="bank_id" required>
                                        <option value="">Select Bank</option>
                                        @foreach ($banks as $bank)
                                            <option value="{{ $bank->id }}">{{ $bank->name }}
                                                ({{ $bank->account_number }})</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 col-12">
                            <div class="form-group">
                                <button class="btn btn-success" id="addServiceRow" type="button">
                                    <i class="fa fa-plus"></i> Add Service
                                </button>
                            </div>
                        </div>
                            <!-- Container for Dynamic Rows -->
                        <div id="serviceContainer"></div>
                        
                            <!-- Thank You Note -->
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="thankYouNote">Thank You Note</label>
                                    <textarea class="form-control" id="thankYouNote" name="thank_you_note" rows="3"
                                        placeholder="Enter Thank You Note"></textarea>
                                </div>
                            </div>
                            <!-- Paid Amount Checkbox -->
                            <div class="col-lg-12">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="paidAmount" name="paid_amount">
                                    <label class="form-check-label" for="paidAmount">Invoice for Paid Amount</label>
                                </div>
                            </div>
                            <!-- Signature -->
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="signature">Signature</label>
                                    <input type="text" id="signature" name="signature" class="form-control"
                                        placeholder="Enter Signature">
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ route('finance.invoice.all-invoice') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Include jQuery (if not already included) -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script>
        $(document).ready(function() {

            // HTML for the new service row with remove button
            var serviceRowHtml = `
                <div class="row service-row">
                    <div class="col-lg-4 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="service">Service</label>
                            <select class="form-control select" name="service[]">
                                <option value="">Select Service</option>
                                <option value="development">Development</option>
                                <option value="production">Production</option>
                                <option value="marketing">Marketing</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="text" name="price[]" class="form-control" placeholder="0.00" required>
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description[]" class="form-control" placeholder="Enter description here" rows="3" required></textarea>
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-6 col-12">
                        <button type="button" class="btn btn-danger removeServiceRow">
                            <i class="fa fa-trash"></i> Remove
                        </button>
                    </div>
                </div>
            `;

            // Event handler for the "Add Service" button
            $('#addServiceRow').on('click', function() {
                $('#serviceContainer').append(serviceRowHtml);
            });

            // Event handler for dynamically removing service rows
            $(document).on('click', '.removeServiceRow', function() {
                $(this).closest('.service-row').remove();
            });
        });
    </script>
@endsection
