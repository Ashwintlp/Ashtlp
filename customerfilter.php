<?php


    
    $connection = pg_connect( "host=ec2-23-22-156-110.compute-1.amazonaws.com port=5432 dbname=di7aeib8u6nea user=fsyucftmxyxvap password=f70cb55c9e989f35c4b931575b5f28b248be49091d6f143fe3ae3d48bc3f093f"
);
    if(!$connection)
    {
        die("Connection failed: ".pg_last_error());
    }
    
    session_start();
    $username = $_GET['check'];

    $query = "SELECT d.departmentname, k.kit, k.brand, k.size, k.price from department d,kits k 
    where k.departmentno=d.departmentno and k.username='$username';";

    $result = pg_query($connection,$query);

    $query1 = "select name from customer where username = '$username';";
    $result1 = pg_query($connection,$query1);
    $data = pg_fetch_assoc($result1);
    $name = $data['name'];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Details</title>
    <link rel="stylesheet" type="text/css" href="css/employeedetailsstyle.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <header>
        <div class="container">
            <nav>
                <ul>
                        <li><a href="addemployee.php">Add New Employee</a></li>
                        <li><a href="updateemployee.html">Update Employee</a></li>
                        <li><a href="deleteemployee.html">Delete Employee</a></li>
                        <li>View
                        <ul>
                            <li><a href="employeedetails.php">View All Employees</a></li>
                            <li><a href="customerdetails.php">View All Customers</a></li>
                            <li class="active"><a href="departmentfilter.php">View All Departments</a></li>
                            <li><a href="filter.php">Filter Customers</a></li>
                        </ul>
                        </li>
                        <li><a href="homepage.html">Log Out</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <section id="details">
    
    <a href="customerdetails.php">Go Back</a>
    <table align="center" border="1px" style="width: 1000px; line-height:40px;">
            <tr>
                <th colspan="5"><h2><?php echo $name; ?></h2></th>
            </tr>
            <tr style="width: 500px;">
                    <th>Department</th>
                    <th>Kit</th>
                    <th>Brand</th>
                    <th>Size</th>
                    <th>Price</th> 
            </tr>

    <?php
    while($rows = pg_fetch_assoc($result))
    {
    ?>

    <tr align="center">
        <td><?php echo $rows['departmentname'] ?></td>
        <td><?php echo $rows['kit'] ?></td>
        <td><?php echo $rows['brand'] ?></td>
        <td><?php echo $rows['size'] ?></td>
        <td><?php echo $rows['price'] ?></td>
    </td>
    </tr>

    <?php
    }
    ?>

    </section>
</body>
</html>
