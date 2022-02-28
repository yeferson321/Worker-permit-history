<?php include("includes/header.php") ?>
<?php include("includes/nav_usuario.php") ?>

<?php

if (!key_exists('Cedula', $_COOKIE)) { 

    header("Location:inicia.php");

  } 
?>

<div class="Titulo">

    <h4>Detalles De La solicitud</h4>

</div>

<?php

include("conexion.php");

$id = $_COOKIE["id"];

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
    $archivo1 = $row['archivo1'];
    $fecha = $row['fecha']->format('d/m/Y');
}

?>


<div class="roww">

    <form method="POST" name="procesar" enctype="multipart/form-data">

        <div class="row row-cols-1 row-cols-md-4 g-4">
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <label for="exampleInputPassword1" class="form-label">Nombre de Usuario</label>
                        <h6><?php echo $usuario ?></h6>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <label for="exampleInputPassword1" class="form-label">Grupo o Cargo</label>
                        <select name='Grupo' class="form-select form-select-sm" aria-label=".form-select-sm example">
                            <option selected><?php echo $grupo ?></option>
                            <option value="Audifarma">Audifarma</option>
                            <option value="Auxiliar Caja">Auxiliar Caja</option>
                            <option value="Auxiliar Contable">Auxiliar Contable</option>
                            <option value="Auxiliar de Enfermeria">Auxiliar de Enfermeria</option>
                            <option value="Auxiliar Contable">Auxiliar Contable</option>
                            <option value="Admistrativo">Admistrativo</option>
                            <option value="Inventarios">Inventarios</option>
                            <option value="Sistemas">Sistemas</option>
                            <option value="Tesoreria">Tesoreria</option>
                            <option value="Cartera">Cartera</option>
                            <option value="Compras">Compras</option>
                            <option value="Consultar Saldos">Consultar Saldos</option>
                            <option value="Coordinacion Implante">Coordinacion Implante</option>
                            <option value="Cirugia">Cirugia</option>
                            <option value="Cuidar">Cuidar</option>
                            <option value="Mantenimiento">Mantenimiento</option>
                            <option value="Medico Expecialista">Medico Expecialista</option>
                            <option value="Medico General">Medico General</option>
                            <option value="Medico General Cuidar">Medico General Cuidar</option>
                            <option value="Direccion Administrativa">Direccion Administrativa</option>
                            <option value="Direccion Financiera">Direccion Financiera</option>
                            <option value="Enfermero(a)">Enfermero(a)</option>
                            <option value="Contabilidad">Contabilidad</option>
                            <option value="Facturacion">Facturacion</option>
                            <option value="Farmacia">Farmacia</option>
                            <option value="Gestion Humana">Gestion Humana</option>
                            <option value="Hospitalizacion">Hospitalizacion</option>
                            <option value="Inventarios">Inventarios</option>
                            <option value="Tesoreria">Tesoreria</option>
                            <option value="Triage">Triage</option>
                            <option value="Urgencias">Urgencias</option>
                            <option value="Uci">Uci</option>
                            <option value="Parametrizacion CX">Parametrizacion CX</option>
                            <option value="Parametrizacion Medicamentos">Parametrizacion Medicamentos</option>
                            <option value="Programacion de Cirugia">Programacion de Cirugia</option>
                            <option value="Servicio al Usuario">Servicio al Usuario</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <label for="exampleInputPassword1" class="form-label">Lider De Proceso</label>
                        <input name="lider" value="<?php echo $lider ?>" type="text" class="form-control" required aria-describedby="emailHelp">
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <label for="exampleInputPassword1" class="form-label">Tipo De Ausencia</label>

                        <select name='Tipo_ausencia' class="form-select form-select-sm" aria-label=".form-select-sm example">
                            <option selected><?php echo $tipo_ausencia ?></option>
                            <option value="SANCION">SANCION</option>
                            <option value="PERMISO NO REMUNERADO">PERMISO NO REMUNERADO</option>
                            <option value="PERMISO REMUNERADO">PERMISO REMUNERADO</option>
                            <option value="INCAPACIDAD NO LIQUIDADA">INCAPACIDAD NO LIQUIDADA</option>
                            <option value="LICENCIA LEY 1468. DIAS">LICENCIA LEY 1468. DIAS</option>
                            <option value="CALAMIDAD DOMESTICA">CALAMIDAD DOMESTICA</option>
                            <option value="ACTIVIDADES EXTRAINSTITUCIONALES REMUNERADAS">ACTIVIDADES EXTRAINSTITUCIONALES
                                REMUNERADAS</option>
                            <option value="ACTIVIDADES EXTRAINSTITUCIONALES NO REMUNERADAS">ACTIVIDADES EXTRAINSTITUCIONALES NO
                                REMUNERADAS</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <label for="exampleInputPassword1" class="form-label">Horas o Dias</label>
                        <select name='Dias_horas' class="form-select form-select-sm" aria-label=".form-select-sm example">
                            <option selected><?php echo $dias_horas ?></option>
                            <option value="Horas">Horas</option>
                            <option value="Dias">Dias</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <label for="exampleInputPassword1" class="form-label">Cantidad de Horas o Dias</label>
                        <input name="numero" value="<?php echo $numero ?>" type="text" class="form-control" required aria-describedby="emailHelp">
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <label for="exampleInputPassword1" class="form-label">Fecha De Salida <?php echo $fecha_salida ?></label>
                        <input name='fecha_salida' type="date" value="<?php $fecha_salida ?>" class="form-control" id="validationCustom01">
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <label for="exampleInputPassword1" class="form-label">Fecha De Entrada <?php echo $fecha_entrada ?></label>
                        <input name='fecha_entrada' type="date" value="<?php $fecha_entrada ?>" class="form-control" id="validationCustom01">
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <label for="exampleInputPassword1" class="form-label">Detalles y Observacion Sobre El Permiso</label>
                        <input name="observacion" value="<?php echo $observacion ?>" type="text" class="form-control" required aria-describedby="emailHelp">
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <label for="exampleInputPassword1" class="form-label">Fecha del Permiso</label>
                        <h6><?php echo $fecha ?></h6>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="col-auto">

                            <label for="exampleInputPassword1" class="form-label">Archivo PDF</label>

                            <input type="file" name='file[]' class="form-control">

                        </div>
                    </div>
                </div>
            </div>
            <div class="col ">
                <div class="card h-100 ">
                    <div class="card-body auto">
                        <div class="col-auto">
                            <button type="submit" name="procesar" class="btn btn-primary button2 btn-sm">Actualizar Datos</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>
</div>

<?php

if (isset($_POST['procesar'])) {

    include("conexion.php");

    if (isset($_FILES['file'])) {

        include("conexion.php");

        $d = $_COOKIE["Cedula"];
        $id = rand(1, 500000);
        $path = "documentos/$d/";
        $nombreArchivo = "Archivo.pdf";
        $nombreArchivoImg = "Archivo.jpeg";
        $nombreArchivoPng = "Archivo.png";

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $countfiles = count($_FILES['file']['name']);
        for ($i = 0; $i < $countfiles; $i++) {

            $filename = $_FILES['file']['name'][$i];
            $tipo_archivo = $_FILES['file']['type'][$i];


            if (file_exists($archivo1) && (empty(!$tipo_archivo))) {

                if ($tipo_archivo == "image/jpeg") {

                    if (file_exists($archivo1)) {
                        unlink($archivo1);
                    }

                    move_uploaded_file($_FILES['file']['tmp_name'][$i], "documentos/$d/" . $filename);

                    $ruta = "$path$filename";

                    $rutanueva = "$path$id$nombreArchivoImg";

                    $nombre = rename("$ruta", "$rutanueva");

                    move_uploaded_file($_FILES['file']['tmp_name'][$i], "documentos/$d/" . $rutanueva);

                    $cookie = $_COOKIE["id"];

                    $c = sqlsrv_connect($serverName, $connectionInfo);

                    $sql = "UPDATE PERMISOS SET archivo1 = '$rutanueva' WHERE permisos_id = '$cookie'";

                    $stmt = sqlsrv_query($conn, $sql);
                } else if ($tipo_archivo == "image/png") {

                    if (file_exists($archivo1)) {
                        unlink($archivo1);
                    }

                    move_uploaded_file($_FILES['file']['tmp_name'][$i], "documentos/$d/" . $filename);

                    $ruta = "$path$filename";

                    $rutanueva = "$path$id$nombreArchivoPng";

                    $nombre = rename("$ruta", "$rutanueva");

                    move_uploaded_file($_FILES['file']['tmp_name'][$i], "documentos/$d/" . $rutanueva);

                    $cookie = $_COOKIE["id"];

                    $c = sqlsrv_connect($serverName, $connectionInfo);

                    $sql = "UPDATE PERMISOS SET archivo1 = '$rutanueva' WHERE permisos_id = '$cookie'";

                    $stmt = sqlsrv_query($conn, $sql);
                } else {

                    if (file_exists($archivo1)) {
                        unlink($archivo1);
                    }

                    move_uploaded_file($_FILES['file']['tmp_name'][$i], "documentos/$d/" . $filename);

                    $ruta = "$path$filename";

                    $rutanueva = "$path$id$nombreArchivo";

                    $nombre = rename("$ruta", "$rutanueva");

                    move_uploaded_file($_FILES['file']['tmp_name'][$i], "documentos/$d/" . $rutanueva);

                    $cookie = $_COOKIE["id"];

                    $c = sqlsrv_connect($serverName, $connectionInfo);

                    $sql = "UPDATE PERMISOS SET archivo1 = '$rutanueva' WHERE permisos_id = '$cookie'";

                    $stmt = sqlsrv_query($conn, $sql);
                }
            } else if (file_exists($archivo1) && (empty($tipo_archivo))) {

                echo".";

            } else if (!file_exists($archivo1)) {
                
                
                if ($tipo_archivo == "image/jpeg") {

                    if (file_exists($archivo1)) {
                        unlink($archivo1);
                    }

                    move_uploaded_file($_FILES['file']['tmp_name'][$i], "documentos/$d/" . $filename);


                    $ruta = "$path$filename";

                    $rutanueva = "$path$id$nombreArchivoImg";

                    $nombre = rename("$ruta", "$rutanueva");

                    move_uploaded_file($_FILES['file']['tmp_name'][$i], "documentos/$d/" . $rutanueva);

                    $cookie = $_COOKIE["id"];

                    $c = sqlsrv_connect($serverName, $connectionInfo);

                    $sql = "UPDATE PERMISOS SET archivo1 = '$rutanueva' WHERE permisos_id = '$cookie'";

                    $stmt = sqlsrv_query($conn, $sql);
                } else if ($tipo_archivo == "image/png") {


                    if (file_exists($archivo1)) {
                        unlink($archivo1);
                    }

                    move_uploaded_file($_FILES['file']['tmp_name'][$i], "documentos/$d/" . $filename);


                    $ruta = "$path$filename";

                    $rutanueva = "$path$id$nombreArchivoPng";



                    $nombre = rename("$ruta", "$rutanueva");

                    move_uploaded_file($_FILES['file']['tmp_name'][$i], "documentos/$d/" . $rutanueva);

                    $cookie = $_COOKIE["id"];

                    $c = sqlsrv_connect($serverName, $connectionInfo);

                    $sql = "UPDATE PERMISOS SET archivo1 = '$rutanueva' WHERE permisos_id = '$cookie'";

                    $stmt = sqlsrv_query($conn, $sql);

                } else if ($tipo_archivo == "application/pdf") {

                    if (file_exists($archivo1)) {
                        unlink($archivo1);
                    }

                    move_uploaded_file($_FILES['file']['tmp_name'][$i], "documentos/$d/" . $filename);


                    $ruta = "$path$filename";

                    $rutanueva = "$path$id$nombreArchivo";

                    $nombre = rename("$ruta", "$rutanueva");

                    move_uploaded_file($_FILES['file']['tmp_name'][$i], "documentos/$d/" . $rutanueva);

                    $cookie = $_COOKIE["id"];

                    $c = sqlsrv_connect($serverName, $connectionInfo);

                    $sql = "UPDATE PERMISOS SET archivo1 = '$rutanueva' WHERE permisos_id = '$cookie'";

                    $stmt = sqlsrv_query($conn, $sql);
                } else{
                    echo ".";
                }
            }
        }
    } else { 

        echo ".";

    }

    $cookie = $_COOKIE["id"];
    $Grupo = $_POST['Grupo'];
    $lider = $_POST['lider'];
    $Tipo_ausencia = $_POST['Tipo_ausencia'];
    $Dias_horas = $_POST['Dias_horas'];
    $numero = $_POST['numero'];
    $fecha_salida = $_POST['fecha_salida'];
    $fecha_entrada = $_POST['fecha_entrada'];
    $observacion = $_POST['observacion'];

    $c = sqlsrv_connect($serverName, $connectionInfo);

    $sql = "UPDATE PERMISOS SET grupo = '$Grupo', lider = '$lider', tipo_ausencia = '$Tipo_ausencia', observacion = '$observacion', dias_horas = '$Dias_horas', numero = '$numero', fecha_salida = '$fecha_salida', fecha_entrada = '$fecha_entrada' WHERE permisos_id = '$cookie'";

    $stmt = sqlsrv_query($conn, $sql);


    if ($stmt or $countfiles) {

        unset($archivo, $archivo1, $archivos, $filename, $tipo_archivo);

        header("Refresh:0");
?>

        <div class="toas">
            <div aria-live="polite" aria-atomic="true" class="position-absolute top-0 end-0 p-3 d-flex justify-content-center align-items-center">
                <!-- Then put toasts within -->
                <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                        <img src="static files/logo.png" width="17" class="rounded me-2" alt="...">
                        <strong class="me-auto">Clinica Central</strong>
                        <small>Justo ahora</small>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">
                        Hola, Datos Actualizados Correctamente
                    </div>
                </div>
            </div>
        </div>

<?php }
} ?>

<?php include("includes/footer.php") ?>