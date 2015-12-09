<?php
	session_start();
	 
	//$link = new mysqli("localhost","root","","quiz");
	$link = new mysqli("mysql.hostinger.es","u526113874_rb15","123456789","u526113874_quiz");
	
	if($link->connect_errno) {
			die( "Huts egin du konexioak MySQL-ra: (". 
			$link->connect_errno() . ") " . 
			$link->connect_error()	);
	}
	 $ip=$_SERVER['REMOTE_ADDR'];
	if(isset($_SESSION["session_username"])){
		header("Location: handlingQuizzes.php");
	}
	 
	if(isset($_POST["login"])){
	 
		if(!empty($_POST['emaila']) && !empty($_POST['password'])) {
			$user=$_POST['emaila'];
			$password=$_POST['password'];
			
			$erabiltzaileak =$link -> query("SELECT * FROM erabiltzaile WHERE email='".$user."'"/*AND pasahitza='".$password."'"*/);
			$now=date('Y-m-d');
			
                        if(!$link->query("insert into saiakera(ip,data) values('$ip','$now')"))
			       $link->error;
			$nireSaiakerak=$link->query("SELECT * FROM saiakera WHERE  data ='$now' and ip='$ip'");
			$saiakerak=mysqli_num_rows($nireSaiakerak);

			if($saiakerak<3){
				if($erabiltzaileak){
					while($row = mysqli_fetch_assoc($erabiltzaileak)){
						$user2=$row['email'];
						$pass2=$row['pasahitza'];
					}
				}
					if($user == $user2 && (hash_equals($pass2, crypt($password, $pass2))||$pass2=="web000")){
						$_SESSION['session_username']=$user;
						$_SESSION['nick']=$user;
						$_SESSION['asmatutakoak']=0;
						$_SESSION['okerrak']=0;
						$ordua= Date('Y-m-d H:i:s');
						$konexioa=$link-> query("SELECT emaila FROM konexioak WHERE emaila=$user");
						$konkop= mysqli_num_rows($konexioa);
						if($konkop==0){
							$sql= "INSERT INTO konexioak(emaila,ordua) values ('$user','$ordua')";
						}else{
							$sql="UPDATE konexioak SET ordua='$ordua' WHERE emaila='$user'";	
						}
			 
						if (!$link -> query($sql)){
							die("<p>An error happened: ".$link -> error()."</p>");
						}
						if($_SESSION['session_username']=='web000@ehu.es'){
							header("Location: reviewingQuizzes.php");
						}else{
							/* Redirect browser */
							header("Location: handlingQuizzes.php");
						}
					} else {
					$message = "Wrong email or password";
					
					}
			 
				} else {
					$message = "You tried 3 times, your ip has been banned until tomorrow.";
				}
		}
	}
	
function hash_equals($str1, $str2)
    {
        if(strlen($str1) != strlen($str2))
        {
            return false;
        }
        else
        {
            $res = $str1 ^ $str2;
            $ret = 0;
            for($i = strlen($res) - 1; $i >= 0; $i--)
            {
                $ret |= ord($res[$i]);
            }
            return !$ret;
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
		<p><a href ="pasahitzBerria.php">I can't remenber the password</a></p>
	</form>
	</center>
</body>
</html>		