/*reglas de lenguaje
* 1.- No importan los espacios en blanco y saltos;
* 2.- Se distingue entre mayúsuclas y minúsculas
* 3.- No se definen las variables o los tipos de variables
* 4.- No es obligatorio o necesario terminar la linea en ; 
* 5.- Admite comentarios
*/

/*Tipos de variables
* Númericas
* Cadenas de texto
* Arrays
* Boolean
*/

/*
*Funciones útiles
* -> Texto
*/

var mensaje = " _ HolA _ ";
    
var mensaje2 = 8;

mensaje = mensaje.concat(mensaje2 + " X 2") ;

mensaje = mensaje.replace(/ /g,'');

mensaje = mensaje.toUpperCase();
mensaje = mensaje.toLowerCase();

var cantidadLetras = mensaje.length;
console.log(mensaje);

mensaje.charAt(3)
mensaje.indexOf('_')
mensaje.lastIndexOf('_')
mensaje.substring(2,5)

console.log(mensaje.substring(6,0)+ ", Cantidad de letras: " + cantidadLetras);

var palabra = mensaje.split("");
console.log(palabra)

console.log(palabra.length)

palabra = palabra.concat("a","b","c");

console.log(palabra)

 
arrelgo = palabra.join("");
console.log(arrelgo)


var eliminado  = palabra.pop();
console.log(palabra)

palabra.push(4);
console.log(palabra)

palabra.shift();
console.log(palabra)

palabra.unshift(7);
console.log(palabra)

palabra.reverse();
console.log(palabra)


var numero1 = 0;
var numero2 = 0;

console.log(numero1/numero2)


if (isNaN(numero1/numero2)) {
	console.log("No se pueden dividir")
}

var numero3 = 123.56685;

console.log(numero3+" - "+numero3.toFixed(2)+ " - "+Math.trunc(numero3));


//Math.trunc(13.37)
var flag = false;
var edad = 0;
//var edad = prompt("Ingrese su edad",12);

if ( edad >= 18) { //condición   t o f, 1  = t, 0 = f 

	//console.log("El usuario es mayor de edad");

}else if(edad >= 10 && edad < 18){

	//console.log("El usuario tiene entre 10 y 17")

}else{

	//console.log("El usuario es muy pequeño")
}

var flag = false;

           //   0  ,   1    ,     2     ,   3    ,    4    ,    5   ,    6
var dias = ["Lunes","martes","Miércoles","Jueves","Viernes","Sábado","Domingo"];

for(i in dias){
	//console.log(dias[i])
}

/*for (var i = 0; i < dias.length; i++) {
	console.log(dias[i])
}*/

/*for (var i = 0; i < dias.length; ++i) {
	console.log(dias[i])
}*/


var numero1 = 9; 
	numero1 %=2;
	//console.log(numero1);
	//divisibles

var mensaje = "Hola este es mi sitio web";
var producto = 'Chocolate abuelita';
var caracter = 'A';
 
var texto1 = "Esta \n frase \n con \"comilla \n simple\" \n dentro";
var texto2 = 'Esta frase \t con \'com\\illas dobles\' dentro';

var valor_uno = 5.234;
var valor_dos = 2;

var resultado = valor_uno+valor_dos; 

//console.log(valor_uno)
//console.log(resultado)
//alert(texto1)
 