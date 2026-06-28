<?php
include("config/db.php");

if(isset($_POST['register']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $check = mysqli_query($conn,"SELECT * FROM customers WHERE email='$email'");

    if(mysqli_num_rows($check) > 0){
        echo "Email already exists";
    } else {
        mysqli_query($conn,"INSERT INTO customers(name,email,password) 
                            VALUES('$name','$email','$password')");

        echo "Registered Successfully <br>";
        echo "<a href='customer_login.php'>Go to Login</a>";
    }
}
?>

<form method="POST">
    Name: <input type="text" name="name" required><br><br>
    Email: <input type="email" name="email" required><br><br>
    Password: <input type="password" name="password" required><br><br>

    <button type="submit" name="register">Register</button>
</form>