<!DOCTYPE html>
<html>

<head>
    <title>New Patient</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

</head>

<body>

    @include('admin.sidebar')

    <div class="main">

        <div>
            <h4>New Patient Entry:</h4>
        </div>
        <br>
        <div class="heading">
            <h4>Patient Details:</h4>
        </div>
        <form action="{{ url('patient_insert') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label class="first-row">Patient Name<span style="color:red;">*</span>:</label>
                <input name="p_name" required>

                <label class="second-row">Patient Age:</label>
                <input name="p_age" required>

                <br>

                <label class="first-row">Phone/Mobile<span style="color:red;">*</span>:</label>
                <input name="p_mobile" required>
                <label class="second-row">Gender:</label>
                <select name="p_gender" required>
                    <option>--Select--</option>
                    <option>Male</option>
                    <option>Female</option>
                    <option>Common</option>
                </select>

                <br>

                <label class="first-row">Blood Group<span style="color:red;">*</span>:</label>
                <select name="p_blood" required>
                    <option>--Select--</option>
                    <option>A+</option>
                    <option>A-</option>
                    <option>AB+</option>
                    <option>AB-</option>
                    <option>B+</option>
                    <option>B-</option>
                    <option>O+</option>
                    <option>O-</option>

                </select>
                <br>
                <label class="first-row">Address:</label>
                <input name="p_address" class="ex-large">
                <br>
                <label class="first-row">Doctor Name:</label>
                <input name="p_d_name" class="ex-large">
                <br>
                <label class="first-row">Refered By<span style="color:red;">*</span>:</label>
                <input name="p_r_d_name" class="ex-large" required>
                <br>
                <button type="submit" class="btn-margine btn btn-primary">Save Information</button>
            </div>
        </form>



        <br>
        <br>
        <div class="heading">
            <h4>Patient Details:</h4>
        </div>
        <div>
            <form action="{{ url('search') }}" method="POST" enctype="multipart/form-data">
                @csrf
            <label>Enter Mobile Number<span style="color:red;">*</span>:</label>
            <input name="patient_search" placeholder="Enter Patient Mobile Number">
            <button class="btn btn-primary">Search</button>
            </form>
            <br>

            <?php

            use App\Models\Patient;

            $patient_details = Patient::all();
            ?>
            <table>
                <tr>

                    <!-- <th>ID</th> -->
                    <th>Patient Name</th>
                    <th>Mobile Number</th>
                    <th>Action</th>
                </tr>
                @foreach($patient_details as $p_details)
                <tr>
                    <!-- <td>{{$p_details->id}}</td> -->
                    <td>{{$p_details->p_name}}</td>
                    <td>{{$p_details->p_mobile}}</td>
                    <td><a href="/patient_profile/{{$p_details->id}}" style="direction:none;">Action</a></td>
                </tr>
                @endforeach

            </table>


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

</body>

</html>