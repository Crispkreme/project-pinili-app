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
        .alert-pending {
            color: #997029;
            background-color: #fff1da;
            border-color: #ffebc7;
            border: 1px solid black;
        }
        .alert-success {
            color: #437d52;
            background-color: #e2f6e7;
            border-color: #d4f1db;
            border: 1px solid black;
        }
        .alert-primary {
            color: #005b64;
            background-color: #cceaed;
            border-color: #b3e0e5;
            border: 1px solid black;
        }
        .alert-danger {
            color: #921c32;
            background-color: #fdd5dd;
            border-color: #fbc1cb;
            border: 1px solid black;
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
        <div>
            <h1>Company: {{ $company->company->company_name }}</h1>
            <h1>Address: {{ $company->company->address }}</h1>
        </div>
        <br>
        <div>
            <h1>Med Rep: {{ $supplierName }}</h1>
            <h1>Invoice Number: {{ $orderData->invoice_number }}</h1>
            <h1>Date: {{ date("M d Y", strtotime($orderData->created_at)) }}</h1>
        </div>
        <br>
    </div>
    <table>
        <thead>
            <tr>
            <th>ID</th>
            <th>Medicine Name</th>
            <th>Generic Name</th>
            <th>Stock Deliver</th>
            <th>Stock Sold</th>
            <th>Current Stock</th>
            <th>Status</th>
            <th>Date Deliver</th>
            </tr>
        </thead>
        <tbody>
            @foreach($companyHistories as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $item->product->medicine_name }}</td>
                    <td>{{ $item->product->generic_name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->product->sold }}</td>
                    <td>{{ $item->product->sku }}</td>
                    @if ($item->order_status->status == 'pending')
                        <td class="alert-pending">{{ $item->order_status->status }}</td>
                    @elseif ($item->order_status->status == 'received')
                        <td class="alert-success">{{ $item->order_status->status }}</td>
                    @elseif ($item->order_status->status == 'onhand')
                        <td class="alert-primary">{{ $item->order_status->status }}</td>
                    @else
                        <td class="alert-danger">{{ $item->order_status->status }}</td>
                    @endif
                    <td>{{ date("M d Y", strtotime($orderData->created_at)) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="container">
        <div class="left-column">
        </div>
        <div class="right-column">
            <div>
                <h1>Amount Paid: {{ $orderData->purchase_cost }}</h1>
            </div>
        </div><br><br>
    </div>
    <div class="container">
        <div class="left-column">
            <div>
                <h1>Approved by: <span style="border-bottom: 1px solid #000;font-size:15px;">{{ $approveBy }}</span></h1>
            </div><br><br><br>
        </div>
        <div class="right-column">
            <div>
                <h1>Recieve by: <span style="border-bottom: 1px solid #000;font-size:15px;">{{ $recievedBy }}</span></h1>
            </div>
        </div>
    </div>
</body>
</html>
