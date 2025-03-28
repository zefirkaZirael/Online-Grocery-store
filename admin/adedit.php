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
input[type=integer], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
input[type=date], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
input[type=text], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
input[type=number], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
box-sizing: border-box;}
input[type=submit] {
    width: 100%;
    background-color: #65c0bb;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #65c0bb;
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
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    if($_SESSION['Login']){ 
        echo $_SESSION["Login"];
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
<?php 
$mysqli = mysqli_connect("localhost","root","", "shop")or die(mysqli_error()); 
$UserID=$_GET['id']; 
$result=$mysqli->query("select * from products WHERE Product_ID='$UserID'"); 
IF (!$result){ 
echo "No Products found"; 
exit; 
} 
$row=mysqli_fetch_array($result); 
?> 
<html> 
<form method="post" action="adediting.php"> 
<input type="hidden" name="travel" value="<?=$row['Product_ID']?>" required> 
<br> 
Item: <input type="text" method="text" name="Item" value="<?=$row['Item']?>" required> 
<br> <br> 
In stock: <input type="integer" method="text" name="In_stock" value="<?=$row['In_stock']?>" required> 
<br> <br> 
 Price: <input type="integer" method="text" name="cost" value="<?=$row['Price']?>" required> 
<br> <br> 
<input type="submit" value="Edit"> </form><form method="post" action="addproduct.php"> <input type="submit" value="Back"> 
<br> <br> 
</form></div>
<?php include 'footer.php'; ?>