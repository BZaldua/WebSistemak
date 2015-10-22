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
</head>

<body>


	<div class ="nav" id="nav">
			<ul>
				<li class ="ezkerra"><a href ="layout.html">Home</a></li>
				<li class ="ezkerra"><a href ="credits.html">Credits</a></li>
				<li class ="ezkerra"><a href ="signUp.html">Sign Up </a></li>
			</ul>
	</div>
	<br><hr>
	
	<h1> Insert Question </h1>
	
	<form method = 'post' name ="addQuestion" id="addQuestion">
		<label>Question</label></br>
		<textarea id ="galdera" name="galdera" rows="4" cols="50"></textarea></br>
		<label>Answer</label></br>
		<input type ="text" name="erantzuna" id="erantzuna"> </br>
		<label>Difficulty </label>
		<select>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
		</select>
	</form>
</body>

</html>