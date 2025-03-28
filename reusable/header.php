<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">

<title>Nazim Shop</title>
<link rel="stylesheet" href="css/registr.css">
 <link rel="stylesheet" href="animate.min.css">

<style>
.fb8 {
	border: 2px solid #777;
	border-radius: 10px;
	outline: none;
}
.tb5 {
	border:2px solid #456879;
	border-radius:10px;
	height: 22px;
	width: 430px;
}
.enlarge:hover {
	transform:scale(2,2);
	transform-origin:0 0;
}
#demotext {
    padding: 14px 16px;
font-size: 35px;
color: rgb(80, 80, 350);
text-shadow: rgb(150, 150, 150) 1px 1px 0px, rgb(156, 156, 156) 3px 3px 0px;
}
.still {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #7CFC00;
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
<body background="https://i4.imaiges.com/wallpaper/893/599/785/texture-boards-wood-background-1920x1080.jpg" bgcolor="beige" >
<body>
<div id="menu">
<ul class="still">
  <li class="animated bounce"><a href="index.php"><img src="" width="50" height="50" align="Minibus"> </img></a></li>
<font size="4"> 
  <li class="animated zoomInUp"><div id="demotext">Nazim Shop</div></li>
  <li style="float:right">
    <?php 
    session_start(); 
    if (isset($_SESSION['Login'])) {
        if ($_SESSION['role'] == 'admin') {
            // Admin menu            echo '<h style="color:#333; text-shadow: 2px 2px 0px #fff, 5px 4px 0px rgba(0,0,0,0.15);">' . $_SESSION["Login"] . '</h>';
            echo '<a href="logout.php"><span>Logout</span></a>';
        } else {
            // User menu
            echo $_SESSION["Login"] . ' <a href="logout.php">Logout</a>';
        }
    }  else {
        // User is not logged in
        echo '<a href="login.php">Login</a> <a href="register.php">Registration</a>';
    }
    ?>
  </font>
</ul>
</div>