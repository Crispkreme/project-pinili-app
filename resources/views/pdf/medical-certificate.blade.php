<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Referral Certificate</title>

        <style>
            * {
                margin: 0 auto;
                padding: 0;
                box-sizing: border-box;
            }

            body {
                font-family: sans-serif;
            }

            .container {
                width: 600px;
                margin-top: 20px;
            }

            .container h1,
            .container-col-6 h4 {
                font-weight: 700;
                font-size: 20px;
                text-transform: uppercase;
            }

            .container p,
            .container-col-6 p span {
                font-weight: 300;
                font-size: 15px;
            }

            .container-row {
                margin-top: 20px;
            }

            .container-row:after {
                content: "";
                display: table;
                clear: both;
            }

            .container-col-6 {
                float: left;
                width: 50%;
                padding: 10px;
            }

            .row-separator {
                margin-top: 20px;
                margin-bottom: 20px;
            }

            .request-date {
                text-align: right;
            }

            .container-col-6 p .content,
            .content {
                font-weight: 700;
                text-transform: capitalize;
                font-size: 15px;
            }

            .details {
                float: right;
                margin-top: 50px;
            }

            .title {
                text-align: center;
            }
        </style>

    </head>

    <body>
        <div class="container">
            <h1>EDWIN C. PINILI. MD</h1>
            <p>Occupation and Family Health Physician</p>

            <div class="container-row">
                <div class="container-col-6">
                    <h4>clinic address:</h4>
                    <p>
                        <span>2nd Rd., Brgy. Calumpang</span><br>
                        <span>General Santos City, 9500</span><br>
                        <span>09751785527</span><br>
                        <span>dyanatech1368@gmail.com</span>
                    </p>
                </div>
                <div class="container-col-6">
                    <h4>CLINIC HOURS:</h4>
                    <p>
                        <span>Monday - Saturday</span><br>
                        <span>09:00 am - 05:00 pm</span><br>
                    </p><br>
                    <h4>FOR APPOINTMENT:</h4>
                    <p>
                        <span>TEL. NO.: (083) 552-3857</span><br>
                    </p>
                </div>
            </div>
            <hr class="row-separator">
            <h1 class="title">MEDICAL CERTIFICATE</h1>
            <div class="request-date">
                <p>Date: <span class="content">{{ \Carbon\Carbon::parse(now())->format('F j, Y g:i A') }}</span></p>
            </div>
            <div class="container-row">
                <p>To Whom it May Concern:</p><br>
                <p>This is to certify that Mr/Ms/Mrs. <span class="content">{{ $patientData->firstname }}
                        {{ $patientData->mi }} {{ $patientData->lastname }} {{ $patientData->age }}</span> yrs old. And
                    residence of <span class="content">{{ $patientData->address }}</span> was seen and examined at <span
                        class="content">{{ \Carbon\Carbon::parse($patientData->created_at)->format('F j, Y g:i A') }}</span>,
                    and was found to have/be suffering from:
                </p><br>
                <h4>Diagnosis</h4>
                <p>{{ strip_tags(str_replace('&nbsp;', '', $bmiData->symptoms)) }}</p>
                <br>
                <h4>Recomendations</h4>
                <p>{{ strip_tags(str_replace('&nbsp;', '', $bmiData->diagnosis)) }}</p>
            </div>
            <hr class="row-separator">
            <div class="details">
                <p>
                    EDWIN C. PINILI MD. <br>
                    PRT NO.: 0090481 <br>
                    LIC. NO.: 9585750
                </p>
            </div>
        </div>
    </body>

</html>
