<?php 
	require_once('Soap/nusoap.php');
	require_once('Soap/class.wsdlcache.php');
	$soapclient= new nusoap_client('http://sw14.hol.es/ServiciosWeb/comprobarmatricula.php?wsdl',false);
	if(isset($_GET['emaila'])){
		$result=$soapclient->call('comprobar',array('x'=>$_GET['emaila']));
		if($result=="NO"){
			echo"Ez zaude WS ikasgaian matrikulatuta";
		}else{
			echo"Emaila baliozkoa da";
		}
	}
	
?>