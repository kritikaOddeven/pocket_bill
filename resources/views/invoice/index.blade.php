@extends('app')
@section('admin-content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="row">
            <div class="col-lg-12 mb-4 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-12">
                            <div class="card-body">
                                <h5 class="card-title text-primary">Invoices</h5>
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <p class="mb-4">Manage your invoices</p>
                                    <a href="{{ route('invoice.create') }}" class="btn btn-primary">
                                        <i class="bx bx-plus"></i> Create Invoice
                                    </a>
                                </div>

                                @if (session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('success') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif

                                <div class="table-responsive text-nowrap">
                                    <table class="table">
                                        <thead class="table-secondary">
                                            <tr>
                                                <th>Bill No.</th>
                                                <th>Customer</th>
                                                <th>Date</th>
                                                <th>Type</th>
                                                <th>Total</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($bills as $bill)
                                                <tr>
                                                    <td>{{ $bill->bill_no }}</td>
                                                    <td>{{ $bill->customerDetails->name ?? 'N/A' }}</td>
                                                    <td>{{ date('d/m/Y', strtotime($bill->date)) }}</td>
                                                    <td>
                                                        @if ($bill->type == 0)
                                                            <span class="badge bg-secondary">Without GST</span>
                                                        @else
                                                            <span class="badge bg-success">With GST</span>
                                                        @endif
                                                    </td>
                                                    <td>₹{{ number_format($bill->total, 2) }}</td>
                                                    <td>
                                                        {{-- <div class="btn-group" role="group"> --}}
                                                            <a href="{{ route('invoice.show', $bill->id) }}" class="btn btn-sm btn-success">
                                                                <i class="bx bx-show"></i> 
                                                            </a>
                                                            <a href="{{ route('invoice.edit', $bill->id) }}" class="btn btn-sm btn-info">
                                                                <i class="bx bx-edit-alt me-1"></i> 
                                                            </a>
                                                            <form action="{{ route('invoice.destroy', $bill->id) }}" method="POST" style="display: inline;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this invoice?')">
                                                                    <i class="bx bx-trash"></i> 
                                                                </button>
                                                            </form>
                                                        {{-- </div> --}}
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="6" class="text-center">No invoices found.</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
