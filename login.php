
<?php
include 'connect.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_POST["username"];
    $psw = md5($_POST["password"]);

    session_start();
    $sql = "SELECT * FROM users WHERE (email = '$email' OR username = '$email') AND psw = '$psw'";

    $res = mysqli_query($connection, $sql);
    if(mysqli_num_rows($res) > 0){
        
        $data = mysqli_fetch_assoc($res);
        $_SESSION["user"] = $data;

        header("Location: home.php");

    } else {
        echo "<script>alert('Either Email or Password Incorrect');</script>";
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
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
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
            margin-bottom: 10px;
        }
        
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        
        input[type="text"], input[type="password"], input[type="submit"] {
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
        
        p {
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
<div>
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
        </ul>
    </nav>
    <img src="images/icons8-menu-26.png" class="menu-icon" onclick="menutoggle()">
    </div>
    </div>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
        <p id="title">Log in</p>
        <div class="formItem">
            <label for="usernameoremail">Username or Email:</label>
            <input type="text" name="username" id="username" required />
        </div>
        <div class="formItem">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required />
        </div>
        <div class="formItem">
            <input type="submit" value="Login">
        </div>
        <p>New member? <a href="register.php">Register here</a></p>
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
                    <div class="footer-col-3">
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
</body>
</html>


