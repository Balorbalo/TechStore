<?php
session_start();
include "includes/db.php";
include "includes/header.php";

if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM users
            WHERE email='$email'
            AND password='$password'";

    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)>0){

        $user = mysqli_fetch_assoc($result);

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];

        echo "<script>
        alert('Login Successful');
        window.location='index.php';
        </script>";

    }else{

        echo "<script>alert('Invalid Email or Password');</script>";

    }
}
?>

<div class="container">

<h2>Login</h2>

<div style="max-width:440px; margin:auto;">

<form method="POST">

<input
type="email"
name="email"
placeholder="Enter Your Email Address"
required
style="width:100%;padding:15px;font-size:18px;margin-bottom:20px;">

<input
type="password"
name="password"
placeholder="Enter Your Password"
required
style="width:100%;padding:15px;font-size:18px;margin-bottom:20px;">

<button
type="submit"
name="login"
style="width:100%;padding:15px;font-size:18px;">
Login
</button>

</form>

</div>

</div>

<?php
include "includes/footer.php";
?>