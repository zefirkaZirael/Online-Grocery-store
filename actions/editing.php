<?php 
$mysqli = mysqli_connect("localhost","root","", "shop")or die(mysqli_error());
If(isset($_POST['Quantity'])){

$Order=$_POST['order']; 
$Item=$_POST['Item']; 
$Quantity=$_POST['Quantity']; 
$Date=$_POST['date']; 
}
$result=$mysqli->query("update orders set Item_ID='$Item', Quantity='$Quantity', 
Date='$Date' where Order_ID='$Order'"); 
IF(!$result){ 
echo "<script>alert('Something has gone wrong!!!');</script>";
include 'edit.php';
} ELSE { 
echo "<script>alert('The data of order has been updated!!!');</script>"; 
} 
?>
<?php include 'booking.php' ?>