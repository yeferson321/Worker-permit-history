<?php include("includes/header.php") ?>
<?php include("includes/nav.php") ?>

<div class="Titulo">
    <h4>Detalles De solicitud</h4>
</div>

<?php

include("conexion.php");

$id = $_GET['id'];

$c = sqlsrv_connect($serverName, $connectionInfo);

$sql = "SELECT permisos_id, grupo, lider, tipo_ausencia, observacion, dias_horas, numero, fecha_salida, fecha_entrada, id_usuario, estado, detalles, usuario from PERMISOS where permisos_id = $id;";

$stmt = sqlsrv_query($conn, $sql);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    $permisos_id = $row['permisos_id'];
    $grupo = $row['grupo'];
    $lider = $row['lider'];
    $tipo_ausencia = $row['tipo_ausencia'];
    $observacion = $row['observacion'];
    $dias_horas = $row['dias_horas'];
    $numero = $row['numero'];
    $fecha_salida = $row['fecha_salida']->format('d/m/Y');
    $fecha_entrada = $row['fecha_entrada']->format('d/m/Y');
    $id_usuario = $row['id_usuario'];
    $estado = $row['estado'];
    $detalles = $row['detalles'];
    $usuario = $row['usuario'];
    $fecha = $row['fecha']->format('d/m/Y');
}

?>

<div class="container-principal">

    <div class="container-primar2">

        <div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Nombre de Usuario</label>
                <h6><?php echo $usuario ?></h6>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Grupo o Cargo</label>
                <h6><?php echo $grupo ?></h6>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Lider De Droceso</label>
                <h6><?php echo $lider ?></h6>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Tipo De Ausencia</label>
                <h6><?php echo $tipo_ausencia ?></h6>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Tiempo Solicitado</label>
                <h6><?php echo $numero ?> <?php echo $dias_horas ?></h6>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Fecha De Salida</label>
                <h6><?php echo $fecha_salida ?></h6>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Fecha De Ingreso</label>
                <h6><?php echo $fecha_entrada ?></h6>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label"></label>
                <h6><?php echo $observacion ?></h6>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Fecha De Publicaion</label>
                <h6><?php echo $fecha?></h6>
            </div>
        </div>

    </div>

    <div class="divider"></div>

    <div class="container-secondary">

        <div class="Titulo2">
            <h4>Respuesta De solicitud</h4>
        </div>


        <form class="form1" method="POST" action="" name="proceso">

            
            

        </form>

    </div>

</div>

<?php

if (isset($_POST['proceso'])) {

    include("conexion.php");

    $c = sqlsrv_connect($serverName, $connectionInfo);

    $id = $_GET['id'];
    $Observaciones = $_POST['Observaciones'];
    $Respuesta = $_POST['Respuesta'];

    $query = "UPDATE PERMISOS SET detalles = '$Observaciones', estado = '$Respuesta' WHERE permisos_id = '$id';";

    $Post = sqlsrv_query($c, $query);

    if ($Post) { ?>

        <div class="alert alert-warning" role="alert">
            <div>
                Tu Respuesta Ha Sido Guardada
            </div>
        </div>

    <?php } else { ?>

        <div class="alert alert-warning" role="alert">
            <div>
                Es Probable Que Alguno De Sus Datos Este Incorrecto
            </div>
        </div>

<?php }
} ?>

<?php include("includes/footer.php") ?>