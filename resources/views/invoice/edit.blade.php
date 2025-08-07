@extends('app')
@section('admin-content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Invoice/</span> Edit</h4>

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

                        <form action="{{ route('invoice.update', $bill->id) }}" method="POST" id="invoiceForm">
                            @csrf
                            @method('PUT')
                            
                            <!-- Header Section -->
                            <div class="row mb-4">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Select Customer</label>
                                    <select class="form-select" name="customer" required>
                                        <option value="">Select Customer</option>
                                        @foreach($customers as $customer)
                                            <option value="{{ $customer->id }}" {{ $bill->cust_id == $customer->id ? 'selected' : '' }}>
                                                {{ $customer->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Bill No.</label>
                                    <input type="text" name="bill_no" class="form-control" value="{{ old('bill_no', $bill->bill_no) }}" required>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Date</label>
                                    <input type="date" name="date" class="form-control" value="{{ old('date', $bill->date) }}" required>
                                </div>
                            </div>

                            <!-- Invoice Type -->
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label class="form-label">Invoice Type</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="type" id="withoutGst" value="0" {{ $bill->type == 0 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="withoutGst">Without GST</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="type" id="withGst" value="1" {{ $bill->type == 1 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="withGst">With GST</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Payment</label>
                                    <select class="form-select" name="payment" required>
                                        <option value="paid">Paid</option>
                                        <option value="unpaid">Unpaid</option>
                                        
                                    </select>
                                </div>
                            </div>

                            <!-- Primary Items Table -->
                            <div class="card mb-4" style="display: {{ $bill->type == 0 ? 'block' : 'none' }};">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0">Item Details</h5>
                                    
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="itemsTable">
                                            <thead class="table-secondary">
                                                <tr>
                                                    <th>Name</th>
                                                    <th>HSN Code</th>
                                                    <th>Number/Pieces</th>
                                                    <th>Feet</th>
                                                    <th>Single Price</th>
                                                    <th>Total Price</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="itemsTableBody">
                                                @foreach($bill->billDetails as $index => $item)
                                                    <tr>
                                                        <td>
                                                            <select class="form-select" name="items[{{ $index }}][subcategory_id]" required>
                                                                <option value="">Select Subcategory</option>
                                                                @foreach ($subcategories as $subcategory)
                                                                    <option value="{{ $subcategory->id }}" {{ $subcategory->id == $item->subcat_id ? 'selected' : '' }}>
                                                                        {{ $subcategory->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <input type="text" name="items[{{ $index }}][hsn_code]" class="form-control" value="{{ $item->hsncode }}" required>
                                                        </td>
                                                        <td>
                                                            <input type="number" name="items[{{ $index }}][number]" class="form-control" value="{{ $item->number }}" onchange="calculateItemTotal({{ $index }})">
                                                        </td>
                                                        <td>
                                                            <input type="number" name="items[{{ $index }}][feet]" class="form-control" step="0.01" value="{{ $item->feet }}" onchange="calculateItemTotal({{ $index }})">
                                                        </td>
                                                        
                                                        <td>
                                                            <input type="number" name="items[{{ $index }}][single_price]" class="form-control" step="0.01" value="{{ $item->single_price }}" required onchange="calculateItemTotal({{ $index }})">
                                                        </td>
                                                        <td>
                                                            <input type="number" name="items[{{ $index }}][total_price]" class="form-control" step="0.01" value="{{ $item->total_price }}" readonly>
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-danger btn-sm" onclick="removeRow(this)">
                                                                <i class="bx bx-trash"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                    <button type="button" class="btn btn-primary btn-sm mt-3" onclick="addItemRow()">
                                        <i class="bx bx-plus"></i> Add Item
                                    </button>
                                </div>
                            </div>

                            <!-- GST Details Table -->
                            <div class="card mb-4" id="gstTable" style="display: {{ $bill->type == 1 ? 'block' : 'none' }};">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0">GST Details</h5>
                                    
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="gstItemsTable">
                                            <thead class="table-secondary">
                                                <tr>
                                                    <th>Name</th>
                                                    <th>HSN Code</th>
                                                    <th>Number</th>
                                                    <th>Feet</th>
                                                    <th>Single Price</th>
                                                    <th>Total Price</th>
                                                    <th>CGST %</th>
                                                    <th>SGST %</th>
                                                    <th>IGST %</th>
                                                    <th>Total</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="gstItemsTableBody">
                                                <!-- GST rows will be added dynamically -->
                                                @foreach($bill->billDetails as $index => $item)
                                                    <tr>
                                                        <td>
                                                            <select class="form-select" name="gst_items[{{ $index }}][subcategory_id]" required>
                                                                <option value="">Select Subcategory</option>
                                                                @foreach ($subcategories as $subcategory)
                                                                    <option value="{{ $subcategory->id }}" {{ $subcategory->id == $item->subcat_id ? 'selected' : '' }}>
                                                                        {{ $subcategory->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <input type="text" name="gst_items[{{ $index }}][hsn_code]" class="form-control" value="{{ $item->hsncode }}" required>
                                                        </td>
                                                        <td>
                                                            <input type="number" name="gst_items[{{ $index }}][number]" class="form-control" value="{{ $item->number }}" onchange="calculateGstItemTotal({{ $index }})">
                                                        </td>
                                                        <td>
                                                            <input type="number" name="gst_items[{{ $index }}][feet]" class="form-control" step="0.01" value="{{ $item->feet }}" onchange="calculateGstItemTotal({{ $index }})">
                                                        </td>
                                                       
                                                        <td>
                                                            <input type="number" name="gst_items[{{ $index }}][single_price]" class="form-control" step="0.01" value="{{ $item->single_price }}" required onchange="calculateGstItemTotal({{ $index }})">
                                                        </td>
                                                        <td>
                                                            <input type="number" name="gst_items[{{ $index }}][total_price]" class="form-control" step="0.01" value="{{ $item->total_price }}" readonly>
                                                        </td>
                                                        <td>
                                                            <input type="number" name="gst_items[{{ $index }}][cgst]" class="form-control" step="0.01" value="{{ $item->cgst }}" onchange="handleGstChange({{ $index }})">
                                                        </td>
                                                        <td>
                                                            <input type="number" name="gst_items[{{ $index }}][sgst]" class="form-control" step="0.01" value="{{ $item->sgst }}" onchange="handleGstChange({{ $index }})">
                                                        </td>
                                                        <td>
                                                            <input type="number" name="gst_items[{{ $index }}][igst]" class="form-control" step="0.01" value="{{ $item->igst }}" onchange="handleGstChange({{ $index }})">
                                                        </td>
                                                        <td>
                                                            <input type="number" name="gst_items[{{ $index }}][total]" class="form-control" step="0.01" value="{{ $item->bill->total }}" readonly>
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-danger btn-sm" onclick="removeRow(this)">
                                                                <i class="bx bx-trash"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <button type="button" class="btn btn-primary btn-sm mt-3" onclick="addGstRow()">
                                        <i class="bx bx-plus"></i> Add GST Item
                                    </button>
                                </div>
                            </div>
                            
                            <!-- Summary Section -->
                            <div class="row mb-4">
                                <div class="col-md-6 offset-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h6 class="card-title">Summary</h6>
                                            <div class="row mb-2">
                                                <div class="col-6">Subtotal:</div>
                                                <div class="col-6 text-end" id="subtotal">₹{{ number_format($bill->estimated_total, 2) }}</div>
                                            </div>
                                            <div class="row mb-2" id="cgstRow" style="display: {{ $bill->type == 1 ? 'flex' : 'none' }};">
                                                <div class="col-6">CGST:</div>
                                                <div class="col-6 text-end" id="cgstTotal">₹{{ number_format($bill->cgst, 2) }}</div>
                                            </div>
                                            <div class="row mb-2" id="sgstRow" style="display: {{ $bill->type == 1 ? 'flex' : 'none' }};">
                                                <div class="col-6">SGST:</div>
                                                <div class="col-6 text-end" id="sgstTotal">₹{{ number_format($bill->sgst, 2) }}</div>
                                            </div>
                                            <div class="row mb-2" id="igstRow" style="display: {{ $bill->type == 1 ? 'flex' : 'none' }};">
                                                <div class="col-6">IGST:</div>
                                                <div class="col-6 text-end" id="igstTotal">₹{{ number_format($bill->igst ?? 0, 2) }}</div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-6"><strong>Total:</strong></div>
                                                <div class="col-6 text-end"><strong id="grandTotal">₹{{ number_format($bill->total, 2) }}</strong></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="text-end">
                                <a href="{{ route('invoice.index') }}" class="btn btn-secondary me-2">Cancel</a>
                                <button type="submit" class="btn btn-primary">Update Invoice</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let itemRowCount = {{ count($bill->billDetails) }};
        let gstRowCount = {{ count($bill->billDetails) }};
        let billtype = {{ $bill->type }}

        // Add item row to primary table
        function addItemRow() {
            const tbody = document.getElementById('itemsTableBody');
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>
                    <select class="form-select" name="items[${itemRowCount}][subcategory_id]" required>
                        <option value="">Select Subcategory</option>
                        @foreach ($subcategories as $subcategory)
                            <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <input type="text" name="items[${itemRowCount}][hsn_code]" class="form-control" required>
                </td>
                <td>
                    <input type="number" name="items[${itemRowCount}][number]" class="form-control" onchange="calculateItemTotal(${itemRowCount})">
                </td>
                <td>
                    <input type="number" name="items[${itemRowCount}][feet]" class="form-control" step="0.01" onchange="calculateItemTotal(${itemRowCount})">
                </td>
                <td>
                    <input type="number" name="items[${itemRowCount}][single_price]" class="form-control" step="0.01" required onchange="calculateItemTotal(${itemRowCount})">
                </td>
                <td>
                    <input type="number" name="items[${itemRowCount}][total_price]" class="form-control" step="0.01" readonly>
                </td>
                <td>
                    <button type="button" class="btn btn-danger btn-sm" onclick="removeRow(this)">
                        <i class="bx bx-trash"></i>
                    </button>
                </td>
            `;
            tbody.appendChild(row);
            itemRowCount++;
        }

        // Add GST row to secondary table
        function addGstRow() {
            const tbody = document.getElementById('gstItemsTableBody');
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>
                    <select class="form-select" name="gst_items[${gstRowCount}][subcategory_id]" required>
                        <option value="">Select Subcategory</option>
                        @foreach ($subcategories as $subcategory)
                            <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <input type="text" name="gst_items[${gstRowCount}][hsn_code]" class="form-control" required>
                </td>
                <td>
                    <input type="number" name="gst_items[${gstRowCount}][number]" class="form-control" onchange="calculateGstItemTotal(${gstRowCount})">
                </td>
                <td>
                    <input type="number" name="gst_items[${gstRowCount}][feet]" class="form-control" step="0.01" onchange="calculateGstItemTotal(${gstRowCount})">
                </td>
                <td>
                    <input type="number" name="gst_items[${gstRowCount}][single_price]" class="form-control" step="0.01" required onchange="calculateGstItemTotal(${gstRowCount})">
                </td>
                <td>
                    <input type="number" name="gst_items[${gstRowCount}][total_price]" class="form-control" step="0.01" readonly>
                </td>
                <td>
                    <input type="number" name="gst_items[${gstRowCount}][cgst]" class="form-control" step="0.01" min="0" max="100" onchange="handleGstChange(${gstRowCount})">
                </td>
                <td>
                    <input type="number" name="gst_items[${gstRowCount}][sgst]" class="form-control" step="0.01" min="0" max="100" onchange="handleGstChange(${gstRowCount})">
                </td>
                <td>
                    <input type="number" name="gst_items[${gstRowCount}][igst]" class="form-control" step="0.01" min="0" max="100" onchange="handleGstChange(${gstRowCount})">
                </td>
                <td>
                    <input type="number" name="gst_items[${gstRowCount}][total]" class="form-control" step="0.01" readonly>
                </td>
                <td>
                    <button type="button" class="btn btn-danger btn-sm" onclick="removeRow(this)">
                        <i class="bx bx-trash"></i>
                    </button>
                </td>
            `;
            tbody.appendChild(row);
            gstRowCount++;
        }

        // Handle GST field changes
        function handleGstChange(rowIndex) {
            const row = document.querySelector(`input[name="items[${rowIndex}][number]"]`).closest('tr');
            const cgstInput = row.querySelector(`input[name="items[${rowIndex}][cgst]"]`);
            const sgstInput = row.querySelector(`input[name="items[${rowIndex}][sgst]"]`);
            const igstInput = row.querySelector(`input[name="items[${rowIndex}][igst]"]`);
            
            const igst = parseFloat(igstInput.value) || 0;
            const cgst = parseFloat(cgstInput.value) || 0;
            const sgst = parseFloat(sgstInput.value) || 0;
            
            // If IGST is entered, clear CGST and SGST
            if (igst > 0) {
                cgstInput.value = 0;
                sgstInput.value = 0;
            }
            // If CGST or SGST is entered, clear IGST
            else if (cgst > 0 || sgst > 0) {
                igstInput.value = 0;
            }
            
            calculateGstItemTotal(rowIndex);
        }

        // Calculate total for regular item row (without GST)
        function calculateItemTotal(rowIndex) {
            const row = document.querySelector(`input[name="items[${rowIndex}][number]"]`).closest('tr');
            const number = parseFloat(row.querySelector(`input[name="items[${rowIndex}][number]"]`).value) || 0;
            const feet = parseFloat(row.querySelector(`input[name="items[${rowIndex}][feet]"]`).value) || 0;
            const singlePrice = parseFloat(row.querySelector(`input[name="items[${rowIndex}][single_price]"]`).value) || 0;
            
            let totalPrice = 0;
            if (number > 0) {
                totalPrice = number * singlePrice;
            } else if (feet > 0) {
                totalPrice = feet * singlePrice;
            }
            
            row.querySelector(`input[name="items[${rowIndex}][total_price]"]`).value = totalPrice.toFixed(2);
            updateSummary();
        }

        // Calculate total for GST item row
        function calculateGstItemTotal(rowIndex) {
            const row = document.querySelector(`input[name="items[${rowIndex}][number]"]`).closest('tr');
            const number = parseFloat(row.querySelector(`input[name="items[${rowIndex}][number]"]`).value) || 0;
            const feet = parseFloat(row.querySelector(`input[name="items[${rowIndex}][feet]"]`).value) || 0;
            const singlePrice = parseFloat(row.querySelector(`input[name="items[${rowIndex}][single_price]"]`).value) || 0;
            let cgst = parseFloat(row.querySelector(`input[name="items[${rowIndex}][cgst]"]`).value) || 0;
            let sgst = parseFloat(row.querySelector(`input[name="items[${rowIndex}][sgst]"]`).value) || 0;
            const igst = parseFloat(row.querySelector(`input[name="items[${rowIndex}][igst]"]`).value) || 0;
            
            // If IGST is entered, set CGST and SGST to 0
            if(igst > 0){
                cgst = 0;
                sgst = 0;
                row.querySelector(`input[name="items[${rowIndex}][cgst]"]`).value = 0;
                row.querySelector(`input[name="items[${rowIndex}][sgst]"]`).value = 0;
            }
            
            let totalPrice = 0;
            if (number > 0) {
                totalPrice = number * singlePrice;
            } else if (feet > 0) {
                totalPrice = feet * singlePrice;
            }
            
            const cgstAmount = (totalPrice * cgst) / 100;
            const sgstAmount = (totalPrice * sgst) / 100;
            const igstAmount = (totalPrice * igst) / 100;
            const total = totalPrice + cgstAmount + sgstAmount + igstAmount;
            
            row.querySelector(`input[name="items[${rowIndex}][total_price]"]`).value = totalPrice.toFixed(2);
            row.querySelector(`input[name="items[${rowIndex}][total]"]`).value = total.toFixed(2);
            updateSummary();
        }



        // Remove row
        function removeRow(button) {
            button.closest('tr').remove();
            updateSummary();
        }

        // Update summary
        function updateSummary() {
            let subtotal = 0;
            let without_subtotal = 0;
            let cgstTotal = 0;
            let sgstTotal = 0;
            let igstTotal = 0;

            // Calculate from items table (without GST)
            document.querySelectorAll('#itemsTable input[name$="[total_price]"]').forEach(input => {
                without_subtotal += parseFloat(input.value) || 0;
            });

            // Calculate from GST table
            document.querySelectorAll('#gstItemsTable input[name$="[total_price]"]').forEach(input => {
                subtotal += parseFloat(input.value) || 0;
            });

            // Calculate GST amounts from GST table only
            document.querySelectorAll('#gstItemsTable input[name$="[cgst]"]').forEach(input => {
                const row = input.closest('tr');
                const totalPrice = parseFloat(row.querySelector('input[name$="[total_price]"]').value) || 0;
                const cgstPercent = parseFloat(input.value) || 0;
                cgstTotal += (totalPrice * cgstPercent) / 100;
            });

            document.querySelectorAll('#gstItemsTable input[name$="[sgst]"]').forEach(input => {
                const row = input.closest('tr');
                const totalPrice = parseFloat(row.querySelector('input[name$="[total_price]"]').value) || 0;
                const sgstPercent = parseFloat(input.value) || 0;
                sgstTotal += (totalPrice * sgstPercent) / 100;
            });

            document.querySelectorAll('#gstItemsTable input[name$="[igst]"]').forEach(input => {
                const row = input.closest('tr');
                const totalPrice = parseFloat(row.querySelector('input[name$="[total_price]"]').value) || 0;
                const igstPercent = parseFloat(input.value) || 0;
                igstTotal += (totalPrice * igstPercent) / 100;
            });

            if(billtype == 1){
                var grandTotal = subtotal + cgstTotal + sgstTotal + igstTotal;
                document.getElementById('subtotal').textContent = '₹' + subtotal.toFixed(2);
            }else{
                var grandTotal = without_subtotal;
                document.getElementById('subtotal').textContent = '₹' + without_subtotal.toFixed(2);
            }

            document.getElementById('cgstTotal').textContent = '₹' + cgstTotal.toFixed(2);
            document.getElementById('sgstTotal').textContent = '₹' + sgstTotal.toFixed(2);
            document.getElementById('igstTotal').textContent = '₹' + igstTotal.toFixed(2);
            document.getElementById('grandTotal').textContent = '₹' + grandTotal.toFixed(2);
        }

        // Toggle GST table visibility
        document.querySelectorAll('input[name="type"]').forEach(radio => {
            radio.addEventListener('change', function() {
                const gstTable = document.getElementById('gstTable');
                const cgstRow = document.getElementById('cgstRow');
                const sgstRow = document.getElementById('sgstRow');
                const igstRow = document.getElementById('igstRow');
                
                if (this.value === '1') {
                    gstTable.style.display = 'block';
                    cgstRow.style.display = 'flex';
                    sgstRow.style.display = 'flex';
                    igstRow.style.display = 'flex';
                } else {
                    gstTable.style.display = 'none';
                    cgstRow.style.display = 'none';
                    sgstRow.style.display = 'none';
                    igstRow.style.display = 'none';
                }
            });
        });

        // Initialize calculations on page load
        document.addEventListener('DOMContentLoaded', function() {
            // Calculate totals for existing rows
            for (let i = 0; i < itemRowCount; i++) {
                calculateItemTotal(i);
            }
            // Calculate totals for existing GST rows
            for (let i = 0; i < gstRowCount; i++) {
                calculateGstItemTotal(i);
            }
            updateSummary();
        });
    </script>
@endsection 