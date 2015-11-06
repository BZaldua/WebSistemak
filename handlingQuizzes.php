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
	<script type="text/javascript" language="javascript">
	
		XMLHttpRequestObject = new XMLHttpRequest();
		XMLHttpRequestObject.onreadystatechange = function(){
			if((XMLHttpRequestObject.readyState == 4) && (XMLHttpRequestObject.status == 200)){
				document.getElementById('galderakIkusi').innerHTML = XMLHttpRequestObject.responseText;
			}
		}

		function datuakIkusi(){
			XMLHttpRequestObject.open("GET","datuakIkusi.php",true);
			XMLHttpRequestObject.send();
		}
		function galderaGehitu(){
			var g = document.getElementById('galdera').value; //Galdera lortu
			var e = document.getElementById('erantzuna').value; //Erantzuna lortu
			var z = document.getElementById('zailtasuna').value; //Zailtasuna lortu
			var t = document.getElementById('gaia').value; //Gaia lortu: t=topic
			var parametroak = "galdera="+g+"&erantzuna="+e+"&zailtasuna="+z+"&gaia="+t;
			XMLHttpRequestObject.open("POST","galderaGehitu.php",true); 
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
	<h1> Insert Question </h1>
	
	<form name ="addQuestion" id="addQuestion" action ="galderaGehitu.php">
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
	</form>
	<input type="button" onclick="return galderaGehitu()" name='bidali' id='bidali'value="Galdera gehitu"></input>
	<input type='button' name='ikusi' id='ikusi' onClick='return datuakIkusi()' value='Ikusi Nire Galderak'></input>
	</center>
	<div name='galderakIkusi' id='galderakIkusi'>
	<!-- Datu basean erabiltzaile horrek egin dituen galderak ikusteko zatia -->
	</div>
</body>

</html>