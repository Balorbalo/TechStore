<?php
include "includes/db.php";
include "includes/header.php";

if(isset($_GET['search']) && $_GET['search'] != ""){

    $search = mysqli_real_escape_string($conn,$_GET['search']);

    $sql = "SELECT * FROM products
            WHERE name LIKE '%$search%'
            OR description LIKE '%$search%'";

}else{

    $sql = "SELECT * FROM products";

}

$result = mysqli_query($conn,$sql);
?>

<div class="container">

<h2>Our Products</h2>

<form method="GET" class="search-box">
    <input type="text" name="search" placeholder="Search products...">
    <button type="submit">Search</button>
</form>

<div class="products">

<?php
while($row=mysqli_fetch_assoc($result)){
?>

<div class="product">

<img src="images/<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>">

<h3><?php echo $row['name']; ?></h3>

<p><?php echo $row['description']; ?></p>

<h4>KSh <?php echo number_format($row['price']); ?></h4>

<p>Stock: <?php echo $row['stock']; ?></p>

<a href="add_to_cart.php?id=<?php echo $row['id']; ?>">
<button>Add to Cart</button>
</a>

</div>

<?php
}
?>

</div>

</div>

<?php
include "includes/footer.php";
?>