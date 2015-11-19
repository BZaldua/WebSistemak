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
				<li class ="eskuina"><a href ="logOut.php">Log Out</a></li>
			</ul>
		</div>
		<hr>		
	<table id ="taula">
		<tr>
			<th>Enuntziatua</th>
			<th>Erantzuna</th>
			<th>Konplexutasuna</th>
			<th>Gaia</th>
		</tr>
		<?php
		$xml = simplexml_load_file("galderak.xml");
		foreach($xml ->children() as $galdera){
			$konplexutasuna = $galdera[0]['konplexutasuna'];
			$gaia = $galdera[0]['gaia'];
			$enuntziatua = $galdera[0] -> itemBody -> p;
			$erantzuna = $galdera[0] -> correctResponse -> value;
			echo "<tr><td><input type='text' value =".$enuntziatua." required></td>";
			echo "<td><input type='text' value =".$erantzuna." required></td>";
			echo "<td><center><input type='number' value =".$konplexutasuna." min='1' max ='5' ></center></td>";
			echo "<td><input type='text' value =".$gaia."></td>";
		}

		?>
		</table>
	</body>
</html>