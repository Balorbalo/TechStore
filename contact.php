<?php
include "includes/header.php";
?>

<div class="container">

<h2>Contact Us</h2>

<div style="max-width:900px;margin:auto;display:flex;gap:50px;flex-wrap:wrap;">

<div style="flex:1;min-width:280px;">

<h3>TechStore</h3>

<p><strong>Email:</strong> info@techstore.com</p>

<p><strong>Phone:</strong> +254 712 345 678</p>

<p><strong>Location:</strong> Nairobi, Kenya</p>

</div>

<div style="flex:2;min-width:350px;">

<form action="" method="POST">

<input
type="text"
name="name"
placeholder="Enter Your Full Name"
style="width:100%;padding:15px;font-size:18px;margin-bottom:20px;">

<input
type="email"
name="email"
placeholder="Enter Your Email Address"
style="width:100%;padding:15px;font-size:18px;margin-bottom:20px;">

<textarea
name="message"
placeholder="Write Your Message Here..."
style="width:100%;height:180px;padding:15px;font-size:18px;margin-bottom:20px;"></textarea>

<button
type="submit"
style="padding:15px 35px;font-size:18px;">
Send Message
</button>

</form>

</div>

</div>

</div>

<?php
include "includes/footer.php";
?>