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
$sql = "SELECT id, fname, lname, age, address, drname FROM `new_reg` order by id desc limit 1";
$result = $conn->query($sql);

if ($result->num_rows > 0)
{
  // output data of each row
echo"<html>".
  "<body>".
    "<table border align='center'>".
      "<tr>".
      "<th>ID</th>".
      "<th>Name</th>".
      "<th>Age</th>".
        "<th>Address</th>".
        "<th>Consulting Doctor</th>".
        " </tr>";
  
  while($row = $result->fetch_assoc())
  {

    echo"<tr><td>".$row["id"]."</td><td>".$row["fname"]. " " . $row["lname"]."</td><td>".$row["age"]."</td><td>".$row["address"]."</td><td>".$row["drname"]."</td></tr>";
  }

    echo"</table>".
  "</body>".
"</html>";

} 
else
{
  echo "0 results";
}
?>