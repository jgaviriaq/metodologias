<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="fabicon/x-icon" href="img/BPM ASESORIAS.jpg" />
    <title>Factura Administración</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/public/assets/css/styless.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>

<body>
    <main>
        <section id="info">
            <div class="">
                <div id="banner1">
                    <h1>Pagos Administración</h1>
                </div>
                <div>
                    <p class="parrafo">
                        A continuación se muestra la factua del pago de la Administración correspondiente al mes actual
                    </p>
                </div>
            </div>
        </section>
        <section class="container-fluid">
        <?php foreach ($factura as $item) : ?>
            <?php $pagos = base_url() . "/public/addPagos?id={$item['id_apartamento']}"; ?>

            <form id="form" action="<?php echo $pagos ?>" method="POST">

                <div class="row justify-content-center">

                    <div class="col-md-4">
                        <label id="fecha">Fecha Pago Anterior</label>
                        <input type="date" name="fechaServicio" value="<?php echo ($pago['fecha_pago'])  ?>" placeholder="Fecha de Servicio" readonly>
                    </div>

                    <div class="col-md-4">
                        <label id="fecha">Fecha Pago Actual</label>
                        <input type="date" name="fechaVencimiento" value="<?php echo $fecha ?>" placeholder="Fecha de Vencimiento" readonly>
                    </div>

                </div>

                <section class="m-auto">
                
                    <div class="mt-5 row justify-content-center" id="orden">
                       
                        <div class="col-md-4" id="orden">
                            <label for="contacto">Propietario: </label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="contacto" id="contacto" value=" <?php echo session()->get('nombre') ?>" readonly>
                        </div>
                    </div>

                    <div class="row justify-content-center justify-content-space-between" id="orden">
                        <div class="col-md-4" id="orden">
                            <label for="ciudad">Ciudad: </label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="ciudad" id="ciudad" value=" <?php echo $item['ciudad'] ?>" placeholder="ciudad" readonly>
                        </div>
                    </div>

                    <div class="row justify-content-center" id="orden">
                        <div class="col-md-4" id="contacto">
                            <label for="pais">País: </label>
                        </div>
                        <div class="col-md-8">
                        <input type="text" name="pais" id="pais" value="<?php echo $item['pais'] ?> " placeholder="País" readonly>
                        </div>
                    </div>

                    <div class="row justify-content-center" id="orden">
                        <div class="col-md-4" id="contacto">
                            <label for="direccion">Dirección:</label>
                        </div>
                        <div class="col-md-8">
                        <input type="text" name="direccion" id="direccion" value="<?php echo $item['direccion'] ?> " placeholder="Dirección" readonly>
                        </div>
                    </div>

                    <div class="row justify-content-center justify-content-center" id="orden">
                        <div class="col-md-4" id="contacto">
                            <label for="valor">Valor Cuota Administración: </label>
                        </div>
                        <div class="col-md-8">
                        <input type="text" name="valor" id="valor" value="$250.000" placeholder="Placa" readonly />
                        </div>
                    </div>

                    <?php
                    // $mes;
                    function get_format($df)
                    {
                        $str = '';
                        $str .= ($df->invert == 1) ? ' - ' : '';
                        if ($df->y > 0) {
                            // years
                            $str .= ($df->y > 1) ? $df->y . ' Years ' : $df->y . ' Year ';
                        }
                        if ($df->m > 0) {
                            // month
                            $str .= ($df->m > 1) ? $df->m . ' Months ' : $df->m . ' Month ';
                        }
                        if ($df->d > 0) {
                            // days
                            $str .= ($df->d > 1) ? $df->d . ' Days ' : $df->d . ' Day ';
                        }

                        echo $str;
                    }

                    $anterior = new DateTime($pago['fecha_pago']);
                    $actual = new DateTime($fecha);
                    $interval = $anterior->diff($actual);

                    ?>

                    <div class="row justify-content-center" id="orden">
                        <div class="col-md-4" id="contacto">
                            <label for="fechas">Intervalo de fechas: </label>
                        </div>
                        <div class="col-md-8">
                        <input type="text" name="nombreAplicador" value="<?php echo get_format($interval) ?> " placeholder="Nombre del Aplicador" readonly>
                        </div>
                    </div>

                    <div >
                        <?php
                        $precio = 250000;
                        if ($interval->m < 1) {
                            $valor = $precio;
                        } else 
                                            if ($interval->m === 1 && $interval->d === 0) {
                            $valor = $precio;
                        } else if ($interval->m >= 1 && $interval->d > 0 && $interval->m < 5) {
                            $total =  $precio * 0.03;
                            $valor = $precio + $total;
                            $valor = $valor * $interval->m;
                        } else if ($interval->m >= 5 && $interval->d >= 0) {
                            $total =  $precio * 0.03;
                            $valor = $precio + $total;
                            $valor = $valor * $interval->m;
                            echo 'Debido a que llevas más de 5 meses sin pagar, acabas de entrar a proceso juridico';
                        }
                        ?>
                    </div>

                    <div class="row justify-content-center" id="orden">
                        <div class="col-md-4" id="contacto">
                            <label for="mora">Total a Pagar: </label>
                        </div>
                        <div class="col-md-8">
                            
                        <input type="text" name="mora" id="mora" value="<?php echo $valor ?> " placeholder="Valor con Mora" readonly>
                        </div>
                    </div>
                <?php
                endforeach
                ?>

                <div class="mt-5 mb-3 d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> Pagar</button>
                </div>
                </section>
            </form>
        </section>

        <footer id="footer">
            <p>Cualquier inquietud contactarse con</p>
            <p>Pepito Perez</p>
            <p>Cel: 314 751 45 77</p>
            <p>bpmasesorias01@gmail.com</p>

        </footer>


    </main>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>