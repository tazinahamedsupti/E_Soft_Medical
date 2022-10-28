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

    <div class="heading">
            <h4>Payment and Due Collecton</h4>
        </div>

        <br>
        <?php

use App\Models\ServiceList;

        $service_details = ServiceList::all();
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