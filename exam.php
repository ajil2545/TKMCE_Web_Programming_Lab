<html>
    <head>
        <title>Accept and Retrieve Data</title>
    </head>
    <style>
        table{
            border: 1px solid black;
        }
        </style>
    <body>
        <form method="POST">
            <table align="center" cellpadding="5" cellspacing="5">
            <tr>
                <td>First Name</td>
                <td><input type="text" name="fname" required></td>
            </tr>
            <tr>
                <td>Last Name</td>
                <td><input type="text" name="lname" required></td>
            </tr>
            <tr>
                <td>Mobile Number</td>
                <td><input type="number" name="mobile" required></td>
            </tr>
            <tr>
                <td>Username</td>
                <td><input type="text" name="uname" required></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="pswd" required></td>
            </tr>
            <tr>
                <td colspan="2"><center><input type="submit" name="submit"></center></td>
            </tr>
            </table>
        </form>
    </body>
</html>
<?php
$servername="localhost";
$username="root";
$password="";
$database="exam";
$conn=mysqli_connect($servername,$username,$password,$database);
if(!$conn)
{
    echo"Connection Errror: ". mysqli_connect_error();    
}
else
{
    if(isset($_POST["submit"]))
    {
        $fname=$_POST["fname"];
        $lname=$_POST["lname"];
        $mobile=$_POST["mobile"];
        $uname=$_POST["uname"];
        $pswd=$_POST["pswd"];
        $sql="INSERT INTO user_regs (`fname`,`lname`,`mobile`,`uname`,`pswd`) VALUES ('$fname','$lname','$mobile','$uname','$pswd')";
        if($conn->query($sql) === TRUE)
        {
            echo"<script>alert('Details added successfully!');</script>";
        }
        else
        {
            echo"Error".$sql."<br>";
        }
        $display="SELECT * FROM `user_regs`";
        $result=$conn->query($display);
        if($result->num_rows >0)
        {
            echo"<table align='center' cellpadding='5' cellspacing='5'><tr><th>Name</th><th>Mobile Number</th><th>Username</th><th>Password</th></tr>";
            while($row=$result->fetch_assoc())
            {
                echo"<tr><td>".$row["fname"]." ".$row["lname"]."</td><td>".$row["mobile"]."</td><td>".$row["uname"]."</td><td>".$row["pswd"]."</tr>";
            }
            echo"</table>";
        }
    }
}
?>