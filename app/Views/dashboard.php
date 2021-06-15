<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/public/assets/css/styless.css" />
    <title><?php print_r($user[0]['nombre']); ?></title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo base_url() ?>/public/dashboard"><i class="fas fa-home"></i></a>
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
                        <a class="nav-link active ms-5 " aria-current="page" href="<?php echo base_url() ?>/public/pagos">Pagos</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link active ms-5 " aria-current="page" href="<?php echo base_url() ?>/public/signOut">Salir</a>
                    </li>
                </ul>
                <ul class="navbar-nav me-4 mb-2 mb-lg-0">

                    <li class="nav-item">
                        <a class="nav-link active ms-5 " aria-current="page" href="<?php echo base_url() ?>/public/perfilPropietario"><?php print_r($user[0]['nombre']); ?></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <main>
        <div class="container d-flex justify-content-center ">
            <h1 class=" mt-5">Mis Apartamentos</h1>
        </div>

        <div class="container m-5">
            <?php if ($aparments === array()) {
                echo "<h5>No tienes apartamentos registrados</h5>";
            } ?> <?php if ($aparments !== array()) {
                        echo " <div class='row row-cols-1 row-cols-md-3 g-4'>";
                    }
                    ?>

            <?php
            foreach ($aparments as $aparment) : ?>

                <?php $updateRoute = base_url() . "/public/updateApto?id={$aparment['id_apartamento']}"; ?>
                <?php $deleteRoute = base_url() . "/public/deleteApto?id={$aparment['id_apartamento']}"; ?>
                <div class='col mt-5'>
                    <div class='card'>
                        <img src=<?php echo $aparment['imagen'] ?> class='card-img-top'>
                        <div class='card-body'>
                            <h5 class='card-title'>
                                <?php echo $aparment['ciudad'] . ' - ' . $aparment['pais'] ?>
                            </h5>
                            <p class='m-0'> <strong>Estado:</strong> <?php echo $aparment['estado'] ?></p>
                            <p class='m-0'> <strong>Dirección:</strong> <?php echo $aparment['direccion'] ?></p>
                            <p class='m-0'> <strong>Habitantes:</strong> <?php echo $aparment['cantidad_personas'] ?></p>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#pay<?php echo $aparment['id_apartamento'] ?>">
                                    Pagar
                                </button>
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#update<?php echo $aparment['id_apartamento'] ?>">
                                    Editar
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="update<?php echo $aparment['id_apartamento'] ?>" tabindex="-1" aria-labelledby="updateApto" aria-hidden="true" data-backdrop="static">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title text-white" id="Registrar Apartamento">Editar Apartamento</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- <?php var_dump($aparment['id_apartamento'])  ?> -->
                                                <form action="<?php echo $updateRoute ?>" method="POST" class="form" onsubmit="updateApto()">

                                                    <input class="ciudad" type="text" name="ciudad" id="ciudad" placeholder="Ciudad" value='<?php echo $aparment['ciudad'] ?>' required>
                                                    <input class="pais" type="text" name="pais" id="pais" placeholder="País" value=<?php echo $aparment['pais'] ?> required>
                                                    <input class="direccion" type="text" name="direccion" id="direccion" placeholder="Dirección" value='<?php echo $aparment['direccion'] ?>' required>
                                                    <input class="estado" type="text" name="estado" id="estado" placeholder="Estado" value='<?php echo $aparment['estado'] ?>' required>
                                                    <input class="habitantes" type="text" name="habitantes" id="habitantes" placeholder="Número de habitantes" value=<?php echo $aparment['cantidad_personas'] ?> required>
                                                    <input class="imagen" type="text" name="imagen" id="imagen" placeholder="Agregue la URL de la Imagen" value=<?php echo $aparment['imagen'] ?>>
                                                    <span id="warning" class="text-danger mt-3"></span>
                                                    <button type="submit" class="btn-login" name="updateButton">Actualizar Apartamento</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href='<?php echo $deleteRoute ?>' class='btn btn-danger'>Eliminar</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </main>