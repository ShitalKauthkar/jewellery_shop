<?php
session_start();
include("config/db.php");

if(isset($_POST['login']))
{
    $username=$_POST['username'];
    $password=$_POST['password'];

    $query="SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result=mysqli_query($conn,$query);

    if(mysqli_num_rows($result)==1)
    {
        $_SESSION['admin']=$username;
        header("Location: /jewellery_shop/admin/dashboard.php");
        exit();
    }
    else
    {
        $error = "Invalid Username or Password!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Aaradhya Jewellers | Admin Login</title>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">

<style>

body{
margin:0;
font-family:'Poppins', sans-serif;
background:black;
height:100vh;
display:flex;
align-items:center;
justify-content:center;
position:relative;
}

/* Background */
body::before{
content:"";
position:absolute;
width:100%;
height:100%;
background:linear-gradient(rgba(0,0,0,0.7),rgba(0,0,0,0.7)),
url('https://images.unsplash.com/photo-1515562141207-7a88fb7ce338') center/cover;
z-index:-1;
}

/* Login Card */
.login-card{
width:380px;
background:rgba(255,255,255,0.08);
backdrop-filter:blur(12px);
border-radius:20px;
padding:30px;
box-shadow:0 8px 30px rgba(0,0,0,0.5);
color:white;
}

/* Logo */
.logo{
font-size:26px;
font-weight:700;
text-align:center;
color:#d4af37;
letter-spacing:2px;
margin-bottom:10px;
}

/* Title */
.login-title{
text-align:center;
margin-bottom:25px;
font-weight:500;
}

/* Inputs */
.form-control{
background:transparent;
border:1px solid #ccc;
color:white;
border-radius:10px;
padding:10px;
}

.form-control::placeholder{
color:#ccc;
}

/* Button */
.btn-login{
background:#d4af37;
border:none;
font-weight:bold;
padding:10px;
border-radius:25px;
transition:0.3s;
}

.btn-login:hover{
background:#b8962e;
}

/* BACK BUTTON */
.btn-back{
display:block;
text-align:center;
margin-top:12px;
padding:8px;
border-radius:20px;
background:#444;
color:white;
text-decoration:none;
transition:0.3s;
}

.btn-back:hover{
background:#666;
color:white;
}

/* Error */
.alert{
font-size:14px;
}

.footer-text{
font-size:13px;
color:#ccc;
text-align:center;
margin-top:15px;
}

</style>

</head>

<body>

<div class="login-card">

<div class="logo">💎 AARADHYA</div>

<div class="login-title">Admin Login</div>

<?php
if(isset($error)){
echo "<div class='alert alert-danger text-center'>$error</div>";
}
?>

<form method="POST">

<input type="text" name="username" placeholder="Username" class="form-control mb-3" required>

<input type="password" name="password" placeholder="Password" class="form-control mb-3" required>

<button name="login" class="btn btn-login w-100">Login</button>

</form>

<!-- 🔙 BACK TO INDEX -->
<a href="/jewellery_shop/index.php" class="btn-back">
⬅ Back to Home
</a>

<div class="footer-text">
Aaradhya Jewellers • Premium Management System
</div>

</div>

</body>
</html>