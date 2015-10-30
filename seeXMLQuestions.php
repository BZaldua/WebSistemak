<!DOCTYPE html>
<html>
<head>
	<title>XML Bistaratu</title>
	<meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
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
				<li class ="ezkerra"><a href ="quiz.php">Quizzes</a></li>
			</ul><br>
		</div>
		<hr>
		<center><h1>XML Fitxategia </h1><center>
	<table id ="taula">
		<tr>
			<th>Enuntziatua</th>
			<th>Konplexutasuna</th>
			<th>Gaia</th>
		</tr>
<?php
	$xml = simplexml_load_file("galderak.xml");
	foreach($xml ->children() as $galdera){
		$konplexutasuna = $galdera[0]['konplexutasuna'];
		$gaia = $galdera[0]['gaia'];
		$enuntziatua = $galdera[0] -> itemBody -> p;
		echo "<tr><td>".$enuntziatua."</td>";
		echo "<td style= 'text-align:center'>". $konplexutasuna."</td>";
		echo "<td style= 'text-align:center'>". $gaia. "</td></tr>";
	}
?>
	</table>
	<?php echo "<a href ='InsertQuestion.php'> Go Back </a>"?>
</body>
</html>