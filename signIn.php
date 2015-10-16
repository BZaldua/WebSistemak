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
		//Egiteko
<<<<<<< HEAD
	$link =  new mysqli("localhost","root","","quiz");
	if($link->mysqli_connect_errno) 
	{
		die( "Huts egin du konexioak MySQL-ra: (". 
		 $link->connect_errno() . ") " . 
		 $link->connect_error()	);
=======
	$link = new mysqli_connect("localhost","root","","quiz");
	if()
>>>>>>> 549616c9388d21209a49c2b57fa86a01f7baeffb

	echo" <h4>Sign In</h4>
	<form id='LogIn' name='LogIn' method='post'>
		Mail *: <br> <input type ='email' name ='emaila' required><br><br>
		Password *:<br> <input type='password' name='password' required><br><br>
		<button	type='submit' value='submit'>Submit</button>
	</form>";		

<<<<<<< HEAD
	if($erabiltzaileak=$link->query("Select* from erabiltzaile where email=$_POST['email'] and pasahitza=$_POST['pasahitza']")){
		echo “Taularen sorrerak huts egin du: (" . 
		$link->errno . ") " . $link->error"; 
	}
	if(mysql_fetch_lengths($erabilzaileak)==1){
		echo"<a href=''>Quizzes<a/>"
		
	}else{
		echo"<p color='red'></p>";
	}
	
	
	
	
	
=======
>>>>>>> 549616c9388d21209a49c2b57fa86a01f7baeffb
echo"</body>
	</html>"
?>