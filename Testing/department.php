<html>
    <head>
        <title>Department</title>
        <style>
            input[type=text]
            {
                width:100%;
            }
        </style>
    </head>
    <body>
        <form method="POST">
            <table align="center" border width="50%" cellpadding="8">
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
                    <td><input type="text" name="manId"></td>
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
        <form method="POST">
            <table align="center" border width="50%" cellpadding="8">
                <tr>
                    <th colspan="2">Enter the Salary Limit</th>
                </tr>
                <tr>
                    <td>Salary </td>
                    <td><input type="text" name="greatersalary"></td>
                </tr>
                <tr>
                    <td colspan="2"><center><input type="submit" name="salarysubmit"></center></td>
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
        $manId=$_POST["manId"];
        $salary=$_POST["salary"];
        $sql = "INSERT INTO department (emp_id, emp_name, job_name, manager_id, salary) VALUES ('$empId', '$empName', '$jobName', '$manId', '$salary')";
        if ($conn->query($sql) === TRUE)
        {
             echo"<script>alert ('Details added successfully!');</script>";
        }
        else
        {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    if(isset($_POST["salarysubmit"]))
    {
        $gsalary=$_POST["greatersalary"];
        $sqlreturn = "SELECT * FROM `department` WHERE salary>'$gsalary'";
        $result = $conn->query($sqlreturn);
        if ($result->num_rows > 0)
        {
            echo"<table align='center' cellpadding='8' width='50%' border>";
            echo"<tr><th colspan='2'><center>Employee List whose salary  greater than ".$gsalary."</center></th></tr>";
            echo"<tr><td>Employee Name</td><td>Salary</td></tr>";
            // output data of each row
            while($row = $result->fetch_assoc())
            {
                echo"<tr><td>".$row["emp_name"]."</td><td>" . $row["salary"]."</td></tr>";
                
            }
            echo"</table>";
        }
        else
        {
            echo "Error: " . $sqlreturn . "<br>" . mysqli_error($conn);
        }
    }
    mysqli_close($conn);
?>