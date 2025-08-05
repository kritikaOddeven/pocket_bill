@extends('app')
@section('admin-content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="row invoice-preview">
            <!-- Invoice -->
            <div class="col-xl-9 col-md-8 col-12 mb-md-0 mb-6">
                <div class="card invoice-preview-card p-sm-12 p-6">
                    <div class="card-body invoice-preview-header rounded">
                        <div class="d-flex justify-content-between flex-xl-row flex-md-column flex-sm-row flex-column align-items-xl-center align-items-md-start align-items-sm-center align-items-start">
                            <div class="mb-xl-0 mb-6 text-heading">
                                <div class="d-flex svg-illustration mb-6 gap-2 align-items-center">
                                    <span class="app-brand-logo demo">
                                        <span class="text-primary">

                                            <svg width="25" viewBox="0 0 25 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <defs>
                                                    <path d="M13.7918663,0.358365126 L3.39788168,7.44174259 C0.566865006,9.69408886 -0.379795268,12.4788597 0.557900856,15.7960551 C0.68998853,16.2305145 1.09562888,17.7872135 3.12357076,19.2293357 C3.8146334,19.7207684 5.32369333,20.3834223 7.65075054,21.2172976 L7.59773219,21.2525164 L2.63468769,24.5493413 C0.445452254,26.3002124 0.0884951797,28.5083815 1.56381646,31.1738486 C2.83770406,32.8170431 5.20850219,33.2640127 7.09180128,32.5391577 C8.347334,32.0559211 11.4559176,30.0011079 16.4175519,26.3747182 C18.0338572,24.4997857 18.6973423,22.4544883 18.4080071,20.2388261 C17.963753,17.5346866 16.1776345,15.5799961 13.0496516,14.3747546 L10.9194936,13.4715819 L18.6192054,7.984237 L13.7918663,0.358365126 Z" id="path-1"></path>
                                                    <path d="M5.47320593,6.00457225 C4.05321814,8.216144 4.36334763,10.0722806 6.40359441,11.5729822 C8.61520715,12.571656 10.0999176,13.2171421 10.8577257,13.5094407 L15.5088241,14.433041 L18.6192054,7.984237 C15.5364148,3.11535317 13.9273018,0.573395879 13.7918663,0.358365126 C13.5790555,0.511491653 10.8061687,2.3935607 5.47320593,6.00457225 Z" id="path-3"></path>
                                                    <path d="M7.50063644,21.2294429 L12.3234468,23.3159332 C14.1688022,24.7579751 14.397098,26.4880487 13.008334,28.506154 C11.6195701,30.5242593 10.3099883,31.790241 9.07958868,32.3040991 C5.78142938,33.4346997 4.13234973,34 4.13234973,34 C4.13234973,34 2.75489982,33.0538207 2.37032616e-14,31.1614621 C-0.55822714,27.8186216 -0.55822714,26.0572515 -4.05231404e-15,25.8773518 C0.83734071,25.6075023 2.77988457,22.8248993 3.3049379,22.52991 C3.65497346,22.3332504 5.05353963,21.8997614 7.50063644,21.2294429 Z" id="path-4"></path>
                                                    <path d="M20.6,7.13333333 L25.6,13.8 C26.2627417,14.6836556 26.0836556,15.9372583 25.2,16.6 C24.8538077,16.8596443 24.4327404,17 24,17 L14,17 C12.8954305,17 12,16.1045695 12,15 C12,14.5672596 12.1403557,14.1461923 12.4,13.8 L17.4,7.13333333 C18.0627417,6.24967773 19.3163444,6.07059163 20.2,6.73333333 C20.3516113,6.84704183 20.4862915,6.981722 20.6,7.13333333 Z" id="path-5"></path>
                                                </defs>
                                                <g id="g-app-brand" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <g id="Brand-Logo" transform="translate(-27.000000, -15.000000)">
                                                        <g id="Icon" transform="translate(27.000000, 15.000000)">
                                                            <g id="Mask" transform="translate(0.000000, 8.000000)">
                                                                <mask id="mask-2" fill="white">
                                                                    <use xlink:href="#path-1"></use>
                                                                </mask>
                                                                <use fill="currentColor" xlink:href="#path-1"></use>
                                                                <g id="Path-3" mask="url(#mask-2)">
                                                                    <use fill="currentColor" xlink:href="#path-3"></use>
                                                                    <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-3"></use>
                                                                </g>
                                                                <g id="Path-4" mask="url(#mask-2)">
                                                                    <use fill="currentColor" xlink:href="#path-4"></use>
                                                                    <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-4"></use>
                                                                </g>
                                                            </g>
                                                            <g id="Triangle" transform="translate(19.000000, 11.000000) rotate(-300.000000) translate(-19.000000, -11.000000) ">
                                                                <use fill="currentColor" xlink:href="#path-5"></use>
                                                                <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-5"></use>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg>
                                        </span>
                                    </span>
                                    <span class="app-brand-text demo fw-bold ms-50 lh-1">Sneat</span>
                                </div>
                                <p class="mb-2">Office 149, 450 South Brand Brooklyn</p>
                                <p class="mb-2">San Diego County, CA 91905, USA</p>
                                <p class="mb-0">+1 (123) 456 7891, +44 (876) 543 2198</p>
                            </div>
                            <div>
                                <h5 class="mb-6">Invoice #86423</h5>
                                <div class="mb-1 text-heading">
                                    <span>Date Issues:</span>
                                    <span class="fw-medium">April 25, 2021</span>
                                </div>
                                <div class="text-heading">
                                    <span>Date Due:</span>
                                    <span class="fw-medium">May 25, 2021</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0">
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
                                    <td>$32</td>
                                    <td>1</td>
                                    <td>$32.00</td>
                                </tr>
                                
                                <tr>
                                    <td class="text-nowrap text-heading">Robust Admin Template</td>
                                    <td class="text-nowrap">React Admin Template</td>
                                    <td>$66</td>
                                    <td>1</td>
                                    <td>$66.00</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="table-responsive">
                        <table class="table m-0 table-borderless">
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
                                        <p class="fw-medium mb-2">$1800</p>
                                        <p class="fw-medium mb-2">$28</p>
                                        <p class="fw-medium mb-2 border-bottom pb-2">21%</p>
                                        <p class="fw-medium mb-0">$1690</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <hr class="mt-0 mb-6">
                    <div class="card-body p-0">
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
                            <a class="btn btn-success d-grid w-100 me-4" target="_blank" href="./app-invoice-print.html"> Print </a>
                            <a href="./app-invoice-edit.html" class="btn btn-info d-grid w-100"> Edit </a>
                        </div>
                        <button class="btn btn-secondary d-grid w-100 mb-4">Download</button>
                        
                    </div>
                </div>
            </div>
            <!-- /Invoice Actions -->
        </div>

        <!-- Offcanvas -->
        <!-- Send Invoice Sidebar -->
        <div class="offcanvas offcanvas-end" id="sendInvoiceOffcanvas" aria-hidden="true">
            <div class="offcanvas-header mb-6 border-bottom">
                <h5 class="offcanvas-title">Send Invoice</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body pt-0 flex-grow-1">
                <form>
                    <div class="mb-6">
                        <label for="invoice-from" class="form-label">From</label>
                        <input type="text" class="form-control" id="invoice-from" value="shelbyComapny@email.com" placeholder="company@email.com">
                    </div>
                    <div class="mb-6">
                        <label for="invoice-to" class="form-label">To</label>
                        <input type="text" class="form-control" id="invoice-to" value="qConsolidated@email.com" placeholder="company@email.com">
                    </div>
                    <div class="mb-6">
                        <label for="invoice-subject" class="form-label">Subject</label>
                        <input type="text" class="form-control" id="invoice-subject" value="Invoice of purchased Admin Templates" placeholder="Invoice regarding goods">
                    </div>
                    <div class="mb-6">
                        <label for="invoice-message" class="form-label">Message</label>
                        <textarea class="form-control" name="invoice-message" id="invoice-message" cols="3" rows="8">Dear Queen Consolidated,
          Thank you for your business, always a pleasure to work with you!
          We have generated a new invoice in the amount of $95.59
          We would appreciate payment of this invoice by 05/11/2021</textarea>
                    </div>
                    <div class="mb-6">
                        <span class="badge bg-label-primary">
                            <i class="icon-base bx bx-link icon-xs"></i>
                            <span class="align-middle">Invoice Attached</span>
                        </span>
                    </div>
                    <div class="mb-6 d-flex flex-wrap">
                        <button type="button" class="btn btn-primary me-4" data-bs-dismiss="offcanvas">Send</button>
                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /Send Invoice Sidebar -->

        <!-- Add Payment Sidebar -->
        <div class="offcanvas offcanvas-end" id="addPaymentOffcanvas" aria-hidden="true">
            <div class="offcanvas-header border-bottom">
                <h5 class="offcanvas-title">Add Payment</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body flex-grow-1">
                <div class="d-flex justify-content-between bg-lighter p-2 mb-4">
                    <p class="mb-0">Invoice Balance:</p>
                    <p class="fw-medium mb-0">$5000.00</p>
                </div>
                <form>
                    <div class="mb-6">
                        <label class="form-label" for="invoiceAmount">Payment Amount</label>
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="text" id="invoiceAmount" name="invoiceAmount" class="form-control invoice-amount" placeholder="100">
                        </div>
                    </div>
                    <div class="mb-6">
                        <label class="form-label" for="payment-date">Payment Date</label>
                        <div class="flatpickr-wrapper"><input id="payment-date" class="form-control invoice-date flatpickr-input" type="text" readonly="readonly">
                            <div class="flatpickr-calendar animate static" tabindex="-1">
                                <div class="flatpickr-months"><span class="flatpickr-prev-month"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 17 17">
                                            <g></g>
                                            <path d="M5.207 8.471l7.146 7.147-0.707 0.707-7.853-7.854 7.854-7.853 0.707 0.707-7.147 7.146z"></path>
                                        </svg></span>
                                    <div class="flatpickr-month">
                                        <div class="flatpickr-current-month"><span class="cur-month">August </span>
                                            <div class="numInputWrapper"><input class="numInput cur-year" type="number" tabindex="-1" aria-label="Year"><span class="arrowUp"></span><span class="arrowDown"></span></div>
                                        </div>
                                    </div><span class="flatpickr-next-month"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 17 17">
                                            <g></g>
                                            <path d="M13.207 8.472l-7.854 7.854-0.707-0.707 7.146-7.146-7.146-7.148 0.707-0.707 7.854 7.854z"></path>
                                        </svg></span>
                                </div>
                                <div class="flatpickr-innerContainer">
                                    <div class="flatpickr-rContainer">
                                        <div class="flatpickr-weekdays">
                                            <div class="flatpickr-weekdaycontainer">
                                                <span class="flatpickr-weekday">
                                                    Sun</span><span class="flatpickr-weekday">Mon</span><span class="flatpickr-weekday">Tue</span><span class="flatpickr-weekday">Wed</span><span class="flatpickr-weekday">Thu</span><span class="flatpickr-weekday">Fri</span><span class="flatpickr-weekday">Sat
                                                </span>
                                            </div>
                                        </div>
                                        <div class="flatpickr-days" tabindex="-1">
                                            <div class="dayContainer"><span class="flatpickr-day prevMonthDay" aria-label="July 27, 2025" tabindex="-1">27</span><span class="flatpickr-day prevMonthDay" aria-label="July 28, 2025" tabindex="-1">28</span><span class="flatpickr-day prevMonthDay" aria-label="July 29, 2025" tabindex="-1">29</span><span class="flatpickr-day prevMonthDay" aria-label="July 30, 2025" tabindex="-1">30</span><span class="flatpickr-day prevMonthDay" aria-label="July 31, 2025" tabindex="-1">31</span><span class="flatpickr-day" aria-label="August 1, 2025" tabindex="-1">1</span><span class="flatpickr-day" aria-label="August 2, 2025" tabindex="-1">2</span><span class="flatpickr-day" aria-label="August 3, 2025" tabindex="-1">3</span><span class="flatpickr-day" aria-label="August 4, 2025" tabindex="-1">4</span><span class="flatpickr-day today selected" aria-label="August 5, 2025" aria-current="date" tabindex="-1">5</span><span class="flatpickr-day" aria-label="August 6, 2025" tabindex="-1">6</span><span class="flatpickr-day" aria-label="August 7, 2025" tabindex="-1">7</span><span class="flatpickr-day"
                                                    aria-label="August 8, 2025" tabindex="-1">8</span><span class="flatpickr-day" aria-label="August 9, 2025" tabindex="-1">9</span><span class="flatpickr-day" aria-label="August 10, 2025" tabindex="-1">10</span><span class="flatpickr-day" aria-label="August 11, 2025" tabindex="-1">11</span><span class="flatpickr-day" aria-label="August 12, 2025" tabindex="-1">12</span><span class="flatpickr-day" aria-label="August 13, 2025" tabindex="-1">13</span><span class="flatpickr-day" aria-label="August 14, 2025" tabindex="-1">14</span><span class="flatpickr-day" aria-label="August 15, 2025" tabindex="-1">15</span><span class="flatpickr-day" aria-label="August 16, 2025" tabindex="-1">16</span><span class="flatpickr-day" aria-label="August 17, 2025" tabindex="-1">17</span><span class="flatpickr-day" aria-label="August 18, 2025" tabindex="-1">18</span><span class="flatpickr-day" aria-label="August 19, 2025" tabindex="-1">19</span><span class="flatpickr-day" aria-label="August 20, 2025" tabindex="-1">20</span><span class="flatpickr-day" aria-label="August 21, 2025" tabindex="-1">21</span><span
                                                    class="flatpickr-day" aria-label="August 22, 2025" tabindex="-1">22</span><span class="flatpickr-day" aria-label="August 23, 2025" tabindex="-1">23</span><span class="flatpickr-day" aria-label="August 24, 2025" tabindex="-1">24</span><span class="flatpickr-day" aria-label="August 25, 2025" tabindex="-1">25</span><span class="flatpickr-day" aria-label="August 26, 2025" tabindex="-1">26</span><span class="flatpickr-day" aria-label="August 27, 2025" tabindex="-1">27</span><span class="flatpickr-day" aria-label="August 28, 2025" tabindex="-1">28</span><span class="flatpickr-day" aria-label="August 29, 2025" tabindex="-1">29</span><span class="flatpickr-day" aria-label="August 30, 2025" tabindex="-1">30</span><span class="flatpickr-day" aria-label="August 31, 2025" tabindex="-1">31</span><span class="flatpickr-day nextMonthDay" aria-label="September 1, 2025" tabindex="-1">1</span><span class="flatpickr-day nextMonthDay" aria-label="September 2, 2025" tabindex="-1">2</span><span class="flatpickr-day nextMonthDay" aria-label="September 3, 2025" tabindex="-1">3</span><span
                                                    class="flatpickr-day nextMonthDay" aria-label="September 4, 2025" tabindex="-1">4</span><span class="flatpickr-day nextMonthDay" aria-label="September 5, 2025" tabindex="-1">5</span><span class="flatpickr-day nextMonthDay" aria-label="September 6, 2025" tabindex="-1">6</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-6">
                        <label class="form-label" for="payment-method">Payment Method</label>
                        <select class="form-select" id="payment-method">
                            <option value="" selected="" disabled="">Select payment method</option>
                            <option value="Cash">Cash</option>
                            <option value="Bank Transfer">Bank Transfer</option>
                            <option value="Debit Card">Debit Card</option>
                            <option value="Credit Card">Credit Card</option>
                            <option value="Paypal">Paypal</option>
                        </select>
                    </div>
                    <div class="mb-6">
                        <label class="form-label" for="payment-note">Internal Payment Note</label>
                        <textarea class="form-control" id="payment-note" rows="2"></textarea>
                    </div>
                    <div class="mb-6 d-flex flex-wrap">
                        <button type="button" class="btn btn-primary me-4" data-bs-dismiss="offcanvas">Send</button>
                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /Add Payment Sidebar -->

        <!-- /Offcanvas -->

    </div>
@endsection
