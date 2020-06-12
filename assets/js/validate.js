function validate(e){
	//e.preventDefault();
	var name = document.formPersonalData.fname.value;
	var lastname = document.formPersonalData.lname.value;
	var email = document.formPersonalData.email.value;

	if(name.length>=3 && lastname.length >= 2 && email.length>=8){
		
		if (!soloLetras(name)) {
			alert("Verificar el nombre") 
			return false;
		}
		if (!soloLetras(lastname)) {
			alert("Verificar el apellido") 
			return false;
		}
		console.log(email)
		if (!validarEmail(email)) {
			alert("Verificar El correo electrónico") 
			return false;
		}

	}else{
		console.log("error1")
		alert("Verificar los datos") 
		return false;
	} 
	
}

function soloLetras(cadena){
	var letras = 'abcdefghijklmnopqrstxyz';
	var numeros = '0123456789';

	for (var i = 0; i < cadena.length; i++) {
		for (var i = 0; i < numeros.length; i++) {
			if (numeros[i]== cadena[i]) {
				return false;
			}
		}
	}  
	return true;
}

function validarEmail(valor) {
	var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(valor) ? true : false;
	//return true; 
}