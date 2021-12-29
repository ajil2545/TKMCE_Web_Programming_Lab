<html>
    <head>
        <title>New Registration</title>
    </head>
    <body>
        <form method="POST" name="new_reg">
            <table align="center"  >
                <tr>
                    <td><label>First Name</label></td>
                    <td><input type="text" id="fname" name="fname" pattern="[A-Za-z]{3,}" title="Must contain only letters." required></td>
                </tr>
                <tr>
                    <td><label>Last Name</label></td>
                    <td><input type="text" id="lname" name="lname" pattern="[A-Za-z]{1,}" title="Must contain only letters." required></td>
                </tr>
                <tr>
                    <td><label>Age</label></td>
                    <td><input type="text" id="age" name="age" pattern="[0-9]{1,}" title="Must contain only numbers." required></td>
                </tr>
                <tr>
                    <td><label>Address</label></td>
                    <td><textarea id="address" pattern="[A-Za-z]{5,}" title="Must contain only letters." name="address" rows="5" required></textarea></td>
                </tr>
                <tr>
                    <td><label>Doctor's Name</label></td>
                    <td><input type="text" id="drname" pattern="[A-Za-z]{3,}" title="Must contain only letters." name="drname" required></td>
                </tr>
                <tr>
                    <td style="margin-left:100px;" colspan="2"><input type="reset" name="RESET"><input type="submit" name="submit"></td>
                </tr>
            </table>
        </form>
    </body>
</html>
<?php
    include "config.php";
    if(isset($_POST["submit"])){
        $fname=$_POST["fname"];
        $lname=$_POST["lname"];
        $age=$_POST["age"];
        $address=$_POST["address"];
        $drname=$_POST["drname"];
        $sql = "INSERT INTO new_reg (fname, lname, age, address, drname) VALUES ('$fname', '$lname', '$age', '$address', '$drname')";
        if ($conn->query($sql) === TRUE) {
             echo"<script>alert ('Details added successfully!');"
    . "window.location.href='details.php'</script>";
        }
        else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
?>
