<?php 
	session_start();

	$link = new mysqli("localhost","root","","quiz");	
	//$link = new mysqli("mysql.hostinger.es","u526113874_rb15","123456789","u526113874_quiz");
	if($link->connect_errno) {
		die( "Huts egin du konexioak MySQL-ra: (". 
		$link->connect_errno() . ") " . 
		$link->connect_error()	);
	}
	
	
		$mota="Galderak ikusi";
		$ordua= Date('H:i:s');
		$ip = $_SERVER['REMOTE_ADDR'];
		if(isset($_SESSION["session_username"])){
			$emaila=$_SESSION["session_username"];
			if(!$idKonexioa= $link-> query("SELECT id FROM konexioak WHERE emaila='$emaila'")){
						die("<p>An error happened: ".$link -> error."</p>");

				}
		$row = mysqli_fetch_array($idKonexioa);
		$konexID=intval($row['id']);
			$sql1= "INSERT INTO ekintzak (konexID, emaila, mota, time, ip) values ('$konexID', '$emaila', '$mota','$ordua','$ip')";
		}else{
			$sql1=  "INSERT INTO ekintzak (mota, time, ip) values ('$mota','$ordua','$ip')";
		}
		if (!$link -> query($sql1)){
			die("<p>An error happened: ".$link -> error."</p>");
		}
	
	
?>

<!DOCTYPE html>
<html>
	<head>
		<meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
		<title>Quizzes</title>
		<link rel="stylesheet" type="text/css" href="stylesPWS/estiloa.css"/>
		<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (max-width: 480px)'
		   href='stylesPWS/smartphone.css' />
		   <script src = 'funtzioak.js'></script>
	</head>
	<body>
	<div class ="nav" id="nav">
			<ul>
				<li class ="ezkerra"><a href ="layout.html">Home</a></li>
				<li class ="ezkerra"><a href ="credits.html">Credits</a></li>
				<li class ="ezkerra"><a href ="signUp.html">Sign Up</a></li>
			</ul>
			<ul>
			<?php
				if(!isset($_SESSION['session_username'])){
					echo "<li class ='eskuina'><a href ='login.php'>Log In</a></li>";
				}else{
					echo "<li class ='eskuina'><a href ='logOut.php'>Log Out</a></li>";
				}
			?>
			</ul>
		</div>
		<hr/>
		<center><h1> Quizzes</h1></center>
		<?php 
			$galderak = $link -> query ("Select galdera, zailtasuna from galdera");
			$numrows = mysqli_num_rows($galderak);
			if($numrows > 0){
				echo "
				<table id = 'galderakTaula'>
					<tr>
						<th>Questions</th>
						<th>Difficulty</th>
						<th>Your Answer </th>
					</tr>";
					
				$erantzunak = $link ->query("Select galdera, zailtasuna from galdera");
				$kop = 0;
				while ($row = mysqli_fetch_assoc($erantzunak)){
					$kop++;
					echo "
					<tr>
						<td class='tdg' id = 'galdera".$kop."'>".$row['galdera']."</td>
						<td class='tdz'>".$row['zailtasuna']."</td>
						<td><input type = 'text' id = 'erantzuna".$kop."'></td>
						<td><input type = 'button' value = 'Check' onclick = 'checkAnswer(galdera".$kop.", erantzuna".$kop.", ".$kop.")'></td>
						<td><div id = 'zuzOke".$kop."'></div></td>
					</tr>";
				}
				echo "</table>";
			}else{
				echo "
				<center><p> Right now, it seems there are not any questions. But you can be the first one! Sign Up <a href = 'signUp.html'>here</a> and add the question you want.</p></center>";
			}
		?>
	</body>
</html>