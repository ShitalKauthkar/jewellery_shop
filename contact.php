<!DOCTYPE html>
<html>
<head>

<title>Contact Us - Jewellery Shop</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
background:#f8f9fa;
}

/* Header */

.header{
background:#d4af37;
color:white;
padding:20px;
font-weight:bold;
}

/* Banner */

.banner{
background:url('https://images.unsplash.com/photo-1601121141461-9d6647bca1ed') center/cover;
height:260px;
display:flex;
align-items:center;
justify-content:center;
color:white;
font-size:38px;
font-weight:bold;
}

/* Jewellery Gallery */

.gallery img{
height:150px;
object-fit:cover;
border-radius:10px;
margin:10px;
transition:0.3s;
}

.gallery img:hover{
transform:scale(1.05);
}

/* Card */

.card-box{
background:white;
padding:25px;
border-radius:12px;
box-shadow:0 4px 10px rgba(0,0,0,0.2);
}

/* Footer */

.footer{
background:#222;
color:white;
padding:20px;
margin-top:40px;
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
Contact Our Jewellery Store
</div>


<div class="container mt-5">

<div class="row">

<!-- Contact Form -->

<div class="col-md-6">

<div class="card-box">

<h4>📩 Send Message</h4>

<form>

<input type="text" class="form-control mb-3" placeholder="Your Name">

<input type="email" class="form-control mb-3" placeholder="Your Email">

<textarea class="form-control mb-3" placeholder="Your Message"></textarea>

<button class="btn btn-warning w-100">
Send Message
</button>

</form>

</div>

</div>


<!-- Shop Info -->

<div class="col-md-6">

<div class="card-box">

<h4>🏬 Our Shop</h4>

<p>
📍 Location: Pune, Maharashtra<br>
📞 Phone: +91 8282828282<br>
✉ Email: jewelleryshop@email.com
</p>

<hr>

<h5>💎 Our Jewellery Collection</h5>

<div class="d-flex flex-wrap gallery">

<img src="https://images.unsplash.com/photo-1617038260897-41a1f14a8ca0" width="30%">

<img src="https://images.unsplash.com/photo-1603974372039-adc49044b6bd" width="30%">

<img src="https://images.unsplash.com/photo-1611591437281-460bfbe1220a" width="30%">

<img src="https://images.unsplash.com/photo-1617038220319-276d3cfab638" width="30%">

</div>

</div>

</div>

</div>


<!-- Back Button -->

<div class="text-center mt-4">

<a href="index.php" class="btn btn-dark">
⬅ Back to Home
</a>

</div>

</div>


<!-- Footer -->

<div class="footer text-center">
© 2026 Jewellery Shop Management System
</div>

</body>
</html>