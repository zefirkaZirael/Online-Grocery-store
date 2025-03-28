<?php if ($_SESSION['role'] == 'admin') { ?>
    <!-- Show Admin Menu -->
    <ul class="nav">
        <li><a href="index.php">Home</a></li>
        <li><a href="accounts.php">Accounts</a></li>
        <li><a href="addproduct.php">Products</a></li>
        <li><a href="adbooking.php">Orders</a></li>
        <li><a href="adprice.php">Prices</a></li>
    </ul>
<?php } else { ?>
    <!-- Show User Menu -->
    <ul class="nav">
        <li><a href="index.php">Home</a></li>
        <li><a href="products.php">Products</a></li>
        <li><a href="booking.php">Booking</a></li>
        <li><a href="price.php">Prices</a></li>
    </ul>
<?php } ?>
