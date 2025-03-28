
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<title>Nazim Shop</title>
<link rel="stylesheet" href="css/registr.css">
<link rel="stylesheet" href="table.css">
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
  session_start();
    if($_SESSION['Login']){ 
		echo '<h style="margin-left:15px;">';
        echo $_SESSION["Login"];
			echo '</h>';
        echo '<a href="logout.php"><span>Logout</span></a></li>';
        }
    elseif(!$_SESSION['Login']){
	header ("Location: index.php");}
        
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
	<th>Costomer</th>
	<th>Products</th>
	<th>Quantity</th>
	<th>Date</th>
    <th>Delete</th>	
</tr>
 <?php 
$mysqli = new mysqli("localhost", "root", "", "shop");
$res=$mysqli->query("select * from orders INNER JOIN accounts ON accounts.Login=orders.User INNER JOIN products on products.Product_ID=orders.Item_ID") ;
$data = array();

while($row = $res->fetch_assoc()){
	
	$data[] = $row;
	
}
foreach($data as $row){
echo "<tr><td>$row[Order_ID]</td>";
echo "<td>$row[Login]</td>";
echo "<td>$row[Item]</td>";
echo "<td>$row[Quantity]</td>";
echo "<td>$row[Date]</td>";
echo "<td><a href='addel_data.php?id=$row[Order_ID]'>Delete</a></td></tr>";
} 


?> 
</table>
</div>
<?php include 'footer.php'; ?>