<?php
session_start();

// Database connection
$db = new mysqli('localhost', 'root', '', 'shop');

// Check if the user is logged in
if (!isset($_SESSION['Login'])) {
    header("Location: login.php"); // Redirect to login if not logged in
    exit();
}

// Check if the user is an admin
$isAdmin = ($_SESSION['Role'] == 'admin'); // Assuming you store the role as 'admin' for admins
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

tr {background-color: #f2f2f2}

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
  <li style="float:right"><?php echo $_SESSION["Login"]; ?>
        <a href="logout.php"><span>Logout</span></a></li>
  </font>
</ul>
</div>
<?php include 'menu.php'; ?>
<?php include 'sidebar.php'; ?>
<div id="content">

<?php if ($isAdmin): ?>
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

    $res = $db->query($sql);

    while($row = $res->fetch_assoc()){
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
<?php else: ?>  <ul class="still">
        <li style="float: right;"><a href='#openModal'>Book</a></li>
    </ul>

    <div id="openModal" class="modalDialog">
        <div>
            <a href="#close" title="Close" class="close">X</a>
            <form action="addbook.php" method="post">
                <label>Order: <select name="Item">
                    <?php
                    $query = "SELECT * FROM `products`";
                    $result1 = mysqli_query($db, $query);
                    while($row1 = mysqli_fetch_array($result1)):
                    ?>
                        <option value="<?php echo $row1[0];?>"><?php echo $row1[1];?></option>
                    <?php endwhile; ?>
                </select></label><br>
                <label>Quantity: <input type="number" name="Quantity" placeholder="2" min="1" max="100" title="Number of products you want to order, no more than 100" required /></label><br>
                <label>Date: <input type="date" name="date" title="Date of the order" required /></label><br>
                <input type="submit" name="add" value="Add" />
            </form>
        </div>
    </div>
<?php endif; ?>

</div>
<?php include 'footer.php'; ?>
</body>
</html>
