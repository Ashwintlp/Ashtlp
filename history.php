<?php

 
    $connection = pg_connect( "host=ec2-23-22-156-110.compute-1.amazonaws.com port=5432 dbname=di7aeib8u6nea user=fsyucftmxyxvap password=f70cb55c9e989f35c4b931575b5f28b248be49091d6f143fe3ae3d48bc3f093f"
);

    if(!$connection)
    {
        die("Connection failed: ".pg_last_error());
    }
    
    session_start();
    $username = $_SESSION['user'];

    $query1 = "Select Name from customer where username='$username';";
    $result = pg_query($connection,$query1);
    $name1 = pg_fetch_assoc($result);

    $query = "SELECT d.departmentname, k.kit, k.brand, k.size, k.price from department d,kitt k 
    where k.departmentno=d.departmentno and k.username='$username';";

    $result = pg_query($connection,$query);

    $query1 = "select name from customer where username = '$username';";
    $result1 = pg_query($connection,$query1);
    $data = pg_fetch_assoc($result1);
    $name = $data['Name'];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Details</title>
    <link rel="stylesheet" type="text/css" href="css/sportsproductsstyle.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body style="color:#ffffff;">
    <header >
    <div class="container">
        <div id="logo">
            <img src="css/images/logo.jpg">
        </div>
        <nav>
        <img src="css/images/icon1.png">
                    <ul style="margin-top:-34px;margin-left:22px;">   
                            <li style="text-transform:uppercase;"><?php echo $name1['name']; ?></li>
                            <li><a style="color:yellow" href="history.php">Purchase History </a></li>
                            <li><a href="customerlogin.php">Sign Out</a></li>
                    </ul>

        </nav>
    </header>
    <section id="details">
    
    <a href="sportsdep.php" style="color:white">Go Back</a>
    <table align="center" border="1px" style="width: 1000px; line-height:40px;" >
            <tr>
                <th colspan="5"><h2  style="color:violet">Kits Purchased</h2></th>
            </tr>
            <tr style="width: 500px;color:violet">
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
