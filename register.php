<?php
session_start();
include("config/db.php");

if(isset($_POST['register']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm_password'];

    if($password != $confirm)
    {
        $error = "Passwords do not match!";
    }
    else
    {
        $check = "SELECT * FROM customers WHERE email='$email'";
        $result = mysqli_query($conn,$check);

        if(mysqli_num_rows($result) > 0)
        {
            $error = "Email already exists!";
        }
        else
        {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $query = "INSERT INTO customers(name,email,password) 
                      VALUES('$name','$email','$hashed_password')";

            if(mysqli_query($conn,$query))
            {
                $_SESSION['customer'] = $email;
                $_SESSION['customer_name'] = $name;

                header("Location: /jewellery_shop/customer/dashboard.php");
                exit();
            }
            else
            {
                $error = "Something went wrong!";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Customer Register</title>

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
}
.logo{
text-align:center;
color:#d4af37;
font-size:26px;
margin-bottom:10px;
}
.btn-register{
background:#d4af37;
border:none;
padding:10px;
border-radius:20px;
}
a{
color:#d4af37;
text-decoration:none;
}
</style>
</head>

<body>

<div class="login-card">

<div class="logo">💎 AARADHYA</div>
<h4 class="text-center mb-3">Customer Register</h4>

<?php 
if(isset($error)){
    echo "<div class='alert alert-danger'>$error</div>";
}
?>

<form method="POST">

<input type="text" name="name" class="form-control mb-3" placeholder="Full Name" required>

<input type="email" name="email" class="form-control mb-3" placeholder="Email" required>

<input type="password" name="password" class="form-control mb-3" placeholder="Password" required>

<input type="password" name="confirm_password" class="form-control mb-3" placeholder="Confirm Password" required>

<button name="register" class="btn btn-register w-100">Register</button>

</form>

<p class="text-center mt-3">
Already have account? <a href="/jewellery_shop/customer_login.php">Login</a>
</p>

</div>

</body>
</html>