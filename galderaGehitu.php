<?php 
session_start();

	$link = new mysqli("localhost","root","","quiz");	
	//$link = new mysqli("mysql.hostinger.es","u526113874_rb15","123456789","u526113874_quiz");
	if($link->connect_errno) {
		die( "Huts egin du konexioak MySQL-ra: (". 
		$link->connect_errno() . ") " . 
		$link->connect_error()	);
	}
	
	if(!isset($_SESSION["session_username"])){
		header("Location: login.php");
	}
	 
	//xml irekiera.
	$xml= simplexml_load_file('galderak.xml');
	
		$emaila=$_SESSION["session_username"];
		$galdera = isset($_POST['galdera']) ? $_POST['galdera'] : '';
		$erantzuna = isset($_POST['erantzuna']) ? $_POST['erantzuna'] : '';
		$zailtasuna = isset($_POST['zailtasuna']) ? $_POST['zailtasuna'] : '';
		$gaia = isset($_POST['gaia']) ? $_POST['gaia'] : '';
	if(($galdera != '') && ($erantzuna != '') && ($zailtasuna != '') && ($gaia != '')){
		$sql = "INSERT INTO galdera (galdera, erantzuna, zailtasuna, emaila, gaia) VALUES ('$galdera','$erantzuna','$zailtasuna','$emaila', '$gaia')";
		if (!$link -> query($sql)){
			die("<p>An error happened: ".$link -> error."</orp>");
		}else{
				$assessmentItem= $xml-> addChild('assessmentItem');
				$assessmentItem-> addAttribute('konplexutasuna',$zailtasuna);
				$assessmentItem -> addAttribute ('gaia',$gaia);
				$itemBody= $assessmentItem ->addChild('itemBody');
				$itemBody->addChild('p',$galdera);
				$correctResponse= $assessmentItem-> addChild('correctResponse');
				$correctResponse-> addChild('value',$erantzuna);	
				$xml-> asXML('galderak.xml');
				echo "<p style='background-color:green;color:white;text-align:center;font-weight:bold;'>One new entry added </p>";
				echo "<center>";
				echo "<a href='galderak.xml'>XML fitxategia</a><br>";
				echo "<a href ='seeXMLQuestions.php'>Ikusi galderak</a><br>";
				echo "<a href ='transformazioaXSL.php'>Transformazioarekin ikusi</a>";
				echo "</center>";
		}
		if(!$idKonexioa= $link-> query("SELECT id FROM konexioak WHERE emaila='$emaila'")){
						die("<p>An error happened: ".$link -> error."</p>");

		}
		$row = mysqli_fetch_array($idKonexioa);
		$konexID=intval($row['id']);
		$mota="galdera txertatu";
		$ordua= Date('H:i:s');
		$ip = $_SERVER['REMOTE_ADDR'];
		$sql1= "INSERT INTO ekintzak (konexID, emaila, mota, time, ip) values ('$konexID', '$emaila', '$mota','$ordua','$ip')";
		if (!$link -> query($sql1)){
			die("<p>An error happened: ".$link -> error."</p>");
		}
	}else{
		echo "<p style='background-color:red;color:white;text-align:center;font-weight:bold'>All fields must be completed </p>";
	}
?>