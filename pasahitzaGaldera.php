<?php 
		$link = new mysqli("localhost","root","","quiz");	
		//$link = new mysqli("mysql.hostinger.es","u526113874_rb15","123456789","u526113874_quiz");
		
		if($link->connect_errno) {
			die( "Huts egin du konexioak MySQL-ra: (". 
			$link->connect_errno() . ") " . 
			$link->connect_error()	);
		}
		
		if(!isset($_GET['email']))
			echo "Ez dago ezarrita";
		$erabiltzailea = $_GET['email'];
		
		$sql = "Select galderaPasahitza from erabiltzaile where email = '$erabiltzailea'";
		$balioak = $link -> query ($sql);
		while($row = mysqli_fetch_assoc($balioak)){
			echo "<br><b>".$row['galderaPasahitza']."</b><br>";
			echo "<input type = 'text' id ='erantzuna'>";
			echo "<button type = 'input' onclick ='egiaztatuErantzuna()'>Send</button>";
			echo "<div id='pasahitzBerria'></div>";
		}
?>