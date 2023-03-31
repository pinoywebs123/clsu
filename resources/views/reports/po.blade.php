<!DOCTYPE html>
<html>
<head>
    <title>CLSU - Purchased Order report</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            padding: 10px;
        }

        .clearer {
            clear: both;
        }

        .heading {
            text-align: center;
        }

        .left {
            float: left;
        }

        .right {
            float: right;
        }

        .h-100 {
            height: 100%;
        }

        .w-50 {
            width: 50%;
        }

        .w-100 {
            width: 100%;
        }

        .w-200 {
            width: 200px;
        }

        .center {
            text-align: center;
        }

        .bold {
            font-weight: bold;
        }

        .fs-2 {
            font-size: 1.2em;
        }

        .fs-3 {
            font-size: 1.5em;
        }

        .mt-1 {
            margin-top: 5px;
        }

        .mt-2 {
            margin-top: 20px;
        }

        .mb-1 {
            margin-bottom: 5px;
        }

        .p-1 {
            padding: 5px;
        }

        .pl-01 {
            padding-left: 5px;
        }

        .pl-1 {
            padding-left: 30px;
        }

        .pl-2 {
            padding-left: 120px;
        }

        .pv-1 {
            padding: 30px 5px;
        }

        .pt-1 {
            padding-top: 20px;
        }

        .pb-1 {
            padding-bottom: 10px;
        }

        .bb, .underlined {
            border-bottom: 1px solid #333;
        }

        .bb-2 {
            border-bottom: 2px solid #333;
        }

        .bt {
            border-top: 1px solid #333;
        }

        .br {
            border-right: 1px solid #333;
        }

        .bl {
            border-left: 1px solid #333;
        }

        .bt-2 {
            border-top: 2px solid #333;
        }

        .bb-0 {
            border-bottom: 0;
        }

        .w-30 {
            width: 40%;
        }

        #order_list {
            min-height: 500px;
        }

        #order_list tr:not(#expand), table tr {
            height: 20px;
        }

        table {
            border-collapse: collapse;
        }

        .subheading td:first-of-type {
            width: 20%;
        }
    </style>
</head>
<body>
    <div class="center mb-1">
        <p>Republic of the Philippines</p>
        <p><b>CENTRAL LUZON STATE UNIVERSITY</b></p>
        <p>Science City of Mu&ntilde;oz, Nueva Icija</p>
    </div>

    <div class="mb-1">
        <div class="left bold w-200 pl-1">
            2366
        </div>
        <div class="center right w-200 fs-2">
            General Admission
        </div>
        <div class="clearer"></div>
    </div>

    <div class="center">
        <p class="fs-2 bold">PURCHASE ORDER</p>
    </div>

    <div class="bb">
        <p class="pl-1">PR# 22-8-3091</p>
    </div>

    <table class="subheading w-100">
        <tr>
            <td>Supplier</td>
            <td style="width: 10px;">: </td>
            <td class="bold underlined">PANDAYAN BOOKSHOP, INC.</td>
            <td class="pl-01">P.o. No.</td>
            <td class="center bold underlined">2366</td>
        </tr>

        <tr>
            <td>Address</td>
            <td style="width: 10px;">: </td>
            <td class="bold underlined">San Jose, Nueva Ecija</td>
            <td class="pl-01">Date:</td>
            <td class="center bold underlined">September 21, 2022</td>
        </tr>

        <tr>
            <td>E-mail Address</td>
            <td style="width: 10px;">: </td>
            <td class="bold underlined"></td>
            <td class="pl-01" rowspan="2">Mode of <br>Procurement:</td>
            <td rowspan="2" class="center bold underlined bold">Shopping</td>
        </tr>

        <tr>
            <td>Telephone No.</td>
            <td style="width: 10px;">: </td>
            <td class="bold underlined"></td>
        </tr>

        <tr class="bb">
            <td>TIN</td>
            <td style="width: 10px;">: </td>
            <td class="bold underlined"></td>
        </tr>
    </table>

    <p class="pl-1">Gentlemen:</p>

    <p class="pl-2">Please furnish this office the following articles subject to the terms and conditions</p>
    <p class="pl-1">contained herein: </p>

    <table class="subheading w-100">
        <tr class="bt">
            <td>Place of Delivery</td>
            <td style="width: 10px;">: </td>
            <td class="bold underlined">Prop. Bodega then to c/o: Janet O. Saturno</td>
            <td class="pl-01">Delivery Term</td>
            <td style="width: 10px;">: </td>
            <td class="center bold underlined">30 days</td>
        </tr>

        <tr>
            <td>Date of Delivery</td>
            <td style="width: 10px;">: </td>
            <td class="bold underlined"></td>
            <td class="pl-01">Payment Term</td>
            <td style="width: 10px;">: </td>
            <td class="center bold underlined">charge</td>
        </tr>
    </table>

    <table id="order_list" class="mt-2 bt-2 w-100 bb">
        <tr class="center bb">
            <th>Stock No.</th>
            <th class="bl br">Unit</th>
            <th class="bl br w-30">DESCRIPTION</th>
            <th class="bl br">Qty.</th>
            <th class="bl br">Unit Cost</th>
            <th>Amount</th>
        </tr>

        <tr class="center">
            <td></td>
            <td class="bl br"></td>
            <td class="bl br bold pv-1">For the use of GAD (Materials needed for Adopt a School Program)</td>
            <td class="bl br"></td>
            <td class="bl br"></td>
            <td></td>
        </tr>

        <tr class="center">
            <td>5</td>
            <td class="bl br">ream</td>
            <td class="bl br">Construction paper, assorted colors, letter, (8-1/2" X 11"), 20's/pack</td>
            <td class="bl br">40</td>
            <td class="bl br">Php 161.50</td>
            <td>Php 6,460.00</td>
        </tr>

        <tr class="center">
            <td>7</td>
            <td class="bl br">packs</td>
            <td class="bl br">Rubber mat (puzzle mat) 60x60cm big 4pcs/pack</td>
            <td class="bl br">14</td>
            <td class="bl br">Php 167</td>
            <td>Php 2,338.00</td>
        </tr>

        <tr id="expand">
            <td></td>
            <td class="bl br"></td>
            <td class="bl br"></td>
            <td class="bl br"></td>
            <td class="bl br"></td>
            <td></td>
        </tr>
        <tr class="bt">
            <td colspan="2">(Total amount in words):</td>
            <td colspan="3" class="bl br p-1">Eight thousand seven hundred ninety eight pesos only</td>
            <td class="p-1">Php 8,798.00</td>
        </tr>
    </table>

    <p class="pl-1">In case of failure to make full delivery within the time specified above, a penalty of one-tenth (1/10) of one percent for every day of delay shall be imposed.</p>

    <p class="mt-1 pl-1">Recommending Approval:</p>

    <table id="approval" class="w-100">
        <tr>
            <td rowspan="4">Conforme:</td>
            <td class="bold center w-30" style="padding-top: 50px;">
                <div class="bb" style="width: 70%; margin: 0 auto;">JAQUILYN EIGUENDA</div>
            </td>
            <td rowspan="4">Very truly yours,</td>
            <td class="bold center w-30" style="padding-top: 50px;">
                <div class="bb" style="width: 70%; margin: 0 auto;">DANILO S. VARGAS</div>
            </td>
        </tr>

        <tr>
            <td class="center">(Signature over printed name of Supplier)</td>
            <td class="center">(VP FOR Administration)</td>
        </tr>

        <tr>
            <td class="center w-30">
                <div class="bb" style="width: 50%; margin: 0 auto;">10-24-22</div>
            </td>
            <td></td>
        </tr>

        <tr>
            <td class="center w-30">Date</td>
            <td></td>
        </tr>
    </table>

    <table class="w-100 bt bb-2">
        <tr>
            <td class="w-50 br" rowspan="2">
                <p>Funds Available:</p>

                <p class="center">JINKY A. PARUGRUG</p>
                <p class="center">Chief Accountant</p>
            </td>
            <td class="pl-01">OS/BUR No.: </td>
            <td class="bb center">2022-101-09-484</td>
        </tr>
        <tr>
            <td class="pl-01">Amount: </td>
            <td class="bb center">8,798</td>
        </tr>
        <tr>
            <td class="br"></td>
            <td></td>
        </tr>
    </table>
</body>
</html>
