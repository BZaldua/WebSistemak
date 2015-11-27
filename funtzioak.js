function ikusBalioak(){
	var sAux="";
	var frm=document.getElementById("erregistro");
	for(i=0;i<frm.elements.length;i++){
		sAux +="IZENA: " + frm.elements[i].name+"";
		sAux +="BALIOA: " + frm.elements[i].value+"\n";
	}
	alert(sAux);
}

function balidatu(){
	var x = document.getElementById("erregistro");
	for(i=0;i<x.elements.length-2;i++){
		if (x.elements[i].value == null || x.elements[i].value == " ") {
			alert("All obligatory field must be completed.");
			return false;
		}
	}
	if(!izenaBeteta(document.forms["erregistro"]["izena"].value)){
		alert("The name must be a string. For example Christian");
		return false;
	}
	if(!pasahitzaLuz(document.forms["erregistro"]["pasahitza"].value)){
		alert("The password needs at least 6 numbers.");
		return false;
	}if (!emailBalioztatu(document.forms["erregistro"]["emaila"].value)){
		alert ("Not the correct email format. Here an example: name001@ikasle.ehu.es");
		return false;
	}if(!telefBalioztatu(document.forms["erregistro"]["telefonoa"].value)){
		alert("Not the correct telephone format. The telephone must star with 6 or 9 and have 9 digits.");
		return false;
	}
	if(!konprobatuPass() && !konprobatuEmaila()){
		return false;
	}if(!konprobatu()){
		return false;
	}
}

function izenaBeteta(izen){
	var re=new RegExp("[a-z,A-Z,Ñ,ñ]+");
	return re.test(izen);
}

function pasahitzaLuz(pass){
	if(pass.length <6){
		return false;
	}
	return true
}

function emailBalioztatu(emaila){
	var re = new RegExp("[a-z]+[0-9]{3}@ikasle.ehu.e(us|s)");
	return re.test(emaila);
}

function telefBalioztatu(telefonoa){
	var re = new RegExp("(6|9)[0-9]{8}");
	return re.test(telefonoa);
}

function besteakClick(){
	var div = document.getElementById("espezialitateak");
	var input = document.createElement("input");
	input.type="text"
	input.id="textu2"
	input.name="besteaTextua";
	div.appendChild(input);
	var botoia = document.getElementById("espezialitatea");
	botoia.disabled = true;
}

function borratuLaukia(){
	var lauki = document.getElementById("textu2");
	lauki.parentNode.removeChild(lauki);
	var botoia = document.getElementById("espezialitatea");
	botoia.disabled = false;
}

//Argazkia igotzeko
var loadFile = function(event) {
	var output = document.getElementById('preview');
	output.src = URL.createObjectURL(event.target.files[0]);
	output.style.paddingBottom="10px";
};

function tamainaAldatu(irudia,altuera,zabalera){
	irudia.height=altuera;
	irudia.width=zabalera;
}

function borratu(){
	var irudia = document.getElementById("preview");
	irudia.height="0";
	irudia.width="0";
	var lauki = document.getElementById("textu2");
	lauki.parentNode.removeChild(lauki);
	var botoia = document.getElementById("espezialitatea");
	botoia.disabled = false;
}

function desblokeatu(){
	var botoia = document.getElementById("espezialitatea");
	botoia.disabled = false;
}

XMLHttpRequestObject.onreadystatechange = function(){
	if((XMLHttpRequestObject.readyState == 4) && (XMLHttpRequestObject.status == 200)){
		var obj = document.getElementByID('galderakIkusi');
		obj.innerHTML = XMLHttpRequestObject.responseText;
	}
}


function datuakIkusi(){
	XMLHttpRequestObject.open("GET","datuakIkusi.php",true);
	XMLHttpRequestObject.send();
}

function checkAnswer(id, erantzuna, zenbakia){
	var galdera = id.innerHTML;
	var erantzuna = erantzuna.value;
	var xhr = new XMLHttpRequest();
	xhr.open("GET", "erantzunaEgiaztatu.php?gald="+galdera+"&eran="+erantzuna);
	xhr.onreadystatechange = function(){
		if(xhr.readyState == 4 && xhr.status == 200){
			document.getElementById('zuzOke'+zenbakia).innerHTML = xhr.responseText;
		}
	}
	xhr.send();
}


			function konprobatu(){
				if(document.getElementById('pasahitza1').value==document.getElementById('pasahitza').value){
					konprobatuEmaila();
					konprobatuPass();
					var passErantzun = document.getElementById('passErantzun').value;
					var emailErantzun = document.getElementById('emailErantzun').value;
					if(passErantzun != 'Sartu duzun pasahitza arruntegia da' && emailErantzun != 'Ez zaude WS ikasgaian matrikulatuta'){
						return true;
					}
				}else{
					alert("Pasahitzak berdinak izan behar dira.");
					return false;
				}
			}
			function konprobatuEmaila(){
				XMLHttpRequestObject1 = new XMLHttpRequest();
				var e = document.getElementById('emaila').value; //Emaila lortu
				XMLHttpRequestObject1.open("GET","soapBezEgiaztatuMatrikulaAJAX.php?emaila="+e,true); 
				XMLHttpRequestObject1.onreadystatechange = function(){
					if((XMLHttpRequestObject1.readyState == 4) && (XMLHttpRequestObject1.status == 200)){
						document.getElementById('emailErantzun').innerHTML = XMLHttpRequestObject1.responseText;
						if(XMLHttpRequestObject1.responseText == "Ez zaude WS ikasgaian matrikulatuta"){
							document.getElementById('emailErantzun').style.backgroundColor ="red";
							return false;
						}else{
							document.getElementById('emailErantzun').style.backgroundColor ="green";
							return true;
						}
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
							if(XMLHttpRequestObject.responseText == "Sartu duzun pasahitza arruntegia da"){
								document.getElementById('passErantzun').style.backgroundColor ="red";
								return false;
							}else{
								document.getElementById('passErantzun').style.backgroundColor ="green";
								return true;
							}	
						}
					}
					XMLHttpRequestObject.send();
			}