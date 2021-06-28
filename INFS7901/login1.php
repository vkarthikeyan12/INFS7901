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

<div class="navbar" >
  <a href="https://127.0.0.1/INFS7901/home.php">Home</a>
</div>

<div class="row">
    <div class="main">

      <?php
      // Include config file
      require_once "config.php";


      if($_SERVER["REQUEST_METHOD"] == "POST"){

          // Check if username is empty
          if(empty(trim($_POST["name"]))){
              $name_err = "Please enter a name.";
          } else{
              $name = trim($_POST["name"]);
          }

          // Check if password is empt

          // Validate credentials
          if(empty($name_err)){
              // Prepare a select statement
              $sql = "SELECT Name FROM restaurant WHERE Name = ?";

              if($stmt = mysqli_prepare($link, $sql)){
                  // Bind variables to the prepared statement as parameters
                  mysqli_stmt_bind_param($stmt, "s", $name);



                  // Attempt to execute the prepared statement
                  if(mysqli_stmt_execute($stmt)){
                      // Store result
                      mysqli_stmt_store_result($stmt);

                      // Check if username exists, if yes then verify password
                      if(mysqli_stmt_num_rows($stmt) == 1){
                          // Bind result variables
                          mysqli_stmt_bind_result($stmt, $name);
                          if(mysqli_stmt_fetch($stmt)){
                              if(password_verify($name,$name)){
                                  // Password is correct, so start a new session

                                  // Store data in session variables

                                  // Redirect user to welcome page
                                  header("location: WelcomeRes.php");
                              } else{
                                  // Password is not valid, display a generic error message
                                  header("location: WelcomeRes.php");
                                  $login_err = "Invalid username or password.";
                              }
                          }
                      } else{
                          // Username doesn't exist, display a generic error message
                          header("location: WelcomeRes.php");
                          $login_err = "Invalid username or password.";
                      }
                  } else{
                      header("location: WelcomeRes.php");
                      echo "Oops! Something went wrong. Please try again later.";
                  }

                  // Close statement
                  mysqli_stmt_close($stmt);
              }
          }

          // Close connection
          mysqli_close($link);
      }
      ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Restaurant Login</h2>
        <p>Please note this login is for Restaurant only.</p>
        <a href="https://127.0.0.1/INFS7901/login.php"><p>Are you a Customer? Click here!</p></a>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control">
                <span class="invalid-feedback"><?php echo $name_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-secondary ml-2" value="Reset">
            </div>
            <p>New user? <a href="RestaurantReg.php">Register here!</a></p>
        </form>
    </div>
  </div>
</div>



<div class="footer">
  <p>&nbsp&nbsp&nbsp Design by Group 19: <br>&nbsp&nbsp&nbsp Karthikeyan Venkatesan <br>&nbsp&nbsp&nbsp Tony Meng <br>&nbsp&nbsp&nbsp Xinchen Ni <br>&nbsp&nbsp&nbsp Jason Diao </p>
</div>
