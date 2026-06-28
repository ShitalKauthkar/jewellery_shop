<?php
include("../config/db.php");

/* DELETE PRODUCT */
if(isset($_GET['delete'])){

$id = $_GET['delete'];

mysqli_query($conn,"DELETE FROM products WHERE id=$id");

echo "<script>
alert('Product Deleted Successfully');
window.location='manage_products.php';
</script>";
}

$result = mysqli_query($conn,"SELECT * FROM products");
?>

<!DOCTYPE html>
<html>
<head>

<title>Manage Products</title>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

<style>

body{
background:#f4f6f9;
}

/* SIDEBAR */
.sidebar{
height:100vh;
background:#222;
padding-top:20px;
position:fixed;
width:220px;
}

.sidebar a{
color:white;
display:block;
padding:15px;
text-decoration:none;
}

.sidebar a:hover{
background:#d4af37;
color:black;
}

/* HEADER */
.header{
background:#d4af37;
color:white;
padding:15px;
font-size:22px;
font-weight:bold;
display:flex;
justify-content:space-between;
align-items:center;
}

/* MAIN */
.main{
margin-left:230px;
}

/* CARD */
.card-box{
background:white;
padding:20px;
border-radius:10px;
box-shadow:0 4px 10px rgba(0,0,0,0.2);
}

/* BACK BUTTON */
.back-btn{
background:black;
color:white;
padding:8px 15px;
border-radius:20px;
text-decoration:none;
font-size:14px;
transition:0.3s;
}

.back-btn:hover{
background:#333;
color:white;
}

</style>

</head>

<body>

<div class="container-fluid">

<div class="row">

<!-- SIDEBAR -->
<div class="col-md-2 sidebar">

<h4 class="text-center text-white">💎 Admin</h4>

<a href="dashboard.php">Dashboard</a>
<a href="add_product.php">Add Product</a>
<a href="manage_products.php">Manage Products</a>
<a href="sales.php">Sales</a>
<a href="reports.php">Reports</a>

</div>

<!-- MAIN CONTENT -->
<div class="col-md-10 main">

<div class="header">

<span>Manage Jewellery Products</span>

<!-- BACK BUTTON -->
<a href="dashboard.php" class="back-btn">⬅ Back</a>

</div>

<div class="container mt-4">

<div class="card-box">

<h4 class="mb-3">📋 Product List</h4>

<table class="table table-striped table-hover table-bordered">

<tr class="table-dark">
<th>ID</th>
<th>Product Name</th>
<th>Price</th>
<th>Stock</th>
<th>Action</th>
</tr>

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?php echo $row['id']; ?></td>
<td><?php echo $row['name']; ?></td>
<td>₹ <?php echo $row['price']; ?></td>
<td><?php echo $row['stock']; ?></td>

<td>

<a href="edit_product.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>

<a href="manage_products.php?delete=<?php echo $row['id']; ?>" 
class="btn btn-danger btn-sm"
onclick="return confirm('Are you sure you want to delete this product?');">
Delete
</a>

</td>

</tr>

<?php } ?>

</table>

</div>

</div>

</div>

</div>

</div>

</body>
</html>