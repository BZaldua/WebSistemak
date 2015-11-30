<?php
//$link = new mysqli("localhost","root","","quiz");
$link = new mysqli("mysql.hostinger.es","u526113874_rb15","123456789","u526113874_quiz");	

$esp = $_POST['espezialitatea'];
if ($esp == 'other'){
	$esp = $_POST['besteaTextua'];
	if ($esp == ''){
		$esp = "N/A";
	}
}


if($_FILES['image']['error']==0){
	$file= $_FILES['image']['tmp_name'];
	$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
		$image_name= addslashes($_FILES['image']['name']);
}else{
	$image=null;
	$image_name="";
}
	
$korreoa = $_POST['emaila'];
$izena = $_POST['izena'];
$abizena = $_POST['abizena'];
$pasahitza= $_POST['pasahitza'];

$telefonoa= $_POST['telefonoa'];
if (filter_var($korreoa, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/[a-z]+[0-9]{3}@ikasle.ehu.e(us|s)/"))) === false) {
		echo("Emaila ez da zuzena");
	}else if (filter_var($izena, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/[a-z,A-Z,Ñ,ñ]+/"))) === false){
		echo("Izena ez da zuzena");
	}else if (filter_var($abizena, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/[a-z,A-Z,Ñ,ñ]+/"))) === false){
		echo("Abizena ez da zuzena");
	}else if (filter_var($pasahitza, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^.{6,}/"))) === false){
				echo("Pasahitza ez da zuzena");	
	}else if (filter_var($telefonoa, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/(6|9)[0-9]{8}/"))) === false){

	} else {

		$pasahitza= crypt($pasahitza,'st');
		
	$sql = "INSERT INTO erabiltzaile (izena, abizena, pasahitza, email, telefonoa, espezialitatea, interesa,argazkia,argazkiMota,galderaPasahitza,erantzunaPasahitza) VALUES ('$_POST[izena]','$_POST[abizena]','$pasahitza','$korreoa','$_POST[telefonoa]','$esp','$_POST[interesa]','$image','$image_name','$_POST[question]','$_POST[answer]')";
echo " <html>
	<head>
		<meta name='tipo_contenido' content='text/html;' http-equiv='content-type' charset='utf-8'>
		<title>Sign Up</title>
		<link rel='stylesheet' type='text/css' href='stylesPWS/estiloa.css'/>
		<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (max-width: 480px)'
		   href='stylesPWS/smartphone.css' />
	</head>
	<body>
		<div class ='nav' id='nav'>
			<ul>
				<li class ='ezkerra'><a href ='layout.html'>Home</a></li>
				<li class ='ezkerra'><a href ='credits.html'>Credits</a></li>
			</ul>
			<ul>
				<li class ='eskuina'><a href ='login.php'>Log In</a></li>
			</ul>
		</div>
		<hr>
		<div class ='aim' id ='head'>";
if (!$link -> query($sql))
{
	die("<p>An error happened: ".$link -> error."</p>");
}
//html estiloa jarri:

	echo "
			<p>You have been successfully registered. </p>
			<p><a href = 'IkusiErabiltzaileakArgazkiarekin.php'>Erabiltzaileak ikusi</p>
		</div>
		</body></html>";
	}
?>