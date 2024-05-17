<?php
include 'connect.php';
?>
<?php
session_start()
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StyleHub</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php if (isset($_SESSION['user']) && isset($_SESSION['user']['username'])) { ?>
        <p>Hello, <?php echo $_SESSION['user']['username']; ?>!</p>
    <?php } else { ?>
        <p>Hello, Guest!</p>
    <?php } ?>
    <div class="header">
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
                    <?php if (isset($_SESSION['user'])) { ?>
                    <li><a href="logout.php">Logout</a></li>
                    <?php } else { ?>
                    <li><a href="login.php">Account</a></li>
                    <?php } ?>

                    <?php if (isset($_SESSION['user'])) { ?>
                  <li><a href="cart.php"><img src="images/shopping-cart-20392.png" width="30px" height="30px"></a></li>
                <?php } else { ?>
                <?php } ?> 
                </ul>
            </nav>
    
         
    <img src="images/icons8-menu-26.png" class="menu-icon" onclick="menutoggle()">

       
        </div>
    </div>

<div class="row">
    <div class="col-2">
        <h1>Give Your Fashion <br>A New Style!</h1>
        <p>Welcome to our clothing website, where fashion and style intertwine <br>to create a world of sartorial splendor.We believe that clothing <br>is not just a mere necessity but a powerful means of self-expression.</p>
    <a href="" class="btn">Explore Now &#8594;</a>
    </div>
    <div class="col-2">
        <img src="images/raamin-ka-dJt7SbseGR8-unsplash.jpg" width="500px">
    </div>
    
</div>
</div>

    <!-------featured categories------>
    <div class="categories">
        <div class="small-container">
        <div class="row">
            <div class="col-3">
                <img src="images/beautiful-woman-dress-isolated-white-background (1).jpg" width="300px" >
            </div>
            <div class="col-3">
                <img src="images/curly-woman-white-dress-smiling-orange-background-young-shy-girl-with-wavy-hair-cherry-print-clothes-looking-into-camera.jpg" width="300px">
            </div>
            <div class="col-3">
                <img src="images/beautiful-woman-dress-isolated-white-background.jpg" width="300px">
            </div>
        </div>
    </div>
</div>
   
    </div>
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