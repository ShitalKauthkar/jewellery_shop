<?php
session_start();
include("config/db.php");

if(isset($_POST['login']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    // get user by email only
    $query = "SELECT * FROM customers WHERE email='$email'";
    $result = mysqli_query($conn,$query);

    if(mysqli_num_rows($result)==1)
    {
        $row = mysqli_fetch_assoc($result);

        // verify password
        if(password_verify($password, $row['password']))
        {
            $_SESSION['customer'] = $row['email'];
            $_SESSION['customer_name'] = $row['name'];

            header("Location: /jewellery_shop/customer/dashboard.php");
            exit();
        }
        else
        {
            $error = "Invalid Password!";
        }
    }
    else
    {
        $error = "Email not found!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Customer Login</title>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">

<style>
body{
margin:0;
font-family:'Poppins', sans-serif;
height:100vh;
display:flex;
align-items:center;
justify-content:center;
position:relative;
background:black;
}

body::before{
content:"";
position:absolute;
width:100%;
height:100%;
background:linear-gradient(rgba(0,0,0,0.7),rgba(0,0,0,0.7)),
url('https://images.unsplash.com/photo-1515562141207-7a88fb7ce338') center/cover;
z-index:-1;
}

.login-card{
width:380px;
background:rgba(255,255,255,0.08);
backdrop-filter:blur(12px);
border-radius:20px;
padding:30px;
color:white;
text-align:center;
}

.logo{
color:#d4af37;
font-size:26px;
margin-bottom:10px;
}

.btn-login{
background:#d4af37;
border:none;
padding:10px;
border-radius:20px;
width:100%;
font-weight:600;
}

.back-btn{
display:block;
margin-top:10px;
text-decoration:none;
color:white;
background:#444;
padding:8px;
border-radius:20px;
transition:0.3s;
}

.back-btn:hover{
background:#666;
color:white;
}
</style>

</head>

<body>

<div class="login-card">

<div class="logo">💎 AARADHYA</div>
<h4 class="text-center mb-3">Customer Login</h4>

<?php if(isset($error)){ echo "<div class='alert alert-danger'>$error</div>"; } ?>

<form method="POST">
<input type="email" name="email" class="form-control mb-3" placeholder="Email" required>
<input type="password" name="password" class="form-control mb-3" placeholder="Password" required>

<button name="login" class="btn btn-login">Login</button>
</form>

<p class="text-center mt-3">
Don't have account? <a href="/jewellery_shop/register.php">Register</a>
</p>

<!-- BACK TO INDEX -->
<a href="/jewellery_shop/index.php" class="back-btn">⬅ Back to Home</a>

</div>

</body>
</html>