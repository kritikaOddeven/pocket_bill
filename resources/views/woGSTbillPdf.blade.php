<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bill</title>
        <style>
            @font-face {
              font-family: 'HindVadodara-Regular', 'serif'; 
              font-weight: normal;
              src: url('{{ storage_path('fonts/HindVadodara-Regular.ttf') }}') format('truetype');
            }
            @font-face {
              font-family: 'HindVadodara-Regular', 'serif'; 
              font-weight: 700;
              src: url('{{ storage_path('fonts/HindVadodara-Regular.ttf') }}') format('truetype');
            }
            
            table thead tr td{
                font-family: 'HindVadodara-Regular';
            }
            table tbody tr td{
                font-family: 'HindVadodara-Regular';
                font-size: 10px;
            }
        </style>
    </head>
    <body>
        @if (!$data)
            !No data found.
        @else
            @if ($data['user'])
                <table width="100%" border="1px solid">
                    <thead>
                        <tr>
                            {{-- <td colspan="2">GST No . {{ $data['user']['gst'] ?? '' }}</td> --}}
                            <td colspan="2"></td>
                            <td colspan="3" style="text-align:center;">ટેક્સ બિલ</td>
                            <td style="text-align:right;" colspan="2">Mo. {{ $data['user']['mobile'] ?? '' }}</td>
                        </tr>
                        <tr>
                            <td colspan="7" style="text-align:center;">{{ $data['user']['comp_name'] ?? '' }}</td>
                        </tr>
                        <tr>
                            <td colspan="7" style="font-size:10px; text-align:center;">***{{ $data['user']['address'] ?? '' }}***</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>નામ</td>
                            <td colspan="2">{{ $data['bills']['customerDetails']['name'] ?? '' }}</td>
                            <td>નંબર</td>
                            <td colspan="2">{{ $data['bills']['customerDetails']['mobile_no'] ?? '' }}</td>
                            <td>િબલ નં. :   {{ $data['bills']['bill_no'] ?? '' }}</td>
                        </tr>
                        <tr>
                            <td>સરનામું</td>
                            <td colspan="5">{{ $data['bills']['customerDetails']['address'] ?? '' }}</td>
                            <td></td>
                            {{-- <td>{{ $data['bills']['bill_no'] ?? '' }}</td> --}}
                        </tr>
                        <tr>
                            {{-- <td>GST No</td>
                            <td colspan="2">{{ $data['bills']['customerDetails']['gst_no'] ?? '' }}</td> --}}
                            <td></td>
                            <td colspan="2"></td>
                            <td>ગામ</td>
                            <td colspan="2">{{ $data['bills']['customerDetails']['city'] ?? '' }}</td>
                            <td>તારીખ : {{ Carbon\Carbon::parse($data['bills']['date'])->format('d / m / Y') }}</td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align:center;">િવગત</td>
                            {{-- <td style="text-align:center;"><b>HSN કોડ</b></td> --}}
                            <td style="text-align:center;"><b></b></td>
                            <td style="text-align:center;"><b>નંગ</b></td>
                            <td style="text-align:center;"><b>ફુટ</b></td>
                            <td style="text-align:center;"><b>ભાવ</b></td>
                            <td style="text-align:center;"><b>રકમ</b></td>
                        </tr>
                        @foreach ($data['bills']['billDetails'] as $bill)
                            <tr>
                                <td colspan="2" style="text-align:center;">{{ $bill['name'] ?? '' }}</td>
                                {{-- <td style="text-align:center;">{{ $bill['hsncode'] ?? '' }}</td> --}}
                                <td style="text-align:center;"></td>
                                <td style="text-align:center;">{{ $bill['number'] ?? '' }}</td>
                                <td style="text-align:center;">{{ $bill['feet'] ?? '' }}</td>
                                <td style="text-align:center;">{{ $bill['single_price'] ?? '' }}</td>
                                <td style="text-align:center;">{{ $bill['total_price'] ?? '' }}</td>
                            </tr>                            
                        @endforeach
                        <tr>
                            <td colspan="5">Bank Details</td>
                            <td style="text-align:center;">ટોટલ</td>
                            <td style="text-align:center;">{{ $data['bills']['estimated_total'] ?? '' }}</td>
                        </tr>
                        <tr>
                            <td colspan="2">Branch</td>
                            <td colspan="3">{{ $data['user']['bank_branch'] ?? '' }}</td>
                            <td></td>
                            <td></td>
                            {{-- <td>CGST 9%</td>
                            <td>{{ $data['bills']['cgst'] ?? '' }}</td> --}}
                        </tr>
                        <tr>
                            <td colspan="2">A/C No <br> IFSC</td>
                            <td colspan="3">{{ $data['user']['bank_ac_no'] ?? '' }}<br>{{ $data['user']['bank_ifsc'] ?? '' }}</td>
                            <td></td>
                            <td></td>
                            {{-- <td>SGST 9%</td>
                            <td>{{ $data['bills']['sgst'] ?? '' }}</td> --}}
                        </tr>
                        <tr>
                            @php
                                $f = new \NumberFormatter( locale_get_default(), \NumberFormatter::SPELLOUT );
                                $word = $f->format($data['bills']['total']);
                            @endphp
                            <td colspan="5">અંકે રુપયા : {{ $word }} only</td>
                            <td style="text-align:center;">ટોટલ</td>
                            <td style="text-align:center;">{{ $data['bills']['total'] ?? '' }}</td>
                        </tr>
                        <tr>
                            <td colspan="4">* ટ્ રા�સપોટ� અન ે પૅિકં ગ ચાજ� અલગથી લેવામાં આવસે .</td>
                            @if ($data['bills']['type'] == "0")
                                <td>ઉધાર √</td>    
                            @else
                                <td>ઉધાર</td>
                            @endif
                            <td colspan="2" rowspan="3">{{ $data['user']['comp_name'] ?? '' }}</td>
                        </tr>
                        <tr>
                            <td colspan="4">* �યાય�ે�ર બોટાદ રહે શે .:</td>
                            @if ($data['bills']['type'] == "1")
                                <td>રોકડા √</td>    
                            @else
                                <td>રોકડા</td>
                            @endif
                        </tr>
                        <tr>
                            <td colspan="5">* ભૂલ - ચૂક લેવી દેવી.</td>
                        </tr>
                    </tbody>
                </table>
                {{-- {{ dd($data['user']) }} --}}
            @endif
        @endif
    </body>
</html>