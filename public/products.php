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
        echo $_SESSION["Login"];
        echo '<a href="logout.php"><span>Logout</span></a></li>';
        }
    elseif(!$_SESSION['Login'])
	header ("Location: destinations2.php");
        
    ?>
  </font>
</ul>
</div>
<?php include 'menu.php'; ?>
<?php include 'sidebar.php'; ?>

<?php

$mysqli = new mysqli("localhost", "root", "", "shop");



$result=$mysqli->query("select * from products");

?>


<div id="content">







<table border="1">
<tr>
<td><b>№</b></td>
<td><b>Products</b></td>
<td><b>In stock</b></td>
<td><b>Price</b></td>

</tr>

<?php
// begin while loop - everything below until the closing } will be repeated for each record that the SQL query returns
while ($row=mysqli_fetch_array($result)){ 
echo "<tr><td>$row[Product_ID]</td>";
echo "<td>$row[Item]</td>";
echo "<td>$row[In_stock]</td>";
echo "<td>$row[Price]</td>";

} // While loop ends here
?>



</div>
