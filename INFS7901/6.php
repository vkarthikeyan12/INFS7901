<!DOCTYPE html>
<html lang="en">
<head>
<title>Food Delivery System</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<style>
* {
    box-sizing: border-box;
}
/* Style the body */
body {
    font-family: Arial;
    margin: 0;
}
/* Header/logo Title */
.header {
    padding: 20px;
    text-align: left;
    background: #1abc9c;
    color: white;
}
/* Increase the font size of the heading */
.header h1 {
    font-size: 40px;
}
/* Style the top navigation bar */
.navbar {
    overflow: hidden;
    background-color: #333;
}
/* Style the navigation bar links */
.navbar a {
    float: right;
    display: block;
    color: white;
    text-align: center;
    padding: 14px 20px;
    text-decoration: none;
}
/* Right-aligned link */
.navbar a.right {
    float: right;
}
/* Change color on hover */
.navbar a:hover {
    background-color: #ddd;
    color: black;
}
.navbar a.active {
  border-bottom: 3px solid #1abc9c;
}
/* Column container */
.row {
    display: -ms-flexbox; /* IE10 */
    display: flex;
    -ms-flex-wrap: wrap; /* IE10 */
    flex-wrap: wrap;
}
/* Create two unequal columns that sits next to each other */
/* main/right column */
.main {
    -ms-flex: 80%; /* IE10 */
    flex: 80%;
    background-color: #ddd;
    padding: 20px;
}
/* side column */
.side {
    -ms-flex: 20%; /* IE10 */
    flex: 20%;
    background-color: #f1f1f1;
    padding: 20px;
}
.dropbtn {
    background-color: #1abc9c;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}
.dropbtn:hover, .dropbtn:focus {
    background-color: #333;
}
.dropdown {
    position: relative;
    display: inline-block;
}
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 200px;
    overflow: auto;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}
.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    font-size: 16px;
}
.dropdown a:hover {background-color: #ddd}
.show {display:block;}
.vertical-menu {
    /*width: 600px; /* Set a width if you like */
}
.vertical-menu a {
    background-color: #eee; /* Grey background color */
    color: black; /* Black text color */
    display: block; /* Make the links appear below each other */
    padding: 12px; /* Add some padding */
    text-decoration: none; /* Remove underline from links */
}
.vertical-menu a:hover {
    background-color: #ccc; /* Dark grey background on mouse-over */
}
.vertical-menu a.active {
    background-color: #1abc9c; /* Add a green color to the "active/current" link */
    color: white;
}
/* Footer */
.footer {
    padding: 1px;
    text-align: left;
    background: #1abc9c;
    color: white;
}
.btn {
    border: none; /* Remove borders */
    color: white; /* Add a text color */
    padding: 16px 30px; /* Add some padding */
    cursor: pointer; /* Add a pointer cursor on mouse-over */
}
.home {background-color: #1abc9c;}
.home:hover {background-color: #000000;}
/* Responsive layout - when the screen is less than 700px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 700px) {
    .row {
        flex-direction: column;
    }
}
/* Responsive layout - when the screen is less than 400px wide, make the navigation links stack on top of each other instead of next to each other */
@media screen and (max-width: 400px) {
    .navbar a {
        float: none;
        width: 100%;
    }
}
</style>
</head>
<body>


<div class="header">
  <h1>Food Delivery System</h1>
  <p>INFS7901 Project</p>
</div>

<div class="navbar">
  <a href="https://127.0.0.1/INFS7901/home.php">Home</a>
  <a class = "active" href="https://127.0.0.1/INFS7901/WelcomeCus.php">back</a>
</div>

<div class="row">
    <div class="main">
      <div class="vertical-menu">
        <?php

             // SETUP PHP CONNECTION
             $servername = "localhost";
             $username = "root";
             $password = "";
             $dbname = "infs7901";

             $conn = new mysqli($servername, $username, $password, $dbname);

             if ($conn->connect_error) {
                 die("<h3>Connection failed: ".$conn->connect_error."</h3>");
             }

         ?>

         <table class="table">
           <thead>
                 <tr>
                     <th scope="col">Email </th>
                     <th scope="col">Password</th>
                     <th scope="col">First Name</th>
                     <th scope="col">Last Name</th>
                     <th scope="col">Mobile</th>
                     <th scope="col">Address</th>
                 </tr>
             </thead>
           <tbody id="orderTable">

             <?php
             $fn = $_GET['fname'];
             $sn = $_GET['sname'];
             $mobile = $_GET['mobile'];
             // get all our order data
             $query = "UPDATE customerdetails SET Mobile = $mobile WHERE (`FirstName` LIKE '%".$fn."%') and (`LastName` LIKE '%".$sn."%');";
             $result = mysqli_query($conn, $query);
             $query1 =  "SELECT * from customerdetails;";
             $result1 = mysqli_query($conn, $query1);
             // put all our results into a html table
             while ($rows = mysqli_fetch_array($result1)) {
                 echo "<tr>";
                 echo "<td>".$rows["Email"]."</td>";
                 echo "<td>".$rows["Pass"]."</td>";
                 echo "<td>".$rows["FirstName"]."</td>";
                 echo "<td>".$rows["LastName"]."</td>";
                 echo "<td>".$rows["Mobile"]."</td>";
                 echo "<td>".$rows["Address"]."</td>";
                 echo "</tr>";
               }

                 ?>
             </tbody>
         </table>
      </div>
    </div>
</div>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="get">
    <div class="form-group">
        <label>first name</label>
        <input type="text" name="fname" class="form-control">
        <label>Last name</label>
          <input type="text" name="sname" class="form-control">
          <label>Mobile</label>
            <input type="number" name="mobile" class="form-control">
        <input type="submit" value="update" />
    </div>






<div class="footer">
  <p>&nbsp&nbsp&nbsp Design by Group 19: <br>&nbsp&nbsp&nbsp Karthikeyan <br>&nbsp&nbsp&nbsp Tony Meng <br>&nbsp&nbsp&nbsp Xinchen Ni <br>&nbsp&nbsp&nbsp Jason Diao </p>
</div>
