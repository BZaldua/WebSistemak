<?php 
session_start();
	$link = new mysqli("localhost","root","","quiz");
	//$link = new mysqli("mysql.hostinger.es","u526113874_rb15","123456789","u526113874_quiz");
if($link->connect_errno) {
die( "Huts egin du konexioak MySQL-ra: (". 
$link->connect_errno() . ") " . 
$link->connect_error()	);
	}
	$emaila= $_SESSION["session_username"];
	$galderak = $link -> query ("Select Id from galdera where emaila='$emaila'");
	$row1 = mysqli_num_rows($galderak);	
	$erantzunak = $link ->query("Select Id from galdera");
	$row= mysqli_num_rows($erantzunak);
			echo"<p style='background-color:#00ff00'> Nire galderak/Galderak guztira DB :" .$row1."/".$row."<p>";
	echo"@@";
		$link = new mysqli("localhost","root","","quiz");
	//$link = new mysqli("mysql.hostinger.es","u526113874_rb15","123456789","u526113874_quiz");
	if($link->connect_errno) {
	die( "Huts egin du konexioak MySQL-ra: (". 
	$link->connect_errno() . ") " . 
	$link->connect_error()	);
	}
	$emaila= $_SESSION["session_username"];
	$galderak = $link -> query ("Select galdera, zailtasuna from galdera where emaila='$emaila'");
	$numrows = mysqli_num_rows($galderak);
	if($numrows > 0){
		echo "
		<table id = 'galderakTaula'>
			<tr>
				<th id='gt1'>Questions</th>
				<th id='gt2'>Difficulty</th>
			</tr>";
			
		$erantzunak = $link ->query("Select galdera, zailtasuna from galdera where emaila = '$emaila'");
		while ($row = mysqli_fetch_assoc($erantzunak)){
			echo "
			<tr>
				<td id='tdg'>".$row['galdera']."</td>
				<td id='tdz'>".$row['zailtasuna']."</td>
			</tr>";
		}
		echo "</table>";
	}
		
	
	
?>