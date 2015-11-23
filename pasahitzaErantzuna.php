<?php

		$link = new mysqli("localhost","root","","quiz");	
		//$link = new mysqli("mysql.hostinger.es","u526113874_rb15","123456789","u526113874_quiz");
		
		if($link->connect_errno) {
			die( "Huts egin du konexioak MySQL-ra: (". 
			$link->connect_errno() . ") " . 
			$link->connect_error()	);
		}
		$erabiltzailea = $emaitza = "";
		
		$erabiltzailea = $_GET['email'];
		$emaitza = $_GET['erantzuna'];
		
		$sql = "Select * from erabiltzaile where email = '$erabiltzailea' and erantzunaPasahitza = '$emaitza'";
		$balioak = $link -> query ($sql);
		$filaKop = mysqli_num_rows($balioak);
		
		if ($filaKop != 1){
			echo "Ez da zuzena erantzuna";
		}else{
			$randomPassword = randomPassword();
			$sql = "Update erabiltzaile set pasahitza = '$randomPassword' where email = '$erabiltzailea'";
			$link -> query ($sql);
			echo "<br><br><h4> Pasahitz berria: </h4>";
			echo $randomPassword;
		}
		
		
		
function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}
?>