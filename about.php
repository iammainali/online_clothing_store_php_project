<?php
session_start()
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us -StyleHub</title>
    <link rel="stylesheet" href="style.css">
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
            <?php if (isset($_SESSION['user'])) { ?>
                    <li><a href="logout.php">Logout</a></li>
                    <?php } else { ?>
                    <li><a href="login.php">Account</a></li>
                    <?php } ?>
                    <?php if (isset($_SESSION['user'])) { ?>
            <li><a href="cart.php"><img src="images/shopping-cart-20392.png" width="30px" height="30px"></a></li>
            <?php } else { ?>
                <?php } ?>         </ul>
    </nav>
   
                   <img src="images/icons8-menu-26.png" class="menu-icon" onclick="menutoggle()">
                 
                   
                     </div>
</div>
            <img src="images/about page image.jpg" width= "600px" height="400px" class="float-img"> 
            <h2 style="font-size: 50px;">About Us</h2>
            <p>At StyleHub, we believe that fashion is a powerful way to express individuality and boost confidence. 
                Our mission is to provide you with stylish,high-quality 
                clothing that not only enhances your personal  style but also makes you feel
                 comfortable and empowered.</p>
                 <p>Customer satisfaction is our top priority. We strive to provide exceptional  service
                  at every step of your shopping experience. Our friendly and knowledgeable team is
                   always ready to assist you, whether you need help with sizing, styling advice, or 
                   have any questions about our products.</p><br>

                <p>We also value sustainability and strive to minimize our impact on the environment.
                  We actively seek out eco-friendly materials and production methods, promoting a more
                   conscious approach to fashion.</p><br>
                 
                <p> Thank you for choosing StyleHub as your go-to destination for fashionable clothing.
                 We hope that you enjoy browsing through our collection and find pieces that inspire you. Join us
                 on this style journey and let us help you define your unique fashion identity.</p><br>
                 
                <p> Happy shopping!</p><br>
                 
                 <p style="font-size: 25px;">The StyleHub Team</p>
        

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