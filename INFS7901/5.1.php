<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "infs7901";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("<h3>Connection failed: ".$conn->connect_error."</h3>");
}

$query = "DELETE c1 FROM CustomerDetails AS c1
JOIN CustomerInfo AS c2 ON c1.Email = c2.Email AND c1.Pass = c2.Pass
WHERE Cid = '$_GET[id]' ";
if($result = mysqli_query($conn, $query))
{
  header("refresh:1; url=https://127.0.0.1/INFS7901/5.php");
}
else {
  echo "error";
}

 ?>
