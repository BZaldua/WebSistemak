<?php 
	//$link = new mysqli("localhost","root","","quiz");	
	$link = new mysqli("mysql.hostinger.es","u526113874_rb15","123456789","u526113874_quiz");
	if($link->connect_errno) {
		die( "Huts egin du konexioak MySQL-ra: (". 
		$link->connect_errno() . ") " . 
		$link->connect_error()	);
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
	</head>
	<body>
	<div class ="nav" id="nav">
			<ul>
				<li class ="ezkerra"><a href ="layout.html">Home</a></li>
				<li class ="ezkerra"><a href ="credits.html">Credits</a></li>
				<li class ="ezkerra"><a href ="signUp.html">Sign Up</a></li>
			</ul>
			<ul>
				<li class ="eskuina"><a href ="login.php">Log In</a></li>
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
						<th id='gt1'>Questions</th>
						<th id='gt2'>Difficulty</th>
					</tr>";
					
				$erantzunak = $link ->query("Select galdera, zailtasuna from galdera");
				while ($row = mysqli_fetch_assoc($erantzunak)){
					echo "
					<tr>
						<td id='tdg'>".$row['galdera']."</td>
						<td id='tdz'>".$row['zailtasuna']."</td>
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