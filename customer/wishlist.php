<?php
session_start();
include("../config/db.php");

if(!isset($_SESSION['customer'])){
    header("Location: customer_login.php");
    exit();
}

$email = $_SESSION['customer'];

/* REMOVE ITEM */
if(isset($_GET['remove'])){
    $rid = (int)$_GET['remove'];
    mysqli_query($conn,"DELETE FROM wishlist WHERE id=$rid AND customer_email='$email'");
    header("Location: wishlist.php");
    exit();
}

/* GET WISHLIST */
$query = mysqli_query($conn,"
SELECT w.id as wid, p.*
FROM wishlist w
JOIN products p ON w.product_id = p.id
WHERE w.customer_email='$email'
ORDER BY w.id DESC
");
?>

<!DOCTYPE html>
<html>
<head>
<title>Wishlist</title>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

<style>

body{
margin:0;
font-family:Poppins;
background:black;
position:relative;
color:white;
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
padding:20px;
color:#d4af37;
font-size:26px;
font-weight:700;
}

/* CARD */
.card-box{
background:rgba(255,255,255,0.08);
backdrop-filter:blur(15px);
padding:20px;
border-radius:20px;
margin-bottom:15px;
text-align:center;
box-shadow:0 10px 25px rgba(0,0,0,0.4);
}

/* IMAGE */
.product-img{
height:180px;
object-fit:cover;
border-radius:12px;
margin-bottom:10px;
}

/* BUTTONS */
.btn-remove{
background:red;
color:white;
border:none;
padding:6px 12px;
border-radius:20px;
}

.btn-custom{
background:#d4af37;
border:none;
color:black;
border-radius:20px;
padding:6px 15px;
font-weight:600;
text-decoration:none;
display:inline-block;
margin-top:10px;
}

</style>
</head>

<body>

<div class="header">❤️ My Wishlist</div>

<div class="container mt-3">

<?php if(mysqli_num_rows($query) == 0){ ?>
    <p class="text-center">Wishlist is empty</p>
<?php } ?>

<?php while($row = mysqli_fetch_assoc($query)){ ?>

<?php
// FETCH IMAGE
$img = mysqli_query($conn,
"SELECT * FROM product_images WHERE product_id=".$row['id']." LIMIT 1");
$image = mysqli_fetch_assoc($img);
?>

<div class="card-box">

<!-- IMAGE -->
<img src="../uploads/<?php echo $image['image'] ?? 'default.jpg'; ?>" 
class="product-img">

<h5 style="color:#d4af37;"><?php echo $row['name']; ?></h5>
<p>₹ <?php echo $row['price']; ?></p>

<a href="product_details.php?id=<?php echo $row['id']; ?>" 
class="btn btn-warning btn-sm">
View
</a>

<a href="wishlist.php?remove=<?php echo $row['wid']; ?>" 
class="btn-remove btn-sm">
Remove
</a>

</div>

<?php } ?>

<div class="text-center mt-4">
<a href="products.php" class="btn-custom">🛍 Continue Shopping</a>
<br><br>
<a href="dashboard.php" class="btn-custom">⬅ Back to Dashboard</a>
</div>

</div>

</body>
</html>