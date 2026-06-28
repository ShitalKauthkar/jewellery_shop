<?php 
session_start(); 
include("../config/db.php"); 

if(!isset($_SESSION['customer'])){
    header("Location: /jewellery_shop/customer_login.php");
    exit();
}

$email = $_SESSION['customer'];

// get user
$user = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM customers WHERE email='$email'"));

// FIRST LETTER FOR AVATAR
$nameLetter = strtoupper(substr($user['name'],0,1));
?>

<!DOCTYPE html>
<html>
<head>
<title>My Profile</title>

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
background:black;
position:relative;
}

/* background */
body::before{
content:"";
position:absolute;
width:100%;
height:100%;
background:linear-gradient(rgba(0,0,0,0.75),rgba(0,0,0,0.75)),
url('https://images.unsplash.com/photo-1515562141207-7a88fb7ce338') center/cover;
z-index:-1;
}

/* MAIN CARD */
.profile-card{
width:380px;
background:rgba(255,255,255,0.08);
backdrop-filter:blur(18px);
border-radius:25px;
padding:35px 25px;
color:white;
text-align:center;
box-shadow:0 15px 40px rgba(0,0,0,0.6);
transition:0.3s;
}

.profile-card:hover{
transform:translateY(-5px);
}

/* LOGO */
.logo{
color:#d4af37;
font-size:28px;
font-weight:700;
margin-bottom:20px;
letter-spacing:1px;
}

/* IMAGE */
.profile-img{
width:110px;
height:110px;
border-radius:50%;
object-fit:cover;
border:3px solid #d4af37;
margin-bottom:15px;
box-shadow:0 0 15px rgba(212,175,55,0.4);
}

/* LETTER AVATAR */
.avatar{
width:110px;
height:110px;
border-radius:50%;
background:linear-gradient(135deg,#d4af37,#ffcc70);
color:black;
font-size:42px;
display:flex;
align-items:center;
justify-content:center;
font-weight:bold;
margin:0 auto 15px;
box-shadow:0 0 15px rgba(212,175,55,0.4);
}

/* INFO BOX */
.info{
margin:15px 0;
padding:10px;
background:rgba(255,255,255,0.06);
border-radius:12px;
}

.label{
color:#d4af37;
font-size:13px;
font-weight:500;
}

.value{
font-size:16px;
font-weight:500;
margin-top:3px;
}

/* BACK BUTTON */
.back-btn{
display:inline-block;
margin-top:20px;
padding:10px 18px;
background:#d4af37;
color:black;
text-decoration:none;
border-radius:20px;
font-weight:600;
transition:0.3s;
}

.back-btn:hover{
background:#b8962e;
transform:scale(1.05);
}

</style>

</head>

<body>

<div class="profile-card">

<div class="logo">💎 AARADHYA</div>

<!-- IMAGE OR LETTER -->
<?php if(!empty($user['profile_image']) && $user['profile_image'] != "default.png") { ?>

    <img src="../uploads/<?php echo $user['profile_image']; ?>" class="profile-img">

<?php } else { ?>

    <div class="avatar">
        <?php echo $nameLetter; ?>
    </div>

<?php } ?>

<!-- NAME -->
<div class="info">
<div class="label">Full Name</div>
<div class="value"><?php echo $user['name']; ?></div>
</div>

<!-- EMAIL -->
<div class="info">
<div class="label">Email Address</div>
<div class="value"><?php echo $user['email']; ?></div>
</div>

<!-- BACK BUTTON -->
<a href="dashboard.php" class="back-btn">⬅ Back to Dashboard</a>

</div>

</body>
</html>