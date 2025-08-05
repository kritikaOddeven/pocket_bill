@extends('app')
@section('admin-content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Users List Table -->
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="">Invoice Lists</h5>
                <a href="{{url('invoice/add')}}" class="btn create-new btn-primary" type="button"><span class="d-flex align-items-center gap-2"><i class="icon-base bx bx-plus icon-sm"></i> <span class="d-none d-sm-inline-block">Create Invoice</span></span></a>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead class="table-secondary">
                        <tr>
                            <th>Name</th>
                            <th>Bill No.</th>
                            <th>Date</th>
                            <th>Total</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <tr>
                            <td>Albert Cook</td>
                            <td>
                                486458675
                            </td>
                            <td>2025-08-04</td>
                            <td>457</td>
                            <td>
                                <a href="{{url('/invoice/view')}}" class="btn btn-sm btn-success" ><i class="icon-base bx bx-show icon-md"></i></a>
                                <a href="{{url('/customers/edit')}}" class="btn btn-sm btn-info" ><i class="bx bx-edit-alt me-1"></i></a>
                                <a href="" class="btn btn-sm btn-danger" ><i class="bx bx-trash me-1"></i></a>
                                
                            </td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
