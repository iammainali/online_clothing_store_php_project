<?php
session_start()
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart - StyleHub</title>
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
                    <li><a href="home.php">Home</a></li>
                    <li><a href="product.php">Products</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <?php if (isset($_SESSION['user'])) { ?>
                    <li><a href="logout.php">Logout</a></li>
                    <?php } else { ?>
                    <li><a href="login.php">Account</a></li>
                    <?php } ?>
                    <li><a href="cart.php"><img src="images/shopping-cart-20392.png" width="30px" height="30px"></a></li>
                </ul>
            </nav>
            <img src="images/icons8-menu-26.png" class="menu-icon" onclick="menutoggle()">
        </div>
    </div>

    <table width="400px" height="300px">
        <tr>
            <th>Product Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th></th>
            <th>Subtotal</th>
        </tr>
        <tbody id="cart-body">
            
        </tbody>
    </table>
    <br>
    <div class="total">
        <h4>Total:</h4>
        <h5 id="total">_______</h5>
    </div>
    <br>
    <div>
        <a href="PlaceOrder.php"><button  id="buy">Place Order</button></a>
    </div>

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
        </div>
    </div>

    <script>
        function renderCart() {
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            let tableBody = document.getElementById('cart-body');
            tableBody.innerHTML = '';

            let total = 0;

            cart.forEach((item,index) => {
                let row = tableBody.insertRow();

                let productNameCell = row.insertCell();
                productNameCell.innerHTML = item.name;

                let priceCell = row.insertCell();
                priceCell.innerHTML = 'Rs ' + item.price.toFixed(2);

                let quantityCell = row.insertCell();
                quantityCell.innerHTML = `
                <button onclick="decreaseQuantity(${index})">-</button>
                ${item.quantity}
                <button onclick="increaseQuantity(${index})">+</button>`;

                let removeCell = row.insertCell(); 
                removeCell.innerHTML = `<img class="deletebutton" src="images/delete.png" width="20px" height="20px" onclick="removeFromCart(${index})">`;


                let subtotalCell = row.insertCell();
                let subtotal = item.price * item.quantity;
                subtotalCell.innerHTML = 'Rs ' + subtotal.toFixed(2);

                total += subtotal;
            });

            let totalElement = document.getElementById('total');
            totalElement.innerHTML = 'Rs ' + total.toFixed(2);
           
        }
        window.onload = function() {
            renderCart();
        };


        function removeFromCart(index) {
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        cart.splice(index, 1); 
        localStorage.setItem('cart', JSON.stringify(cart));
        renderCart();
        }

        function increaseQuantity(index) {
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        if (cart[index].quantity < 10) { 

        cart[index].quantity += 1;
        localStorage.setItem('cart', JSON.stringify(cart));
        renderCart();
        }
    }

        function decreaseQuantity(index) {
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        if (cart[index].quantity > 1) {
            cart[index].quantity -= 1;
            localStorage.setItem('cart', JSON.stringify(cart));
            renderCart();
        }
        }

        function menutoggle() {
            var MenuItems = document.getElementById("MenuItems");
            MenuItems.style.maxHeight = MenuItems.style.maxHeight === "0px" ? "200px" : "0px";
        }
    </script>
</body>
</html>
