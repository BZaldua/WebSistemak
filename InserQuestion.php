<?php 
session_start();

	$link = new mysqli("localhost","root","","quiz");	
	//$link = new mysqli("mysql.hostinger.es","u526113874_rb15","123456789","u526113874_quiz");
	if($link->connect_errno) {
		die( "Huts egin du konexioak MySQL-ra: (". 
		$link->connect_errno() . ") " . 
		$link->connect_error()	);
	}
 
 if(isset($_POST['login'])){
	$galdera=$_POST['galdera'];
	$erantzuna=$_POST['erantzuna'];
	$zailtasuna=$_POST['zailtasuna'];
	$id= $link -> query('select count(id) from galdera group by id');
	$id= $id+1;
	$insert= 'insert into galdera(id, galdera, erantzuna, zailtasuna) values ('$id','$galdera', '$erantzuna','$zailtasuna')';
	if(!$link ->query($insert)){
		die('Errorea:' . $link-> error);
	}
	}
?>



<!DOCTYPE html>
<html>
<head>
	<meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	<title>Insert Question</title>
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
			</ul>
	</div>
	<br><hr>
	<center>
	<h1> Insert Question </h1>
	
	<form method = 'post' name ="addQuestion" id="addQuestion">
		<label>Question</label></br>
		<textarea id ="galdera" name="galdera" rows="4" cols="50" required></textarea></br></br>
		<label>Answer</label></br>
		<input type ="text" name="erantzuna" id="erantzuna" required> </br></br>
		<label>Difficulty </label>
		<select name='zailtasuna' id='zailtasuna'>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
		</select></br></br>
		<button type='submit' name='bidali'>Submit</button>
	</form>
	</center>
</body>

</html>