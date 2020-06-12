/* by Jonathan Soto 15/05/2020 */


var cadena = "En un lugar de esta cadena 5 encontraremos un número";
var arreglo = cadena.split("");
var resultado = "";

for(i in arreglo){
	if(arreglo[i] == '5'){
		continue;
	}else{
		resultado += arreglo[i];
	}
} 
console.log(resultado);


var cadena = "En un lugar de esta cadena 5 encontraremos un número";
var arreglo = cadena.split("");
var resultado = "";

for (i in arreglo) {
	if(arreglo[i] == '5'){
		break;
	}else{
		resultado += arreglo[i];
	}
}
console.log(resultado);


var mensaje;

function crearMensaje(){
	mensaje = "Mensaje de prueba";
}

crearMensaje();
console.log(mensaje)


function operacion(n1,n2){
	var resultado;
	resultado = n1+n2;
	console.log(resultado);
}

