<?php
session_start();
	if(!isset($_SESSION['session_username'])){
		echo "<a href='login.php'>Log In</a>";
	}else{
		echo "<a href='logout.php'>Log Out</a>";
	}
?>