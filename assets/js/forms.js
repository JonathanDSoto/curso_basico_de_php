/*var formularios = document.forms;


for (var i = 0; i < formularios.length; i++) {
	console.log(formularios[i].elements[0])

	for (var j = 0; j < formularios[i].elements.length; j++) {

		console.log(formularios[i].elements[j]);
	}
}*/

function soloLetras(e){
	var letras = 'abcdefghijklmnopqrstxyz';
	var numeros = '0123456789';

	var event = e || window.event;
	var codigoChar = event.key;
	console.log(codigoChar)

	for (var i = 0; i < letras.length; i++) {
		if (letras[i]== codigoChar) {
			return true;
		}
	}
	return false;
}

function soloNumeros(e){
	var letras = 'abcdefghijklmnopqrstxyz';
	var numeros = '0123456789';

	var event = e || window.event;
	var codigoChar = event.key;
	console.log(codigoChar)

	for (var i = 0; i < letras.length; i++) {
		if (numeros[i]== codigoChar) {
			return true;
		}
	}
	return false;
}

document.getElementById('email').focus()

function textArea(){
	var texto = document.formBankData.descripcion;
	console.log(texto.value)
}

function getHotel(){
	var lista = document.formContactInfo.hoteles;
	console.log(lista)

	var hotel = lista.selectedIndex;
	console.log(hotel)

	var opcion = lista.options[hotel];
	console.log(opcion)

	var texto = opcion.text;
	var valor = opcion.value;

	console.log(texto+" - "+valor)
}

function cambio(input,texto){
	console.log(input.value+" - "+input.checked) 
	if(input.checked){
		alert("Ha contratado el servicio de: "+texto)
	}else{
		alert("No ha contratado el servicio de: "+texto)
	}
}

function cenaX(){
	var radios = document.formContactInfo.cena;
	console.log(radios.value)
	for (var i = 0; i < radios.length; i++) {
		console.log(radios[i])
	}
}

function valida(target,id,mensaje){
	var input = target.value;
	if(input.length<=0){
		alert("rellene el campo "+mensaje)
	}
	console.log(id)
	//document.getElementById(id).focus();
}

function validate(){
	var f1 = document.formBankData.cvv.value;

	if(f1.length>3){
		alert("El código de seguridad solo puede tener 3 elementos")
	}
	console.log(f1.length)
}

function validatePersonalData(){

	var f1 = document.formPersonalData.fname.value;
	if(f1.length<=0){
		alert("rellene el campo nombre")
	}

	var apellido = document.formPersonalData.lname.value;
	if(apellido.length<=0){
		alert("rellene el campo apellido")
	}

	var f2 = document.formPersonalData.email;
	console.log(f2.type)

	//value
	//name
	//type

	//onclick
	//onchange
	//onfocus
	//onblur
}

function prueba(e){
	console.log(e)
}