<?php
$mysqli = new mysqli("localhost", "root", "", "shop");

$id=$_GET['id'];
$strSQL ="delete from products WHERE Product_ID = '$id'";
$result=$mysqli->query($strSQL);


IF($result){
	echo "<script>alert('Data succesfully deleted!!!');</script>";


} ELSE {

	echo "<script>alert('Product cannot be deleted until there are order with this product!!!');</script>"; 
	
}

?>

<?php include 'addproduct.php'; ?>
