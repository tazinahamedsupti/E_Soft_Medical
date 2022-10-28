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

                    <th>ID</th>
                    <th>Patient Name</th>
                    <th>Mobile Number</th>
                    <th>Action</th>
                </tr>
                @foreach($patient as $p_details)
                <tr>
                    <td>{{$p_details->id}}</td>
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