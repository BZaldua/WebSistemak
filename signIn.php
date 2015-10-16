<?php
echo "<!DOCTYPE html>
	<html>
		<head>
			<title>Sing In</title>
			<meta name='tipo_contenido' content='text/html;' http-equiv='content-type' charset='utf-8'>
			<link rel='stylesheet' type='text/css' href='stylesPWS/estiloa.css'/>
			<link rel='stylesheet' 
				type='text/css' 
				media='only screen and (max-width: 480px)'
				href='stylesPWS/smartphone.css' />
		</head>
		<body>";
		

	$link =  new mysqli("localhost","root","","quiz");
	if($link->connect_errno) 
	{
		die( "Huts egin du konexioak MySQL-ra: (". 
		 $link->connect_errno() . ") " . 
		 $link->connect_error()	);
	}
	echo" <h4>Sign In</h4>
	<form id='LogIn' name='LogIn' method='post' enctype='multipart/form-data'>
		Mail *: <br> <input type ='email' name ='emaila' required><br><br>
		Password *:<br> <input type='password' name='password' required><br><br>
		<button	type='submit' value='submit'>Submit</button>
	</form>";		

	
	$emaila=$_POST['emaila'];
	$pass=$_POST['password'];
	if(!$mysqli_result=mysqli_query($link,"select * from erabiltzaile where email='$emaila' and pasahitza='$pass'")){
		echo "Taularen sorrerak huts egin du: (' . 
		$link->errno . ') ' . $link->error"; 
	}
	if((mysqli_num_rows($mysqli_result))==1){
		echo"<a href='quiz.html'>Quizzes<a/>";
		
	}else{
		echo"<p style='color:#D80000'>Erabiltzailea edo pasahitza ez dira zuzenak</p>";
	}
	
	
	echo"</body>
	</html>";
?>