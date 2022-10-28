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
        @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
        @endif
        <div class="heading">
            <h4> &nbsp; </h4>
        </div>

        <form Action="{{ url('add_test_category') }}" method='POST' enctype="multipart/form-data">
            @csrf
            <div>
                <label class="first-row">Main Category:</label>
                <select name="main_category" required>
                    <option>--Select--</option>
                    <option value="Pathology">Pathology</option>
                    <option value="ECG">ECG</option>
                    <option value="USG">USG</option>
                    <option value="Consultancy">Consultancy</option>
                    <option value="X-Ray">X-Ray</option>
                </select>
                <br>
                <label class="first-row">Sub Category:</label>
                <input class="ex-large" type="text" name="sub_category" required>
            </div>
            <button type="submit" class="btn-margine btn btn-primary">Save</button>

        </form>

        <br>


        <div class="heading">
            <h4>All Test & Details:</h4>
        </div>

        <?php 
        use App\Models\test;
        $test_category_show = test::all();
        $number = 1;
        // echo $count;
        // die();
        ?>


        <div>


            <table>
                <tr>
                    <th>SL No.</th>
                    <th>Main Category</th>
                    <th>Sub Category</th>
                    <th>Action</th>
                </tr>
                @foreach ($test_category_show as $category)
            
                <tr>
                    <td>{{ $number++ }}</td>
                    <td>{{ $category->main_category}}</td> 
                    <td>{{ $category->sub_category}}</td>
                    <td style="text-align:center;"><a href="" style="text-decoration:none;">Edit</a> &nbsp; <a href="{{ url('delete/'.$category->id) }}" style="text-decoration:none;">Delete</a></td>
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