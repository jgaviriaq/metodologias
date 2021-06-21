function validarPerfil() {

    let profileName, telefono, profileImage;


    profileName = document.getElementById("profileName").value;
    telefono = document.getElementById("telefono").value;
    profileImage = document.getElementById("profileImage").value;
    urlregex = /^(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?$/;
    expresion_nombre = /^[a-zA-ZÀ-ÿ\s]{1,40}$/;

    if (profileName == "" || telefono == "" || profileImage == "") {
        document.querySelector('#formulario_mensaje ').classList.add('formulario_mensaje-activo');
        return false
    }
    else {
        document.querySelector('#formulario_mensaje ').classList.remove('formulario_mensaje-activo');
    }


    if (!expresion_nombre.test(profileName) || profileName.length > 40) {
        document.querySelector('#grupoNombre .input_error').classList.add('input_error-activo');
        return false
    }
    else {
        document.querySelector('#grupoNombre .input_error').classList.remove('input_error-activo');
    }


    if (telefono.length > 10) {
        document.querySelector('#grupoCiudad .input_error').classList.add('input_error-activo');
        return false
    }
    else {
        document.querySelector('#grupoCiudad .input_error').classList.remove('input_error-activo');
    }

    if (!urlregex.test(profileImage)) {
        document.querySelector('#grupoFoto .input_error').classList.add('input_error-activo');
        return false
    }
    else {
        document.querySelector('#grupoFoto .input_error').classList.remove('input_error-activo');
    }

   
}