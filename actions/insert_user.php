<?php

$link = mysqli_connect("localhost", "root", "");
//connection with database

$fname = mysqli_real_escape_string($link, $_POST['fname']);
$sname = mysqli_real_escape_string($link, $_POST['sname']);
$login = mysqli_real_escape_string($link, $_POST['login']);
$password = mysqli_real_escape_string($link, $_POST['password']);
$number = mysqli_real_escape_string($link, $_POST['number']);
//Variables list that connected with fields in table in datbase

mysqli_connect("localhost", "root", "") or die (mysqli_error ()); 

mysqli_select_db($link, "shop") or die (mysqli_error ($link));

    $sel = "SELECT * FROM accounts WHERE login = '$login'";
//selecting all fields and all data from table
    $res = mysqli_query($link, $sel); 
    $num = mysqli_num_rows($res);
//checking data of the table
    if($num==0)   
    {
	$query = "INSERT INTO accounts (Last_Name, First_Name, login, password, Telephone_number) VALUES ('".$sname."', '".$fname."', '".$login."', '".$password."', '".$number."')";
		$result = mysqli_query ( $link, $query );
        //adding new data into table by showing position of each variable in table
		if ($result) {
			Header ("Location: registered.php");
		}

    }
    else
   {
echo  "<script>alert('User with the same login already exists!!!');</script>";
//if there are already exist the same data in Login field this nitification will be showed
    } ?>
<?php include 'register.php'; ?>

