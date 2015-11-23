<!DOCTYPE html>
<html>
<head>
	<meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	<title>Log In</title>
	<link rel="stylesheet" type="text/css" href="stylesPWS/estiloa.css">
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (max-width: 480px)'
		   href='stylesPWS/smartphone.css' />
		   
		   <script>
			function galderaLortu(){
				var email = document.getElementById('emaila').value;
				var xhr = new XMLHttpRequest();
				xhr.open("GET","pasahitzaGaldera.php?email="+email,true);
				xhr.onreadystatechange = function(){
					if((xhr.readyState == 4) && (xhr.status == 200)){
						document.getElementById('galderaErantzuna').innerHTML = xhr.responseText;
					}
				}
				xhr.send();
			}
			
			function egiaztatuErantzuna(){
				var email = document.getElementById('emaila').value;
				var erantzuna = document.getElementById('erantzuna').value;
				var xhr = new XMLHttpRequest();
				xhr.open("GET","pasahitzaErantzuna.php?email="+email+"&erantzuna="+erantzuna,true);
				xhr.onreadystatechange = function(){
					if((xhr.readyState == 4) && (xhr.status == 200)){
						document.getElementById('pasahitzBerria').innerHTML = xhr.responseText;
					}
				}
				xhr.send();
			}
		   </script>
</head>
<body>
	<div class ="nav" id="nav">
			<ul>
				<li class ="ezkerra"><a href ="layout.html">Home</a></li>
				<li class ="ezkerra"><a href ="credits.html">Credits</a></li>
				<li class ="ezkerra"><a href ="signUp.html">Sign Up </a></li>
				<li class ="ezkerra"><a href ="quiz.php">Quizzes</a></li>
			</ul>
	</div>
	<br><hr>
	<center>
		<h3>New Password Request</h3>
		<label>Email: </label>
		<input type ="text" id ="emaila">
		<button type="input" onclick="galderaLortu()">Send</button>
		<div id="galderaErantzuna"></div>
	</center>
</body>
</html>