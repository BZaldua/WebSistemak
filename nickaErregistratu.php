<?php 
session_start();
$_SESSION['nick']=$_POST['nick'];
$_SESSION['asmatutakoak']=0;
$_SESSION['okerrak']=0;
echo $_SESSION['nick']."<h2 style='color:green'>Asmatutako galderak: ".$_SESSION['asmatutakoak']."</h2> 
					<h2 style='color:red'>Oker erantzundakoak: ".$_SESSION['okerrak']."</h2>";
?>