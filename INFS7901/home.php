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

.main {

    background-color: #ddd;
    padding: 20px;
}
/* side column */
.side {

    background-color: #f1f1f1;
    padding: 20px;
}

.side1 {

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

.dropdown-content1 {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 200px;
    overflow: auto;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}
.dropdown-content1 a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    font-size: 16px;
}
.dropdown1 a:hover {background-color: #ddd}
.show {display:block;}

/* Footer */
.footer {
    padding: 1px;
    background: #1abc9c;
    color: white;
}

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
  <a class = "active"
href="https://127.0.0.1/INFS7901/home.php" class="right">Home</a>
<a class="active" href="https://127.0.0.1/INFS7901/admin.php" class="right">Administrator</a>
</div>

<div class="row">
  <div class="main">

      <p>
Welcome Everyone!!! You can either order food or register your food. Please login below to continue.
      <br/><br/>

     <h2>Food Delivery System</h2>
     A.For Customers: The application will let the customers know about the available options of food and restaurants near the customers and the customers would be able to choose their favourite food and restaurant options from the list. Customers will then be able to make Payment in their preferred payment type confirming their Order to the Restaurant.
     <br/><br/>B.For Restaurants: The application will let the restaurants to register themselves and create a menu of food for the customers
     <br/><br/>C.For Riders: The application will tell the rider the location of restaurant to pick up the order from and the location of Customer to deliver the order to
     <br/><a href="https://127.0.0.1/INFS7901/rider.php"> Riders can login here </a>

<br/><br/>

</p>
<h2>Food Delivery System Administrator Information Policy</h2>
This website enables Administrator to get the following information:
<ul>
<li>Customer in the System</li>
<li>Details of individual Customer </li>
<li>Orders of Customers</li>
<li>Restaurants Enlisted in this website</li>
<li>Dish provided by each restaurant</li>
<li>Payments done by customer</li>
<li>Information supplied to riders</li>

</ul>
Additionally Administrator can perform the following DML operations
<ul>
<li>Update Customers and Restaurants with their Attributes</li>
<li>Delete Customers and Restaurants</li>
</ul>
  </div>



<div class="side">
    <p>Manage your account here: Customer<p>
  <div class="dropdown">
      <button onclick="location.href='https://127.0.0.1/INFS7901/login.php';" class="dropbtn">Click to Login</button>
    <button onclick="location.href='https://127.0.0.1/INFS7901/CustomerReg.php';" class="dropbtn"> New Customer? </button>

  </div>
</div>




</div>


<div class="side1 ">
    <p>Manage your account here: Restaurant<p>
  <div class="dropdown">
      <button onclick="location.href='https://127.0.0.1/INFS7901/login1.php';" class="dropbtn">Click to Login</button>
      <button onclick="location.href='https://127.0.0.1/INFS7901/RestaurantReg.php';" class="dropbtn"> New Restaurant? </button>

</div>
</div>




<div class="footer">
  <p>&nbsp&nbsp&nbsp Design by Group 19: <br>&nbsp&nbsp&nbsp Karthikeyan Venkatesan <br>&nbsp&nbsp&nbsp Tony Meng <br>&nbsp&nbsp&nbsp Xinchen Ni <br>&nbsp&nbsp&nbsp Jason Diao </p>
</div>
</body>
</html>
