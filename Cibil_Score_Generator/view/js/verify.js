function nameValidation(login){
//	alert('hi');
	var pattern=/^[a-zA-Z]+$/;
			if (pattern.test(login.user_name.value)==false) {
				alert("Name should be alphabet");
				return false;
			}
			return true;
}
function panValidation(login){
	var alpha=/^[a-zA-Z0-9]+$/;
	if (alpha.test(login.pan_num.value)==false) {
				alert("PAN should contain alphabet and number");
				return false;
			}
return true;
}
