<?php 
session_start();
include("../config/db.php");

if(!isset($_SESSION['customer'])){
    header("Location: /jewellery_shop/customer_login.php");
    exit();
}

$email = $_SESSION['customer'];

$sql = "SELECT * FROM orders WHERE customer_email='$email' ORDER BY id DESC";

$orders = mysqli_query($conn, $sql);

if(!$orders){
    die("Error: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html>
<head>
<title>My Orders</title>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">

<style>

body{
margin:0;
font-family:'Poppins', sans-serif;
background:black;
position:relative;
}

body::before{
content:"";
position:fixed;
width:100%;
height:100%;
background:linear-gradient(rgba(0,0,0,0.75),rgba(0,0,0,0.75)),
url('https://images.unsplash.com/photo-1515562141207-7a88fb7ce338') center/cover;
z-index:-1;
}

.header{
text-align:center;
padding:25px;
color:#d4af37;
font-size:28px;
font-weight:700;
}

.order-box{
background:rgba(255,255,255,0.08);
backdrop-filter:blur(15px);
color:white;
border-radius:18px;
padding:20px;
margin-bottom:15px;
text-align:center;
}

.order-box h5{
color:#d4af37;
}

.btn-custom{
background:#d4af37;
border:none;
color:black;
border-radius:20px;
padding:8px 20px;
font-weight:600;
text-decoration:none;
display:inline-block;
margin-top:10px;
}

.back-btn{
display:inline-block;
margin-top:15px;
background:#444;
color:white;
padding:8px 18px;
border-radius:20px;
text-decoration:none;
}

.empty{
text-align:center;
margin-top:60px;
color:white;
font-size:18px;
opacity:0.8;
}

</style>

</head>

<body>

<div class="header">📦 My Orders</div>

<div class="container mt-4">

<?php if(mysqli_num_rows($orders) == 0){ ?>

    <div class="empty">
        😕 No orders found yet<br><br>
        <a href="products.php" class="btn-custom">Start Shopping</a>
    </div>

<?php } else { ?>

    <?php while($row = mysqli_fetch_assoc($orders)){ ?>

    <div class="order-box">
        <h5><?php echo $row['product_name']; ?></h5>
        <p>₹ <?php echo $row['price']; ?></p>
        <small><?php echo $row['order_date']; ?></small>
    </div>

    <?php } ?>

<?php } ?>

<div class="text-center">
    <a href="products.php" class="btn-custom">Continue Shopping</a><br>
    <a href="dashboard.php" class="back-btn">⬅ Back to Dashboard</a>
</div>

</div>

</body>
</html>