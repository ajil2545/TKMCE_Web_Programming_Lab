<?php
$servername = "localhost";
$username = "root";
$password = "";
$database="hospital";
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
  while($row = $result->fetch_assoc())
  {
    echo "id: " . $row["id"]. " - Name: " . $row["fname"]. " " . $row["lname"].  " - Age: " . $row["age"].  " - Address: " . $row["address"].  " - Consulting Doctor: " . $row["drname"];
  }
} 
else
{
  echo "0 results";
}
?>