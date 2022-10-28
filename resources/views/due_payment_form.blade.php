<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

</head>

<body>

    @include('admin.sidebar')

    <div class="main">

        <div>
            <h4>Payment / Due Collection:</h4>
        </div>
        <br>
        <div class="heading">
            <h4>Test Details:</h4>
        </div>
        <div>

            <label>Enter Patient ID / Mobile Number<span style="color:red;">*</span>:</label>
            <input> <button class="btn btn-primary">Search</button>

            <br>
            <table>
                <tr style="background-color:C5D75C">
                    <th>Patient ID</th>
                    <th>Patient Name</th>
                    <th>Cost Amount</th>
                    <th>Payment</th>
                    <th>Discount</th>
                    <th>Due</th>
                    <th>Action</th>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Abdur Rob</td>
                    <td>4600</td>
                    <td>2000</td>
                    <td>500</td>
                    <td>2100</td>
                    <td style="background-color:C5D75C"><strong><a style="text-decoration:none;" href="due_form">Payment</a> <a style="float:right; text-decoration:none" href="">Receipt</a></strong></td>
                </tr>
                <tr style="background-color:C5D75C">
                    <th colspan="2" style="text-align:center;">Total:</th>
                    <th>4600</th>
                    <th>2000</th>
                    <th>500</th>
                    <th colspan="2">2100</th>
                </tr>
            </table>
            <br>
            <br>

        </div>

        <div>


            <table>
                <tr style="background-color:cornflowerblue; text-align:center;">
                    <th>Test Name</th>
                    <th>Referrer Fee</th>
                    <th>Amount</th>
                </tr>

                <!-- Test Item -->
                <tr>
                    <td>Fasting Lipid Profile</td>
                    <td>1000</td>
                    <td>2800</td>
                </tr>
                <tr>
                    <td>Urine Amylase</td>
                    <td>900</td>
                    <td>1800</td>
                </tr>



                <tr>
                    <td><strong style="float:right;">Total:</strong></td>
                    <td><strong>1900</strong></td>
                    <td><strong>4600</strong></td>
                </tr>
                <tr>

                    <td colspan="2">Report Delivery Date: <input style="width:10rem;" type="date" value="2022-08-31">
                    <br> Time:<input style="width:5rem;" value="12"><select style="width:5rem;">
                            <option>PM</option>
                            <option>AM</option>
                        </select></td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="2"><strong style="float:right;">Sub Total:</strong></td>
                    <td><strong>4600</strong></td>
                </tr>
                <tr>

                    <td colspan="2"><strong style="float:right;">Discount Amount:</strong></td>
                    <td><strong><input style="width:10rem;" value=500></strong></td>
                </tr>
                <tr>
                    <td colspan="2"><strong style="float:right;">Payment:</strong></td>
                    <td><strong><input style="width:10rem;" value=2000></strong></td>
                </tr>
                <tr>
                    <td colspan="2"><strong style="float:right;">Due Amount:</strong></td>
                    <td><strong><input style="width:10rem;" value=2100></strong></td>
                </tr>
            </table>
            <button class="btn-margine btn btn-warning" style="margin-bottom:2px ;">Calculate Data</button>
            <button class="btn-margine btn btn-primary">Save Test Data</button>
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

</body>

</html>