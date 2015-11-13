

<html>
	<head>
		<meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
		<title>Sign Up</title>
		<link rel="stylesheet" type="text/css" href="stylesPWS/estiloa.css"/>
		<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (max-width: 480px)'
		   href='stylesPWS/smartphone.css' />
		<!--<script type="text/javascript" language="javascript" src="funtzioak.js">
		</script> -->
		<script>
			function konprobatu(){
				konprobatuEmaila();
				konprobatuPass();
			}
			function konprobatuEmaila(){
				XMLHttpRequestObject1 = new XMLHttpRequest();
				var e = document.getElementById('emaila').value; //Emaila lortu
				XMLHttpRequestObject1.open("GET","soapBezEgiaztatuMatrikulaAJAX.php?emaila="+e,true); 
				XMLHttpRequestObject1.onreadystatechange = function(){
					if((XMLHttpRequestObject1.readyState == 4) && (XMLHttpRequestObject1.status == 200)){
						document.getElementById('emailErantzun').innerHTML = XMLHttpRequestObject1.responseText;
					}
				}
				XMLHttpRequestObject1.send();				
			}
			
			function konprobatuPass(){				
					XMLHttpRequestObject = new XMLHttpRequest();
					var e = document.getElementById('pasahitza').value; //Emaila lortu
					XMLHttpRequestObject.open("GET","soapBezEgiaztatuPasahitzaAJAX.php?pasahitza="+e,true); 
					XMLHttpRequestObject.onreadystatechange = function(){
						if((XMLHttpRequestObject.readyState == 4) && (XMLHttpRequestObject.status == 200)){
							document.getElementById('passErantzun').innerHTML = XMLHttpRequestObject.responseText;
						}
					}
					XMLHttpRequestObject.send();
			}
		</script>
	</head>
	<body>
		<div class ="nav" id="nav">
			<ul>
				<li class ="ezkerra"><a href ="layout.html">Home</a></li>
				<li class ="ezkerra"><a href ="credits.html">Credits</a></li>
				<li class ="ezkerra"><a href ="quiz.php">Quizzes</a></li>
			</ul>
			<ul>
				<li class ="eskuina"><a href ="login.php">Log In</a></li>
			</ul>
		</div>
		<hr>
		<div class ="aim" id ="head">
			<h1>Sign Up</h1>
		</div>
	<div>
		<form id="erregistro" name="erregistro" onSubmit="return balidatu()" action ="ErregistratuArgazkiarekin.php" enctype="multipart/form-data" method ="post">
				Mail *: <br> <input type ='email' name ="emaila" id="emaila"required><br><br>
				Password *: <br><input type ='password' name ="pasahitza" id="pasahitza" required><br><br>
				<input type="button" value="Submit" onclick="konprobatu()"></input>
		</form>
	</div>
	<div id="emailErantzun"></div><br><br>
	<div id="passErantzun"></div>
	<div class="footer2">
				<p><a href="http://en.wikipedia.org/wiki/Quiz" target="_blank">What is a Quiz?</a></p>
				<a href='https://github.com'>Link GITHUB</a>
				<br>
			</div>
		
	</body>
</html>


