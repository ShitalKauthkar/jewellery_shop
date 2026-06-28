<?php
session_start();
include("../config/db.php");

if(!isset($_SESSION['customer'])){
    header("Location: /jewellery_shop/customer_login.php");
    exit();
}

/* INIT CART */
if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = [];
}

/* ADD TO CART */
if(isset($_GET['add'])){
    $_SESSION['cart'][] = $_GET['add'];
    header("Location: cart.php");
    exit();
}

/* REMOVE ITEM */
if(isset($_GET['remove'])){
    $key = array_search($_GET['remove'], $_SESSION['cart']);
    if($key !== false){
        unset($_SESSION['cart'][$key]);
    }
    header("Location: cart.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>My Cart</title>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">

<style>

body{
margin:0;
font-family:'Poppins', sans-serif;
background:black;
position:relative;
}

/* BACKGROUND */
body::before{
content:"";
position:fixed;
width:100%;
height:100%;
background:linear-gradient(rgba(0,0,0,0.75),rgba(0,0,0,0.75)),
url('https://images.unsplash.com/photo-1515562141207-7a88fb7ce338') center/cover;
z-index:-1;
}

/* HEADER */
.header{
text-align:center;
padding:20px;
color:#d4af37;
font-size:28px;
font-weight:700;
}

/* CART CARD */
.cart-card{
background:rgba(255,255,255,0.08);
backdrop-filter:blur(15px);
color:white;
border-radius:20px;
padding:15px;
margin-bottom:15px;
box-shadow:0 10px 25px rgba(0,0,0,0.4);
display:flex;
align-items:center;
gap:15px;
}

/* IMAGE */
.cart-img{
width:80px;
height:80px;
object-fit:cover;
border-radius:10px;
}

/* BUTTONS */
.btn-custom{
background:#d4af37;
border:none;
color:black;
border-radius:20px;
padding:8px 18px;
font-weight:600;
text-decoration:none;
}

.btn-danger{
border-radius:20px;
}

.container{
margin-top:30px;
}

</style>

</head>

<body>

<div class="header">💎 My Cart</div>

<div class="container">

<?php
if(empty($_SESSION['cart'])){
    echo "<div class='text-white text-center'>🛒 Your Cart is Empty</div>";
}
else{

foreach($_SESSION['cart'] as $id){

$product = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM products WHERE id=$id"));

if($product){

/* GET IMAGE */
$img_query = mysqli_query($conn,
"SELECT * FROM product_images WHERE product_id=".$product['id']." LIMIT 1");

$image = mysqli_fetch_assoc($img_query);
$img_path = "../uploads/" . ($image['image'] ?? "default.jpg");
?>

<div class="cart-card">

<img src="<?php echo $img_path; ?>" class="cart-img">

<div style="flex:1;">
<h5 style="color:#d4af37;"><?php echo $product['name']; ?></h5>
<p>₹ <?php echo $product['price']; ?></p>
</div>

<a href="cart.php?remove=<?php echo $id; ?>" 
class="btn btn-danger btn-sm">❌ Remove</a>

</div>

<?php } } } ?>

<!-- BUTTONS -->
<div class="text-center mt-4">

<a href="products.php" class="btn-custom">⬅ Back to Products</a>

<a href="orders.php" class="btn-custom">📦 Place Order</a>

</div>

</div>

</body>
</html>