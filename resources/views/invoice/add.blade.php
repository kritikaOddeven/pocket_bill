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
                                    <label class="form-label" for="basic-default-fullname">Category Name</label>
                                    <select class="form-select mb-4" name="cat_id">
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
                                    <label class="form-label" for="basic-default-fullname">SUb-Category Name</label>
                                    <select class="form-select mb-4" name="subcat_id">
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
                                    <label class="form-label" for="basic-default-fullname"> Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="John Doe" />
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
                                    <label class="form-label" for="basic-default-phone">HSN Code</label>
                                    <input type="text" name="hsncode" class="form-control phone-mask @error('hsncode') is-invalid @enderror" value="{{ old('hsncode') }}" placeholder="658 799 8941" />
                                    @error('hsncode')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label class="form-label" for="basic-default-phone">Number </label>
                                    <input type="text" name="number" class="form-control phone-mask @error('number') is-invalid @enderror" value="{{ old('number') }}" placeholder="658 799 8941" />
                                    @error('number')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label class="form-label" for="basic-default-phone">Feet</label>
                                    <input type="text" name="feet" class="form-control phone-mask @error('feet') is-invalid @enderror" value="{{ old('feet') }}" placeholder="GST Number" />
                                    @error('feet')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label class="form-label" for="basic-default-company">Feet Word</label>
                                    <input type="text" class="form-control @error('feet_word') is-invalid @enderror" name="feet_word" value="{{ old('feet_word') }}" placeholder="Gandhinagar" />
                                    @error('feet_word')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                 <div class="col-md-3 mb-3 mt-4">
                                    <div class="form-check form-switch mb-2">
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                        <label class="form-check-label" for="flexSwitchCheckDefault">GST</label>
                                    </div>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label class="form-label" for="basic-default-phone">CGST </label>
                                    <input type="text" name="cgst" class="form-control phone-mask @error('cgst') is-invalid @enderror" value="{{ old('cgst') }}" placeholder="658 799 8941" />
                                    @error('cgst')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label class="form-label" for="basic-default-phone">SGST</label>
                                    <input type="text" name="sgst" class="form-control phone-mask @error('sgst') is-invalid @enderror" value="{{ old('sgst') }}" placeholder="GST Number" />
                                    @error('sgst')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label class="form-label" for="basic-default-company">Estimated Total</label>
                                    <input type="text" class="form-control @error('estimated_total') is-invalid @enderror" name="estimated_total" value="{{ old('estimated_total') }}" placeholder="Gandhinagar" />
                                    @error('estimated_total')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="basic-default-company">Single Price</label>
                                    <input type="text" class="form-control @error('single_price') is-invalid @enderror" name="single_price" value="{{ old('single_price') }}" placeholder="Gandhinagar" />
                                    @error('single_price')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="basic-default-company">Total Price</label>
                                    <input type="text" class="form-control @error('total_price') is-invalid @enderror" name="total_price" value="{{ old('total_price') }}" placeholder="Gandhinagar" />
                                    @error('total_price')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="basic-default-company">Total </label>
                                    <input type="text" class="form-control @error('total') is-invalid @enderror" name="total" value="{{ old('total') }}" placeholder="Gandhinagar" />
                                    @error('total')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
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
