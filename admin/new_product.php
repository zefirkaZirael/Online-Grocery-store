
<?php

$link = mysqli_connect("localhost", "root", "");

$Item = mysqli_real_escape_string($link, $_POST['Item']);
$In_stock = mysqli_real_escape_string($link, $_POST['In_stock']);
$cost = mysqli_real_escape_string($link, $_POST['cost']);
mysqli_connect("localhost", "root", "") or die (mysql_error ());

mysqli_select_db($link, "shop") or die(mysql_error());

    $sel = "SELECT * FROM products where Item='$Item'";
    $res = mysqli_query($link, $sel);
    $num = mysqli_num_rows($res);
    if($num==0)
    {
		$query = "INSERT INTO products (Item, In_stock, Price) VALUES ('".$Item."', '".$In_stock."', '".$cost."')";
		$result = mysqli_query ($link, $query );
		if ($result){ header('Location: addproduct.php');}
    }
    else
   {
	echo "<script>alert('This Product already exists!!!');</script>";
    }



?>
<?php include 'addproduct.php'; ?>