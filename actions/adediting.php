<?php 
$mysqli = mysqli_connect("localhost","root","", "shop")or die(mysqli_error());
$Id=$_POST['travel']; 
$Item=$_POST['Item']; 
$In_stock=$_POST['In_stock']; 
$Quantity=$_POST['cost']; 
//variables above and their future new values will be written
$result=$mysqli->query("update products set Item='$Item', In_stock='$In_stock', 
Price='$Quantity' where Product_ID='$Id'"); 
IF(!$result){ 
echo "<script>alert('This product already exists!!!');</script>"; 
} ELSE { 
echo "<script>alert('The data of product has been updated!!!');</script>"; 
} 
?>
<?php include 'addproduct.php' ?>