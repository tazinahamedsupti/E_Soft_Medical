<!DOCTYPE html>
<html>

<head>
    <title>New Patient</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">

</head>

<body>

    @include('admin.sidebar')

    <div class="main">



        <div>

            <?php
            // $lab_test = Lab_test::where()

            use App\Models\Lab_test;
            use App\Models\ServiceList;
            use App\Models\test_info;

            ?>

            <?php
            $total_referrer = 0;
            $sub_total = 0;
            $value = $test_reference;
            $test_table = Lab_test::where('test_reference', $value)->get();
            ?>

            <form action="{{ url('update_service_list') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="test_reference" value="<?php echo ($value); ?>">
                <a href="/invoice/<?php echo ($value); ?>" class="btn btn-primary">Print Invoice</a>
                <a href="/test_result/<?php echo ($value); ?>" class="btn btn-primary">Print Test Result</a>
                <table>
                    <tr style="background-color:cornflowerblue; text-align:center;">
                        <th>Test Name</th>
                        <th>Referrer Fee</th>
                        <th>Amount</th>
                    </tr>

                    <!-- Test Item -->

                    @foreach($test_table as $test_table_data)
                    <?php

                    $test_Data = test_info::where('id', $test_table_data->test_id)->get();
                    ?>
                    @foreach($test_Data as $data)
                    <tr>
                        <td>{{$data->test_name}}</td>
                        <td>{{$data->referref_fee}}</td>
                        <td>{{$data->price}}</td>
                    </tr>

                    <?php
                    $total_referrer = $data->referref_fee + $total_referrer;
                    $sub_total = $data->price + $sub_total;
                    ?>
                    @endforeach
                    @endforeach




                    <tr>
                        <td><strong style="float:right;">Total:</strong></td>
                        <td><strong><?php echo ($total_referrer) ?></strong></td>
                        <td><strong><?php echo ($sub_total) ?></strong></td>
                    </tr>
                    <tr>
                        <td colspan="2">Report Delivery Date: <input name="date" style="width:10rem;" type="date" required> <br> Time:<input name="time" style="width:5rem;" value="12">
                            <select name="time_period" style="width:5rem;">
                                <option>PM</option>
                                <option>AM</option>
                            </select>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="2"><strong style="float:right;">Sub Total:</strong></td>
                        <td><strong><?php echo ($sub_total) ?><input type="hidden" name="total" value="<?php echo ($sub_total) ?>"></strong></td>
                    </tr>


                    <?php
                    $balance_info = ServiceList::Where('test_reference', $value)->get();
                    ?>


                    @foreach($balance_info as $balance)
                    <tr>
                        <td colspan="2"><strong style="float:right;">Discount Amount:</strong></td>
                        <td><strong><input name="discount" style="width:10rem;" value="{{$balance->discount}}"></strong></td>
                    </tr>
                    <tr>
                        <td colspan="2"><strong style="float:right;">Payment:</strong></td>
                        <td><strong><input name="payment" style="width:10rem;" value="{{$balance->payment}}"></strong></td>
                    </tr>
                    <tr>
                        <td colspan="2"><strong style="float:right;">Next Payment:</strong></td>
                        <td><strong><input name="next_payment" style="width:10rem;" value="0"></strong></td>
                        <input type="hidden" name="report_status" value="Pending">
                    </tr>
                    <tr>
                        <td colspan="2"><strong style="float:right;">Due:</strong></td>
                        <td><strong><input name="due" style="width:10rem;" placeholder="{{$balance->due}}" readonly></strong></td>
                        <input type="hidden" name="report_status" value="Pending">
                    </tr>

                    @endforeach




                </table>


                <!-- <button type="submit" class="btn-margine btn btn-warning" style="margin-bottom:2px ;">Calculate Data</button> -->
                <button type="submit" class="btn-margine btn btn-primary">Update Data</button>

            </form>
            <br>

        </div>




    </div>

    <script>
        /* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
        var dropdown = document.getElementsByClassName("dropdown-btn");
        var i;

        for (i = 0; i < dropdown.length; i++) {
            dropdown[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var dropdownContent = this.nextElementSibling;
                if (dropdownContent.style.display === "block") {
                    dropdownContent.style.display = "none";
                } else {
                    dropdownContent.style.display = "block";
                }
            });
        }
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {

            $(document).on('change', '.testinfo', function() {
                // console.log("hmm it get");

                var test_name = $(this).val();

                var a = $(this).parent();
                // console.log(test_name);
                var op = "";
                $.ajax({
                    type: 'get',
                    url: '{!!URL::to('
                    findPrice ')!!}',
                    data: {
                        'id': test_name
                    },
                    dataType: 'json',
                    success: function(data) {
                        console.log("price");
                        console.log(data.price);

                        a.find('.testprice').val(data.price);

                    },
                    error: function() {

                    }
                });
            });


            $(document).on('change', '.testinfo', function() {
                // console.log("hmm it get");

                var test_name = $(this).val();

                var a = $(this).parent();
                // console.log(test_name);
                var op = "";
                $.ajax({
                    type: 'get',
                    url: '{!!URL::to('
                    findReferrer ')!!}',
                    data: {
                        'id': test_name
                    },
                    dataType: 'json',
                    success: function(data) {
                        console.log("referrer");
                        console.log(data.referref_fee);

                        a.find('.testreferrer').val(data.referref_fee);

                    },
                    error: function() {

                    }
                });


            });
            $(document).on('change', '.testinfo', function() {
                // console.log("hmm it get");

                var test_name = $(this).val();

                var a = $(this).parent();
                // console.log(test_name);
                var op = "";
                $.ajax({
                    type: 'get',
                    url: '{!!URL::to('
                    findTestId ')!!}',
                    data: {
                        'id': test_name
                    },
                    dataType: 'json',
                    success: function(data) {
                        console.log("testid");
                        console.log(data.id);

                        a.find('.testid').val(data.id);

                    },
                    error: function() {

                    }
                });


            });

        });
    </script>

</body>

</html>