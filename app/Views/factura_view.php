<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="fabicon/x-icon" href="img/BPM ASESORIAS.jpg" />
    <title>BPM Asesorias</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css" />
    <link rel="stylesheet" type="text/css" href="css/responsive.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>

<body>
    <main>
        <section class="wrap wrap-content">
            <section id="info">

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-1">
                            <div>
                                <img src="img/BPM ASESORIAS.jpg" alt="">
                            </div>
                        </div>

                        <div class="col-md-11">
                            <div id="banner1">
                                <h1>Pagos Administración</h1>

                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <p id="parrafo">A continuación se muestra la factua que debe pagar de administración correspondiente del mes actual
                    </p>
                </div>

            </section>
            <section class="container-fluid">
                <form id="form" method="POST">
                    <div class="row">

                        <div class="col-md-4">
                            <label id="fecha">Fecha Pago Anterior</label>
                            <input type="date" name="fechaServicio" value="<?php echo ($pago['fecha_pago'])  ?>" placeholder="Fecha de Servicio" disabled>
                        </div>

                        <div class="col-md-4">
                            <label id="fecha">Fecha Pago Actual</label>
                            <input type="date" name="fechaVencimiento" value="<?php echo $fecha ?>" placeholder="Fecha de Vencimiento" disabled>
                        </div>

                    </div>

                    <?php
                    foreach ($factura as $item) :

                    ?>
                        <div class="row" id="orden">
                            <div class="col md 12" id="orden">

                                <input type="text" name="ordenServicio" value=" <?php echo session()->get('nombre') ?>" required="required">
                            </div>
                        </div>

                        <div class="row" id="orden">
                            <div class="col md 12" id="orden">
                                <input type="text" name="contacto" value=" <?php echo $item['ciudad'] ?>" placeholder="Contacto" required="required">
                            </div>
                        </div>

                        <div class="row" id="orden">
                            <div class="col md 12" id="contacto">
                                <input type="text" name="marcaVehiculo" value="<?php echo $item['pais'] ?> " placeholder="Marca Vehiculo" required="required">
                            </div>
                        </div>

                        <div class="row" id="orden">
                            <div class="col md 12" id="contacto">
                                <input type="text" name="modelo" value="<?php echo $item['direccion'] ?> " placeholder="Modelo" required="required">
                            </div>
                        </div>

                        <div class="row" id="orden">
                            <div class="col md 12" id="contacto">
                                <input type="text" name="placa" value="250000" placeholder="Placa" required="required">
                            </div>
                        </div>

                        <?php
                        $anterior = new DateTime($pago['fecha_pago']);
                        $actual= new DateTime($fecha);
                        //  $interval = $anterior->diff($actual);    
                        echo($anterior);
                        echo($actual);
                        // echo($interval)
                        ?>
                        <div class="row" id="orden">
                            <div class="col md 12" id="contacto">
                                <input type="text" name="nombreAplicador" value="<?php ?> " placeholder="Nombre del Aplicador" required="required">
                            </div>
                        </div>

                        <div class="row" id="orden">
                            <div class="col md 12" id="contacto">
                                <input type="text" name="cedulaAplicador" value="<?php ?> " placeholder="Cedula del Aplicador" required="required">
                            </div>
                        </div>
                    <?php
                    endforeach
                    ?>


                </form>

            </section>

            <footer id="footer">

                <p>Cualquier inquietud contactarse con</p>
                <p>Pepito Perez</p>
                <p>Cel: 314 751 45 77</p>
                <p>bpmasesorias01@gmail.com</p>

            </footer>

            <div class="row" id="boton1">
                <div class="col-md-4">
                    <button type="submit" name="btnpdf" class="btn btn-primary boton">Pagar</button>
                </div>
            </div>
    </main>



    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>