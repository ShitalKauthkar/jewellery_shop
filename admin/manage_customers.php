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

// Fetch customers
$result = mysqli_query($conn,"SELECT * FROM customers");

if(!$result){
    die("SQL Error: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Manage Customers</title>

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

/* CARD */
.card-box{
background:white;
border-radius:15px;
padding:25px;
box-shadow:0 8px 20px rgba(0,0,0,0.1);
}

/* TABLE */
.table thead{
background:#111;
color:#d4af37;
}

/* ACTION BUTTONS */
.btn-edit{
background:#28a745;
color:white;
}

.btn-delete{
background:#dc3545;
color:white;
}

.btn-edit:hover,
.btn-delete:hover{
opacity:0.9;
}

</style>

</head>

<body>

<!-- HEADER -->
<div class="header">

    <h2>💎 Manage Customers</h2>

    <div>
        <a href="dashboard.php" class="back-btn">⬅ Dashboard</a>
        <a href="logout.php" class="logout-btn">🚪 Logout</a>
    </div>

</div>

<div class="container mt-4">

<div class="card-box">

<h4 class="mb-3">Customer List</h4>

<table class="table table-bordered table-hover">

<thead>
<tr>
<th>ID</th>
<th>Name</th>
<th>Phone</th>
<th>Address</th>
<th>Action</th>
</tr>
</thead>

<tbody>

<?php while($row = mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?php echo $row['customer_id']; ?></td>
<td><?php echo $row['name']; ?></td>
<td><?php echo $row['phone']; ?></td>
<td><?php echo $row['address']; ?></td>

<td>

<!-- ✅ IMPORTANT FIX (ID PASSING) -->
<a href="edit_customer.php?id=<?php echo $row['customer_id']; ?>" 
class="btn btn-edit btn-sm">
✏ Edit
</a>

<a href="delete_customer.php?id=<?php echo $row['customer_id']; ?>" 
class="btn btn-delete btn-sm"
onclick="return confirm('Delete this customer?');">
🗑 Delete
</a>

</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</div>

</body>
</html>