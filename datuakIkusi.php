<?php 
session_start();
	//$link = new mysqli("localhost","root","","quiz");
	$link = new mysqli("mysql.hostinger.es","u526113874_rb15","123456789","u526113874_quiz");
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
		<center><p> Right now, it seems there are not any questions.</p></center>";
	}
	
?>