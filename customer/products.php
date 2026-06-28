<?php
session_start();
include("../config/db.php");

if(!isset($_SESSION['customer'])){
    header("Location: customer_login.php");
    exit();
}

$query = "SELECT * FROM products";
$result = mysqli_query($conn,$query);
?>

<!DOCTYPE html>
<html>
<head>
<title>Products</title>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

<style>
body{
    background:#f5f5f5;
    font-family:Poppins;
}

/* TOP BAR */
.top-bar{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:20px;
}

/* CARD */
.card{
    border:none;
    border-radius:15px;
    box-shadow:0 5px 15px rgba(0,0,0,0.1);
    transition:0.3s;
}

.card:hover{
    transform:scale(1.03);
}

.product-img{
    height:200px;
    object-fit:cover;
    border-radius:10px;
}
</style>

</head>

<body>

<div class="container mt-4">

<!-- 🔙 BACK + LOGOUT -->
<div class="top-bar">

    <a href="dashboard.php" class="btn btn-dark">
        ⬅ Back
    </a>

    <a href="/jewellery_shop/customer/logout.php" class="btn btn-danger">
        🚪 Logout
    </a>

</div>

<div class="row">

<?php while($row = mysqli_fetch_assoc($result)){ ?>

<div class="col-md-3 mb-4">

<div class="card p-3 text-center">

<!-- PRODUCT IMAGE -->
<?php
$img = mysqli_query($conn,
"SELECT * FROM product_images WHERE product_id=".$row['id']." LIMIT 1");
$image = mysqli_fetch_assoc($img);
?>

<img src="../uploads/<?php echo $image['image'] ?? 'default.jpg'; ?>" 
class="product-img mb-2">

<h5><?php echo $row['name']; ?></h5>
<p>₹ <?php echo $row['price']; ?></p>

<!-- BUTTONS -->
<a href="product_details.php?id=<?php echo $row['id']; ?>" 
class="btn btn-primary btn-sm mb-1">
View Details
</a>

<a href="cart.php?add=<?php echo $row['id']; ?>" 
class="btn btn-success btn-sm mb-1">
🛒 Add to Cart
</a>

<a href="product_details.php?id=<?php echo $row['id']; ?>&add_wishlist=1" 
class="btn btn-danger btn-sm">
❤️ Wishlist
</a>

<a href="place_order.php?id=<?php echo $row['id']; ?>" 
class="btn btn-dark btn-sm">
🛍 Buy Now
</a>

</div>

</div>

<?php } ?>

</div>
</div>

</body>
</html>