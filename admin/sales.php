<?php
include("../config/db.php");

$result = mysqli_query($conn,"SELECT * FROM products");
?>

<!DOCTYPE html>
<html>
<head>

<title>Jewellery Shop Billing</title>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

<style>

body{
background:#f4f6f9;
font-family: Arial, sans-serif;
}

/* HEADER */
.header{
background:#d4af37;
color:white;
padding:15px;
margin-bottom:20px;
display:flex;
justify-content:space-between;
align-items:center;
}

/* CARD */
.card{
box-shadow:0 5px 15px rgba(0,0,0,0.1);
border:none;
}

/* CART TABLE */
.cart-table td{
vertical-align:middle;
}

/* BACK BUTTON */
.back-btn{
background:black;
color:white;
padding:8px 15px;
border-radius:20px;
text-decoration:none;
font-size:14px;
transition:0.3s;
}

.back-btn:hover{
background:#333;
color:white;
}

</style>

<script>

let cart = [];

function addToCart(name,price){
cart.push({name:name,price:price});
displayCart();
}

function removeItem(index){
cart.splice(index,1);
displayCart();
}

function displayCart(){

let cartTable = document.getElementById("cart");
cartTable.innerHTML="";

let total = 0;

cart.forEach((item,index)=>{
total += parseFloat(item.price);

cartTable.innerHTML += `
<tr>
<td>${item.name}</td>
<td>₹ ${item.price}</td>
<td><button class="btn btn-danger btn-sm" onclick="removeItem(${index})">Remove</button></td>
</tr>
`;
});

document.getElementById("total").innerText = "₹ " + total;
}

function printBill(){
window.print();
}

</script>

</head>

<body>

<div class="header">

<h2>Jewellery Shop Billing System</h2>

<!-- BACK BUTTON -->
<a href="dashboard.php" class="back-btn">⬅ Back</a>

</div>

<div class="container">

<div class="row">

<!-- PRODUCT LIST -->
<div class="col-md-7">

<div class="card p-3">

<h4>Products</h4>

<table class="table table-bordered table-hover">

<tr class="table-dark">
<th>Name</th>
<th>Price</th>
<th>Stock</th>
<th>Action</th>
</tr>

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?php echo $row['name']; ?></td>
<td>₹ <?php echo $row['price']; ?></td>
<td><?php echo $row['stock']; ?></td>

<td>
<button class="btn btn-success btn-sm"
onclick="addToCart('<?php echo $row['name']; ?>','<?php echo $row['price']; ?>')">
Add
</button>
</td>

</tr>

<?php } ?>

</table>

</div>

</div>

<!-- CART -->
<div class="col-md-5">

<div class="card p-3">

<h4>Cart</h4>

<table class="table cart-table">

<tr class="table-dark">
<th>Product</th>
<th>Price</th>
<th>Action</th>
</tr>

<tbody id="cart"></tbody>

</table>

<h4>Total: <span id="total">₹ 0</span></h4>

<button class="btn btn-primary w-100 mt-2" onclick="printBill()">
Generate Bill / Print
</button>

</div>

</div>

</div>

</div>

</body>
</html>