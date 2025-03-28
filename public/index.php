<?php session_start(); ?>
<?php include 'sidebar.php'; ?>
<div id="content">
<?php  
if (isset($_SESSION['Login'])) {
	$db = new mysqli('localhost', 'root', '', 'shop');

    // Check if the connection was successful
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }
	
	$sql = "SELECT * FROM accounts WHERE Login = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param('s', $_SESSION['Login']);
    
    // Execute the query
    $stmt->execute();
    $result = $stmt->get_result();

	if ($row = $result->fetch_assoc()) {
        // Display the welcome message with the user's full name
        if ($_SESSION['Role'] == 'admin') {
            echo '<p style="color: black; letter-spacing: .1em;">Welcome dear Admin, ' . $row['First_Name'] . ' ' . $row['Last_Name'] . '!</p>';
        } else {
            echo '<p style="color: black; letter-spacing: .1em;">Welcome dear ' . $row['First_Name'] . ' ' . $row['Last_Name'] . '!</p>';
        }
    }
	$stmt->close();
	$db->close();
}
?><br><br><br>
<form action="chat_message.php" method="post">
 <label style="color: black;
letter-spacing: .1em;">Message: <input class ="tb5" type="text" size="120" name="message" placeholder= "Your message..." required /></label>  	<input class="fb8" type="submit" name="add" value="Send" />
 </form>
 	<div id="getdata">
	<script src="ajax.js"></script>
	</div>
</div>
<?php include 'footer.php'; ?>