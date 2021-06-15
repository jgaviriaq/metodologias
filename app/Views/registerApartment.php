<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/public/assets/css/styless.css" />
    <title>Registrar Apartamento</title>
</head>

<body class="body">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo base_url() ?>/public/home"><i class="fas fa-home"></i></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item ">
                        <?php  ?>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link active ms-5 " aria-current="page" href="<?php echo base_url() ?>/public/registerApto">Registrar Apartamento</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link active ms-5 " aria-current="page" href="<?php echo base_url() ?>/public/signOut">Salir</a>
                    </li>
                </ul>
                <ul class="navbar-nav me-4 mb-2 mb-lg-0">

                    <li class="nav-item">
                        <a class="nav-link active ms-5 " aria-current="page" href="<?php echo base_url() ?>/public/perfil"><?php print_r($user[0]['nombre']); ?></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <main>
    <div class="modal-dialog modal-lg text-center">
        <div class="col-sm-12 main-sectionApartment">
            <div class="modal-content">
                <div class="col-12 user-img mt-0">
                    <img src="<?php echo base_url(); ?>/public/assets/img/apartment.png" alt="">
                </div>
                <form id="formulario" class="col-12" onsubmit="" action="<?php echo base_Url(); ?>/public/addApto" method="POST">
                    <div class="row justify-content-center">
                        <div class="col-md-4 col-sm-12">
                            <div class="mb-3" id="grupocity">
                                <div class="form-groupApartment">
                                    <div class="input-group has-validation">
                                        <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-building"></i></span>
                                        <input type="text" name="ciudad" id="ciudad" class="form-control" placeholder="Digite Ciudad">
                                    </div>
                                    <p class="input_error">La ciudad solo debe tener letras y no ser mayor a 20 caracteres</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <div class="mb-3" id="grupocountry">
                                <div class="form-groupApartment">
                                    <div class="input-group has-validation">
                                        <span class="input-group-text"><i class="fas fa-globe"></i></span>
                                        <input type="text" name="pais" id="pais" class="form-control" placeholder="Digite País">
                                    </div>
                                    <p class="input_error">El país solo debe tener letras y no ser mayor a 15 caracteres</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                    <div class="col-md-4 col-sm-12">
                            <div class="mb-3" id="grupoDireccion">
                                <div class="form-groupApartment">
                                    <div class="input-group has-validation">
                                        <span class="input-group-text"><i class="fas fa-map-marker"></i></span>
                                        <input type="text" name="direccion" id="direccion" class="form-control" placeholder="Digite Dirección">
                                    </div>
                                    <p class="input_error">La dirección no debe tener mas de 20 caracteres</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="mb-3" id="grupoHabitantes">
                                <div class="form-groupApartment">
                                    <div class="input-group has-validation">
                                        <span class="input-group-text"><i class="fas fa-users"></i></span>
                                        <input type="number" name="habitantes" id="habitantes" class="form-control" placeholder="Cantidad de Personas">
                                    </div>
                                    <p class="input_error">Solo digite numeros, los caracteres no pueden ser mayor a 10 </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-md-4 col-sm-12">
                            <div class="mb-3" id="grupoImagenDestacada">
                                <div class="form-groupApartment">
                                    <div class="input-group has-validation">
                                        <span class="input-group-text"><i class="fas fa-camera"></i></span>
                                        <input type="text" name="imagen" id="imagen" class="form-control" placeholder="Imagen Principal">
                                    </div>
                                    <p class="input_error"> No corresponde a una dirección URL válida</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4 col-sm-12">
                            <div class="mb-3" id="grupoEstado">
                                <div class="form-groupApartment">
                                    <div class="input-group has-validation">
                                        <span class="input-group-text"><i class="fas fa-building"></i></span>
                                        <input type="text" name="estado" id="estado" class="form-control " placeholder="Estado">
                                    </div>
                                    <p class="input_error">Solo digite numeros, los caracteres no pueden ser mayor a 10</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="formulario_mensaje" id="formulario_mensaje">
                        <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Digite todos los campos</p>
                    </div>

                    <div class="mb-3">
                        <button type="submit" name="btnRegistrar" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> Registrar Apartamento</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    </main>