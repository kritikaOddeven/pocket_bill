@extends('app')
@section('admin-content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Invoice/</span> Create</h4>

        <!-- Basic Layout -->
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <form action="{{ route('customers.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="basic-default-fullname">Customer Name</label>
                                    <select class="form-select mb-4" name="cust_id">
                                        <option value="Jordan Stevenson">Jordan Stevenson</option>
                                        <option value="Wesley Burland">Wesley Burland</option>
                                        <option value="Vladamir Koschek">Vladamir Koschek</option>
                                        <option value="Tyne Widmore">Tyne Widmore</option>
                                    </select>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="basic-default-phone">Bill Number</label>
                                    <input type="text" name="bill_no" class="form-control phone-mask @error('bill_no') is-invalid @enderror" value="{{ old('bill_no') }}" placeholder="658 799 8941" />
                                    @error('bill_no')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="basic-default-phone">Date</label>
                                    <input type="date" name="date" class="form-control phone-mask @error('date') is-invalid @enderror" value="{{ old('date') }}" placeholder="658 799 8941" />
                                    @error('date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>



                                <div class="col-md-3 mb-3">
                                    <div class="form-check form-switch mb-2">
                                    <label class="form-label" for="basic-default-phone">Type</label>

                                        <input type="checkbox" name="without_gst" value="0"><span>Without GST</span>
                                        <input type="checkbox" name="gst" value="1"><span>GST</span>

                                    </div>
                                </div>

                                <div class="table-responsive text-nowrap">
                                    <table class="table">
                                        <thead class="table-secondary">
                                            <tr>
                                                <th>Name</th>
                                                <th>HSN Code</th>
                                                <th>Number</th>
                                                <th>Feet</th>
                                                <th>Feet Word</th>
                                                <th>Single Price</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0">
                                            <tr>
                                                <td>Albert Cook</td>
                                                <td>
                                                    486458675
                                                </td>
                                                <td>4</td>
                                                <td></td>
                                                <td></td>
                                                <td>100</td>
                                                <td>400</td>

                                            </tr>

                                        </tbody>
                                    </table>
                                </div>


                            </div>
                            <div class="text-end">
                                <a href="{{ route('customers.index') }}" class="btn btn-secondary me-2">Cancel</a>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
