<html>
    <head>
        <title>Book</title>
        <style>
            input[type=text], input[type=number]
            {
                width:100%;
            }
        </style>
    </head>
    <body>
        <form name method="POST">
            <table align="center" cellpadding='8' width="50%" border>
                <tr>
                    <th colspan="2"><center>Add BOOK Details</center></th>
                </tr>
                <tr>
                    <td>Accession number</td>
                    <td><input type="number" name="accessno"></td>
                </tr>
                <tr>
                    <td>Title</td>
                    <td><input type="text" name="title"></td>
                </tr>
                <tr>
                    <td>Author</td>
                    <td><input type="text" name="author"></td>
                </tr>
                <tr>
                    <td>Edition</td>
                    <td><input type="text" name="edition"></td>
                </tr>
                <tr>
                    <td>Publisher</td>
                    <td><input type="text" name="publisher"></td>
                </tr>
                <tr>
                    <td colspan="2"><center><input type="submit" name="submit"></center></td>
                </tr>
            </table>
        </form>
        <form method="POST">
            <table align="center" cellpadding='8' width="50%" border>
                <tr>
                    <th colspan="2"><center>Search BOOK</center></th>
                </tr>
                <tr>
                    <td>Title</td>
                    <td><input type="text" name="stitle"></td>
                </tr>
                <tr>
                    <td colspan="2"><center><input type="submit" name="ssubmit"></center></td>
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
        $accessno=$_POST["accessno"];
        $title=$_POST["title"];
        $author=$_POST["author"];
        $edition=$_POST["edition"];
        $publisher=$_POST["publisher"];
        $sql = "INSERT INTO book (accessno, title, author, edition, publisher) VALUES ('$accessno', '$title', '$author', '$edition', '$publisher')";
        if ($conn->query($sql) === TRUE)
        {
             echo"<script>alert ('Details added successfully!');</script>";
        }
        else
        {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    if(isset($_POST["ssubmit"]))
    {
        $stitle=$_POST["stitle"];
        $sqlreturn = "SELECT * FROM `book` WHERE title='$stitle'";
        $result = $conn->query($sqlreturn);
        if ($result->num_rows > 0)
        {
            // output data of each row
            while($row = $result->fetch_assoc())
            {
                echo"<table align='center' cellpadding='8' width='50%' border>";
                echo"<tr><th colspan='2'><center>BOOK Details</center></th></tr>";
                echo"<tr><td>Accession number</td><td>" . $row["accessno"]."</td></tr>";
                echo"<tr><td>Title</td><td>" . $row["title"]."</td></tr>";
                echo"<tr><td>Author</td><td>" . $row["author"]."</td></tr>";
                echo"<tr><td>Edition</td><td>" . $row["edition"]."</td></tr>";
                echo"<tr><td>Publisher</td><td>" . $row["publisher"]."</td></tr>";
                echo"</table>";
            }
        }
        else
        {
            echo "Error: " . $sqlreturn . "<br>" . mysqli_error($conn);
        }
    }
    mysqli_close($conn);
?>