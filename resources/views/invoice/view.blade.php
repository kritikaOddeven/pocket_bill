@extends('app')
@section('admin-content')
    <style>
        @media print {
            body * {
                visibility: hidden;
            }

            .invoice-preview-card,
            .invoice-preview-card * {
                visibility: visible;
            }

            .invoice-preview-card {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                padding: 0;
                margin: 0;
            }

            .invoice-actions {
                display: none !important;
            }
        }
    </style>

    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="row invoice-preview">
            <!-- Invoice -->
            <div class="col-xl-9 col-md-8 col-12 mb-md-0 mb-6">
                <div class="card invoice-preview-card p-sm-12 p-6">
                    <div class="card-body invoice-preview-header rounded">
                        <div class="d-flex justify-content-between flex-xl-row flex-md-column flex-sm-row flex-column align-items-xl-center align-items-md-start align-items-sm-center align-items-start">
                            <div>
                                <h5 class="mb-6">Invoice #{{ $bill->bill_no }}</h5>
                                <p class="mb-1">Date: {{ date('d/m/Y', strtotime($bill->date)) }}</p>
                            </div>
                            <div class="mb-xl-0 mb-6 text-heading">
                                <div class="d-flex svg-illustration mb-6 gap-2 align-items-center">
                                    <span class="app-brand-logo demo">
                                        <span class="text-primary">
                                            <span class="app-brand-text demo fw-bold ms-50 lh-1">Pocket Bill</span>
                                        </span>
                                    </span>
                                </div>
                            </div>
                            <div>
                                <h5 class="mb-6">Type:
                                    @if ($bill->type == 0)
                                        <span class="badge bg-secondary">Without GST</span>
                                    @else
                                        <span class="badge bg-success">With GST</span>
                                    @endif
                                </h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body ">
                        <div class="row">

                            <div class="col-xl-6 col-md-12 col-sm-5 col-12 mb-xl-0 mb-md-6 mb-sm-0 mb-6">
                                <h6>Invoice From:</h6>
                                <p class="mb-1">Company Name: {{ $bill->user->comp_name }}</p>
                                <p class="mb-1">Address: {{ $bill->user->address }}</p>
                                <p class="mb-1">Mobile No.: {{ $bill->user->mobile }}</p>
                                @if ($bill->user->gst)
                                    <p class="mb-0">GST: {{ $bill->user->gst }}</p>
                                @endif

                            </div>
                            <div class="col-xl-6 col-md-12 col-sm-5 col-12 mb-xl-0 mb-md-6 mb-sm-0 mb-6">
                                <h6>Invoice To:</h6>
                                @if ($bill->customerDetails)
                                    <p class="mb-1">Nmae: {{ $bill->customerDetails->name }}</p>
                                    <p class="mb-1">Address: {{ $bill->customerDetails->address }}</p>
                                    <p class="mb-1">City: {{ $bill->customerDetails->city }}</p>
                                    <p class="mb-1">Mobile No.: {{ $bill->customerDetails->mobile_no }}</p>
                                    @if ($bill->customerDetails->gst_no)
                                        <p class="mb-0">GST: {{ $bill->customerDetails->gst_no }}</p>
                                    @endif
                                @else
                                    <p class="mb-0">Customer information not available</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive border border-bottom-0 border-top-0 rounded">
                        <table class="table m-0">
                            <thead>
                                <tr>
                                    <th>Item</th>
                                    <th>HSN Code</th>
                                    <th>Number/Pieces</th>
                                    <th>Feet</th>
                                    <th>Feet Word</th>
                                    <th>Unit Price</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bill->billDetails as $item)
                                    <tr>
                                        <td class="text-nowrap text-heading">{{ $item->name }}</td>
                                        <td class="text-nowrap">{{ $item->hsncode }}</td>
                                        <td>{{ $item->number ?: '-' }}</td>
                                        <td>{{ $item->feet ?: '-' }}</td>
                                        <td>{{ $item->feet_word ?: '-' }}</td>
                                        <td>₹{{ number_format($item->single_price, 2) }}</td>
                                        <td>₹{{ number_format($item->total_price, 2) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="table-responsive m-3">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td class="align-top pe-6 ps-0 py-6 text-body">
                                        <p class="mb-1">
                                            <span class="me-2 h6">Invoice Type:</span>
                                            <span>
                                                @if ($bill->type == 0)
                                                    Without GST
                                                @else
                                                    With GST (CGST: {{ number_format($bill->cgst, 2) }}, SGST: {{ number_format($bill->sgst, 2) }})
                                                @endif
                                            </span>
                                        </p>
                                        <span>Thank you for your business!</span>
                                    </td>
                                    <td class="px-0 py-6 w-px-100">
                                        <p class="mb-2">Subtotal:</p>
                                        @if ($bill->type == 1)
                                            <p class="mb-2">CGST:</p>
                                            <p class="mb-2">SGST:</p>
                                        @endif
                                        <p class="mb-0 border-bottom pb-2">Total:</p>
                                    </td>
                                    <td class="text-end px-0 py-6 w-px-100 fw-medium text-heading">
                                        <p class="fw-medium mb-2">₹{{ number_format($bill->estimated_total, 2) }}</p>
                                        @if ($bill->type == 1)
                                            <p class="fw-medium mb-2">₹{{ number_format($bill->cgst, 2) }}</p>
                                            <p class="fw-medium mb-2">₹{{ number_format($bill->sgst, 2) }}</p>
                                        @endif
                                        <p class="fw-medium mb-0 border-bottom pb-2">₹{{ number_format($bill->total, 2) }}</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <hr class="mt-0 mb-6">

                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-6 col-md-12 col-sm-5 col-12 mb-xl-0 mb-md-6 mb-sm-0 mb-6">
                                <p class="mb-1">Bank Name: {{ $bill->user->bank_branch }}</p>
                                <p class="mb-1">A/C No.: {{ $bill->user->bank_ac_no }}</p>
                                <p class="mb-1">IFSC No.: {{ $bill->user->bank_ifsc }}</p>
                            </div>

                            <div class="col-xl-6 col-md-12 col-sm-5 col-12 mb-xl-0 mb-md-6 mb-sm-0 mb-6 text-end">
                                <h6>हस्ताक्षर (Signature)</h6>
                                <p>................................</p>

                            </div>
                        </div>
                    </div>
                    <div class="card-body p-2">
                        <div class="row">
                            <div class="col-12">
                                <span class="fw-medium text-heading">Note:</span>
                                <span>This is a computer generated invoice. No signature required.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Invoice -->

            <!-- Invoice Actions -->
            <div class="col-xl-3 col-md-4 col-12 invoice-actions">
                <div class="card">
                    <div class="card-body">
                        <button class="btn btn-success d-grid w-100 mb-4" onclick="window.print()">Download</button>
                        <div class="d-flex mb-4">
                            <a class="btn btn-secondary d-grid w-100 me-4" onclick="window.print()"> Print </a>
                            <a href="{{ route('invoice.edit', $bill->id) }}" class="btn btn-info d-grid w-100"> Edit </a>
                        </div>
                        <a href="{{ route('invoice.index') }}" class="btn btn-primary d-grid w-100 mb-4">Back to List</a>

                    </div>
                </div>
            </div>
            <!-- /Invoice Actions -->
        </div>
    </div>
@endsection
