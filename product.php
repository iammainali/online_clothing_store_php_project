<?php
session_start()
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Product -StyleHub</title>
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
                <?php } ?>  
            </ul>
        </nav>
        
    <img src="images/icons8-menu-26.png" class="menu-icon" onclick="menutoggle()">

       </div>
    </div>

    <div class="small-container">
        <div class="row row-2">
            <h2>All Products</h2>
        </div>
        <div class='row'>
        <?php 

      include 'connect.php';

      $sql = "SELECT * FROM products;";
      $products = mysqli_query($connection, $sql);

      while ($product = mysqli_fetch_assoc($products)) {
        $id = $product['id'];
        $image = $product['image'];
        $name = $product['name'];
        $price = $product['price'];
        $description = $product['description'];

        echo "
        
        <div class='col-4'>
            <img src='uploads/$image' width='200px' height='250px'>
            <h4>$name &nbsp;&nbsp;&nbsp;</h4>";
            if (isset($_SESSION['user'])) {
                echo "<button onclick=\"addToCart($id, '$name', $price)\" style='background: none; border: none;'> <img src='images/shopping-cart-20392.png' width='25px' height='25px' id='size'></button>";
            }

            echo "
                <p>$price</p>
                <br>
                <p style='width:200px'>$description</p>
                <br><br>
            </div>
            ";
        }
        ?>
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
            <p class="copyright">Copyright 2023 Beta Coders</p>
        </div>
    </div>
    
    <!----js for toggle menu-->
    <script>
        var MenuItems = document.getElementById("MenuItems");
        MenuItems.style.maxHeight = "0px";

        function menutoggle() {
            if (MenuItems.style.maxHeight == "0px") {
                MenuItems.style.maxHeight = "200px";
            } else {
                MenuItems.style.maxHeight = "0px";
            }
        }

        function addToCart(id, name, price) {
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            let existingProduct = cart.find(item => item.id === id);
            
            if (existingProduct) {
                existingProduct.quantity += 1;
            } else {
                cart.push({ id, name, price, quantity: 1 });
            }
            
            localStorage.setItem('cart', JSON.stringify(cart));
            alert('Product added to cart successfully!');
        }
    </script>
</body>
</html>
