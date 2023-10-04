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
            <h1>Company: </h1>
            <h1>Address: </h1>
        </div>
        <br>
        <div>
            <h1>Med Rep: </h1>
            <h1>Invoice Number: </h1>
            <h1>Date: </h1>
        </div>
        <br>
    </div>

    <table width="100%" style="border-color:#ddd;">
        <thead>
            <tr>
                <th style="width:10%;padding:10px;text-align:center;">ID</th>
                <th style="width:30%;padding:10px;">Medicine Name</th>
                <th style="width:30%;padding:10px;">Generic Name</th>
                <th style="width:10%;padding:10px;text-align:center;">Price</th>
                <th style="width:10%;padding:10px;text-align:center;">Qty</th>
                <th style="width:10%;padding:10px;text-align:center;">Total Price</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>ID</td>
                <td>Medicine Name</td>
                <td>Generic Name</td>
                <td>Price</td>
                <td>Qty</td>
                <td>Total Price</td>
            </tr>
            <tr>
                <td>Remarks</td>
                <td colspan="2">Remarks</td>
                <td>Paid Amount</td>
                <td colspan="2">Remarks</td>
            </tr>
            <tr>
                <td>Payment Status</td>
                <td colspan="2">Payment Status</td>
                <td>Discount</td>
                <td colspan="2">Discount</td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td>Due Amount</td>
                <td colspan="2">Discount</td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td>Balance</td>
                <td colspan="2">Balance</td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td>Total Amount</td>
                <td colspan="2">Total Amount</td>
            </tr>
        </tbody>
    </table>
</body>
</html>
