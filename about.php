<!DOCTYPE html>
<html>
<head>
<title>About Us - Jewellery Shop</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
background:#f8f9fa;
font-family:Arial;
}

/* Header */

.header{
background:#d4af37;
color:white;
padding:18px;
font-weight:bold;
}

/* Banner */

.banner{
background:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)),
url('https://images.unsplash.com/photo-1603561596112-dcdfc7c0b2c5') center/cover;
height:260px;
display:flex;
align-items:center;
justify-content:center;
color:white;
font-size:38px;
font-weight:bold;
}

/* Section */

.section-title{
font-weight:bold;
margin-bottom:20px;
}

/* Image hover */

.gallery img{
border-radius:12px;
transition:0.3s;
height:200px;
object-fit:cover;
}

.gallery img:hover{
transform:scale(1.05);
box-shadow:0 5px 15px rgba(0,0,0,0.3);
}

/* Feature cards */

.feature-card{
background:white;
padding:20px;
border-radius:12px;
box-shadow:0 4px 10px rgba(0,0,0,0.1);
transition:0.3s;
}

.feature-card:hover{
transform:translateY(-5px);
}

/* Footer */

.footer{
background:#222;
color:white;
padding:25px;
margin-top:50px;
}

</style>

</head>

<body>

<!-- Header -->

<div class="header text-center">
<h2>💎 Jewellery Shop Management System</h2>
</div>

<!-- Banner -->

<div class="banner">
About Our Jewellery Shop
</div>


<div class="container mt-5">

<h2 class="text-center section-title">Who We Are</h2>

<p class="text-center">
Our Jewellery Shop Management System helps jewellery stores manage
products, customers, and sales efficiently. The system simplifies
inventory tracking, billing, and customer records, helping shop owners
run their business smoothly and professionally.
</p>

<!-- Features -->

<div class="row mt-5 text-center">

<div class="col-md-4">
<div class="feature-card">
<h4>📦 Product Management</h4>
<p>Add, update and manage jewellery products with stock tracking.</p>
</div>
</div>

<div class="col-md-4">
<div class="feature-card">
<h4>💰 Billing System</h4>
<p>Generate bills quickly and manage daily sales easily.</p>
</div>
</div>

<div class="col-md-4">
<div class="feature-card">
<h4>👥 Customer Records</h4>
<p>Store and manage customer information for better service.</p>
</div>
</div>

</div>

<!-- Jewellery Images -->

<h3 class="text-center mt-5">Our Jewellery Collection</h3>

<div class="row mt-4 gallery">

<div class="col-md-4">
<img src="https://images.unsplash.com/photo-1617038260897-41a1f14a8ca0"
class="img-fluid">
</div>

<div class="col-md-4">
<img src="https://images.unsplash.com/photo-1603974372039-adc49044b6bd"
class="img-fluid">
</div>

<div class="col-md-4">
<img src="https://images.unsplash.com/photo-1617038220319-276d3cfab638"
class="img-fluid">
</div>

</div>

<!-- Button -->

<div class="text-center mt-5">
<a href="index.php" class="btn btn-dark px-4">⬅ Back to Home</a>
</div>

</div>

<!-- Footer -->

<div class="footer text-center">
<p>© 2026 Jewellery Shop Management System | Designed for Jewellery Stores</p>
</div>

</body>
</html>