<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "jewellery_shop");

if(!$conn){
    die("Connection failed");
}

if(isset($_POST['login']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM customers WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn,$query);

    if(!$result){
        die("Query Error: " . mysqli_error($conn));
    }

    if(mysqli_num_rows($result) > 0)
    {
        $row = mysqli_fetch_assoc($result);

        $_SESSION['customer_id'] = $row['customer_id'];

        header("Location: customer/dashboard.php");
        exit();
    }
    else
    {
        echo "Invalid Email or Password";
    }
}
?>