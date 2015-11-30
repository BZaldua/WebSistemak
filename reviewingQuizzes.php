<?php
//Konexioa egin datu-basearekin

	//$link = new mysqli("localhost","root","","quiz");	
	$link = new mysqli("mysql.hostinger.es","u526113874_rb15","123456789","u526113874_quiz");
		
	if($link->connect_errno) {
		die( "Huts egin du konexioak MySQL-ra: (". 
		$link->connect_errno() . ") " . 
		$link->connect_error()	);
	}
	
	$balioak = $link -> query("Select * from galdera")
?>

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
		<script type="text/javascript" language="javascript" src="funtzioak.js">
		</script>
	</head>
	<body>
		<div class ="nav" id="nav">
			<ul>
				<li class ="ezkerra"><a href ="layout.html">Home</a></li>
				<li class ="ezkerra"><a href ="credits.html">Credits</a></li>
				<li class ="ezkerra"><a href ="quiz.php">Quizzes</a></li>
			</ul>
			<ul>
				<li class ="eskuina"><a href ="logout.php">Log Out</a></li>
			</ul>
		</div>
		<hr>
		<center><form method="post" action="galderakEditatu2.php">
			<table>
				<tr>
					<th>Galdera</th>
					<th>Erantzuna</th>
					<th>Konplexutasuna</th>
					<th>Egilea</th>
					<th>Gaia</th>
				</tr>
				<?php
					$kop = 0;
					while($row = mysqli_fetch_array($balioak)){
						echo "
						<tr>
							<td><textarea name ='berria[]' required>".$row['galdera']."</textarea></td>
							<td><textarea name ='berria[]' required>".$row['erantzuna']."</textarea></td>
							<td><input type='number' min = 1 max = 5 value ='".$row['zailtasuna']."' name ='berria[]'></td>
							<td><input type ='text' name ='berria[]' value = '".$row['emaila']."'readonly></td>
							<td><input type='text' value='".$row['gaia']."' name ='berria[]'></td>
						</tr>";
					}
				?>
			</table>
			<br><button type="submit">Gorde aldaketak</button>
		</form></center>
	</body>
</html>