<?php
session_start();
include("../config/db.php");

if(!isset($_SESSION['customer'])){
    header("Location: customer_login.php");
    exit();
}

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if($id <= 0){
    die("Invalid Product");
}

/* PRODUCT */
$result = mysqli_query($conn,"SELECT * FROM products WHERE id=$id");

if(mysqli_num_rows($result) == 0){
    die("Product not found");
}

$row = mysqli_fetch_assoc($result);

/* ADD TO WISHLIST */
if(isset($_GET['add_wishlist'])){
    $email = $_SESSION['customer'];

    $check = mysqli_query($conn,"SELECT * FROM wishlist 
    WHERE customer_email='$email' AND product_id=$id");

    if(mysqli_num_rows($check) == 0){
        mysqli_query($conn,"INSERT INTO wishlist(customer_email,product_id)
        VALUES('$email',$id)");
    }

    header("Location: wishlist.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Product Details</title>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

<style>
body{
    background:#111;
    color:white;
    font-family:Poppins;
}

.box{
    margin-top:60px;
    background:rgba(255,255,255,0.08);
    padding:30px;
    border-radius:20px;
    text-align:center;
}
h2{color:#d4af37;}
</style>

</head>

<body>

<div class="container">

<div class="box">

<h2><?php echo $row['name']; ?></h2>
<p>₹ <?php echo $row['price']; ?></p>

<a href="cart.php?add=<?php echo $row['id']; ?>" class="btn btn-success">
🛒 Add to Cart
</a>

<a href="product_details.php?id=<?php echo $row['id']; ?>&add_wishlist=1" class="btn btn-danger">
❤️ Wishlist
</a>

<br><br>

<a href="products.php" class="btn btn-warning">
⬅ Back
</a>

</div>

</div>

</body>
</html>