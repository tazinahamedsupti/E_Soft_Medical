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

@include('reception.sidebar')

    <div class="main">

        <div>
            <h4>Patient Details</h4>
        </div>
        <br>
        <div class="heading">
            <h4>Patient Details:</h4>
            <?php

            use App\Models\GenerateRandomValue;
            use App\Models\Patient;

            $p_id = $id;
            $patient_details = Patient::where('id', $p_id)->get();
            ?>


        </div>
        <div>
            @foreach($patient_details as $p_details)
            <label class="first-row">Patient Name<span style="color:red;">*</span>:</label>
            <input value="{{$p_details->p_name}}" readonly>

            <label class="second-row">Patient Age:</label>
            <input value="{{$p_details->p_age}}" readonly>

            <br>

            <label class="first-row">Phone/Mobile<span style="color:red;">*</span>:</label>
            <input value="{{$p_details->p_mobile}}" readonly>
            <label class="second-row">Gender:</label>
            <input value="{{$p_details->p_gender}}" readonly>


            <br>

            <label class="first-row">Blood Group<span style="color:red;">*</span>:</label>
            <input value="{{$p_details->p_blood}}" readonly>

            <br>
            <label class="first-row">Address:</label>
            <input value="{{$p_details->p_address}}" readonly class="ex-large">
            <br>
            <label class="first-row">Doctor Name:</label>
            <input value="{{$p_details->p_d_name}}" readonly class="ex-large">
            <br>
            <label class="first-row">Refered By<span style="color:red;">*</span>:</label>
            <input value="{{$p_details->p_r_d_name}}" readonly class="ex-large" required>
            <br>
            <!-- <button type="submit" class="btn-margine btn btn-primary">Update Information</button> -->
            @endforeach
        </div>




        <br>


        <div class="heading">
            <h4>Add Test:</h4>
        </div>
        <div>

            <!-- <label>Enter Patient ID / Mobile Number<span style="color:red;">*</span>:</label>
            <input> <button class="btn btn-primary">Search</button> -->


            <?php

            use App\Models\test_info;
            use App\Models\Lab_test;
            use App\Models\ServiceList;

            $value = NULL;
            $random_table = GenerateRandomValue::where('patient_id', $id)->get();

            $test_info = test_info::orderBy('test_name', 'ASC')->get();
            $number = 1;
            // echo $count;
            // die();
            ?>


            <label class="first-row">Add Test<span style="color:red;">*</span>:</label>
            <select class="testinfo" style="width:48.8rem;" required>
                <option>--Select--</option>
                @foreach ($test_info as $info)
                <option value="{{ $info->id}}">{{ $info->test_name}}</option>
                @endforeach
            </select>



            <!-- <label class="first-row">Add Test<span style="color:red;">*</span>:</label>
            <form>
            <select class="ex-large" style="width:48.8rem;" required>
                    <option>--Select--</option>
                    @foreach ($test_info as $info)
                    <option>{{ $info->test_name}}</option>
                    @endforeach

                </select>
                <button class="btn btn-primary">De</button>
            </form> -->
            <br>
            <form action="{{ url('lab_test_insert') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label class="first-row">Price:</label>
                <input type="text" class="testprice" required>

                <label class="second-row">Referrer Fee:</label>
                <input class="testreferrer" readonly>
                <input type="hidden" name="patient_id" value="<?php echo ($id) ?>" readonly>
                <input type="hidden" name="test_id" class="testid" readonly>


                @foreach($random_table as $random_value)
                <?php
                $value = $random_value->test_reference;
                ?>
                @endforeach

                <?php

                if ($value == NULL) {
                ?>
                    <input type="hidden" name="test_reference" value="<?php echo (rand(10, 15000)); ?>" readonly>
                <?php } else { ?>
                    <input type="hidden" name="test_reference" value="{{ $random_value->test_reference}}" readonly>
                <?php } ?>

                <br>
                <button class="btn-margine btn btn-primary" style="margin-bottom:2px ;">Add Test</button>
            </form>

        </div>

        <br>



        <div>

            <?php
            // $lab_test = Lab_test::where()
            ?>

            <?php
            $total_referrer = 0;
            $sub_total = 0;
            $test_table = Lab_test::where('test_reference', $value)->Where('patient_id', $id)->get();
            ?>

            <form action="{{ url('add_service_list') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="patient_id" value="<?php echo ($id); ?>">
                <input type="hidden" name="test_reference" value="<?php echo ($value); ?>">
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
                    <tr>

                        <td colspan="2"><strong style="float:right;">Discount Amount:</strong></td>
                        <td><strong><input name="discount" style="width:10rem;" value=0></strong></td>
                    </tr>
                    <tr>
                        <td colspan="2"><strong style="float:right;">Payment:</strong></td>
                        <td><strong><input name="payment" style="width:10rem;" value=0></strong></td>
                    </tr>
                    <tr>
                        
                        <strong><input type="hidden" name="due" style="width:10rem;" value=0></strong>
                        <input type="hidden" name="report_status" value="Pending">
                    </tr>
                </table>


                <!-- <button type="submit" class="btn-margine btn btn-warning" style="margin-bottom:2px ;">Calculate Data</button> -->
                <button type="submit" class="btn-margine btn btn-primary">Save Data</button>
            </form>
            <br>

        </div>
        <br>

        <div class="heading">
            <h4>Service Details:</h4>
        </div>

        <br>
        <?php
        $service_details = ServiceList::Where('patient_id', $id)->orderBy('id', 'DESC')->get();
        ?>

        <table>
            <tr>
                <th>Date</th>
                <th>Account Status</th>
                <th>Report Status</th>
                <th>Action</th>
            </tr>
            @foreach($service_details as $list)
            <tr>
                <td>{{$list->created_at}}</td>
                <td>{{$list->account_status}}</td>
                <td>{{$list->report_status}}</td>
                <td><a href="/service_list/{{$list->test_reference}}">Details</a></td>
            </tr>
            @endforeach

        </table>
        <br>
        <br>




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
                    url: '{!!URL::to('findPrice')!!}',
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
                    url: '{!!URL::to('findReferrer')!!}',
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
                    url: '{!!URL::to('findTestId')!!}',
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