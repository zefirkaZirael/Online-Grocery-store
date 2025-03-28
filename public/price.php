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
    background-color: blue;
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
    background-color: red;
}
.active {
    background-color: blue;
}
</style>
</head>
<body background="" bgcolor="beige" >
<body>
<div id="menu" >
<ul class="still" bgcolor="beige">
  <li class="animated bounce"><a href="index.php"><img src="" width="50" height="50" align="Minibus"> </img></a></li>
<font size="4"> 
  <li class="animated zoomInUp"><div id="demotext">Nazim Shop</div></li>
  <li style="float:right" bgcolor="beige"><?php 
  session_start();
    if($_SESSION['Login']){ 
        echo $_SESSION["Login"];
        echo '<a href="logout.php"><span>Logout</span></a></li>';
        }
    elseif(!$_SESSION['Login'])
	Header ("Location: booking.php");
        
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
	<th>product</th>
	<th>Price (KZT)</th>
	</tr>
 <?php 

$sql = "SELECT orders.Order_ID, products.Item, orders.Quantity*products.Price from orders, products where orders.User="."'".$_SESSION['Login']."' and (orders.Item_ID)=products.Product_ID";
$db = new mysqli('localhost', 'root', '', 'shop');

$res = $db->query($sql);

$data = array();

while($row = $res->fetch_assoc()){
	
	$data[] = $row;
	
}


foreach($data as $row){
	
	echo "<tr>";
	
	echo "<td>".$row['Order_ID']."</td>";
	echo "<td>".$row['Item']."</td>";
	echo "<td>".$row["orders.Quantity*products.Price"]."</td>";	
	
}

?> 

</table>
<?php   
$query="select sum(Quantity*Price) as Total from orders, products where  orders.User="."'".$_SESSION['Login']."'  and (orders.Item_ID)=products.Product_ID";;
$dt = new mysqli('localhost', 'root', '', 'shop');

$rel = $dt->query($query);
$dats = array();

while($rol = $rel->fetch_assoc()){
	
	$dats[] = $rol;
	
}
foreach($dats as $rol){
echo "<p align='right'><b> Total cost of all products: ";
echo $rol['Total'];
echo " KZT</b></p>";
}
?>
</div>
<?php include 'footer.php'; ?>