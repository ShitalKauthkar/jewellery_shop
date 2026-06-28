<?php
include("../config/db.php");

if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $price = $_POST['price'];

    // Insert product
    $query = "INSERT INTO products(name,price) VALUES('$name','$price')";
    mysqli_query($conn,$query);

    $product_id = mysqli_insert_id($conn);

    // Upload multiple images
    foreach($_FILES['images']['tmp_name'] as $key => $tmp_name){

        $image = $_FILES['images']['name'][$key];
        $target = "../uploads/".$image;

        move_uploaded_file($tmp_name, $target);

        mysqli_query($conn,
        "INSERT INTO product_images(product_id,image)
        VALUES($product_id,'$image')");
    }

    $msg = "💎 Product Added Successfully!";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin - Add Product</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">

<style>

body{
margin:0;
font-family:'Poppins', sans-serif;
background:black;
position:relative;
}

/* Background */
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
font-size:26px;
font-weight:700;
}

/* CARD */
.card-box{
width:600px;
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
}

.btn-custom:hover{
background:#c49a2c;
}

/* MESSAGE */
.alert{
text-align:center;
border-radius:15px;
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
}

.back-btn:hover{
background:#666;
}

</style>

</head>

<body>

<div class="header">➕ Add Jewellery Product</div>

<div class="card-box">

<?php if(isset($msg)) { ?>
    <div class="alert alert-success"><?php echo $msg; ?></div>
<?php } ?>

<form method="POST" enctype="multipart/form-data">

<label>Product Name</label>
<input type="text" name="name" class="form-control mb-3" placeholder="Enter product name" required>

<label>Price</label>
<input type="text" name="price" class="form-control mb-3" placeholder="Enter price" required>

<label>Product Images</label>
<input type="file" name="images[]" class="form-control mb-3" multiple required>

<button type="submit" name="submit" class="btn btn-custom">
➕ Add Product
</button>

</form>

<div class="text-center">
<a href="dashboard.php" class="back-btn">⬅ Back to Dashboard</a>
</div>

</div>

</body>
</html>