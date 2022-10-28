<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fabcart</title>
    <style>
        body {
            background-color: #F6F6F6;
            margin: 0;
            padding: 0;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            margin: 0;
            padding: 0;
        }

        p {
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin-right: auto;
            margin-left: auto;
        }

        .brand-section {
            background-color: #0d1033;
            padding: 10px 40px;
        }

        .logo {
            width: 50%;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
        }

        .col-6 {
            width: 50%;
            flex: 0 0 auto;
        }

        .text-white {
            color: #fff;
        }

        .company-details {
            float: right;
            text-align: right;
        }

        .body-section {
            padding: 16px;
            border: 1px solid gray;
        }

        .heading {
            font-size: 20px;
            margin-bottom: 08px;
        }

        .sub-heading {
            color: #262626;
            margin-bottom: 05px;
        }

        table {
            background-color: #fff;
            width: 100%;
            border-collapse: collapse;
        }

        table thead tr {
            border: 1px solid #111;
            background-color: #f2f2f2;
        }

        table td {
            vertical-align: middle !important;
            text-align: center;
        }

        table th,
        table td {
            padding-top: 08px;
            padding-bottom: 08px;
        }

        .table-bordered {
            box-shadow: 0px 0px 5px 0.5px gray;
        }

        .table-bordered td,
        .table-bordered th {
            border: 1px solid #dee2e6;
        }

        .text-right {
            text-align: end;
        }

        .w-20 {
            width: 20%;
        }

        .float-right {
            float: right;
        }
    </style>
</head>

<body>
    <?php

    use App\Models\Lab_test;
use App\Models\Patient;
use App\Models\ServiceList;
    use App\Models\test_info;

    ?>

    <?php
    $total_referrer = 0;
    $sub_total = 0;
    $value = $test_reference;
    $test_table = Lab_test::where('test_reference', $value)->get();
    $accounts = ServiceList::where('test_reference', $value)->get();
    ?>
    @foreach($accounts as $info)
    <?php 
    $patient_id = $info->patient_id
    ?>
    @endforeach

    <?php
    $patient_details = Patient::where('id', $patient_id)->get();


    ?>

    <div class="container">
        <div class="brand-section">
            <div class="row">
                <div class="col-6">
                    <h1 class="text-white">Company Branding</h1>
                </div>
                <div class="col-6">
                    <div class="company-details">
                        <p class="text-white">Company Name</p>
                        <p class="text-white">Company Address</p>
                        <p class="text-white">mobile</p>
                    </div>
                </div>
            </div>
        </div>
        @foreach($accounts as $info)
        @foreach($patient_details as $p_data)

        <div class="body-section">
            <div class="row">
                <div class="col-6">
                    <h2 class="heading">Invoice No.: {{$p_data->id}}</h2>
                    <p class="sub-heading">Tracking No. <?php echo($value) ?> </p>
                    <p class="sub-heading">Order Date: {{$info->created_at}} </p>
                    <p class="sub-heading">Email Address:  </p>
                </div>
                <div class="col-6">
                    <p class="sub-heading">Full Name: {{$p_data->p_name}}</p>
                    <p class="sub-heading">Address: {{$p_data->p_address}}</p>
                    <p class="sub-heading">Phone Number: {{$p_data->p_mobile}}</p>
                    <p class="sub-heading">City,State,Pincode: </p>
                </div>
            </div>
        </div>
        @endforeach
        @endforeach

        <div class="body-section">
            <h3 class="heading">Test Items</h3>
            <br>
            <table class="table-bordered">
                <thead>
                    <tr>
                        <th>Test Name</th>
                        <th class="w-20">Price</th>

                    </tr>
                </thead>
                <tbody>
                @foreach($test_table as $test_table_data)
                    <?php

                    $test_Data = test_info::where('id', $test_table_data->test_id)->get();
                    ?>
                    @foreach($test_Data as $data)
                    <tr>
                        <td>{{$data->test_name}}</td>
                        <td>{{$data->price}}</td>

                    </tr>
                    @endforeach
                    @endforeach

                    @foreach($accounts as $item)
                    <tr>
                        <td colspan="1" class="text-right">Sub Total</td>
                        <td> {{$item->total}}</td>
                    </tr>
                    <tr>
                        <td colspan="1" class="text-right">Discount</td>
                        <td> {{$item->discount}}</td>
                    </tr>
                    <tr>
                        <td colspan="1" class="text-right">Grand Total</td>
                        <td> {{$item->total - $item->discount}}</td>
                    </tr>
                </tbody>
            </table>
            <br>
            <h3 class="heading">Payment Status: {{$item->account_status}}</h3>
            <h3 class="heading">Payment Mode: Cash</h3>
        </div>
        @endforeach

        <div class="body-section">
            <p>&copy; Copyright 2022 All rights reserved.
                <a href="" class="float-right"></a>
            </p>
        </div>
    </div>

</body>

</html>