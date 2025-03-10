<?php
// Connecting to the Database
$servername = "localhost";
$username = "root";
$password = "";
$database = "liberary_management";

// Create a connection
$connection = mysqli_connect($servername, $username, $password, $database);
	//$db = mysqli_select_db($connection,"lms");
	$query = "insert into users values('','$_POST[name]','$_POST[email]','$_POST[password]',$_POST[mobile],'$_POST[address]')";
	$query_run = mysqli_query($connection,$query);
?>
<script type="text/javascript">
	alert("Registration successfull...You may Login now !!");
	window.location.href = "index.php";
</script>

