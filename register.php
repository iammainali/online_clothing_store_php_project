<?php
include 'connect.php';
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST["username"];
    $email = $_POST["email"];
    $psw = $_POST["password"];
    
    $sql = "SELECT * FROM users WHERE email = '$email'";

    $res = mysqli_query($connection, $sql);
    $data = mysqli_fetch_assoc($res);

    if($data["email"] == $email){

        echo "<script>alert('Email already registered');</script>";

    } else if($data["username"] == $username){

      echo "<script>alert('Usernamem already exists');</script>";

    } else {
        $hashed_psw = md5($psw);

        $sql = "INSERT INTO users (username, email, psw) VALUES ('$username','$email', '$hashed_psw')";
        mysqli_query($connection, $sql);

        header("Location: login.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>account -StyleHub</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
          font-family: Arial, sans-serif;
          background-color: #f5f5f5;
        }
  
        form {
          background-color: #ffffff;
          border-radius: 5px;
          padding: 20px;
          max-width: 500px;
          margin: 50px auto;
          box-shadow: 0 0 10px #cccccc;
        }
  
        .formItem {
          margin-bottom: 15px;
        }
  
        label {
          display: block;
          margin-bottom: 5px;
        }
  
        input[type="text"],
        input[type="email"],
        input[type="password"] {
          padding: 10px;
          border: 1px solid #ccc;
          border-radius: 5px;
          width: 100%;
          box-sizing: border-box;
          font-size: 16px;
          margin-bottom: 10px;
        }
  
        input[type="submit"] {
          background-color: #4CAF50;
          color: #ffffff;
          padding: 10px 20px;
          border: none;
          border-radius: 3px;
          font-size: 16px;
          cursor: pointer;
          margin-top: 10px;
        }
  
        input[type="submit"]:hover {
          background-color: #3e8e41;
        }
  
        a {
          color: #4CAF50;
          text-decoration: none;
        }
  
        a:hover {
          text-decoration: underline;
        }
  
        p {
          margin-top: 20px;
        }
  
        .error {
          color: red;
          font-weight: bold;
          margin-top: 10px;
        }
        #title{
              color: #333;
              text-align: center;
              font-size: 28px;
              font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
              padding-bottom: 15px;
              border-bottom: 1px solid #4CAF50;
          }
      </style>
   
</head>
<body>
  
    <div class="container">
        <div class="navbar">
        <div class="logo">
            <img src="images/StyleHub-logos_transparent.png" width="350px">
        </div>
    
    <nav>
        <ul id="MenuItems">
            <li><a href="home.php">Home</a> </li>
            <li><a href="product.php">Products</a> </li>
            <li><a href="about.php">About</a> </li>
            <li><a href="contact.php">Contact</a> </li>
            <li><a href="login.php">Account</a> </li>
            <li><a href="cart.php"><img src="images/shopping-cart-20392.png" width="30px" height="30px"></a></li>
        </ul>
    </nav>
    <img src="images/icons8-menu-26.png" class="menu-icon" onclick="menutoggle()">
    </div>
    </div>
    <form action="register.php" method="POST">
        <p id="title">Registration</p>
        <div class="formItem">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" required pattern="[a-zA-Z0-9]+" title="Please use only letters and numbers for the username." />
        </div>
        <div class="formItem">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email"  required />
        </div>
        <div class="formItem">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required minlength="8" title="Password must be at least 8 characters long." />
        </div>
        <div class="formItem">
            <input type="submit" value="Register">
        </div>
        <p>Already a member? <a href="login.php">Login here</a></p>
    </form>
    
     
    <!------footer------>
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col-1">
                <h3>Redefine Your Fashion Style</h3>
                </div>
                <div class="footer-col-2">
                    <img src="images/StyleHub-logos_transparent.png" >
                    <p>Our Purpose Is To Make Customer Experience Better</p>
                    </div>
                    <div class="footer-col-4">
                        <h3>Follow Us</h3>
                        <ul>
                        <li><a href="">Facebook</a></li>
                            <li><a href="">Instagram</a></li>
                            <li><a href="">Twitter</a></li>
                            <li><a href="">Youtube</a></li>
                        </ul>
                        </div>
            </div>
            <hr>
            <p class="copyright">copyright 2023 Beta Coders</p>
        </div>
    </div>
    <!----js for toggle menu-->
    <script>
        var MenuItems=document.getElementById("MenuItems");
        MenuItems.style.maxHeight="0px";

        function menutoggle(){
            if(MenuItems.style.maxHeight == "0px"){
                MenuItems.style.maxHeight = "200px";
            }
            else{
                MenuItems.style.maxHeight = "0px";

            }
        }
    </script>
</body>
</html>