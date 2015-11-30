<?php 
	session_start();

	//$link = new mysqli("localhost","root","","quiz");	
	$link = new mysqli("mysql.hostinger.es","u526113874_rb15","123456789","u526113874_quiz");
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
	$zenb = $_GET['zenb'];
	
	if($erantzunOna == $galderaPosiblea){		
		echo "<img src = 'http://goo.gl/uGZrcv' height = '20' width = '20' onload = 'blokeatuInputa($zenb)'/>";
		if(isset($_SESSION['nick'])){
			$_SESSION['asmatutakoak']++;
			echo"@@";
			echo$_SESSION['nick']."<h2 style='color:green'>Asmatutako galderak: ".$_SESSION['asmatutakoak']."</h2> 
					<h2 style='color:red'>Oker erantzundakoak: ".$_SESSION['okerrak']."</h2>";
		}
	}else{
		echo "<img src = 'http://goo.gl/tYmruA' height = '20' width = '20' />";
		if(isset($_SESSION['nick'])){
			$_SESSION['okerrak']++;
			echo"@@";
			echo$_SESSION['nick']."<h2 style='color:green'>Asmatutako galderak: ".$_SESSION['asmatutakoak']."</h2> 
					<h2 style='color:red'>Oker erantzundakoak: ".$_SESSION['okerrak']."</h2>";
		}
	}
?>