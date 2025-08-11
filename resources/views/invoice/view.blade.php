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

    <!-- Add html2canvas and jsPDF libraries -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="row invoice-preview">
            <!-- Invoice -->
            <div class="col-xl-9 col-md-8 col-12 mb-md-0 mb-6">
                <div class="card invoice-preview-card p-sm-12 p-6">
                    <div class="card-body invoice-preview-header rounded">
                        <div class="d-flex justify-content-between flex-xl-row flex-md-column flex-sm-row flex-column align-items-xl-center align-items-md-start align-items-sm-center align-items-start">
                            <div>
                                <h5 class="mb-6">Invoice #{{ $bill->bill_no }}</h5>
                            </div>
                            <div class="mb-xl-0 mb-6 text-heading">
                                <div class="d-flex svg-illustration mb-6 gap-2 align-items-center">
                                    <span class="app-brand-logo demo">
                                        <span class="text-dark">
                                            <span class="app-brand-text demo fw-bold ms-50 lh-1">INVOICE</span>
                                        </span>
                                    </span>
                                </div>
                            </div>
                            <div>
                                {{-- <h5 class="mb-6">Type:
                                    @if ($bill->type == 0)
                                        <span class="badge bg-secondary">Without GST</span>
                                    @else
                                        <span class="badge bg-success">With GST</span>
                                    @endif
                                </h5> --}}
                                <p class="mb-1"><strong>Date:</strong> {{ date('d/m/Y', strtotime($bill->date)) }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body ">
                        <div class="row">
                            
                            <div class="col-xl-6 col-md-12 col-sm-5 col-12 mb-xl-0 mb-md-6 mb-sm-0 mb-6">
                                <h5><strong>Invoice To:</strong></h5>
                                @if ($bill->customerDetails)
                                    <p class="mb-1"><strong>Name :</strong> {{ $bill->customerDetails->name }}</p>
                                    <p class="mb-1"><strong>Address :</strong> {{ $bill->customerDetails->address }}</p>
                                    <p class="mb-1"><strong>City :</strong> {{ $bill->customerDetails->city }}</p>
                                    <p class="mb-1"><strong>Mobile No :</strong> {{ $bill->customerDetails->mobile_no }}</p>
                                    @if ($bill->customerDetails->gst_no)
                                        <p class="mb-0"><strong>GST :</strong> {{ $bill->customerDetails->gst_no }}</p>
                                    @endif
                                @else
                                    <p class="mb-0">Customer information not available</p>
                                @endif
                            </div>

                            <div class="col-xl-6 col-md-12 col-sm-5 col-12 mb-xl-0 mb-md-6 mb-sm-0 mb-6 ">
                                <h5><strong>Invoice From:</strong></h5>
                                <p class="mb-1"><strong>Company Name :</strong> {{ $bill->user->comp_name }}</p>
                                <p class="mb-1"><strong>Address :</strong> {{ $bill->user->address }}</p>
                                <p class="mb-1"><strong>Mobile No :</strong> {{ $bill->user->mobile }}</p>
                                @if ($bill->user->gst)
                                    <p class="mb-0"><strong>GST :</strong> {{ $bill->user->gst }}</p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive border border-bottom-0 border-top-0 rounded p-4">
                        <table class="table m-0">
                            <thead>
                                <tr>
                                    <th>Item</th>
                                    <th>HSN Code</th>
                                    <th>QTY</th>
                                    <th>Feet</th>
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
                                        {{-- <p class="mb-1">
                                            <span class="me-2 h6">Invoice Type:</span>
                                            <span>
                                                @if ($bill->type == 0)
                                                    Without GST
                                                @else
                                                    With GST (CGST: {{ number_format($bill->cgst, 2) }}, SGST: {{ number_format($bill->sgst, 2) }})
                                                @endif
                                            </span>
                                        </p>
                                        <span>Thank you for your business!</span> --}}
                                    </td>
                                    <td class="px-2 py-6 w-px-100">
                                        <p class="mb-2"><strong>Subtotal:</strong></p>
                                        @if ($bill->type == 1)
                                            <p class="mb-2"><strong>CGST 9%:</strong></p>
                                            <p class="mb-2"><strong>SGST 9%:</strong></p>
                                        @endif
                                        <p class="mb-0 border-bottom pb-2"><strong>Total:</strong></p>
                                    </td>
                                    <td class="text-end  py-6 w-px-100 fw-medium text-heading">
                                        <p class="fw-medium mb-2">₹{{ number_format($bill->estimated_total, 2) }}</p>
                                        @if ($bill->type == 1)
                                            <p class="fw-medium mb-2">₹{{ number_format($bill->cgst, 2) }}</p>
                                            <p class="fw-medium mb-2">₹{{ number_format($bill->sgst, 2) }}</p>
                                        @endif
                                        
                                        <p class="fw-medium mb-0 border-bottom pb-2">₹<strong>{{ number_format($bill->total, 2) }}</strong></p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        @php
                            $f = new \NumberFormatter( locale_get_default(), \NumberFormatter::SPELLOUT );
                            $word = $f->format($bill->total);
                        @endphp
                        <p><strong>In word:</strong> {{ ucfirst($word) }} only</p>
                    </div>

                    <hr class="mt-0 mb-1">

                    <div class="card-body">
                        <div class="row">
                            <h5><strong>Bank Details</strong></h5>
                            <div class="col-xl-8 col-md-12 col-sm-5 col-12 mb-xl-0 mb-md-6 mb-sm-0">
                                <p class="mb-1"><strong>Bank Name :</strong> {{ $bill->user->bank_branch }}</p>
                                <p class="mb-1"><strong>A/C No :</strong> {{ $bill->user->bank_ac_no }}</p>
                                <p class="mb-1"><strong>IFSC No :</strong> {{ $bill->user->bank_ifsc }}</p>
                            </div>

                        </div>
                    </div>
                    <hr class="mt-0 mb-1">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-6 col-md-12 col-sm-5 col-12 mb-xl-0 mb-md-6 mb-sm-0 ">
                                <p class="mb-1"><strong>Payment:</strong> {{ ucfirst($bill->payment_status) }}</p>
                                <hr class="mt-0 mb-2">
                                <ul>
                                    <li>ટ્રાન્સપોર્ટ ચાર્જ અલગથી લેવામાં આવસે.</li>
                                    <li>ન્યાયક્ષેત્ર બોટાદ રહેશે.</li>
                                    <li>ભૂલ - ચૂક લેવી દેવી.</li>
                                </ul>
                            </div>

                            <div class="col-xl-6 col-md-12 col-sm-5 col-12 mb-xl-0 mb-md-6 mb-sm-0  text-end">
                                <p></p>
                                <br>
                                <br>
                                <p ><strong>ફોર:</strong> જય બજરંગ સિમેન્ટ પ્રોડક્ટ્સ</p>

                            </div>
                        </div>
                    </div>

                    {{-- <div class="card-body p-2">
                        <div class="row">
                            <div class="col-12">
                                <span>
                                    ટ્રાન્સપોર્ટ અને પાર્કિંગ ચાર્જ અલગથી લેવામાં આવસે. <br>
                                    ન્યાયક્ષેત્ર બોટાદ રહેશે. <br>
                                    ભૂલ - ચૂક લેવી દેવી.
                                </span>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
            <!-- /Invoice -->

            <!-- Invoice Actions -->
            <div class="col-xl-3 col-md-4 col-12 invoice-actions">
                <div class="card">
                    <div class="card-body">
                        <button class="btn btn-success d-grid w-100 mb-4" onclick="downloadAsPDF()">Download as PDF</button>
                        <button class="btn btn-warning d-grid w-100 mb-4" onclick="downloadAsPNG()">Download as PNG</button>
                        <div class="d-flex mb-4">
                            {{-- <a class="btn btn-secondary d-grid w-100 me-4 text-light" onclick="window.print()"> Print </a> --}}
                           <a class="btn btn-secondary d-grid w-100 me-4" style="color: white;" onclick="window.print()"> Print </a>
                            <a href="{{ route('invoice.edit', $bill->id) }}" class="btn btn-info d-grid w-100"> Edit </a>
                        </div>
                        <a href="{{ route('invoice.index') }}" class="btn btn-primary d-grid w-100 mb-4">Back to List</a>

                    </div>
                </div>
            </div>
            <!-- /Invoice Actions -->
        </div>
    </div>

    <script>
        // Function to download invoice as PNG
        function downloadAsPNG() {
            const element = document.querySelector('.invoice-preview-card');
            
            // Show loading indicator
            const loadingBtn = event.target;
            const originalText = loadingBtn.innerHTML;
            loadingBtn.innerHTML = 'Converting...';
            loadingBtn.disabled = true;

            html2canvas(element, {
                scale: 2, // Higher quality
                useCORS: true,
                allowTaint: true,
                backgroundColor: '#ffffff',
                width: element.offsetWidth,
                height: element.offsetHeight
            }).then(function(canvas) {
                // Create download link
                const link = document.createElement('a');
                link.download = 'invoice-{{ $bill->bill_no }}.png';
                link.href = canvas.toDataURL('image/png');
                link.click();
                
                // Reset button
                loadingBtn.innerHTML = originalText;
                loadingBtn.disabled = false;
            }).catch(function(error) {
                console.error('Error generating PNG:', error);
                alert('Error generating PNG. Please try again.');
                loadingBtn.innerHTML = originalText;
                loadingBtn.disabled = false;
            });
        }

        // Function to download invoice as PDF
        function downloadAsPDF() {
            const element = document.querySelector('.invoice-preview-card');
            
            // Show loading indicator
            const loadingBtn = event.target;
            const originalText = loadingBtn.innerHTML;
            loadingBtn.innerHTML = 'Converting...';
            loadingBtn.disabled = true;

            html2canvas(element, {
                scale: 2, // Higher quality
                useCORS: true,
                allowTaint: true,
                backgroundColor: '#ffffff',
                width: element.offsetWidth,
                height: element.offsetHeight
            }).then(function(canvas) {
                // Convert canvas to PDF
                const { jsPDF } = window.jspdf;
                const pdf = new jsPDF('p', 'mm', 'a4');
                
                const imgData = canvas.toDataURL('image/png');
                const pdfWidth = pdf.internal.pageSize.getWidth();
                const pdfHeight = pdf.internal.pageSize.getHeight();
                const imgWidth = pdfWidth;
                const imgHeight = (canvas.height * imgWidth) / canvas.width;
                
                let heightLeft = imgHeight;
                let position = 0;

                // Add first page
                pdf.addImage(imgData, 'PNG', 0, position, imgWidth, imgHeight);
                heightLeft -= pdfHeight;

                // Add additional pages if needed
                while (heightLeft >= 0) {
                    position = heightLeft - imgHeight;
                    pdf.addPage();
                    pdf.addImage(imgData, 'PNG', 0, position, imgWidth, imgHeight);
                    heightLeft -= pdfHeight;
                }

                // Download PDF
                pdf.save('invoice-{{ $bill->bill_no }}.pdf');
                
                // Reset button
                loadingBtn.innerHTML = originalText;
                loadingBtn.disabled = false;
            }).catch(function(error) {
                console.error('Error generating PDF:', error);
                alert('Error generating PDF. Please try again.');
                loadingBtn.innerHTML = originalText;
                loadingBtn.disabled = false;
            });
        }
    </script>
@endsection
