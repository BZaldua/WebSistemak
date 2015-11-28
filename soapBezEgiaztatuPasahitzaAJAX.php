<?php 
	require_once('Soap/nusoap.php');
	require_once('Soap/class.wsdlcache.php');
	//$soapclient= new nusoap_client('http://wslab1.esy.es/pasahitzaKonprobatu.php?wsdl',false);
	$soapclient= new nusoap_client('http://localhost:8080/WebSistemak/pasahitzaKonprobatu.php?wsdl',false);
	if(isset($_GET['pasahitza'])){
		$result=$soapclient->call('pasahitzaKonprobatu',array('x'=>$_GET['pasahitza']));
		if($result=="BALIOZKOA"){
			echo"Pasahitza baliozkoa da";
		}else if($result=="BALIOGABEA"){
			echo"Sartu duzun pasahitza arruntegia da";
		}
	}
	
?>