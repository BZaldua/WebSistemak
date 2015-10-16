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
	$link = new mysqli_connect("localhost","root","","quiz");
	if()

	echo" <h4>Sign In</h4>
	<form id='LogIn' name='LogIn' method='post'>
		Mail *: <br> <input type ='email' name ='emaila' required><br><br>
		Password *:<br> <input type='password' name='password' required><br><br>
		<button	type='submit' value='submit'>Submit</button>
	</form>";		

echo"</body>
	</html>"
?>