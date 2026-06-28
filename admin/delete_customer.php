<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include("../config/db.php");

// 🔐 Admin check
if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}

// Check ID
if(!isset($_GET['id']) || empty($_GET['id'])){
    die("❌ Invalid Request: ID missing");
}

$id = $_GET['id'];

// Delete query
$delete = mysqli_query($conn, "DELETE FROM customers WHERE customer_id='$id'");

if(!$delete){
    die("❌ Delete Error: " . mysqli_error($conn));
}

// Success redirect with message
echo "<script>alert('✅ Customer Deleted Successfully'); window.location='manage_customers.php';</script>";
exit();
?>

<!DOCTYPE html>
<html>
<head>
<title>Delete Customer</title>

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
margin-right:10px;
}

.logout-btn{
background:#e53935;
color:white;
padding:8px 18px;
border-radius:20px;
text-decoration:none;
}

/* CARD */
.card-box{
background:white;
border-radius:15px;
padding:30px;
text-align:center;
box-shadow:0 8px 20px rgba(0,0,0,0.1);
max-width:400px;
margin:100px auto;
}

</style>

</head>

<body>

<!-- HEADER -->
<div class="header">
    <h2>💎 Delete Customer</h2>

    <div>
        <a href="manage_customers.php" class="back-btn">⬅ Back</a>
        <a href="logout.php" class="logout-btn">🚪 Logout</a>
    </div>
</div>

<!-- MESSAGE -->
<div class="card-box">
    <h4>Processing...</h4>
    <p>Please wait while customer is being deleted.</p>
</div>

</body>
</html>