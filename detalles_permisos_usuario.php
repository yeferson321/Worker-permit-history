<?php include("includes/header.php") ?>
<?php include("includes/nav_usuario.php") ?>

<?php

if (!key_exists('Cedula', $_COOKIE)) { 

    header("Location:inicia.php");

  } 
?>

<div class="Titulo">

    <h4>Detalles De La solicitud</h4>

    <form class="row g-3" method="POST" action="" name="procesar">

        <div class="col-auto">
            <select name='Accion' class="form-select form-select-sm" aria-label=".form-select-sm example">
                <option selected>Acción</option>
                <option value="1">Eliminar Solicitud</option>
                <option value="2">Actualizar Informacion</option>
            </select>
        </div>

        <div class="col-auto">
            <button type="submit" name="procesar" class="btn btn-primary button2 btn-sm">Realizar</button>
        </div>

    </form>

</div>

<?php

include("conexion.php");

if (isset($_POST['procesar'])) {

    $accion = $_POST['Accion'];
    $text = "eliminado";
    $id = $_GET['id'];

    if ($accion == 1) {

        $id = $_GET['id'];

        $c = sqlsrv_connect($serverName, $connectionInfo);

        $sql = "SELECT archivo1 from PERMISOS where permisos_id = $id;";

        $stmt = sqlsrv_query($conn, $sql);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }

        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            $archivo1 = $row['archivo1'];
        }

        if (file_exists($archivo1)) {
            unlink($archivo1);
        }

        $c = sqlsrv_connect($serverName, $connectionInfo);

        $sql = "DELETE FROM PERMISOS WHERE permisos_id = '$id'";

        $stmt = sqlsrv_query($conn, $sql);

        header("Location:permisos_usuario.php?id=$text");

    } else if ($accion == 2) {

        $id = $_GET['id'];

        setcookie("id", "$id", time() + 14600);

        header("Location:actualizar_permisos_usuario.php");
    }
}

?>


<?php

include("conexion.php");

$id = $_GET['id'];

$c = sqlsrv_connect($serverName, $connectionInfo);

$sql = "SELECT permisos_id, grupo, lider, tipo_ausencia, observacion, dias_horas, numero, fecha_salida, fecha_entrada, id_usuario, estado, detalles, usuario, fecha, archivo1 from PERMISOS where permisos_id = $id;";

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
    $archivo1 = $row['archivo1'];
    $espacio = "  ";
}

?>

<div class="roww">
    <div class="row row-cols-1 row-cols-md-4 g-4">
        <div class="col">
            <div class="card h-100">
                <div class="card-body">
                    <label for="exampleInputPassword1" class="form-label">Nombre de Usuario</label>
                    <h6><?php if (isset($usuario)) echo $usuario  ?></h6>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <div class="card-body">
                    <label for="exampleInputPassword1" class="form-label">Grupo o Cargo</label>
                    <h6><?php if (isset($grupo)) echo $grupo  ?></h6>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <div class="card-body">
                    <label for="exampleInputPassword1" class="form-label">Lider De Proceso</label>
                    <h6><?php if (isset($lider)) echo $lider ?></h6>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <div class="card-body">
                    <label for="exampleInputPassword1" class="form-label">Tipo De Ausencia</label>
                    <h6><?php if (isset($tipo_ausencia)) echo $tipo_ausencia?></h6>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <div class="card-body">
                    <label for="exampleInputPassword1" class="form-label">Tiempo Solicitado</label>
                    <h6><?php if (isset($numero, $dias_horas)) echo $numero .'  '. $dias_horas ?></h6>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <div class="card-body">
                    <label for="exampleInputPassword1" class="form-label">Fecha De Salida Y Entrada</label>
                    <h6><?php if (isset($fecha_salida, $fecha_entrada)) echo $fecha_salida ."  ". $fecha_entrada ?></h6>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <div class="card-body">
                    <label for="exampleInputPassword1" class="form-label">Detalles y Observacion Sobre El Permiso</label>
                    <h6><?php if (isset($observacion)) echo $observacion?></h6>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <div class="card-body">
                    <div class="col-auto">
                        <label for="exampleInputPassword1" class="form-label">Archivo PDF</label>

                        <?php

                        if (isset($archivo1)){ 
                        

                        if (file_exists($archivo1)) { ?>

                            <button type="submit" name="procesar" class="btn btn-primary button2 btn-sm"><a style="color: #fff; text-decoration: none; display: flex;  justify-content: center; align-items: center;" href="http://172.30.0.3:83/gestion/<?php echo $archivo1 ?>" class="alert-link"><svg xmlns="http://www.w3.org/2000/svg" width="19" height="20" fill="currentColor" class="bi bi-file-earmark-zip" viewBox="0 0 16 16">
                                        <path d="M5 7.5a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v.938l.4 1.599a1 1 0 0 1-.416 1.074l-.93.62a1 1 0 0 1-1.11 0l-.929-.62a1 1 0 0 1-.415-1.074L5 8.438V7.5zm2 0H6v.938a1 1 0 0 1-.03.243l-.4 1.598.93.62.929-.62-.4-1.598A1 1 0 0 1 7 8.438V7.5z" />
                                        <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1h-2v1h-1v1h1v1h-1v1h1v1H6V5H5V4h1V3H5V2h1V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z" />
                                    </svg> Archivo</a></button>

                        <?php } else { ?>

                            <button type="submit" name="procesar" class="btn btn-primary button2 btn-sm"><a style="color: #fff; text-decoration: none; display: flex;  justify-content: center; align-items: center;" class="alert-link"><svg xmlns="http://www.w3.org/2000/svg" width="19" height="20" fill="currentColor" class="bi bi-file-earmark-zip" viewBox="0 0 16 16">
                                        <path d="M5 7.5a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v.938l.4 1.599a1 1 0 0 1-.416 1.074l-.93.62a1 1 0 0 1-1.11 0l-.929-.62a1 1 0 0 1-.415-1.074L5 8.438V7.5zm2 0H6v.938a1 1 0 0 1-.03.243l-.4 1.598.93.62.929-.62-.4-1.598A1 1 0 0 1 7 8.438V7.5z" />
                                        <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1h-2v1h-1v1h1v1h-1v1h1v1H6V5H5V4h1V3H5V2h1V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z" />
                                    </svg>No Tienes Ningun Archivo</a></button>

                        <?php }}
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <div class="card-body">
                    <label for="exampleInputPassword1" class="form-label">Fecha del Permiso</label>
                    <h6><?php if (isset($fecha)) echo $fecha ?></h6>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">

    <?php

    include("conexion.php");

    $id = $_GET['id'];

    $c = sqlsrv_connect($serverName, $connectionInfo);

    $sql = "SELECT (case when estado='Rechazado' THEN 'Su Solicitud Fue Rechazada' when estado='Pendiente' THEN 'Su Solicitud Aun No Ha Sido Aprobada' when estado='Aceptado' THEN 'Su Solicitud Ha Sido Aprobada' END )  AS estado from permisos WHERE permisos_id = '$id'";

    $sql2 = "SELECT detalles from PERMISOS where permisos_id = '$id'";

    $stmt = sqlsrv_query($conn, $sql);

    $stmt2 = sqlsrv_query($conn, $sql2);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $estado = $row['estado'];
    }

    while ($row = sqlsrv_fetch_array($stmt2, SQLSRV_FETCH_ASSOC)) {
        $detalles = $row['detalles'];
    }

    ?>

    <div class="Titulo2">
        <h4><?php if (isset($estado)) echo $estado ?></h4>
    </div>

    <div class="Titulo2">
        <h6><?php  if (isset($detalles)) echo $detalles ?></h6>
    </div>

</div>

<?php include("includes/footer.php") ?>