<?php 
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
$link = mysqli_connect('localhost', 'root', '', 'shop');
// connection with database
$mysqli = new mysqli("localhost", "root", "", "shop");
$qq="truncate chat";
$result=$mysqli->query($qq);
mysqli_close($mysqli);
IF(!$result){
	echo "<script>alert('Data insert failed!!!');</script>";
	echo mysql_error();
	
} 
?>
<?php include 'index.php'?>