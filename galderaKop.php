<?php 
session_start();
	$link = new mysqli("localhost","root","","quiz");
	//$link = new mysqli("mysql.hostinger.es","u526113874_rb15","123456789","u526113874_quiz");
if($link->connect_errno) {
die( "Huts egin du konexioak MySQL-ra: (". 
$link->connect_errno() . ") " . 
$link->connect_error()	);
	}
	$emaila= $_SESSION["session_username"];
	$galderak = $link -> query ("Select Id from galdera where emaila='$emaila'");
	$row1 = mysqli_num_rows($galderak);	
	$erantzunak = $link ->query("Select Id from galdera");
	$row= mysqli_num_rows($erantzunak);
			echo"<p style='background-color:#00ff00'> Nire galderak/Galderak guztira DB :" .$row1."/".$row."<p>";
		
		
	
	
?>