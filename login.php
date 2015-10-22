<?php
session_start();
 
//$link = new mysqli("localhost","root","","quiz");
$link = new mysqli("mysql.hostinger.es","u526113874_rb15","123456789","u526113874_quiz");
if($link->connect_errno) {
		die( "Huts egin du konexioak MySQL-ra: (". 
		$link->connect_errno() . ") " . 
		$link->connect_error()	);
}
 
if(isset($_SESSION["session_username"])){
header("Location: InsertQuestion.php");
}
 
if(isset($_POST["login"])){
 
if(!empty($_POST['emaila']) && !empty($_POST['password'])) {
 $user=$_POST['emaila'];
 $password=$_POST['password'];
 
$erabiltzaileak =$link -> query("SELECT * FROM erabiltzaile WHERE email='".$user."' AND pasahitza='".$password."'");
 
$numrows = mysqli_num_rows($erabiltzaileak);
 if($numrows!=0)
 
{
 while($row = mysqli_fetch_assoc($erabiltzaileak))
 {
 $user2=$row['email'];
 $pass2=$row['pasahitza'];
 }
 
 
if($user == $user2 && $password == $pass2)
 
{
 
 $_SESSION['session_username']=$user;
 
/* Redirect browser */
 header("Location: InserQuestion.php");
 }
 } else {
 
$message = "Wrong email or password";
 }
 
} else {
 $message = "Something went wrong";
}
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
	<h1>Log In</h1>
	<form name="loginform" id="loginform" action="" method="POST">
		Email: <br>
		<input type="text" name="emaila" id="emaila"/><br>
		Password: <br>
		<input type="password" name="password" id="password"/><br>
		<?php if (!empty($message)) {echo "<p style ='color:red'>". $message . "</p><br>";} ?>
		<input type="submit" name="login" class="button" value="Login" />
		<p>You don't have an account yet?  <a href="signUp.html" >Sign Up in here!</a></p>
	</form>
	</center>
</body>
</html>