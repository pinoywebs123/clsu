<!DOCTYPE html>
<html>
<head>
    <title>Inspection And Acceptance Report</title>
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

        .left {
            float: left;
        }

        .right {
            float: right;
        }

        .h-100 {
            height: 100%;
        }

        .w-100 {
            width: 100%;
        }

        .w-200 {
            width: 200px;
        }

        .w-50 {
            width: 50%;
        }

        .bb {
            border-bottom: 1px solid #333;
        }

        .fu-1 {
            border: 1px solid #333;
            text-align: left;
            padding: 10px;
        }

        .w-90 {
            width: 90%;
        }

        .w90-center {
            margin-left: 5%;
        }

        .w-80 {
            width: 80%;
        }
        
        .w-70 {
            width: 70%;
        }

        .w-40 {
            width: 40%;
        }

        .w-30 {
            width: 30%;
        }

        .w-20 {
            width: 20%;
        }

        .w-15 {
            width: 15%;
        }

        .w-10 {
            width: 20%;
        }

        .tables-1 {
            text-align: center;
            padding: 10px;
            height: 60px;
            overflow: hidden;
        }

        .tables-2 {
            height: 30px;
        }

        .tables-1 {
            line-height: 40px;
        }

        #table .tables-1:first-of-type {
            line-height: unset;
        }

        .border {
            border: 1px solid #333;
        }

        .bl {
            border-left: 1px solid #333;
        }

        .br {
            border-right: 1px solid #333;
        }

        .bt {
            border-top: 1px solid #333;
        }

        .bold {
            font-weight: bold;
        }

        .p-1 {
            padding: 10px;
        }

        .box {
            width: 40px;
            height: 40px;
            margin-left: 10px;
        }

        .mt-1 {
            margin-top: 10px;
        }

        .mt-2 {
            margin-top: 20px;
        }

        .insacc {
            height: 160px;
        }
        
        .bb-0 {
            border-bottom: 0;
        }

        .bt-0 {
            border-top: 0;
        }

        .ph-1 {
            padding: 0 5%;
        }

        .center {
            text-align: center;
        }

        #heading {
            text-align: center;
        }

        #heading h1 {
            margin-bottom: 50px;
        }

        #supplier {
            width: 65px;
        }

        #supplier_line {
            max-width: 1000px;
            width: calc(100% - 70px);
        }

        #PO_No_Date {
            width: 100px;
        }

        #PO_No_Date_line {
            max-width: 1000px;
            width: calc(100% - 105px);
        }

        #Requisitioning_Office_Dept {
            width: 200px;
        }

        #Requisitioning_Office_Dept_line {
            max-width: 1000px;
            width: calc(100% - 205px);
        }

        #Responsibility_Center_Code {
            width: 200px;
        }

        #Responsibility_Center_Code_Line {
            max-width: 1000px;
            width: calc(100% - 205px);
        }

        #IAR_No {
            width: 65px;
        }

        #IAR_No_Line {
            max-width: 1000px;
            width: calc(100% - 70px);
        }

        #Date {
            width: 40px;
        }

        #Date_Line {
            max-width: 1000px;
            width: calc(100% - 45px);
        }

        #Invoice_No {
            width: 85px;
        }

        #Invoice_No_Line {
            max-width: 1000px;
            width: calc(100% - 90px);
        }

        #body {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div id="heading">
        <h1>INSPECTION AND ACCEPTANCE REPORT</h1>
        <div class="right w-200">
            <p class="left w-50">Fund Cluster :</p>
            <div class="left w-50 h-100 bb">&nbsp;</div>
            <div class="clearer"></div>
        </div>
        <div class="clearer"></div>
    </div>
    
    <div id="body">
        <div class="fu-1 left w-70">
            <div>
                <p id="supplier" class="left">Supplier: </p>
                <div id="supplier_line" class="left h-100 bb">&nbsp;</div>
                <div class="clearer"></div>
            </div>
            <div>
                <p id="PO_No_Date" class="left">PO No./Date :</p>
                <div id="PO_No_Date_line" class="left h-100 bb">&nbsp;</div>
                <div class="clearer"></div>
            </div>
            <div>
                <p id="Requisitioning_Office_Dept" class="left">Requisitioning Office/Dept. :</p>
                <div id="Requisitioning_Office_Dept_line" class="left h-100 bb">&nbsp;</div>
                <div class="clearer"></div>
            </div>
            <div>
                <p id="Responsibility_Center_Code" class="left">Responsibility Center Code :</p>
                <div id="Responsibility_Center_Code_Line" class="left h-100 bb">&nbsp;</div>
                <div class="clearer"></div>
            </div>
        </div>

        <div class="fu-1 left w-30">
            <div>
                <p id="IAR_No" class="left">IAR No.: </p>
            <div id="IAR_No_Line" class="left h-100 bb">&nbsp;</div>
                <div class="clearer"></div>
            </div>
            <div>
                <p id="Date" class="left">Date: </p>
                <div id="Date_Line" class="left h-100 bb">&nbsp;</div>
                <div class="clearer"></div>
            </div>
            <div>
                <p id="Invoice_No" class="left">Invoice No.:</p>
                <div id="Invoice_No_Line" class="left h-100 bb">&nbsp;</div>
                <div class="clearer"></div>
            </div>
            <div>
                <p id="Date" class="left">Date: </p>
                <div id="Date_Line" class="left h-100 bb">&nbsp;</div>
                <div class="clearer"></div>
            </div>
        </div>
        <div class="clearer"></div>
    </div>
    
    <div id="table" class="w-100">
        <div class="bl tables-1 left w-15">
            <b>Stock/<br>Property No.</b>
        </div>
        <div class="bl tables-1 left w-40">
            <b>Description</b>
        </div>
        <div class="bl tables-1 left w-15">
            <b>Unit</b>
        </div>
        <div class="bl tables-1 left w-15">
            <b>Quantity</b>
        </div>
        <div class="bl br tables-1 left w-15">
            <b>Amount</b>
        </div>
        <div class="clearer"></div>
    </div>
    <div>
        <div class="tables-2 bl bb left w-15">&nbsp;</div>
        <div class="tables-2 bl bb left w-40">&nbsp;</div>
        <div class="tables-2 bl bb left w-15">&nbsp;</div>
        <div class="tables-2 bl bb left w-15">&nbsp;</div>
        <div class="tables-2 bl bb br left w-15">&nbsp;</div>
        <div class="clearer"></div>
    </div>
    <div>
        <div class="tables-2 bl bb left w-15">&nbsp;</div>
        <div class="tables-2 bl bb left w-40">&nbsp;</div>
        <div class="tables-2 bl bb left w-15">&nbsp;</div>
        <div class="tables-2 bl bb left w-15">&nbsp;</div>
        <div class="tables-2 bl bb br left w-15">&nbsp;</div>
        <div class="clearer"></div>
    </div>
    <div>
        <div class="tables-2 bl bb left w-15">&nbsp;</div>
        <div class="tables-2 bl bb left w-40">&nbsp;</div>
        <div class="tables-2 bl bb left w-15">&nbsp;</div>
        <div class="tables-2 bl bb left w-15">&nbsp;</div>
        <div class="tables-2 bl bb br left w-15">&nbsp;</div>
        <div class="clearer"></div>
    </div>
    <div>
        <div class="tables-2 bl bb left w-15">&nbsp;</div>
        <div class="tables-2 bl bb left w-40">&nbsp;</div>
        <div class="tables-2 bl bb left w-15">&nbsp;</div>
        <div class="tables-2 bl bb left w-15">&nbsp;</div>
        <div class="tables-2 bl bb br left w-15">&nbsp;</div>
        <div class="clearer"></div>
    </div>
    <div>
        <div class="tables-2 bl bb left w-15">&nbsp;</div>
        <div class="tables-2 bl bb left w-40">&nbsp;</div>
        <div class="tables-2 bl bb left w-15">&nbsp;</div>
        <div class="tables-2 bl bb left w-15">&nbsp;</div>
        <div class="tables-2 bl bb br left w-15">&nbsp;</div>
        <div class="clearer"></div>
    </div>
    <div>
        <div class="tables-2 bl bb left w-15">&nbsp;</div>
        <div class="tables-2 bl bb left w-40">&nbsp;</div>
        <div class="tables-2 bl bb left w-15">&nbsp;</div>
        <div class="tables-2 bl bb left w-15">&nbsp;</div>
        <div class="tables-2 bl bb br left w-15">&nbsp;</div>
        <div class="clearer"></div>
    </div>
    <div>
        <div class="tables-2 bl bb left w-15">&nbsp;</div>
        <div class="tables-2 bl bb left w-40">&nbsp;</div>
        <div class="tables-2 bl bb left w-15">&nbsp;</div>
        <div class="tables-2 bl bb left w-15">&nbsp;</div>
        <div class="tables-2 bl bb br left w-15">&nbsp;</div>
        <div class="clearer"></div>
    </div>
    <div>
        <div class="tables-2 bl bb left w-15">&nbsp;</div>
        <div class="tables-2 bl bb left w-40">&nbsp;</div>
        <div class="tables-2 bl bb left w-15">&nbsp;</div>
        <div class="tables-2 bl bb left w-15">&nbsp;</div>
        <div class="tables-2 bl bb br left w-15">&nbsp;</div>
        <div class="clearer"></div>
    </div>
    <div>
        <div class="tables-2 bl bb left w-15">&nbsp;</div>
        <div class="tables-2 bl bb left w-40">&nbsp;</div>
        <div class="tables-2 bl bb left w-15">&nbsp;</div>
        <div class="tables-2 bl bb left w-15">&nbsp;</div>
        <div class="tables-2 bl bb br left w-15">&nbsp;</div>
        <div class="clearer"></div>
    </div>
    <div>
        <div class="tables-2 bl bb left w-15">&nbsp;</div>
        <div class="tables-2 bl bb left w-40">&nbsp;</div>
        <div class="tables-2 bl bb left w-15">&nbsp;</div>
        <div class="tables-2 bl bb left w-15">&nbsp;</div>
        <div class="tables-2 bl bb br left w-15">&nbsp;</div>
        <div class="clearer"></div>
    </div>
    <div>
        <div class="tables-2 bl bb left w-15">&nbsp;</div>
        <div class="tables-2 bl bb left w-40">&nbsp;</div>
        <div class="tables-2 bl bb left w-15">&nbsp;</div>
        <div class="tables-2 bl bb left w-15">&nbsp;</div>
        <div class="tables-2 bl bb br left w-15">&nbsp;</div>
        <div class="clearer"></div>
    </div>
    <div>
        <div class="tables-2 bl bb left w-15">&nbsp;</div>
        <div class="tables-2 bl bb left w-40">&nbsp;</div>
        <div class="tables-2 bl bb left w-15">&nbsp;</div>
        <div class="tables-2 bl bb left w-15">&nbsp;</div>
        <div class="tables-2 bl bb br left w-15">&nbsp;</div>
        <div class="clearer"></div>
    </div>
    <div>
        <div class="tables-2 bl bb left w-15">&nbsp;</div>
        <div class="tables-2 bl bb left w-40">&nbsp;</div>
        <div class="tables-2 bl bb left w-15">&nbsp;</div>
        <div class="tables-2 bl bb left w-15">&nbsp;</div>
        <div class="tables-2 bl bb br left w-15">&nbsp;</div>
        <div class="clearer"></div>
    </div>
    <div>
        <div class="tables-2 bl bb left w-15">&nbsp;</div>
        <div class="tables-2 bl bb left w-40">&nbsp;</div>
        <div class="tables-2 bl bb left w-15">&nbsp;</div>
        <div class="tables-2 bl bb left w-15">&nbsp;</div>
        <div class="tables-2 bl bb br left w-15">&nbsp;</div>
        <div class="clearer"></div>
    </div>
    <div>
        <div class="tables-2 bl bb left w-15">&nbsp;</div>
        <div class="tables-2 bl bb left w-40">&nbsp;</div>
        <div class="tables-2 bl bb left w-15">&nbsp;</div>
        <div class="tables-2 bl bb left w-15">&nbsp;</div>
        <div class="tables-2 bl bb br left w-15">&nbsp;</div>
        <div class="clearer"></div>
    </div>
    <div>
        <div class="tables-2 bl bb left w-15">&nbsp;</div>
        <div class="tables-2 bl bb left w-40">&nbsp;</div>
        <div class="tables-2 bl bb left w-15">&nbsp;</div>
        <div class="tables-2 bl bb left w-15">&nbsp;</div>
        <div class="tables-2 bl bb br left w-15">&nbsp;</div>
        <div class="clearer"></div>
    </div>
    <div>
        <div class="tables-2 bl bb left w-15">&nbsp;</div>
        <div class="tables-2 bl bb left w-40">&nbsp;</div>
        <div class="tables-2 bl bb left w-15">&nbsp;</div>
        <div class="tables-2 bl bb left w-15">&nbsp;</div>
        <div class="tables-2 bl bb br left w-15">&nbsp;</div>
        <div class="clearer"></div>
    </div>
    <div>
        <div class="tables-2 bl bb left w-15">&nbsp;</div>
        <div class="tables-2 bl bb left w-40">&nbsp;</div>
        <div class="tables-2 bl bb left w-15">&nbsp;</div>
        <div class="tables-2 bl bb left w-15">&nbsp;</div>
        <div class="tables-2 bl bb br left w-15">&nbsp;</div>
        <div class="clearer"></div>
    </div>
    <div>
        <div class="tables-1 w-50 left border bold">INSPECTION</div>
        <div class="tables-1 w-50 left border bold">ACCEPTANCE</div>
        <div class="clearer"></div>
    </div>
    <div>
        <div class="insacc bb-0 w-50 left border p-1">
            <div class="w-100">
                <div class="bold left">Date Inspected: &nbsp;</div>
                <div class="bold w-50 left bb">&nbsp;</div>
                <div class="clearer"></div>
            </div>

            <div class="w-100 mt-1">
                <div class="w-20 left">
                    <div class="border box">&nbsp;</div>
                </div>
                <div class="w-70 left">Inspected, verified and found in order as to quantity and specifications
                </div>
                <div class="clearer"></div>
            </div>
        </div>
        <div class="insacc bb-0 w-50 left border p-1">
            <div class="w-100">
                <div class="bold w-35 left">Date Received: &nbsp;</div>
                <div class="bold w-50 left bb">&nbsp;</div>
                <div class="clearer"></div>
            </div>

            <div class="w-100 mt-1">
                <div class="w-20 left">
                    <div class="border box">&nbsp;</div>
                </div>
                <div class="w-70 left mt-1">Complete
                </div>
                <div class="clearer"></div>
            </div>

            <div class="w-100 mt-1">
                <div class="w-20 left">
                    <div class="border box">&nbsp;</div>
                </div>
                <div class="w-70 left mt-1">Partial (pls. specify quantity)
                </div>
                <div class="clearer"></div>
            </div>
        </div>
        <div class="clearer"></div>
    </div>
    <div>
        <div class="p-1 w-50 left border bt-0">
            <div class="w-90 w90-center bb">&nbsp;</div>
            <p class="center">Inspection Officer/Inspection Committee</p>
        </div>
        <div class="p-1 w-50 left border bt-0">
            <div class="w-90 w90-center bb">&nbsp;</div>
            <p class="center">Supply and/or Property Custodian</p>
        </div>
        <div class="clearer"></div>
    </div>
</body>
</html>