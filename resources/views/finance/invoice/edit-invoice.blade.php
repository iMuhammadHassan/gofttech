@extends('layout.admin')

@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Edit Invoice</h4>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('finance.invoice.update', $invoice->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <!-- Invoice Number -->
                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="invoiceNumber">Invoice Number</label>
                                    <input type="text" id="invoiceNumber" name="invoice_number" class="form-control" value="{{ $invoice->invoice_number }}" readonly>
                                </div>
                            </div>
                            
                            <!-- Date -->
                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Date</label>
                                    <div class="input-groupicon">
                                        <input type="text" name="date" value="{{ $invoice->date }}" class="datetimepicker" required>
                                        <div class="addonset">
                                            <img src="{{ asset('assets/admin/img/icons/calendars.svg') }}" alt="Calendar Icon">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Due Date -->
                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Due Date</label>
                                    <div class="input-groupicon">
                                        <input type="text" name="due_date" value="{{ $invoice->due_date }}" class="datetimepicker" required>
                                        <div class="addonset">
                                            <img src="{{ asset('assets/admin/img/icons/calendars.svg') }}" alt="Calendar Icon">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Currency -->
                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="currency">Currency</label>
                                    <select class="form-control select" id="currency" name="currency" required>
                                        <option value="USD" {{ $invoice->currency == 'USD' ? 'selected' : '' }}>USD</option>
                                        <option value="PKR" {{ $invoice->currency == 'PKR' ? 'selected' : '' }}>PKR</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Client -->
                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="client">Client</label>
                                    <select class="form-control select" id="client" name="client_id" required>
                                        @foreach ($clients as $client)
                                            <option value="{{ $client->id }}" {{ $invoice->client_id == $client->id ? 'selected' : '' }}>{{ $client->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Project -->
                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="project">Project</label>
                                    <select class="form-control select" id="project" name="project_id" required>
                                        @foreach ($projects as $project)
                                            <option value="{{ $project->id }}" {{ $invoice->project_id == $project->id ? 'selected' : '' }}>{{ $project->project_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Bank Account -->
                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="bankAccount">Bank Account</label>
                                    <select class="form-control select" id="bankAccount" name="bank_id" required>
                                        @foreach ($banks as $bank)
                                            <option value="{{ $bank->id }}" {{ $invoice->bank_id == $bank->id ? 'selected' : '' }}>{{ $bank->name }} ({{ $bank->account_number }})</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Service Rows -->
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <button class="btn btn-success" id="addServiceRow" type="button">
                                        <i class="fa fa-plus"></i> Add Service
                                    </button>
                                </div>
                            </div>

                            <!-- Container for Dynamic Rows -->
                            <div id="serviceContainer">
                                @foreach ($invoice->items as $item)
                                    <div class="row service-row">
                                        <div class="col-lg-4 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="service">Service</label>
                                                <select class="form-control select" name="service[]">
                                                    <option value="">Select Service</option>
                                                    <option value="development" {{ $item->service == 'development' ? 'selected' : '' }}>Development</option>
                                                    <option value="production" {{ $item->service == 'production' ? 'selected' : '' }}>Production</option>
                                                    <option value="marketing" {{ $item->service == 'marketing' ? 'selected' : '' }}>Marketing</option>
                                                    <option value="other" {{ $item->service == 'other' ? 'selected' : '' }}>Other</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="price">Price</label>
                                                <input type="text" name="price[]" class="form-control" value="{{ $item->price }}" required>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <textarea name="description[]" class="form-control" rows="3" required>{{ $item->description }}</textarea>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-sm-6 col-12">
                                            <button type="button" class="btn btn-danger removeServiceRow">
                                                <i class="fa fa-trash"></i> Remove
                                            </button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                           

                            <!-- Thank You Note -->
                            <div class="col-lg-12 mt-2">
                                <div class="form-group">
                                    <label for="thankYouNote">Thank You Note</label>
                                    <textarea class="form-control" id="thankYouNote" name="thank_you_note" rows="3" placeholder="Enter Thank You Note">{{ $invoice->thank_you_note }}</textarea>
                                </div>
                            </div>

                            <!-- Paid Amount Checkbox -->
                            <div class="col-lg-12">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="paidAmount" name="paid_amount" {{ $invoice->paid_amount ? 'checked' : '' }}>
                                    <label class="form-check-label" for="paidAmount">Invoice for Paid Amount</label>
                                </div>
                            </div>

                            <!-- Signature -->
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="signature">Signature</label>
                                    <input type="text" id="signature" name="signature" class="form-control" placeholder="Enter Signature" value="{{ $invoice->signature }}">
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-primary">Update</button>
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
