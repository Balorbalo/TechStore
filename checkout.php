<?php
session_start();
include "includes/db.php";
include "includes/header.php";

$total = 0;

if(isset($_SESSION['cart'])){

foreach($_SESSION['cart'] as $id => $qty){

$sql = "SELECT * FROM products WHERE id=$id";
$result = mysqli_query($conn,$sql);
$product = mysqli_fetch_assoc($result);

$total += $product['price'] * $qty;

}

}

if(isset($_POST['place_order'])){

$name = $_POST['name'];
$phone = $_POST['phone'];
$address = $_POST['address'];

$user_id = 1;

mysqli_query($conn,"INSERT INTO orders(user_id,total,status)
VALUES('$user_id','$total','Pending')");

$order_id = mysqli_insert_id($conn);

foreach($_SESSION['cart'] as $id => $qty){

$product = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM products WHERE id=$id"));

$price = $product['price'];

mysqli_query($conn,"INSERT INTO order_items(order_id,product_id,quantity,price)
VALUES('$order_id','$id','$qty','$price')");

mysqli_query($conn,"UPDATE products
SET stock = stock - $qty
WHERE id=$id");

}

unset($_SESSION['cart']);

echo "<script>
alert('Order Placed Successfully!');
window.location='index.php';
</script>";

}
?>

<div class="container">

<h2>Checkout</h2>

<form method="POST">

<label>Full Name</label><br>
<input type="text" name="name" required><br><br>

<label>Phone Number</label><br>
<input type="text" name="phone" required><br><br>

<label>Delivery Address</label><br>
<textarea name="address" required></textarea><br><br>

<h3>Total: KSh <?php echo number_format($total); ?></h3>

<button type="submit" name="place_order">
Place Order
</button>

</form>

</div>

<?php
include "includes/footer.php";
?>