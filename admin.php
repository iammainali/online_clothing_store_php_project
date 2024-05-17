<?php
include 'connect.php';
//akriti123
session_start();
if (isset($_SESSION['user'])) {
    if ($_SESSION["user"]['email'] != "aakriti@admin.com") {
        header('Location: home.php');
        exit;
    }
} else {
    header('Location: home.php');
    exit;
}

function add_product($connection) {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
      if (!empty($_POST['name']) && !empty($_POST['price']) && !empty($_POST['description'])) {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $image_name = '';
        if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
            $image_name = $_FILES['image']['name'];
            $image_tmp_name = $_FILES['image']['tmp_name'];

            $uploads_dir = 'uploads/';
            $image_path = $uploads_dir . $image_name;
            move_uploaded_file($image_tmp_name, $image_path);
        } 

        $sql = "INSERT INTO products (name, description, image, price) 
                VALUES ('$name', '$description', '$image_name', '$price')";

        if (mysqli_query($connection, $sql)) {
            echo "Product added successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($connection);
        }
    }
}
}
add_product($connection);

function delete_product($connection, $product_id) {
  $sql = "DELETE FROM products WHERE id = $product_id";

  if (mysqli_query($connection, $sql)) {
      echo "Product deleted successfully";
     header('Location: admin.php');
     exit;
  } else {
      echo "Error deleting product: " . mysqli_error($connection);
  }
}
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['delete_product_submit'])) {
  if (!empty($_POST['delete_product_id'])) {
      $delete_product_id = $_POST['delete_product_id'];
      delete_product($connection, $delete_product_id);
  }
}
 
function update_product($connection, $product_id, $name, $price, $description) {
  $sql = "UPDATE products SET name = '$name', price = '$price', description = '$description' WHERE id = $product_id";

  if (mysqli_query($connection, $sql)) {
      echo "Product updated successfully";
  } else {
      echo "Error updating product: " . mysqli_error($connection);
  }
}
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['update_product_submit'])) {
  if (!empty($_POST['update_product_id']) && !empty($_POST['update_name']) && !empty($_POST['update_price']) && !empty($_POST['update_description'])) {
      $update_product_id = $_POST['update_product_id'];
      $update_name = $_POST['update_name'];
      $update_price = $_POST['update_price'];
      $update_description = $_POST['update_description'];

      update_product($connection, $update_product_id, $update_name, $update_price, $update_description);
  }
}

mysqli_close($connection);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <style>
       h1 {
  color: #333;
  font-size: 24px;
  margin-bottom: 20px;
  text-align: center;
}

form {
  max-width: 400px;
  margin: 0 auto;
  background-color: #fff;
  border-radius: 8px;
  padding: 20px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

div {
  margin-bottom: 20px;
}

label {
  display: block;
  font-weight: bold;
  margin-bottom: 5px;
  color: #333;
}

input[type="text"],
input[type="file"],
textarea {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

input[type="text"]:focus,
input[type="file"]:focus,
textarea:focus {
  outline: none;
  border-color: #4CAF50;
}

button[type="submit"] {
  background-color: #4CAF50;
  color: #fff;
  border: none;
  padding: 10px 20px;
  border-radius: 4px;
  cursor: pointer;
  font-size: 16px;
  transition: background-color 0.3s ease;
}

button[type="submit"]:hover {
  background-color: #45a049;
}

input::placeholder,
textarea::placeholder {
  color: #999;
}

input[type="file"] {
  padding: 10px 0;
}

input[type="file"]::placeholder {
  line-height: normal;
}
    </style>
</head>
<body>
    <h1>Add Product</h1>
    <form action="admin.php" method="POST" enctype="multipart/form-data">
        <div>
            <label>Product Name</label>
            <input name="name" placeholder="Name">
        </div>
        <div>
            <label>Price</label>
            <input name="price" placeholder="Price">
        </div>
        <div>
            <label>Description</label>
            <textarea name="description"></textarea>
        </div>
        <div>
            <label>Image</label>
            <input name="image" placeholder="Image" type="file">
        </div>
       <button type="submit">Create</button>
    </form>
    <br>
     <!-- Delete Product Form -->
     <h1>Delete Product</h1>
    <form action="admin.php" method="POST">
        <div>
            <label>Product ID to Delete</label>
            <input name="delete_product_id" placeholder="Product ID">
        </div>
        <button type="submit" name="delete_product_submit">Delete Product</button>
    </form>

     <!-- Update Product Form -->
     <h1>Update Product</h1>
    <form action="admin.php" method="POST">
        <div>
            <label>Product ID to Update</label>
            <input name="update_product_id" placeholder="Product ID">
        </div>
        <div>
            <label>New Name</label>
            <input name="update_name" placeholder="Name">
        </div>
        <div>
            <label>New Price</label>
            <input name="update_price" placeholder="Price">
            </div>
        <div>
            <label>New Description</label>
            <textarea name="update_description"></textarea>
        </div>
        <button type="submit" name="update_product_submit">Update Product</button>
    </form>

</body>
</html>
