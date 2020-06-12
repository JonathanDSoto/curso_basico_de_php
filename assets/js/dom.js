var margin = 0;

function manejadorEventos(event){
	var evento = event || window.event;
	//console.log("asd")

	switch(evento.type){
		case 'mouseover':
			console.log(evento);
		break;
		case 'mouseout':
			console.log(evento);
		break;
	}
}

function muestraInformacion(event){
	var evento = event || window.event;

	//console.log(evento);

	/*console.log("Tipo de evento: "+ evento.type);
	console.log("Keycode: "+ evento.keyCode);
	console.log("charCode: "+ evento.key);
	console.log("carácter: "+ String.fromCharCode(evento.key));*/
	var imagen = document.getElementById('imagen');

	switch(evento.key){
		case 'w': 
			margin = -5;
			imagen.style.marginTop = margin+"px";
		break;
		case 's':
			console.log("abajo")
			imagen.style.marginTop = imagen.style.marginTop+5+"px";
		break;
		case 'a':
			console.log("izquierda")
			imagen.style.marginTop = imagen.style.marginLeft-5+"px";
		break;
		case 'd':
			console.log("derecha")
			imagen.style.marginTop = imagen.style.marginLeft+5+"px";
		break;
	}
}

function manejadorMouse(event){
	var evento = event || window.event;

	var X = evento.clientX;
	var Y= evento.clientY;
	console.log(X+" , "+Y)
}

window.onload = function(){
	document.getElementsByTagName('body')[0].onmouseover = manejadorEventos; 
	document.onkeypress = muestraInformacion;
	document.onclick = manejadorMouse;
}
 

function test2(event){
	coue
	console.log(event);
}

function rezice(imagen){
	console.log(imagen)
	imagen.style.width = '80%'; 
}

function original(imagen){
	console.log(imagen) 
	imagen.style.width = '50%'; 
}

function saludo(target){ 
	target.style.backgroundColor = "#72EE6A";
	//console.log(target.innerHTML)
}

function test(target){
	console.log(target)
}

function despedida(target){ 
	target.style.backgroundColor = "#009688";
}

function excuteOrder67(){

	var enlace = document.getElementById('enlace');
	console.log(enlace.href)
	enlace.href = 'https://www.youtube.com/';
	console.log(enlace.target)
	enlace.target = '_self';

	var contenedores = document.getElementsByClassName('card');
	console.log(contenedores)

	for (var i = 0; i < contenedores.length; i++) {
		//console.log(contenedores[i].style.border)

		contenedores[i].style.border = 'black solid 5px';
		contenedores[i].style.fontWeight = '100';
	}

	contenedores = document.getElementsByTagName('div');
	//console.log(contenedores)
	for (var i = 0; i < contenedores.length; i++) {
		console.log(contenedores[i].className)
	}
}


function excuteOrder66(){

	/*Búsqueda por atributo id*/
	var objetivo = document.getElementById('parrafin')
	console.log(objetivo)

		/*Añadir un nodo al DOM (Añadir un objeto a la pagina)*/
		var objeto = document.createElement('p');
		var contenido = document.createTextNode('Hola amiguitos yo me añadí después de la carga');
		objeto.appendChild(contenido);

		objetivo.appendChild(objeto);


	/*Búsqueda por atributo name*/
	var resultado = document.getElementsByName('li_dos');
	console.log(resultado)
	resultado[0].parentNode.removeChild(resultado[0]);

	/* búsqueda por etiqueta */
	var contenedores = document.getElementsByTagName('div');

	for (var i = 0; i < contenedores.length; i++) {

		//console.log(contenedores[i]);

		var parrafos = contenedores[i].getElementsByTagName('p');

		for (var j = 0; j < parrafos.length; j++) {
			//console.log(parrafos[j])
		}
	}

}