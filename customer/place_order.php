<?php
session_start();
include("../config/db.php");

if(!isset($_SESSION['customer'])){
    header("Location: customer_login.php");
    exit();
}

$id = $_GET['id'];
$email = $_SESSION['customer'];

// get product details
$product = mysqli_fetch_assoc(mysqli_query($conn,
"SELECT * FROM products WHERE id=$id"));

// insert order
mysqli_query($conn,
"INSERT INTO orders(customer_email, product_id, product_name, price, order_date)
VALUES('$email','$id','".$product['name']."','".$product['price']."',NOW())");

// redirect
echo "<script>alert('✅ Order Placed Successfully!');
window.location='orders.php';
</script>";
?>