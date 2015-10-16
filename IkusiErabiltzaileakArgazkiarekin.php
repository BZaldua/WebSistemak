<?php 
mysql_connect("mysql.hostinger.es","u526113874_rb15","123456789") or die(mysql_error());
mysql_select_db("u526113874_quiz") or die(mysql_error());

$erabiltzaileak = mysql_query("select * from erabiltzaile");
echo "<table border = 1><tr><th>Izena</th><th>Abizena</th><th>Emaila</th><th>Espezialitatea</th><th>Interesa Teknologian</th><th>Argazkia</th></tr>";

while($row = mysql_fetch_array($erabiltzaileak)){
	echo "<tr><td>".$row['izena']."</td><td>".$row['abizena']."</td><td>".$row['email']."</td><td>".$row['espezialitatea']."</td><td>".$row['interesa']."</td>";
	echo '<td><img src="data:image/jpeg;base64,'.base64_encode( $row['argazkia'] ).'" width="100" height="100"/></td></tr>';

	
}
echo "</table>"
?>