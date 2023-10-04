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
            <div class="col-md-4">
                <div class="row mb-3">
                    <label for="name" class="col-form-label">Invoice Number</label>
                    <h5>Invoice Number</h5>
                </div>
            </div>
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="row mb-3">
                    <label for="name" class="col-form-label">Date</label>
                    <h5>Date</h5>
                </div>
            </div>
        </div>
        <div class="row mb-3" style="display: flex;">
            <div class="col-md-4">
                <label for="name" class="col-form-label">Supplier</label>
                <p>Supplier</p>
            </div>
            <div class="col-md-4">
                <label for="name" class="col-form-label">OR/PR Number</label>
                <p>OR/PR Number</p>
            </div>
            <div class="col-md-4">
                <label for="name" class="col-form-label">OR/PR Date</label>
                <p>OR/PR Date</p>
            </div>
        </div>
        <div class="row" style="align-items: flex-end;">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-4">
                        <label for="name" class="col-form-label">Delivery Number</label>
                        <p>Delivery Number</p>
                    </div>
                    <div class="col-md-4">
                        <label for="name" class="col-form-label">Delivery Date</label>
                        <p>Delivery Date</p>
                    </div>
                    <div class="col-md-4">
                        <label for="name" class="col-form-label">PO Order</label>
                        <p>PO Order</p>
                    </div>
                </div>
            </div>
            <div class="col">
            </div>
        </div>
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
