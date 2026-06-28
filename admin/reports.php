<?php
include("../config/db.php");

/* SAFETY CHECK */
if(!isset($conn)){
    die("Database not connected. Check db.php file.");
}

/* TOTAL SALES */
$sales = mysqli_fetch_assoc(mysqli_query($conn,"
SELECT SUM(price) AS total_sales FROM orders
"));
$totalSales = $sales['total_sales'] ?? 0;

/* TOTAL ORDERS */
$orders = mysqli_fetch_assoc(mysqli_query($conn,"
SELECT COUNT(*) AS total_orders FROM orders
"));
$totalOrders = $orders['total_orders'] ?? 0;

/* TOTAL CUSTOMERS */
$customers = mysqli_fetch_assoc(mysqli_query($conn,"
SELECT COUNT(DISTINCT customer_email) AS total_customers FROM orders
"));
$totalCustomers = $customers['total_customers'] ?? 0;

/* BEST SELLING PRODUCT */
$best = mysqli_query($conn,"
SELECT product_name, COUNT(*) as cnt 
FROM orders 
GROUP BY product_name 
ORDER BY cnt DESC 
LIMIT 1
");
$bestProduct = mysqli_fetch_assoc($best);

/* DAILY SALES DATA */
$graph = mysqli_query($conn,"
SELECT DATE(order_date) as d, SUM(price) as total
FROM orders
GROUP BY DATE(order_date)
ORDER BY d ASC
");

$labels = [];
$data = [];

while($row = mysqli_fetch_assoc($graph)){
    $labels[] = $row['d'];
    $data[] = $row['total'];
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Analytics Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">

<style>

body{
margin:0;
font-family:'Poppins', sans-serif;
background:#0f0f0f;
color:white;
}

/* HEADER */
.header{
background:#111;
padding:20px;
text-align:center;
font-size:22px;
font-weight:700;
color:#d4af37;
}

/* CARDS */
.card-box{
background:#1c1c1c;
border-radius:15px;
padding:20px;
text-align:center;
transition:0.3s;
}

.card-box:hover{
transform:translateY(-5px);
}

.card-box h3{
color:#d4af37;
}

/* BEST PRODUCT */
.best-box{
background:linear-gradient(135deg,#d4af37,#ffcc70);
color:black;
border-radius:15px;
padding:20px;
text-align:center;
font-weight:600;
}

/* CHART */
.chart-box{
background:#1c1c1c;
padding:20px;
border-radius:15px;
margin-top:20px;
}

.back-btn{
display:inline-block;
margin-top:15px;
padding:8px 15px;
background:#d4af37;
color:black;
border-radius:20px;
text-decoration:none;
font-weight:600;
}

.back-btn:hover{
background:#caa132;
}

</style>

</head>

<body>

<div class="header">
📊 AARADHYA JEWELLERY ADMIN ANALYTICS
</div>

<div class="container mt-4">

<!-- STATS -->
<div class="row g-3">

<div class="col-md-3">
<div class="card-box">
<h5>Total Sales</h5>
<h3>₹ <?php echo $totalSales; ?></h3>
</div>
</div>

<div class="col-md-3">
<div class="card-box">
<h5>Total Orders</h5>
<h3><?php echo $totalOrders; ?></h3>
</div>
</div>

<div class="col-md-3">
<div class="card-box">
<h5>Total Customers</h5>
<h3><?php echo $totalCustomers; ?></h3>
</div>
</div>

<div class="col-md-3">
<div class="best-box">
<h5>🔥 Best Product</h5>
<h4><?php echo $bestProduct['product_name'] ?? "No Data"; ?></h4>
</div>
</div>

</div>

<!-- GRAPH -->
<div class="chart-box mt-4">

<h5 style="color:#d4af37;">📈 Daily Sales Growth</h5>

<canvas id="chart"></canvas>

<div class="text-center">
    <a href="dashboard.php" class="back-btn">⬅ Back to Dashboard</a>
</div>

</div>

</div>

<script>
const ctx = document.getElementById('chart').getContext('2d');

new Chart(ctx,{
type:'line',
data:{
labels: <?php echo json_encode($labels); ?>,
datasets:[{
label:'Sales',
data: <?php echo json_encode($data); ?>,
borderColor:'#d4af37',
backgroundColor:'rgba(212,175,55,0.2)',
fill:true,
tension:0.4
}]
},
options:{
responsive:true
}
});
</script>

</body>
</html>