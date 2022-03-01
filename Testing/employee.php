<html>
    <head>
        <title>Employee details</title>
        <style>
            input[type=text]
            {
                width:100%;
            }
            table
            {
                border: 2px solid black;
            }
            th
            {
                background: black;
                color:white;
            }
            input[type=submit]
            {
                background:#990000;
                border-radius:8px;
                color:white;
            }
            td
            {
                background:#eee;
            }
        </style>
    </head>
    <body>
        <form method="POST">
            <table align="center" width="50%" cellpadding="8">
                <tr>
                    <th colspan="2">Employee Details</th>
                </tr>
                <tr>
                    <td>Employee Id</td>
                    <td><input type="text" name="empId"></td>
                </tr>
                <tr>
                    <td>Employee Name</td>
                    <td><input type="text" name="empName"></td>
                </tr>
                <tr>
                    <td>Job Name</td>
                    <td><input type="text" name="jobName"></td>
                </tr>
                <tr>
                    <td>Manager ID</td>
                    <td><input type="text" name="managerId"></td>
                </tr>
                <tr>
                    <td>Salary</td>
                    <td><input type="text" name="salary"></td>
                </tr>
                <tr>
                    <td colspan="2"><center><input type="submit" name="submit"></center></td>
                </tr>
            </table>
        </form>
    </body>
</html>
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database="phpmysqlprgm";
    $conn = mysqli_connect($servername, $username, $password, $database);
    if (!$conn)
    {
        die("Connection failed: " . mysqli_connect_error());
    }
    if(isset($_POST["submit"]))
    {
        $empId=$_POST["empId"];
        $empName=$_POST["empName"];
        $jobName=$_POST["jobName"];
        $managerId=$_POST["managerId"];
        $salary=$_POST["salary"];
        $sql="INSERT INTO department (emp_id, emp_name, job_name, manager_id, salary) VALUES ('$empId', '$empName', '$jobName', '$managerId', '$salary')";
        if ($conn->query($sql) === TRUE)
        {
             echo"<script>alert ('Details added successfully!');</script>";
        }
        else
        {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    $sqlreturn = "SELECT * FROM `department` WHERE salary>35000 ORDER BY salary";
    $result = $conn->query($sqlreturn);
    if ($result->num_rows > 0)
    {
        echo"<table align='center' cellpadding='8' width='50%'>";
        echo"<tr><th colspan='2'><center>Employee List whose salary  greater than 35000</center></th></tr>";
        echo"<tr><td style='background:grey; color:white;'>Employee Name</td><td style='background:grey; color:white;'>Salary</td></tr>";
        while($row = $result->fetch_assoc())
        {
            echo"<tr><td>".$row["emp_name"]."</td><td>" . $row["salary"]."</td></tr>";        
        }
        echo"</table>";
    }
    else
    {
        echo"<table align='center' cellpadding='8' width='50%'>";
        echo"<tr><th colspan='2'><center>Employee List whose salary  greater than 35000</center></th></tr>";
        echo"<tr><td colspan='2'>No Data Found</td></tr>";
        echo"</table>";
    }
    mysqli_close($conn);
?>