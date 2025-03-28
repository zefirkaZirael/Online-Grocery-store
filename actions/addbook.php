<?php
 
session_start();

$link = mysqli_connect('localhost', 'root', '', 'shop');
$Item=mysqli_real_escape_string($link, $_POST['Item']);
$Quantity=mysqli_real_escape_string($link,$_POST['Quantity']);
$Date=mysqli_real_escape_string($link, $_POST['date']);
$mysqli = new mysqli("localhost", "root", "", "shop");
$qq="INSERT INTO orders (User, Item_ID, Quantity, Date) VALUES ('".$_SESSION['Login']."','".$Item."','".$Quantity."','".$Date."')";
$result=$mysqli->query($qq);
mysqli_close($mysqli);
IF(!$result){
	echo "<script>alert('Data insert failed!!!');</script>";
	echo mysql_error();
	
} ELSE {

echo "<script>alert('Products succeffully ordered!!!');</script>";

	
}

?>

<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<title>Nazim Shop</title>
<link rel="stylesheet" href="css/registr.css">
<link rel="stylesheet" href="table.css">
<link rel="stylesheet" href="modal.css">
<link rel="stylesheet" href="animate.min.css">

<style>
#demotext {
    padding: 14px 16px;
font-size: 35px;
color: rgb(80, 80, 350);
text-shadow: rgb(150, 150, 150) 1px 1px 0px, rgb(156, 156, 156) 3px 3px 0px;
}
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr{background-color: #f2f2f2}

th {
    background-color: #65c0bb;
    color: white;

}
.still {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #65c0bb;
}

.still li {
    float: left;
}

.still li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

.still li a:hover:not(.active) {
    background-color: #111;
}
.active {
    background-color: #4CAF50;
}
</style>
</head>
<body background="" bgcolor="beige" >
<body>
<div id="menu">
<ul class="still">
  <li class="animated bounce"><a href="index.php"><img src="" width="50" height="50" align="Minibus"> </img></a></li>
<font size="4"> 
  <li class="animated zoomInUp"><div id="demotext">Nazim Shop</div></li>
  <li style="float:right"><?php 

    if($_SESSION['Login']){ 
        echo $_SESSION["Login"];
        echo '<a href="logout.php"><span>Logout</span></a></li>';
        }
    elseif(!$_SESSION['Login'])
	header ("Location: index.php");
        
    ?>
  </font>
</ul>
</div>
<?php include 'menu.php'; ?>
<?php include 'sidebar.php'; ?>
<div id="content">

<table>
<tr>
	<th>Order №</th>
	<th>Customer</th>
	<th>Product</th>
	<th>Quantity</th>
	<th>Date</th>	
		<th>Edit</th>	

	<th>Delete</th>
	</tr>
 <?php 

$sql = "SELECT * FROM accounts INNER JOIN orders ON accounts.Login=orders.User INNER JOIN products on products.Product_ID=orders.Item_ID WHERE Login="."'".$_SESSION['Login']."'";


$db = new mysqli('localhost', 'root', '', 'shop');

$res = $db->query($sql);

$data = array();

while($row = $res->fetch_assoc()){
	
	$data[] = $row;
	
}


foreach($data as $row){
	
	echo "<tr>";
	
	echo "<td>".$row['Order_ID']."</td>";
	echo "<td>".$row['Last_Name']."</td>";
	echo "<td>".$row['Item']."</td>";
	echo "<td>".$row['Quantity']."</td>";	
	echo "<td>".$row['Date']."</td>";
	echo "<td><a href='edit.php?id=$row[Order_ID]'>Edit</a></td>";
	echo "<td><a href='dell_data.php?id=$row[Order_ID]'>Delete</a></td></tr>";
	
}

?> 

</table>
<?php

$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "shop"; 
$connect = mysqli_connect($hostname, $username, $password, $databaseName);
$query = "SELECT * FROM `products`";
$result1 = mysqli_query($connect, $query);
?>
<ul class="still">
<li style="float: right;"><a href='#openModal'>Book</a></li>
<div id="openModal" class="modalDialog">
 <div>

        <a href="#close" title="Закрыть" class="close">X</a>

        <form action="addbook.php" method="post">
 <label>Product: <select name="Item">
 <?php while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[0];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
</select><br>
 <label>Quantity: <input type="number" name="Quantity" placeholder= "2" min="10" max="100" title="Number of products which going to order, no more than 100 " required /></label><br>
 <label>Date: <input type="date" name="date" title="Date of the trip" required /></label>
 <br><input type="submit" name="add" value="Add" />
</form>

    </div>
</div>

</div>
<?php include 'footer.php'; ?>