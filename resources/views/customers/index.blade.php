@extends('app')
@section('content')
    <div class="container-fluid py-4">
        {{-- @include('partials._alert') --}}

        <!-- Users List Table -->
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="p-0 m-0">Customer Lists</h5>
                <a href="{{ route('customers.create') }}" class="btn create-new btn-primary" type="button"><span class="d-flex align-items-center gap-2"> <span class="d-none d-sm-inline-block">Add Customer</span></span></a>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead class="table-secondary">
                        <tr>
                            <th>Name</th>
                            <th>Mobile No.</th>
                            <th>GSt No.</th>
                            <th>City</th>
                            <th>Address</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @forelse($customers as $customer)
                            <tr>
                                <td>{{ $customer->name }}</td>
                                <td>{{ $customer->mobile_no }}</td>
                                <td>{{ $customer->gst_no ?: 'N/A' }}</td>
                                <td>{{ $customer->city }}</td>
                                <td>{{ $customer->address }}</td>
                                <td>
                                    <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-sm btn-info">Edit</a>
                                    <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this customer?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">No customers found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{-- <div class="mt-3">
                    {{ $customers->links() }}
                </div> --}}
            </div>
        </div>

    </div>
@endsection
