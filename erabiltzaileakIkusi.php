<?php 
	session_start();
	
	if($_SESSION['session_username'] != "web000@ehu.es"){
		header("Location:layout.html");
	}else{
		//$link = new mysqli("localhost","root","","quiz");	
		$link = new mysqli("mysql.hostinger.es","u526113874_rb15","123456789","u526113874_quiz");
		
		if($link->connect_errno) {
			die( "Huts egin du konexioak MySQL-ra: (". 
			$link->connect_errno() . ") " . 
			$link->connect_error()	);
		}
		
		$sql = "Select * from erabiltzaile";
		$balioak = $link -> query ($sql);
		
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	<title>Log In</title>
	<link rel="stylesheet" type="text/css" href="stylesPWS/estiloa.css">
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (max-width: 480px)'
		   href='stylesPWS/smartphone.css' />
</head>
<body>
	<div class ="nav" id="nav">
			<ul>
				<li class ="ezkerra"><a href ="layout.html">Home</a></li>
				<li class ="ezkerra"><a href ="credits.html">Credits</a></li>
				<li class ="ezkerra"><a href ="signUp.html">Sign Up </a></li>
				<li class ="ezkerra"><a href ="quiz.php">Quizzes</a></li>
			</ul>
	</div>
	<br><hr>
	<center>
	<h1>Usuarios Registrados</h1>
	<?php
		while($row = mysqli_fetch_assoc($balioak)){
			if($row['email'] != "web000@ehu.es"){
				echo "<b>".$row['email']."</b><br>";
			}
		}
	?>
	</center>
</body>
</html>

