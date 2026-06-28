<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include("../config/db.php");

// Admin check
if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}

// Check ID
if(!isset($_GET['id'])){
    die("Invalid Request: ID missing");
}

$id = $_GET['id'];

// Fetch customer
$result = mysqli_query($conn,"SELECT * FROM customers WHERE customer_id='$id'");

if(!$result){
    die("SQL Error: " . mysqli_error($conn));
}

if(mysqli_num_rows($result)==0){
    die("Customer Not Found");
}

$row = mysqli_fetch_assoc($result);

// Update
if(isset($_POST['update'])){

$name = $_POST['name'];
$phone = $_POST['phone'];
$address = $_POST['address'];

$update = mysqli_query($conn,"UPDATE customers SET 
name='$name',
phone='$phone',
address='$address'
WHERE customer_id='$id'");

if(!$update){
    die("Update Error: " . mysqli_error($conn));
}

echo "<script>alert('Customer Updated Successfully'); window.location='manage_customers.php';</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Customer</title>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

<style>

body{
margin:0;
font-family:Poppins;
background:#f5f5f5;
}

/* HEADER */
.header{
background:linear-gradient(135deg,#111,#000);
color:white;
padding:20px 30px;
display:flex;
justify-content:space-between;
align-items:center;
box-shadow:0 5px 15px rgba(0,0,0,0.3);
}

.header h2{
color:#d4af37;
margin:0;
}

/* BUTTONS */
.back-btn{
background:#444;
color:white;
padding:8px 18px;
border-radius:20px;
text-decoration:none;
}

.logout-btn{
background:#e53935;
color:white;
padding:8px 18px;
border-radius:20px;
text-decoration:none;
}

/* FORM */
.card-box{
background:white;
border-radius:15px;
padding:30px;
box-shadow:0 8px 20px rgba(0,0,0,0.1);
max-width:500px;
margin:auto;
}

.btn-update{
background:#d4af37;
border:none;
color:black;
padding:10px;
border-radius:20px;
font-weight:600;
width:100%;
}

</style>

</head>

<body>

<!-- HEADER -->
<div class="header">
    <h2>💎 Edit Customer</h2>

    <div>
        <a href="manage_customers.php" class="back-btn">⬅ Back</a>
        <a href="logout.php" class="logout-btn">🚪 Logout</a>
    </div>
</div>

<div class="container mt-5">

<div class="card-box">

<h4 class="mb-3 text-center">Update Customer</h4>

<form method="POST">

<input type="text" name="name" 
value="<?php echo $row['name']; ?>" 
class="form-control mb-3" required>

<input type="text" name="phone" 
value="<?php echo $row['phone']; ?>" 
class="form-control mb-3" required>

<input type="text" name="address" 
value="<?php echo $row['address']; ?>" 
class="form-control mb-3" required>

<button name="update" class="btn btn-update">
💾 Update Customer
</button>

</form>

</div>

</div>

</body>
</html>