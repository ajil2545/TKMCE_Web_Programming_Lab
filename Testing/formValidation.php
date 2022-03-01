<html>
    <head>
        <title>New Registration</title>
        <style>
            input[type=text]
            {
                width:100%;
            }
        </style>
    </head>
    <body>
        <form method="POST" name="new_reg">
            <table align="center" width="50%" cellpadding='12' border>
                <tr>
                    <td><label>Name</label></td>
                    <td><input type="text" id="name" name="name"></td>
                </tr>
                <tr>
                    <td><label>Phone Number</label></td>
                    <td><input type="text" id="phone" name="phone"></td>
                </tr>
                <tr>
                    <td><label>Email Id</label></td>
                    <td><input type="text" id="email" name="email"></td>
                </tr>
                <tr>
                    <td><label>Username</label></td>
                    <td><input type="text" id="uname" name="username"></td>
                </tr>
                <tr>
                    <td><label>Password</label></td>
                    <td><input type="text" id="psw" name="pass"></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="submit" name="submit"></td>
                </tr>
            </table>
        </form>
    </body>
</html>
<?php
    if(isset($_POST["submit"]))
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "phpmysqlprgm";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $database);

        // Check connection
        if ($conn->connect_error)
        {
            die("Connection failed: " . $conn->connect_error);
        }
        $flag=1;
        $name=$_POST["name"];
        $phone=$_POST["phone"];
        $email=$_POST["email"];
        $uname=$_POST["username"];
        $psw=$_POST["pass"];
        $cname=preg_match('/^[A-Za-z]+$/',$name);
        $p=preg_match('/(6|7|8|9)\d{9}/',$phone);
        $e=preg_match('/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/',$email);
        $cp=preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,12}$/',$psw);
        if($name=="" || $cname==0)
        {
            echo"<script>alert ('Name must contain only alphabets!');</script>";
            $flag=0;
        }
        if($phone=="")
        {
            echo"<script>alert ('Phone number must be filled out!');</script>";
            $flag=0;
        }
        elseif($p==0)
        {
            echo"<script>alert ('Phone number must contain only 10 digits');</script>";
            $flag=0;
        }
        if($email=="" || $e==0)
        {
            echo"<script>alert ('Invalid Email ID!');</script>";
            $flag=0;
        }
        if($uname=="")
        {
            echo"<script>alert ('Username must be filled out!');</script>";
            $flag=0;
        }
        if($psw=="" || strlen($psw)<8)
        {
            echo"<script>alert ('Password must contain minimum 8 characters!');</script>";
            $flag=0;
        }
        else if($cp==0)
        {
            echo"<script>alert ('Password must contain atleast 1 uppercase character, 1 lowercase character and 1 number!');</script>";
            $flag=0;
        }
        if($flag==1)
        {
            $sql = "INSERT INTO registration (name, phone, email, uname, psw) VALUES ('$name', '$phone', '$email', '$uname', '$psw')";
            if ($conn->query($sql) === TRUE)
            {
                echo"<script>alert ('Details added successfully!');</script>";
                $sqlreturn = "SELECT * FROM `registration` WHERE email='$email' and psw='$psw'";
                $result = $conn->query($sqlreturn);
    
                if ($result->num_rows > 0)
                {
                    // output data of each row
                    while($row = $result->fetch_assoc())
                    {
                        echo"<table align='center' cellpadding='12' width='50%' border>";
                        echo"<tr><td>Name</td><td>" . $row["name"]."</td></tr>";
                        echo"<tr><td>Phone</td><td>" . $row["phone"]."</td></tr>";
                        echo"<tr><td>email ID</td><td>" . $row["email"]."</td></tr>";
                        echo"<tr><td>Username</td><td>" . $row["uname"]."</td></tr>";
                        echo"<tr><td>Password</td><td>" . $row["psw"]."</td></tr>";
                        echo"</table>";
                    }
                }
                else
                {
                    echo "Error: " . $sqlreturn . "<br>" . mysqli_error($conn);
                }
            }
            else
            {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
        mysqli_close($conn);
    }
?>