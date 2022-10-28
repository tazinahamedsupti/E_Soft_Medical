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
            <h4>Test Category Entry</h4>
        </div>
        <br>
        <div class="heading">
            <h4> &nbsp; </h4>
        </div>

        <?php

        use App\Models\test;

        $test_category_show = test::all();
        $number = 1;
        // echo $count;
        // die();
        ?>

        <form Action="{{ url('add_test_info') }}" method='POST' enctype="multipart/form-data">
            @csrf
            <div>
                <label class="first-row">Sub Category:</label>
                <select name="sub_category" required>
                    @foreach ($test_category_show as $category)
                    <option>{{ $category->sub_category}}</option>
                    @endforeach
                </select>
                <br>
                <label class="first-row">Test Name:</label>
                <input class="ex-large" type="text" name="test_name" required>
                <br>
                <label class="first-row">Price:</label>
                <input type="number" name="price" required>
                <label class="second-row">Refferer's Commission:</label>
                <input type="number" name="referref_fee" required>
            </div>
            <button type="submit" class="btn-margine btn btn-primary">Save</button>
        </form>

        <br>


        <div class="heading">
            <h4>All Test & Details:</h4>
        </div>
        <div>
        <?php 
        use App\Models\test_info;
        $test_info = test_info::all();
        $number = 1;
        // echo $count;
        // die();
        ?>


            <table>
                <tr style="text-align:center;">

                    <th>Test Name</th>
                    <th>Price</th>
                    <th>Referrer Fee</th>
                    <th>Sub Category</th>
                    <th>Action</th>
                </tr>
                @foreach ($test_info as $info)
                <tr>

                    <td style="text-align:center;">{{ $info->test_name}}</td>
                    <td style="text-align:center;">{{ $info->price}}</td>
                    <td style="text-align:center;">{{ $info->referref_fee}}</td>
                    <td style="text-align:center;">{{ $info->sub_category}}</td>
                    <td style="text-align:center;"><a href="" style="text-decoration:none;">Edit</a> <br> <a href="" style="text-decoration:none;">Report Formate</a> <br> <a href="" style="text-decoration:none;">Delete</a></td>
                </tr>
                @endforeach
            </table>
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