<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/public/assets/css/styless.css" />
    <title>Alquiler Apartamentos</title>
</head>

<body class="body3">

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
                        <a class="nav-link active ms-5 " aria-current="page" href="<?php echo base_url() ?>/public/perfilPropietario"><?php echo ($user[0]['nombre']) ?></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        <div class="container d-flex justify-content-center ">
            <h1 class=" mt-5">Pagos Realizados</h1>
        </div>

        <div class="container m-5">
            <?php if ($aparments === array()) {
                echo "<h5>No tienes pagos registrados</h5>";
            } ?> <?php if ($aparments !== array()) {
                        echo " <div class='row row-cols-1 row-cols-md-3 g-4'>";
                    }
                    ?>

            <?php
            foreach ($aparments as $aparment) : ?>

                <?php $updateRoute = base_url() . "/public/updateApto?id={$aparment['id_apartamento']}"; ?>
                <?php $pagarApartamento = base_url() . "/public/pagarApto?id={$aparment['id_apartamento']}"; ?>
                <?php $deleteRoute = base_url() . "/public/deleteApto?id={$aparment['id_apartamento']}"; ?>
                <div class='col mt-5'>
                    <div class='card'>
                        <div class='card-body'>
                            <h5 class='card-title'>
                                <?php echo $aparment['ciudad'] . ' - ' . $aparment['pais'] ?>
                            </h5>
                            <p class='m-0'> <strong>Estado:</strong> <?php echo $aparment['estado'] ?></p>
                            <p class='m-0'> <strong>Direcci??n:</strong> <?php echo $aparment['direccion'] ?></p>
                            <p class='m-0'> <strong>Habitantes:</strong> <?php echo $aparment['cantidad_personas'] ?></p>
                            <p class='m-0'> <strong>Fecha Pago:</strong> <?php echo $aparment['fecha_pago'] ?></p>
                            <p class='m-0'> <strong>Valor Pagado:</strong> $<?php echo $aparment['valor_cuota'] ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </main>