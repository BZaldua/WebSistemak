<?php 
	session_start();

	$link = new mysqli("localhost","root","","quiz");	
	//$link = new mysqli("mysql.hostinger.es","u526113874_rb15","123456789","u526113874_quiz");
	if($link->connect_errno) {
		die( "Huts egin du konexioak MySQL-ra: (". 
		$link->connect_errno() . ") " . 
		$link->connect_error()	);
	}
	
	$galderaPosiblea = $_GET['gald'];
	
	$sql = "Select erantzuna from galdera where galdera = '".$galderaPosiblea."'";
	$erantzunakDB = $link -> query($sql);
	$erantzunOna = mysqli_fetch_assoc($erantzunakDB);
	$erantzunOna = strtoupper($erantzunOna['erantzuna']);
	$galderaPosiblea = strtoupper($_GET['eran']);
	if($erantzunOna == $galderaPosiblea){
		echo "<img src = 'http://goo.gl/uGZrcv' height = '20' width = '20'/>";
	}else{
		echo "<img src = 'http://goo.gl/tYmruA' height = '20' width = '20' />";
	}
?>