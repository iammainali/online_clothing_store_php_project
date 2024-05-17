<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
    
<style>
    .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
    }

    h3 {
        margin-top: 0;
    }

    a {
        display: inline-block;
        padding: 5px 10px;
        background-color: #007bff;
        color: white;
        text-decoration: none;
        margin-bottom: 10px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }

    th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        font-weight: bold;
        color: #ff4081;
    }

    .text-right {
        text-align: right;
    }

    .btn {
        display: inline-block;
        padding: 8px 16px;
        border: none;
        border-radius: 4px;
        text-decoration: none;
        text-align: center;
        cursor: pointer;
    }

    .btn-info {
        background-color: #17a2b8;
        color: white;
    }

    form {
        margin-top: 20px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    label {
        display: block;
        margin-bottom: 5px;
        color: #ff4081;
        font-weight: bold;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
        width: 100%;
        padding: 8px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }
    .main-container{
        display: grid;
        grid-template-columns: 1fr 3fr;
    }
    .hidden{
        display: none;
    }
</style>

<body>


<div class="col-lg-6">
			<div class="box-element">
				<a  class="btn btn-outline-dark" href="cart.php">&#x2190; Back to Cart</a>
				<hr>
				<h3>Order Summary</h3>
				<hr>
                <table width="400px" height="300px">
        <tr>
            <th>Product Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Subtotal</th>
        </tr>
        <tbody id="cart-body">
            
        </tbody>
    </table>
				<div class="total">
        <h4>Total:</h4>
        <h5 id="total">_______</h5>
    </div>
			</div>
		</div>

        <button class="order-save" onclick="saveCartToDatabase()">Save Order</button>

<script>
    function saveCartToDatabase() {
        let cartData = JSON.stringify(JSON.parse(localStorage.getItem('cart')) || []);
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "save_cart.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                alert("Cart saved to database successfully!");
                window.location.href = "home.php";
                localStorage.removeItem('cart');

            } else if (xhr.status !== 200) {
                alert("An error occurred while saving the cart to the database.");
            }
        };
        xhr.send("cartData=" + cartData);
    }
</script>
    <script>     
var form = document.getElementById('form');

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
                quantityCell.innerHTML = `${item.quantity}`;

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
        cart[index].quantity += 1;
        localStorage.setItem('cart', JSON.stringify(cart));
        renderCart(); 
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






