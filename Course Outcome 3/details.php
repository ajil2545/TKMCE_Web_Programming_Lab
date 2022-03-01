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
  ?>
<html>
  <body>
    <table>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Age</th>
        <th>Address</th>
        <th>Consulting Doctor</th>
      </tr>
  <?php
  while($row = $result->fetch_assoc())
  {

    echo"<td>".$row["id"]."</td><td>".$row["fname"]. " " . $row["lname"]."</td><td>".$row["age"]."</td><td>".$row["address"].$row["drname"];
  }
} 
else
{
  echo "0 results";
}
?>