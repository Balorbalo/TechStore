<?php
session_start();
include "includes/db.php";
include "includes/header.php";
?>

<div class="container">

<h2>Shopping Cart</h2>

<?php

$total = 0;

if(isset($_SESSION['cart']) && count($_SESSION['cart']) > 0){

foreach($_SESSION['cart'] as $id => $qty){

$sql = "SELECT * FROM products WHERE id=$id";
$result = mysqli_query($conn,$sql);
$product = mysqli_fetch_assoc($result);

$subtotal = $product['price'] * $qty;

$total += $subtotal;

?>

<div class="product">

<img src="images/<?php echo $product['image']; ?>" width="150">

<h3><?php echo $product['name']; ?></h3>

<p>Quantity: <?php echo $qty; ?></p>

<p>Price: KSh <?php echo number_format($product['price']); ?></p>

<p>Subtotal: KSh <?php echo number_format($subtotal); ?></p>

</div>

<?php
}
?>

<h2>Total: KSh <?php echo number_format($total); ?></h2>

<a href="checkout.php">
<button>Proceed to Checkout</button>
</a>

<?php

}else{

echo "<h3>Your cart is empty.</h3>";

}

?>

</div>

<?php
include "includes/footer.php";
?>