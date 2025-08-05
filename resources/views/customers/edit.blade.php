@extends('app')
@section('admin-content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Customer/</span> Edit</h4>

        <!-- Basic Layout -->
        <div class="row">
            <div class="col-md-8">
                <div class="card mb-4">
                    
                    <div class="card-body">
                        <form>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="basic-default-fullname">Full Name</label>
                                    <input type="text" class="form-control" name="name" value="John Doe" />
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="basic-default-phone">Phone No</label>
                                    <input type="text" name="mobile_no" class="form-control phone-mask" value="658 799 8941" />
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="basic-default-phone">GST No</label>
                                    <input type="text" name="gst_no" class="form-control phone-mask" value="658 799 8941" />
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="basic-default-company">City</label>
                                    <input type="text" class="form-control" name="city" value="Gandhinagar" />
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="basic-default-message">Address</label>
                                    <textarea name="address" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="text-end">

                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
