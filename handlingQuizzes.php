<?php 
session_start();
	if(!isset($_SESSION["session_username"])){
		header("Location: login.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	<title>Insert Question</title>
	<link rel="stylesheet" type="text/css" href="stylesPWS/estiloa.css">
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (max-width: 480px)'
		   href='stylesPWS/smartphone.css' />
		   <script type="text/javascript" language="javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script type="text/javascript" language="javascript">
	$(document).ready(function(){
    $("#ikusi").click(function(){
        $("#galderakIkusi").load("datuakIkusi.php");
    });});
	$(document).ready(function(){
    $("#bidali").click(function(){
		var g = document.getElementById('galdera').value; //Galdera lortu
			var e = document.getElementById('erantzuna').value; //Erantzuna lortu
			var z = document.getElementById('zailtasuna').value; //Zailtasuna lortu
			var t = document.getElementById('gaia').value; //Gaia lortu: t=topic
			var parametroak = "galdera="+g+"&erantzuna="+e+"&zailtasuna="+z+"&gaia="+t;
        $("#galderakIkusi").load("galderaGehitu.php",{galdera:g, erantzuna:e, zailtasuna:z, gaia:t} );
    });});
	
	XMLHttpRequestObject = new XMLHttpRequest();
/*
		function datuakIkusi(){
			XMLHttpRequestObject.open("GET","datuakIkusi.php",true);
			XMLHttpRequestObject.onreadystatechange = function(){
			if((XMLHttpRequestObject.readyState == 4) && (XMLHttpRequestObject.status == 200)){
				document.getElementById('galderakIkusi').innerHTML = XMLHttpRequestObject.responseText;
			}
		}
			XMLHttpRequestObject.send();
			
		}
		
		function galderaGehitu(){
			var g = document.getElementById('galdera').value; //Galdera lortu
			var e = document.getElementById('erantzuna').value; //Erantzuna lortu
			var z = document.getElementById('zailtasuna').value; //Zailtasuna lortu
			var t = document.getElementById('gaia').value; //Gaia lortu: t=topic
			var parametroak = "galdera="+g+"&erantzuna="+e+"&zailtasuna="+z+"&gaia="+t;
			XMLHttpRequestObject.open("POST","galderaGehitu.php",true); 
			XMLHttpRequestObject.onreadystatechange = function(){
			if((XMLHttpRequestObject.readyState == 4) && (XMLHttpRequestObject.status == 200)){
				document.getElementById('galderakIkusi').innerHTML = XMLHttpRequestObject.responseText;
			}
		}
			XMLHttpRequestObject.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			XMLHttpRequestObject.send(parametroak);
			garbitu();
		}
		
		function garbitu(){
			var gald = document.getElementById('galdera');
			gald.value = "";
			var erantzuna = document.getElementById('erantzuna');
			erantzuna.value="";
			var zail = document.getElementById('zailtasuna'); 
			zail.value= "1";
			var gai = document.getElementById('gaia'); 
			gai.value="";
		}*/
			function galderaKop(){
				
			XMLHttpRequestObject.open('GET',"galderaKop.php",true);
			XMLHttpRequestObject.onreadystatechange = function(){
			if((XMLHttpRequestObject.readyState == 4) && (XMLHttpRequestObject.status == 200)){
				document.getElementById('galderaKop').innerHTML = XMLHttpRequestObject.responseText;
			}
		}
			XMLHttpRequestObject.send();			
		}
		setInterval(galderaKop,5000);
	
	</script>
</head>

<body onload="galderaKop()">


	<div class ="nav" id="nav">
			<ul>
				<li class ="ezkerra"><a href ="layout.html">Home</a></li>
				<li class ="ezkerra"><a href ="credits.html">Credits</a></li>
				<li class ="ezkerra"><a href ="signUp.html">Sign Up </a></li>
				<li class ="ezkerra"><a href ="quiz.php">Quizzes</a></li>
				<?php
					if($_SESSION['session_username']){
						echo "<li class ='ezkerra'><a href ='reviewingQuizzes.php'>Review Questions</a></li>";
						echo "<li class ='ezkerra'><a href ='erabiltzaileakIkusi.php'>View Users</a></li>";
					}
				?>
			</ul>
			<ul>
				<li class ="eskuina"><a href ="logout.php">Log Out</a></li>
			</ul>
	</div>
	<hr>
	
	<center>
	<h1> Insert Question </h1>
	
	<form name ="addQuestion" id="addQuestion">
		<label>Question</label></br>
		<textarea id ="galdera" name="galdera" rows="4" cols="50" required></textarea><br/><br/>
		<label>Answer</label></br>
		<input type ="text" name="erantzuna" id="erantzuna" required> <br/><br/>
		<label>Difficulty </label>
		<select name='zailtasuna' id='zailtasuna'>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
		</select><br><br>
		<label>Topic</label><br>
		<input type="text" id ="gaia" name="gaia" required><br><br>
		<div name='galderaKop' id='galderaKop'>
	<!-- Erabiltzailearen galdera kopurua  eta datu-baseak dituen galderen kopurua-->
	</div>
	</form>
	<input type="button"  name='bidali' id='bidali'value="Galdera gehitu"></input>
	<input type='button' name='ikusi' id='ikusi'  value='Ikusi Nire Galderak'></input>
	
	</center>
	<div name='galderakIkusi' id='galderakIkusi'>
	<!-- Datu basean erabiltzaile horrek egin dituen galderak ikusteko zatia -->
	</div>
</body>

</html>