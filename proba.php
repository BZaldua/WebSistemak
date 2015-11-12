<?php 

$file= fopen("a.txt","r");
$x="1234";
	$pass=trim(utf8_encode($x));
	if($file){
		while(($buffer= fgets($file))!==false){
				$ir=trim(utf8_encode($buffer));
			if($pass==$ir)
				echo "BALIOGABEA";
		}
	}

?>