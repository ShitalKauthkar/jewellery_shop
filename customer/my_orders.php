<?php
session_start();
include("../config/db.php");

if(!isset($_SESSION['customer'])){
    header("Location: /jewellery_shop/customer_login.php");
    exit();
}

$email = $_SESSION['customer'];

$orders = mysqli_query($conn,
"SELECT * FROM orders WHERE customer_email='$email' ORDER BY id DESC");
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
}

/* Background */
body::before{
content:"";
position:fixed;
width:100%;
height:100%;
background:linear-gradient(rgba(0,0,0,0.78),rgba(0,0,0,0.78)),
url('https://images.unsplash.com/photo-1515562141207-7a88fb7ce338') center/cover;
z-index:-1;
}

/* Header */
.header{
text-align:center;
padding:25px;
color:#d4af37;
font-size:28px;
font-weight:700;
letter-spacing:1px;
}

/* Order Card */
.card-box{
background:rgba(255,255,255,0.08);
backdrop-filter:blur(15px);
border-radius:18px;
padding:18px;
margin-bottom:15px;
text-align:center;
color:white;
transition:0.3s;
}

.card-box:hover{
transform:translateY(-5px);
}

.card-box h5{
color:#d4af37;
}

/* Buttons */
.btn-back{
background:#d4af37;
border:none;
color:black;
border-radius:20px;
padding:8px 20px;
text-decoration:none;
font-weight:600;
}

.btn-back:hover{
background:#c49a2c;
color:black;
}

.empty{
color:white;
text-align:center;
margin-top:50px;
font-size:18px;
opacity:0.8;
}

</style>

</head>

<body>

<div class="header">📦 My Order History</div>

<div class="container mt-4">

<?php
if(mysqli_num_rows($orders) == 0){
    echo "<div class='empty'>No orders found yet 🛍</div>";
}
?>

<?php while($row = mysqli_fetch_assoc($orders)){ ?>

<div class="card-box">
    <h5><?php echo $row['product_name']; ?></h5>
    <p>₹ <?php echo $row['price']; ?></p>
    <small><?php echo $row['order_date']; ?></small>
</div>

<?php } ?>

<div class="text-center mt-3">
    <a href="dashboard.php" class="btn-back">⬅ Back to Dashboard</a>
</div>

</div>

</body>
</html>