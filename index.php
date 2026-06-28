<!DOCTYPE html>
<html>
<head>
<title>💎 Aaradhya Jewellers</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">

<style>

body{
margin:0;
font-family:'Poppins', sans-serif;
scroll-behavior:smooth;
overflow-x:hidden;
background:black;
}

/* HERO */

.hero{
height:100vh;
background:
linear-gradient(rgba(0,0,0,0.7),rgba(0,0,0,0.85)),
url('https://images.unsplash.com/photo-1601121141461-9d6647bca1ed') center/cover;
display:flex;
justify-content:center;
align-items:center;
text-align:center;
color:white;
position:relative;
}

/* GOLD SHINE TEXT */

.hero h1{
font-family:'Playfair Display', serif;
font-size:65px;
font-weight:700;

background:linear-gradient(90deg,#d4af37,#fff,#d4af37);
background-size:200% auto;
-webkit-background-clip:text;
-webkit-text-fill-color:transparent;

animation:shine 3s linear infinite;
}

@keyframes shine{
0%{background-position:-200%;}
100%{background-position:200%;}
}

/* TEXT */

.hero p{
font-size:20px;
margin-top:15px;
color:#ddd;
}

/* IMAGE */

.hero img{
width:200px;
margin:20px 0;
border-radius:50%;
box-shadow:0 0 40px rgba(212,175,55,0.9);
}

/* BUTTONS */

.btn-custom{
padding:12px 30px;
margin:10px;
border-radius:30px;
font-weight:bold;
transition:0.3s;
}

.btn-login{
background:white;
color:black;
}

.btn-register{
background:#d4af37;
color:black;
}

.btn:hover{
transform:scale(1.1);
}

/* FOOTER NAV */

.footer{
background:black;
color:white;
text-align:center;
padding:30px;
border-top:1px solid rgba(255,255,255,0.1);
}

.footer a{
color:#d4af37;
margin:0 15px;
text-decoration:none;
font-weight:500;
}

.footer a:hover{
text-decoration:underline;
}

/* SECTIONS */

.section{
padding:80px 20px;
text-align:center;
background:#111;
}

.section h2{
color:#d4af37;
margin-bottom:20px;
}

</style>

</head>

<body>

<!-- HERO -->

<section id="home" class="hero">

<div>

<h1>WELCOME TO <br> AARADHYA JEWELLERS</h1>

<img src="image/logo.jpeg">

<p>Luxury • Elegance • Tradition </p>

<a href="customer_login.php" class="btn btn-custom btn-login">Customer Login</a>
<a href="register.php" class="btn btn-custom btn-register">Register</a>
<a href="login.php" class="btn btn-dark btn-custom">Admin Login</a>

</div>

</section>


<!-- FOOTER NAVIGATION -->

<div class="footer">
<a href="index.php">Home</a>
<a href="about.php">About Us</a>
<a href="contact.php">Contact Us</a>

<p class="mt-3">!! Aaradhya Jewellers!!</p>
</div>

</body>
</html>