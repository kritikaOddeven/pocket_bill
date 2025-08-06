@extends('app')
@section('admin-content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="row invoice-preview">
            <!-- Invoice -->
            <div class="col-xl-9 col-md-8 col-12 mb-md-0 mb-6">
                <div class="card invoice-preview-card p-sm-12 p-6">
                    <div class="card-body invoice-preview-header rounded">
                        <div class="d-flex justify-content-between flex-xl-row flex-md-column flex-sm-row flex-column align-items-xl-center align-items-md-start align-items-sm-center align-items-start">
                            <div>
                                <h5 class="mb-6">GST No. #86423</h5>
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
                                <h5 class="mb-6">Mobile No. 58673765</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-xl-6 col-md-12 col-sm-5 col-12 mb-xl-0 mb-md-6 mb-sm-0 mb-6">
                                <h6>Invoice To:</h6>
                                <p class="mb-1">Thomas shelby</p>
                                <p class="mb-1">Shelby Company Limited</p>
                                <p class="mb-1">Small Heath, B10 0HF, UK</p>
                                <p class="mb-1">718-986-6062</p>
                                <p class="mb-0">peakyFBlinders@gmail.com</p>
                            </div>
                            <div class="col-xl-6 col-md-12 col-sm-7 col-12">
                                <h6>Bill To:</h6>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="pe-4">Total Due:</td>
                                            <td class="fw-medium">$12,110.55</td>
                                        </tr>
                                        <tr>
                                            <td class="pe-4">Bank name:</td>
                                            <td>American Bank</td>
                                        </tr>
                                        <tr>
                                            <td class="pe-4">Country:</td>
                                            <td>United States</td>
                                        </tr>
                                        <tr>
                                            <td class="pe-4">IBAN:</td>
                                            <td>ETD95476213874685</td>
                                        </tr>
                                        <tr>
                                            <td class="pe-4">SWIFT code:</td>
                                            <td>BR91905</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive border border-bottom-0 border-top-0 rounded">
                        <table class="table m-0">
                            <thead>
                                <tr>
                                    <th>Item</th>
                                    <th>Description</th>
                                    <th>Cost</th>
                                    <th>Qty</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-nowrap text-heading">Vuexy Admin Template</td>
                                    <td class="text-nowrap">HTML Admin Template</td>
                                    <td>32</td>
                                    <td>1</td>
                                    <td>32.00</td>
                                </tr>
                                <tr>
                                    <td class="text-nowrap text-heading">Frest Admin Template</td>
                                    <td class="text-nowrap">Angular Admin Template</td>
                                    <td>22</td>
                                    <td>1</td>
                                    <td>22.00</td>
                                </tr>
                                <tr>
                                    <td class="text-nowrap text-heading">Apex Admin Template</td>
                                    <td class="text-nowrap">HTML Admin Template</td>
                                    <td>17</td>
                                    <td>2</td>
                                    <td>34.00</td>
                                </tr>
                                <tr>
                                    <td class="text-nowrap text-heading">Robust Admin Template</td>
                                    <td class="text-nowrap">React Admin Template</td>
                                    <td>66</td>
                                    <td>1</td>
                                    <td>66.00</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="table-responsive m-3">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td class="align-top pe-6 ps-0 py-6 text-body">
                                        <p class="mb-1">
                                            <span class="me-2 h6">Salesperson:</span>
                                            <span>Alfie Solomons</span>
                                        </p>
                                        <span>Thanks for your business</span>
                                    </td>
                                    <td class="px-0 py-6 w-px-100">
                                        <p class="mb-2">Subtotal:</p>
                                        <p class="mb-2">Discount:</p>
                                        <p class="mb-2 border-bottom pb-2">Tax:</p>
                                        <p class="mb-0">Total:</p>
                                    </td>
                                    <td class="text-end px-0 py-6 w-px-100 fw-medium text-heading">
                                        <p class="fw-medium mb-2">1800</p>
                                        <p class="fw-medium mb-2">28</p>
                                        <p class="fw-medium mb-2 border-bottom pb-2">21%</p>
                                        <p class="fw-medium mb-0">1690</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <hr class="mt-0 mb-6">
                    <div class="card-body p-2">
                        <div class="row">
                            <div class="col-12">
                                <span class="fw-medium text-heading">Note:</span>
                                <span>It was a pleasure working with you and your team. We hope you will keep us in mind for future freelance projects. Thank You!</span>
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
                        
                        <div class="d-flex mb-4">
                            <a class="btn btn-secondary d-grid w-100 me-4" target="_blank" href="./app-invoice-print.html"> Print </a>
                            <a href="./app-invoice-edit.html" class="btn btn-info d-grid w-100"> Edit </a>
                        </div>
                        <button class="btn btn-primary d-grid w-100 mb-4">Download</button>
                        
                    </div>
                </div>
            </div>
            <!-- /Invoice Actions -->
        </div>

        

    </div>
@endsection
