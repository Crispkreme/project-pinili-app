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
        h1 { font-size: 15px; }
        p { font-size: 15px; }

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
    </style>
</head>
<body>
    <div class="container" style="flex-direction:column;">
        <div style="text-align: center;">
            <h1>Inventory Sheet Invoice Report</h1>
            <p>Display all company list of history</p>
        </div>
        <br>
        <br>
        <div>
            <h1>{{ $companyHistoryUser }}</h1>
            {{-- @foreach($companyHistory as $item)
                <h1>Company: {{ $item->manufacturer->company->company_name }}</h1>
                <h1>Address: {{ $item->manufacturer->company->address }}</h1>
            @endforeach --}}
        </div>
        <br>
        <div>
            {{-- @foreach($companyHistory as $item)
                <h1>Med Rep: {{ $item->supplier->name }}</h1>
                <h1>Invoice Number: {{ $item->invoice_number }}</h1>
                <h1>Date: {{ $item->created_at }}</h1>
            @endforeach --}}
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
            @foreach($companyHistory as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $item->product->medicine_name }}</td>
                    <td>{{ $item->product->generic_name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->product->sold }}</td>
                    <td>{{ $item->product->sku }}</td>
                    <td>{{ $item->order_status->status }}</td>
                    <td>{{ $item->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="container">
        <div class="left-column">
        </div>
        <div class="right-column">
            <div>
                <h1>Amount Paid: {{ $item->purchase_cost }}</h1>
            </div>
        </div>
    </div>
</body>
</html>
