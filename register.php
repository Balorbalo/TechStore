<?php
include "includes/db.php";
include "includes/header.php";

if(isset($_POST['register'])){

$name = $_POST['name'];
$email = $_POST['email'];
$password = md5($_POST['password']);

$sql = "INSERT INTO users(name,email,password)
VALUES('$name','$email','$password')";

if(mysqli_query($conn,$sql)){
    echo "<script>alert('Registration Successful!');</script>";
}else{
    echo "<script>alert('Registration Failed!');</script>";
}
}
?>

<div class="container">

<h2>Create Account</h2>

<div style="max-width:440px; margin:auto;">

<form method="POST">

<input
type="text"
name="name"
placeholder="Full Name"
required
style="width:100%;padding:15px;font-size:18px;margin-bottom:20px;">

<input
type="email"
name="email"
placeholder="Email Address"
required
style="width:100%;padding:15px;font-size:18px;margin-bottom:20px;">

<input
type="password"
name="password"
placeholder="Password"
required
style="width:100%;padding:15px;font-size:18px;margin-bottom:20px;">

<button
type="submit"
name="register"
style="width:100%;padding:15px;font-size:18px;">
Register
</button>

</form>

</div>

</div>

<?php include "includes/footer.php"; ?>