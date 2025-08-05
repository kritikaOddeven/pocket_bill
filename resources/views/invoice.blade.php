<!DOCTYPE html>
<html lang="gu">
<head>
    <meta charset="UTF-8">
    <title>ટેક્સ બિલ (Invoice)</title>
    <style>
        body {
            font-family: 'Noto Sans Gujarati', Arial, sans-serif;
            background: #fff;
        }
        .invoice-container {
            max-width: 950px;
            margin: 30px auto;
            background: #fff;
            border: 3px solid #000;
            padding: 18px 24px 24px 24px;
            box-shadow: 0 0 8px #ccc;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 2px solid #000;
            padding: 6px 10px;
            text-align: left;
            font-size: 1.08em;
        }
        th {
            background: #f7f7f7;
            font-weight: bold;
            font-size: 1.12em;
        }
        .no-border {
            border: none !important;
        }
        .center {
            text-align: center;
        }
        .right {
            text-align: right;
        }
        .bold {
            font-weight: bold;
        }
        .section-title {
            font-size: 1.45em;
            font-weight: bold;
            letter-spacing: 1px;
        }
        .bank-details td {
            border: none;
        }
        .total-row td {
            font-size: 1.15em;
            font-weight: bold;
            background: #f0f0f0;
        }
        .grand-total {
            font-size: 1.22em;
            font-weight: bold;
            background: #e0e0e0;
        }
        .amount-words {
            font-size: 1.08em;
            font-weight: bold;
        }
        .meta-row td {
            font-size: 1.08em;
            font-weight: bold;
        }
        .meta-label {
            width: 110px;
        }
        @media print {
            body { background: #fff; }
            .invoice-container { box-shadow: none; border-width: 2px; }
        }
    </style>
</head>
<body>
<div class="invoice-container">
    <table>
        <tr>
            <td colspan="2" class="bold">GST No . {{ $gst_no ?? '24DFFPM7204R1Z0' }}</td>
            <td colspan="4" class="center section-title">ટેક્સ બિલ</td>
            <td colspan="2" class="right bold">Mo. {{ $mobile ?? '9265470270' }}</td>
        </tr>
        <tr>
            <td colspan="8" class="center bold" style="font-size:1.3em;">જય ભજંગ સિમેન્ટ પ્રોડક્ટસ</td>
        </tr>
        <tr>
            <td colspan="8" class="center" style="font-size:1.08em;">** હ. ગડા રોડ, ગુરુકૃપાની આગળ, શિવશક્તિ પેટ્રોલ પંપની સામે, બોટાદ **</td>
        </tr>
        <tr class="meta-row">
            <td class="meta-label">નામ</td>
            <td colspan="2">{{ $customer_name ?? 'એસ.એમ.સી.એજ્યુકેશન રતનવાવ . પરાશાણા' }}</td>
            <td class="meta-label">નંબર</td>
            <td>{{ $customer_phone ?? '9824812756' }}</td>
            <td class="meta-label">બિલ નં.</td>
            <td colspan="2">{{ $bill_no ?? '49' }}</td>
        </tr>
        <tr class="meta-row">
            <td class="meta-label">સરનામું</td>
            <td colspan="2">{{ $customer_address ?? 'રતનવાવ' }}</td>
            <td class="meta-label">ગામ</td>
            <td>{{ $customer_village ?? 'રતનવાવ' }}</td>
            <td class="meta-label">તારીખ</td>
            <td colspan="2">{{ $bill_date ?? '14/12/2022' }}</td>
        </tr>
        <tr class="meta-row">
            <td class="meta-label">GST No</td>
            <td colspan="7">{{ $customer_gst ?? '------------------------' }}</td>
        </tr>
    </table>
    <br>
    <table>
        <tr>
            <th>વિગત</th>
            <th>એચ.એસ.એન. કોડ</th>
            <th>નંગ</th>
            <th>કુટ</th>
            <th>ભાવ</th>
            <th>રકમ</th>
        </tr>
        @php
            $items = [
                ["detail"=>"૧|| x 2 - 2 ફૂટ ટાઈલી","hsn"=>"6810","qty"=>2,"unit"=>2,"rate"=>275,"amount"=>550],
                ["detail"=>"૧|| x 2 પથર","hsn"=>"6810","qty"=>2,"unit"=>2,"rate"=>149,"amount"=>298]
            ];
        @endphp
        @foreach($items as $item)
        <tr>
            <td>{{ $item['detail'] }}</td>
            <td>{{ $item['hsn'] }}</td>
            <td>{{ $item['qty'] }}</td>
            <td>{{ $item['unit'] }}</td>
            <td>{{ number_format($item['rate'], 2) }}</td>
            <td>{{ number_format($item['amount'], 2) }}</td>
        </tr>
        @endforeach
        <tr class="total-row">
            <td colspan="5" class="right">ટોટલ</td>
            <td>{{ number_format($total ?? 848, 2) }}</td>
        </tr>
    </table>
    <br>
    <table class="bank-details">
        <tr>
            <td class="bold">Bank Details</td>
            <td colspan="5"></td>
            <td class="right">CGST 9%</td>
            <td class="right">{{ number_format($cgst ?? 76.32, 2) }}</td>
        </tr>
        <tr>
            <td>Branch</td>
            <td colspan="5">SIHORA MARCHANTILE CO-OP. BANK LTD. - BOTAD</td>
            <td class="right">SGST 9%</td>
            <td class="right">{{ number_format($sgst ?? 76.32, 2) }}</td>
        </tr>
        <tr>
            <td>A/C No</td>
            <td colspan="5">003110101001197</td>
            <td class="right grand-total">ટોટલ</td>
            <td class="right grand-total">{{ number_format($grand_total ?? 1000.64, 2) }}</td>
        </tr>
        <tr>
            <td>IFSC</td>
            <td colspan="7">YESBOSIMC22</td>
        </tr>
        <tr>
            <td colspan="8" class="amount-words">અંકે રૂપિયા : {{ $amount_words ?? 'one thousand point six four only' }}</td>
        </tr>
    </table>
    <br>
    <table>
        <tr>
            <td class="no-border">* રાઉન્ડિંગ અને પોઈન્ટ્સ શાંતિ અહમદાબાદ વિધાનમાં આપશે.</td>
        </tr>
        <tr>
            <td class="no-border">* ન્યાયક્ષેત્ર બોટાદ રહેશે.</td>
        </tr>
        <tr>
            <td class="no-border">* લૂઝ - ચૂક લેવો દેવી.</td>
        </tr>
    </table>
    <br>
    <table>
        <tr>
            <td class="no-border" style="width: 70%;"></td>
            <td class="no-border center bold">ઉઘરાણ √</td>
        </tr>
        <tr>
            <td class="no-border"></td>
            <td class="no-border center bold">રોકડ</td>
        </tr>
        <tr>
            <td class="no-border"></td>
            <td class="no-border center bold">કોર્ટ , જય ભજંગ સિમેન્ટ પ્રોડક્ટસ</td>
        </tr>
    </table>
</div>
</body>
</html>