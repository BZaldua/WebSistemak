<?php
	$link = new mysqli("localhost","root","","quiz");	
	//$link = new mysqli("mysql.hostinger.es","u526113874_rb15","123456789","u526113874_quiz");
		
	if($link->connect_errno) {
		die( "Huts egin du konexioak MySQL-ra: (". 
		$link->connect_errno() . ") " . 
		$link->connect_error()	);
	}
	$sql = "Delete from galdera"; //Galdera taula osoa borratu
	$link -> query($sql);
	
	$balioBerriak = $_POST['berria']; //Balio guztiak lortu berriz
	
	unlink("galderak.xml"); //XML fitxategia borratu
	
	$xml = new DOMDocument();
	$xslt = $xml->createProcessingInstruction('xml-stylesheet', 'type="text/xsl" href="seeXMLQuestions.xsl"'); //Stylesheet gehitzeko
	$xml->appendChild($xslt);
	
	$galderak = $xml -> createElement("assessmentItems");
	$xml -> appendChild($galderak);
	$xml -> save("galderak.xml");
	
	
	$kopBalioak = count($balioBerriak);
	$kontagailua = 0;
	
	$xml2= simplexml_load_file('galderak.xml');
	
	while($kontagailua < $kopBalioak){
		$galdera = $balioBerriak[$kontagailua];
		$kontagailua++;
		$erantzuna = $balioBerriak[$kontagailua];
		$kontagailua++;
		$zailtasuna = $balioBerriak[$kontagailua];
		$kontagailua++;
		$emaila = $balioBerriak[$kontagailua];
		$kontagailua++;
		$gaia = $balioBerriak[$kontagailua];
		$kontagailua++;
		
		$sqlGehitu = "INSERT INTO galdera (galdera, erantzuna, zailtasuna, emaila, gaia) VALUES ('$galdera','$erantzuna','$zailtasuna','$emaila', '$gaia')";
		$link->query($sqlGehitu);
		
				$assessmentItem= $xml2-> addChild('assessmentItem');
				$assessmentItem-> addAttribute('konplexutasuna',$zailtasuna);
				$assessmentItem -> addAttribute ('gaia',$gaia);
				$itemBody= $assessmentItem ->addChild('itemBody');
				$itemBody->addChild('p',$galdera);
				$correctResponse= $assessmentItem-> addChild('correctResponse');
				$correctResponse-> addChild('value',$erantzuna);	

	}
	$xml2 -> asXML("galderak.xml");
	
	header("Location:reviewingQuizzes.php");
?>