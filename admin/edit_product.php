\<?php
include("../config/db.php");

$id = $_GET['id'];

$result = mysqli_query($conn,"SELECT * FROM products WHERE id=$id");
$row = mysqli_fetch_assoc($result);

if(isset($_POST['update'])){

$name = $_POST['name'];
$price = $_POST['price'];
$stock = $_POST['stock'];

mysqli_query($conn,"UPDATE products SET name='$name', price='$price', stock='$stock' WHERE id=$id");

echo "<script>alert('💎 Product Updated Successfully'); window.location='manage_products.php';</script>";
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Edit Product</title>

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
background:linear-gradient(rgba(0,0,0,0.75),rgba(0,0,0,0.85)),
url('https://images.unsplash.com/photo-1515562141207-7a88fb7ce338') center/cover;
z-index:-1;
}

/* HEADER */
.header{
text-align:center;
padding:25px;
color:#d4af37;
font-size:28px;
font-weight:700;
}

/* CARD BOX */
.card-box{
width:500px;
margin:auto;
background:rgba(255,255,255,0.08);
backdrop-filter:blur(15px);
border-radius:20px;
padding:30px;
color:white;
box-shadow:0 10px 30px rgba(0,0,0,0.5);
}

/* LABEL */
label{
color:#d4af37;
font-size:14px;
margin-bottom:5px;
}

/* INPUT */
.form-control{
background:rgba(255,255,255,0.1);
border:none;
color:white;
border-radius:10px;
padding:10px;
margin-bottom:15px;
}

.form-control::placeholder{
color:#ccc;
}

/* BUTTON */
.btn-custom{
background:#d4af37;
border:none;
color:black;
padding:10px;
border-radius:20px;
font-weight:600;
width:100%;
transition:0.3s;
}

.btn-custom:hover{
background:#c49a2c;
}

/* BACK BUTTON */
.back-btn{
display:inline-block;
margin-top:15px;
background:#444;
color:white;
padding:8px 18px;
border-radius:20px;
text-decoration:none;
transition:0.3s;
}

.back-btn:hover{
background:#666;
}

</style>

</head>

<body>

<div class="header">✏ Edit Jewellery Product</div>

<div class="card-box">

<form method="POST">

<label>Product Name</label>
<input type="text" name="name" value="<?php echo $row['name']; ?>" class="form-control" required>

<label>Price</label>
<input type="number" name="price" value="<?php echo $row['price']; ?>" class="form-control" required>

<label>Stock</label>
<input type="number" name="stock" value="<?php echo $row['stock']; ?>" class="form-control" required>

<button name="update" class="btn btn-custom">
💎 Update Product
</button>

</form>

<div class="text-center">
<a href="manage_products.php" class="back-btn">⬅ Back to Products</a>
</div>

</div>

</body>
</html>