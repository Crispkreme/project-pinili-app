<!DOCTYPE html>
<html>
<head>
    <title>Inventory Sheet Invoice Report</title>

    <style>
        body, div, h1, p, input {
            margin: 0;
            padding: 0;
        }
        body {
            font-family: monospace;
        }
        table {
            width: 100%;
            text-align: center;
        }
        .container {
            display: flex;
        }
        .left-column {
            flex: 1;
            padding: 10px;
        }
        .right-column {
            flex: 1;
            padding: 10px;
        }
        h1, p { font-size: 15px; }
        span { font-size: 12px; }

        input {
            width: 100%;
            padding: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        td, th {
            padding: 5px;
        }
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            font-size: 15px;
        }
        .row {
            display: flex;
            flex-wrap: wrap;
            margin-top: calc(-1 * 24px);
            margin-right: calc(-.5 * 0);
            margin-left: calc(-.5 * 24px);
        }
        .col-md-4 {
            -webkit-box-flex:0;
            -ms-flex:0 0 auto;
            flex:0 0 auto;
            width:33.33333333%;
        }
        .mb-3 {
            margin-bottom: 1rem!important;
        }
        .col-form-label {
            padding-top: calc(0.47rem + 1px);
            padding-bottom: calc(0.47rem + 1px);
            margin-bottom: 0;
            font-size: inherit;
            line-height: 1.5;
        }
        .col-md-9{
            -webkit-box-flex:0;
            -ms-flex:0 0 auto;
            flex:0 0 auto;
            width:75%;
        }
        .col{
            -webkit-box-flex:1;
            -ms-flex:1 0 0%;
            flex:1 0 0%;
        }
    </style>
</head>
<body>
    <div class="container" style="flex-direction:column;">
        <div style="text-align: left;">
            <h6>Inventory Sheet Invoice Report</h6>
        </div>
        <br>
        <br>
        <div style="text-align: center;">
            <h1>EDWIN C. PINILI MD.</h1>
            <p>OCCUPATION AND FAMILY HEALTH PHYSICIAN</p>
            <span>PINILI CLINIC 2ND RD.</span>
            <span>BRGY. CALUMPANG</span>
            <span>GENERAL SANTOS CITY, 9500</span>
        </div>
        <br>
        <br>
        <div class="row">
            <table style="border:none !important;">
                <tbody style="border:none !important;">
                    <tr style="text-align: left;">
                        <td style="width:10%;border:none !important;">Invoice Number</td>
                        <td style="width:25%;border:none !important;font-weight:500;">{{ $inventorySheet[0]['invoice_number'] }}</td>
                        <td style="width:10%;border:none !important;"></td>
                        <td style="width:25%;border:none !important;"></td>
                        <td style="width:10%;border:none !important;">Date</td>
                        <td style="width:20%;border:none !important;font-weight:500;">{{ \Carbon\Carbon::parse($inventorySheet[0]['created_at'])->format('F j, Y') }}</td>
                    </tr>
                    <tr style="text-align: left;">
                        <td style="width:10%;border:none !important;">Supplier</td>
                        <td style="width:25%;border:none !important;font-weight:500;">{{ $inventorySheet[0]['distributor']['entity']['name'] }}</td>
                        <td style="width:10%;border:none !important;">OR/PR Number</td>
                        <td style="width:25%;border:none !important;font-weight:500;">{{ $inventorySheet[0]['or_number'] }}</td>
                        <td style="width:10%;border:none !important;">OR/PR Date</td>
                        <td style="width:20%;border:none !important;font-weight:500;">{{ \Carbon\Carbon::parse($inventorySheet[0]['or_date'])->format('F j, Y') }}</td>
                    </tr>
                    <tr style="text-align: left;">
                        <td style="width:10%;border:none !important;">Delivery Number</td>
                        <td style="width:25%;border:none !important;font-weight:500;">{{ $inventorySheet[0]['delivery_number'] }}</td>
                        <td style="width:10%;border:none !important;">Delivery Date</td>
                        <td style="width:25%;border:none !important;font-weight:500;">{{ $inventorySheet[0]['delivery_date'] }}</td>
                        <td style="width:10%;border:none !important;">PO Order</td>
                        <td style="width:20%;border:none !important;font-weight:500;">{{ \Carbon\Carbon::parse($inventorySheet[0]['po_number'])->format('F j, Y') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <br>
        <br>
    </div>

    <table width="100%" style="border-color:#ddd;">
        <thead>
            <tr>
                <<th style="width:5%;padding:10px;text-align:center;">ID</th>
                <th style="width:30%;padding:10px;">Medicine Name</th>
                <th style="width:30%;padding:10px;">Generic Name</th>
                <th style="width:10%;padding:10px;text-align:center;">Price</th>
                <th style="width:10%;padding:10px;text-align:center;">Qty</th>
                <th style="width:10%;padding:10px;text-align:center;">Total Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orderData as $key => $item)
                <tr>
                    <td style="padding:10px;text-align:center;">
                        {{ $key + 1 }}
                    </td>
                    <td style="padding:10px;">
                        {{ $item->product->medicine_name }}
                    </td>
                    <td style="padding:10px;">
                        {{ $item->product->generic_name }}
                    </td>
                    <td style="padding:10px;text-align:center;">
                        {{ $item->purchase_cost }}
                    </td>
                    <td style="padding:10px;text-align:center;">
                        {{ $item->quantity }}
                    </td>
                    <td style="padding:10px;text-align:center;">
                        {{ $item->purchase_cost * $item->quantity }}
                    </td>
                </tr>
            @endforeach
            <tr>
                <td>Remarks</td>
                <td colspan="2">{{ $inventorySheet[0]['description'] }}</td>
                <td>Paid Amount</td>
                <td colspan="2">{{ $inventoryPayment[0]['paid_amount'] }}</td>
            </tr>
            <tr>
                <td>Payment Status</td>
                <td colspan="2">{{ $inventoryPayment[0]['payment_status']['status'] }}</td>
                <td>Discount</td>
                <td colspan="2">{{ $inventoryPayment[0]['discount_amount'] }}</td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td>Due Amount</td>
                <td colspan="2">{{ $inventoryPayment[0]['due_amount'] }}</td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td>Balance</td>
                <td colspan="2">{{ $inventoryPayment[0]['balance'] }}</td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td>Total Amount</td>
                <td colspan="2">{{ $inventoryPayment[0]['total_amount'] }}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>
