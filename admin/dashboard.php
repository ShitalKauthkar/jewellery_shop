<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

// 🔐 Protect admin dashboard
if(!isset($_SESSION['admin']))
{
    header("Location: /jewellery_shop/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Aaradhya Jewellers | Admin Dashboard</title>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">

<style>

body{
margin:0;
font-family:'Poppins', sans-serif;
background:#f5f5f5;
}

/* HEADER */
.header{
background:linear-gradient(135deg,#111,#000);
color:white;
padding:20px 30px;
box-shadow:0 5px 15px rgba(0,0,0,0.3);
display:flex;
justify-content:space-between;
align-items:center;
}

.header h1{
color:#d4af37;
font-weight:700;
margin:0;
font-size:24px;
}

/* LOGOUT BUTTON */
.logout-btn{
background:#e53935;
border:none;
padding:10px 20px;
border-radius:25px;
color:white;
font-weight:600;
transition:0.3s;
}

.logout-btn:hover{
background:#c62828;
transform:scale(1.05);
}

/* WELCOME BOX */
.welcome{
background:linear-gradient(135deg,#d4af37,#ffcc70);
padding:25px;
margin:20px auto;
width:90%;
border-radius:15px;
text-align:center;
box-shadow:0 8px 20px rgba(0,0,0,0.2);
}

.welcome h2{
font-weight:700;
}

/* MENU CARDS */
.menu-card{
background:white;
border-radius:18px;
padding:35px;
text-align:center;
box-shadow:0 8px 20px rgba(0,0,0,0.08);
transition:0.3s ease-in-out;
cursor:pointer;
position:relative;
overflow:hidden;
border:2px solid transparent;
}

.menu-card:hover{
transform:translateY(-10px) scale(1.03);
box-shadow:0 12px 30px rgba(0,0,0,0.25);
border-color:#d4af37;
}

/* SHINE EFFECT */
.menu-card::before{
content:"";
position:absolute;
top:-50%;
left:-50%;
width:200%;
height:200%;
background:linear-gradient(
45deg,
transparent,
rgba(212,175,55,0.2),
transparent
);
transform:rotate(25deg);
transition:0.5s;
}

.menu-card:hover::before{
left:100%;
}

/* ICON */
.menu-icon{
font-size:42px;
margin-bottom:10px;
}

/* TITLE */
.menu-title{
font-weight:700;
color:#111;
font-size:18px;
}

.menu-card p{
font-size:13px;
color:#666;
margin:0;
}

/* COLORS */
.products{border-top:5px solid #d4af37;}
.manage{border-top:5px solid #222;}
.customers{border-top:5px solid #e91e63;}
.sales{border-top:5px solid #3f51b5;}
.reports{border-top:5px solid #28a745;}

a{
text-decoration:none;
color:inherit;
}

</style>

</head>

<body>

<!-- HEADER -->
<div class="header">

    <h1>💎 ADMIN PANEL</h1>

    <a href="/jewellery_shop/admin/logout.php" class="logout-btn">
        🚪 Logout
    </a>

</div>

<!-- WELCOME -->
<div class="welcome">
    <h2>✨ Welcome Admin ✨</h2>
    <p>Manage products, customers, sales and reports</p>
</div>

<!-- MENU -->
<div class="container mt-4">

<div class="row g-4">

<!-- ADD PRODUCT -->
<div class="col-md-4">
<a href="add_product.php">
<div class="menu-card products">
<div class="menu-icon">➕</div>
<div class="menu-title">Add Product</div>
<p>Add new jewellery item</p>
</div>
</a>
</div>

<!-- MANAGE PRODUCTS -->
<div class="col-md-4">
<a href="manage_products.php">
<div class="menu-card manage">
<div class="menu-icon">💎</div>
<div class="menu-title">Manage Products</div>
<p>Edit or delete products</p>
</div>
</a>
</div>

<!-- CUSTOMERS -->
<div class="col-md-4">
<a href="manage_customers.php">
<div class="menu-card customers">
<div class="menu-icon">👥</div>
<div class="menu-title">Customers</div>
<p>View customer details</p>
</div>
</a>
</div>

<!-- SALES -->
<div class="col-md-6">
<a href="sales.php">
<div class="menu-card sales">
<div class="menu-icon">💰</div>
<div class="menu-title">Sales</div>
<p>Manage sales records</p>
</div>
</a>
</div>

<!-- REPORTS -->
<div class="col-md-6">
<a href="reports.php">
<div class="menu-card reports">
<div class="menu-icon">📊</div>
<div class="menu-title">Reports</div>
<p>View analytics & insights</p>
</div>
</a>
</div>

</div>

</div>

</body>
</html>