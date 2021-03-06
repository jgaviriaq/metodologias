<div class="modal-dialog text-center">
    <div class="col-sm-8 main-section1">
        <div class="modal-content">
            <div class="col-12 user-img">
                <img src="<?php echo base_url(); ?>/public/assets/img/avatar1.jpg" alt="">
            </div>
            <form name="formulario" action="<?php echo base_Url() ?>/public/signIn" method="POST" class="col-12" onsubmit="return validarPropietario();">
                <div class="mb-3" id="grupoemailuser">
                    <div class="form-group">
                        <label class="icon"><i class="fas fa-envelope"></i></label>
                        <input type="text" name="emailuser" id="emailuser" class="form-control" placeholder="Ingrese email">
                        <p class="input_error">El formato de correo es incorrecto</p>
                    </div>
                </div>
                <div class="mb-3" id="grupopassworduser">
                    <div class="form-group">
                        <label class="icon">w</label>
                        <input type="password" name="passworduser" id="passworduser" class="form-control" placeholder="Ingrese contraseña">
                        <p class="input_error">La contraseña debe ser mayor a 8 y menor a 12 caracteres</p>
                    </div>
                </div>

                <div class="formulario_mensaje" id="formulario_mensaje">
                    <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Digite todos los campos</p>
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> Iniciar Sesión</button>
                </div>
                <a id="link" href="<?php echo base_url(); ?>/public/registerUser">Registrarse</a>
            </form>
        </div>
    </div>