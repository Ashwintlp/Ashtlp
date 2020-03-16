<!DOCTYPE html>
<html>
    <head>
            <meta charset="utf-8">
            <title>Add Employee Details</title>
            <link rel="stylesheet" type="text/css" href="css/addemployeestyle.css">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <header>
            <div class="container">
                <nav>
                    <ul>
                            <li class="active"><a href="addemployee.php">Add New Employee</a></li>
                            <li><a href="updateemployee.html">Update Employee</a></li>
                            <li><a href="deleteemployee.html">Delete Employee</a></li>
                            <li>View
                            <ul>
                                <li><a href="employeedetails.php">View All Employees</a></li>
                                <li><a href="customerdetails.php">View All Customers</a></li>
                                <li><a href="departmentfilter.php">View All Departments</a></li>
                                <li><a href="filter.php">Filter Customers</a></li>
                            </ul>
                            </li>
                            <li><a href="homepage.html">Log Out</a></li>
                    </ul>
                </nav>
            </div>
        </header>
        <section id="details">
            <div class="container">
            <h2 id="heading">Add Employee details</h2>
            <form method="POST" action=""> 
                                <div>
                                    <label>Employee ID</label>
                                    <input type="number" name="empid" required>
                                </div>
                                 <br>
                                <div>
                                    <label>Name</label>
                                    <input type="text" name="name" required>
                                </div>
                                <br>
                                <div>
                                        <label>Department No</label>
                                        <select name="department" style="width: 173px" required>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                        </select>
                                    </div>
                                    <br>
                                <div>
                                        <label>Gender</label>
                                        <select name="gender" style="width: 173px" required> 
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                   <br>
                                   <div>
                                        <label>DOB</label>
                                        <input type="date" name="dob" style="width: 171px" required>
                                   </div>
                                   <br>
                                   <div>
                                        <label>Address</label>
                                        <input type="text" name="address" required>
                                   </div>
                                   <br>
                                   <div>
                                        <label>Salary</label>
                                        <input type="number" name="salary" required>
                                    </div>
                                    <br>
                                    <div>
                                        <input type="submit" value="Submit">
                                    </div>
                                    <br>
                        </form>            
            </div>
        </section>
        </body>
</html>



<?php

    $empid = filter_input(INPUT_POST,'empid');
    $name = filter_input(INPUT_POST,'name');
    $department = filter_input(INPUT_POST,'department');
    $gender = filter_input(INPUT_POST,'gender');
    $dob = filter_input(INPUT_POST,'dob');
    $address = filter_input(INPUT_POST,'address');
    $salary = filter_input(INPUT_POST,'salary');


    $connection = pg_connect( "host=ec2-23-22-156-110.compute-1.amazonaws.com port=5432 dbname=di7aeib8u6nea user=fsyucftmxyxvap password=f70cb55c9e989f35c4b931575b5f28b248be49091d6f143fe3ae3d48bc3f093f"
);

            if(!$connection)
            {
                die("Connection failed: ".pg_last_error());
            }

            if(isset($salary))
            {
                $insertRecordQuery = "INSERT into employee (employeeid, name, departmentno ,gender, dob, address, salary) values 
                ('$empid', '$name', '$department','$gender', '$dob', '$address', '$salary');";
                $result = pg_query($connection,$insertRecordQuery);
                if($result)
                {
                    echo "<script>alert('New Record inserted successfully');</script>";
                }
                else
                {
                    echo "<script>alert('Employee Id is already taken!!!Not able to Insert');</script>";
                }
            }

            $closeConnection = pg_close($connection);

?>

