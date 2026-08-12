<?php
include "includes/db.php";
include "includes/header.php";

$products = mysqli_query($conn,"SELECT COUNT(*) AS total FROM products");
$product = mysqli_fetch_assoc($products);

$orders = mysqli_query($conn,"SELECT COUNT(*) AS total FROM orders");
$order = mysqli_fetch_assoc($orders);

$users = mysqli_query($conn,"SELECT COUNT(*) AS total FROM users");
$user = mysqli_fetch_assoc($users);
?>

<div class="container">

<h2>Admin Dashboard</h2>

<div class="products">

<div class="product">
<h3>Total Products</h3>
<h1><?php echo $product['total']; ?></h1>
</div>

<div class="product">
<h3>Total Orders</h3>
<h1><?php echo $order['total']; ?></h1>
</div>

<div class="product">
<h3>Total Users</h3>
<h1><?php echo $user['total']; ?></h1>
</div>

</div>

<br><br>

<h2>Recent Orders</h2>

<table border="1" cellpadding="10" cellspacing="0" width="100%">

<tr>
<th>Order ID</th>
<th>User ID</th>
<th>Order Date</th>
<th>Total</th>
<th>Status</th>
</tr>

<?php

$result = mysqli_query($conn,"SELECT * FROM orders ORDER BY id DESC");

while($row=mysqli_fetch_assoc($result)){

?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['user_id']; ?></td>

<td><?php echo $row['order_date']; ?></td>

<td>KSh <?php echo number_format($row['total']); ?></td>

<td><?php echo $row['status']; ?></td>

</tr>

<?php } ?>

</table>

</div>

<?php
include "includes/footer.php";
?>