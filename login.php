<!DOCTYPE html>
<html>
<head>
		<meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
		<title>Sign Up</title>
		<link rel="stylesheet" type="text/css" href="stylesPWS/estiloa.css"/>
		<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (max-width: 480px)'
		   href='stylesPWS/smartphone.css' />
		<script src="funtzioak.js"></script>
</head>
<body>
		<div class ="nav" id="nav">
			<ul>
				<li class ="ezkerra"><a href ="layout.html">Home</a></li>
				<li class ="ezkerra"><a href ="credits.html">Credits</a></li>
				<li class ="ezkerra"><a href ="signUp.html">Sign Up </a></li>
			</ul>
		</div>
		<br>
		<hr>
		<?php 
			$link =  new mysqli("localhost","root","","quiz"); //Konexioa egin
	
			if($link->connect_errno) 
			{
				die( "Huts egin du konexioak MySQL-ra: (". 
				$link->connect_errno() . ") " . 
				$link->connect_error()	);
			}
			
			$korreoa = $pasahitza = $sahiakerak = '';
	
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				$korreoa = $_POST["emaila"];
				$pasahitza = $_POST["password"];
				$sahiakerak = $_POST["sahiakerak"];
			}
		?>
		
	<center><h1>Log In </h1></center>
	<center>
		<form id='LogIn' name='LogIn' method='post' onClick="gehitu()">
		Mail *: <br> <input type ='email' name ='emaila' required><br><br>
		Password *:<br> <input type='password' name='password' required><br><br>
		<input type="hidden" id="sahiakerak" name ="sahiakerak"value="0">
		<button	type='submit' value='submit'>Submit</button>
	</form>
	<?php
			$erabiltzaileak = $link->query("select * from erabiltzaile where email=('$korreoa') and pasahitza=('$pasahitza')");
			$num_rows = mysqli_num_rows($erabiltzaileak);
			if ($num_rows == 1){
				mysqli_close($link);
				header ("Location:quiz.html");
			}else{
				if($sahiakerak > 0){
					echo "<p style='color:red'>Wrong email or password</p>";
				}
			}
	?>
	</center>
	
	<div class="footer2">
				<p><a href="http://en.wikipedia.org/wiki/Quiz" target="_blank">What is a Quiz?</a></p>
				<a href='https://github.com'>Link GITHUB</a>
				<br>
			</div>
</body>
</html>