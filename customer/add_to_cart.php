<?php
session_start();
include("../config/db.php");

if(!isset($_SESSION['customer_id'])){
    header("Location: ../customer_login.php");
}

$customer_id = $_SESSION['customer_id'];
$product_id = $_GET['id'];

$query = "INSERT INTO cart(customer_id, product_id, quantity)
          VALUES('$customer_id','$product_id','1')";

mysqli_query($conn,$query);

header("Location: cart.php");
?>