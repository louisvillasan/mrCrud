
function validarRegistro() {
	var user = document.querySelector("#usuario").value;
	var password = document.querySelector("#password").value;
	return validarUsuarioPassword(user, password);
}

function validarUsuarioPassword(user, password){
	var regex = /^[a-zA-Z0-9]{6,}/; 
	
	if (!regex.test(user))
		return false;

	regex = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/; 
	if (!regex.test(password))
		return false;

	return true;


}