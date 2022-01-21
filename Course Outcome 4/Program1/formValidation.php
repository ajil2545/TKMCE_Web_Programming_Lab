<html>
    <head>
        <title>New Registration</title>
    </head>
    <body>
        <form method="POST" name="new_reg">
            <table align="center"  >
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
        $name=$_POST["name"];
        $phone=$_POST["phone"];
        $email=$_POST["email"];
        $uname=$_POST["username"];
        $psw=$_POST["pass"];
        $cname=preg_match('/^[A-Za-z]+$/',$name);
        $p=preg_match('/(6|7|8|9)\d{9}/',$phone);
        $e=preg_match('/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/',$email);
        $u=preg_match('@[A_Z]@',$psw);
        $l=preg_match('@[a-z]@',$psw);
        $n=preg_match('@[0-9]@',$psw);
        if($name=="" || $cname==0)
        {
            echo"Name must contain only alphabets!";
        }
        else
        {
            echo"<br>Name : ".$name;
        }
        if($phone=="")
        {
            echo"<br>Phone number must be filled out!";
        }
        elseif($p==0)
        {
            echo"<br>Phone number must contain only 10 digits";
        }
        else
        {
            echo"<br>Phone Number: ".$phone;
        }
        
        if($email=="" || $e==0)
        {
            echo"<br>Invalid Email ID!";
        }
        else
        {
            echo"<br>Email Id: ".$email;
        }
        if($uname!="")
        {
            echo "<br>Username: ".$uname;
        }
        else
        {
            echo"<br>Username must be filled out!";
        }
        if($psw=="" || strlen($psw)<8)
        {
            echo"<br>Password must contain minimum 8 characters!";
        }
        else if($u==0 || $l==0 || $n==0)
        {
            echo"<br>Password must contain atleast 1 uppercase character, 1 lowercase character and 1 number!";
        }
        else
        {
            echo"<br>Password: ".$psw;
        }
    }
?>