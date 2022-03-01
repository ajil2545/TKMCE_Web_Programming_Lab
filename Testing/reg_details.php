<?php
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
    else
    {
        echo "Connected successfully";
    }
    $sqlreturn = "SELECT * FROM `registration` order by id desc limit 1";
    $result = $conn->query($sqlreturn);

    if ($result->num_rows > 0)
    {
        // output data of each row
        while($row = $result->fetch_assoc())
        {
            echo "Name: " . $row["name"];
            echo"Phone: " . $row["phone"];
            echo"email ID: " . $row["email"];
            echo"Username: " . $row["uname"];
            echo"Password: " . $row["psw"];
        }
    }
?>