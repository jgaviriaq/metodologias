function validarPropietario(){
    let user, emailuser, telephoneuser,passworduser;

    user = document.getElementById("user").value;
    emailuser = document.getElementById("emailuser").value;
    telephoneuser = document.getElementById("telephoneuser").value;
    passworduser= document.getElementById("passworduser").value;
    expresion_correo = /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.+[a-zA-Z0-9-.]+$/;
    expresion_nombre = /^[a-zA-ZÀ-ÿ\s]{1,40}$/;

   
    if (user == "" || emailuser == "" || telephoneuser ==  "") {
        document.querySelector('#formulario_mensaje ').classList.add('formulario_mensaje-activo');
        return false
    }
    else {
        document.querySelector('#formulario_mensaje ').classList.remove('formulario_mensaje-activo');
    }


    if (!expresion_nombre.test(user) || user.length > 20) {
        document.querySelector('#grupouser .input_error').classList.add('input_error-activo');
        return false
    }
    else {
        document.querySelector('#grupouser .input_error').classList.remove('input_error-activo');
    }

    if (!expresion_correo.test(emailuser)) {
        document.querySelector('#grupoemailuser .input_error').classList.add('input_error-activo');
        return false
    }
    else {
        document.querySelector('#grupoemailuser .input_error').classList.remove('input_error-activo');
    }

    if (passworduser.length < 9 || passworduser.length > 12) {
        document.querySelector('#grupopassworduser .input_error').classList.add('input_error-activo');
        return false
    }
    else {
        document.querySelector('#grupopassworduser .input_error').classList.remove('input_error-activo');
    }

}