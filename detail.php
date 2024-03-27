<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Nike</title>
    <style>
    ul li {  padding: 20px; display: inline; text-decoration: none;}
    nav {  font-size: 30px; }
    ul {
    padding-bottom: 30px; 
    }  
    .wrapper { width: 600px; margin: 0 auto;}
     table tr td:last-child { width: 120px;  }
     h1 { font-size: 2pc; color: blue; padding-top: 20px;  padding-bottom: 15px;}
    </style>
    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>
<body>
<nav>
    <ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="detail.php">Details</a></li>
        <li><a href="about.html">About</a></li>
    </ul>
</nav>
<h2> The Nike employees</h2> 
<p> NIKE, Inc. is in perpetual motion. Administrative employees help Nike teams around the world keep up with the
     company's rapid pace. They act as liaisons embedded in business functions and geographies. Their talents — problem
      solving, organization, time management and more — help fuel the success of their teams. Nike's diverse group of 
      administrative assistants and receptionists embodies professionalism and models core Nike values to guests and fellow
       employees.</p>  
    <p>Marketing and Communication teams at NIKE, Inc., help set the brand tone. They act as a creative force of specialists,
        driven to tell Nike's stories of innovation and sport through advertising, brand strategy, digital engagement and 
        product presentation. Using channels ranging from retail stores to social media, Marketing & Communication teams 
        connect the science and art of Nike innovations to the hearts and minds of athletes around the world.</p>
<h2> If you wanna see the details of our Nike employees then, see below.</h2>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="mt-5 mb-3 clearfix">
                    <h1 class="pull-left">Employees Details</h1>
                    <a href="create.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add New Employee</a>
                </div>
                <?php
                // Include config file
                require_once "config.php";

                // Attempt select query execution
                $sql = "SELECT * FROM employees";
                if ($result = mysqli_query($link, $sql)) {
                    if (mysqli_num_rows($result) > 0) {
                        echo '<table class="table table-bordered table-striped">';
                        echo "<thead>";
                        echo "<tr>";
                        echo "<th>#</th>";
                        echo "<th>Name</th>";
                        echo "<th>Address</th>";
                        echo "<th>Salary</th>";
                        echo "<th>Action</th>";
                        echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";
                        while ($row = mysqli_fetch_array($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['Name'] . "</td>";
                            echo "<td>" . $row['Address'] . "</td>";
                            echo "<td>" . $row['salary'] . "</td>";
                            echo "<td>";
                            echo '<a href="read.php?id=' . $row['id'] . '" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                            echo '<a href="update.php?id=' . $row['id'] . '" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                            echo '<a href="delete.php?id=' . $row['id'] . '" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                            echo "</td>";
                            echo "</tr>";
                        }
                        echo "</tbody>";
                        echo "</table>";
                        // Free result set
                        mysqli_free_result($result);
                    } else {
                        echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                    }
                } else {
                    echo "Oops! Something went wrong. Please try again later.";
                }

                // Close connection
                mysqli_close($link);
                ?>
            </div>
        </div>
    </div>
</div>
            <!--Pawandeep kaur ID 202106637-->

</body>
</html>