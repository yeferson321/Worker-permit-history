<?php include("includes/header.php") ?>
<?php include("includes/nav_admin2.php") ?>

<?php

if (!key_exists('Correo', $_COOKIE)) { 

    header("Location:inicio_admin.php");

  } 
?>

<div class="Titulo">
    <h4>Detalles De solicitud</h4>
</div>

<?php

include("conexion.php");

$id = $_GET['id'];

$c = sqlsrv_connect($serverName, $connectionInfo);

$sql = "SELECT permisos_id, grupo, lider, tipo_ausencia, observacion, dias_horas, numero, fecha_salida, fecha_entrada, id_usuario, estado, detalles, usuario, fecha, archivo1, correouser from PERMISOS where permisos_id = $id;";

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
    $correouser = $row['correouser'];
}

?>

<div class="roww">
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
                    <h6><?php echo $grupo ?></h6>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <div class="card-body">
                    <label for="exampleInputPassword1" class="form-label">Lider De Proceso</label>
                    <h6><?php echo $lider ?></h6>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <div class="card-body">
                    <label for="exampleInputPassword1" class="form-label">Tipo De Ausencia</label>
                    <h6><?php echo $tipo_ausencia ?></h6>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <div class="card-body">
                    <label for="exampleInputPassword1" class="form-label">Tiempo Solicitado</label>
                    <h6><?php echo $numero ?> <?php echo $dias_horas ?></h6>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <div class="card-body">
                    <label for="exampleInputPassword1" class="form-label">Fecha De Salida Y Entrada</label>
                    <h6><?php echo $fecha_salida, '&nbsp &nbsp &nbsp', $fecha_entrada ?></h6>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <div class="card-body">
                    <label for="exampleInputPassword1" class="form-label">Detalles y Observacion Sobre El Permiso</label>
                    <h6><?php echo $observacion ?></h6>
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

                        <?php

                        if (file_exists($archivo1)) { ?>

                            <button type="submit" name="procesar" class="btn btn-primary button2 btn-sm"><a style="color: #fff; text-decoration: none; display: flex;  justify-content: center; align-items: center;" href="http://172.30.0.3:83/gestion/<?php echo $archivo1 ?>" class="alert-link"><svg xmlns="http://www.w3.org/2000/svg" width="19" height="20" fill="currentColor" class="bi bi-file-earmark-zip" viewBox="0 0 16 16">
                                        <path d="M5 7.5a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v.938l.4 1.599a1 1 0 0 1-.416 1.074l-.93.62a1 1 0 0 1-1.11 0l-.929-.62a1 1 0 0 1-.415-1.074L5 8.438V7.5zm2 0H6v.938a1 1 0 0 1-.03.243l-.4 1.598.93.62.929-.62-.4-1.598A1 1 0 0 1 7 8.438V7.5z" />
                                        <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1h-2v1h-1v1h1v1h-1v1h1v1H6V5H5V4h1V3H5V2h1V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z" />
                                    </svg> Archivo PDF</a></button>

                        <?php } else { ?>

                            <button type="submit" name="procesar" class="btn btn-primary button2 btn-sm"><a style="color: #fff; text-decoration: none; display: flex;  justify-content: center; align-items: center;" class="alert-link"><svg xmlns="http://www.w3.org/2000/svg" width="19" height="20" fill="currentColor" class="bi bi-file-earmark-zip" viewBox="0 0 16 16">
                                        <path d="M5 7.5a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v.938l.4 1.599a1 1 0 0 1-.416 1.074l-.93.62a1 1 0 0 1-1.11 0l-.929-.62a1 1 0 0 1-.415-1.074L5 8.438V7.5zm2 0H6v.938a1 1 0 0 1-.03.243l-.4 1.598.93.62.929-.62-.4-1.598A1 1 0 0 1 7 8.438V7.5z" />
                                        <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1h-2v1h-1v1h1v1h-1v1h1v1H6V5H5V4h1V3H5V2h1V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z" />
                                    </svg> No Tienes Ningun Archivo</a></button>

                        <?php }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="container">

    <div class="Titulo2">
        <h4>Responde la solicitud</h4>
    </div>

    <?php

    include("conexion.php");

    $id = $_GET['id'];

    $c = sqlsrv_connect($serverName, $connectionInfo);

    $sql = "SELECT detalles from PERMISOS where id_usuario = '$id'";

    $sql2 = "SELECT estado from PERMISOS where id_usuario = '$id'";

    $stmt = sqlsrv_query($conn, $sql);

    $stmt2 = sqlsrv_query($conn, $sql2);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $detalles = $row['detalles'];
    }

    while ($row = sqlsrv_fetch_array($stmt2, SQLSRV_FETCH_ASSOC)) {
        $estado = $row['estado'];
    }

    ?>

    <form class="form1" method="POST" action="" name="proceso">

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Observaciones</label>
            <textarea name='Observaciones' class="form-control formcontrol" id="exampleFormControlTextarea1" placeholder="<?php echo $detalles ?>" placeholder="" rows="3" required></textarea>
        </div>

        <select name="Respuesta" class="form-select form-select-sm" aria-label=".form-select-sm example" required>
            <option selected><?php echo $estado ?></option>
            <option value="Rechazado">Rechazar</option>
            <option value="Aceptado">Aceptar</option>
        </select>

        <button type="submit" name="proceso" class="btn btn-primary button1">Responder solicitud</button>

    </form>

</div>

<?php

// Import PHPMailer classes into the global namespace 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer library files 
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';


if (isset($_POST['proceso'])) {

    include("conexion.php");

    $c = sqlsrv_connect($serverName, $connectionInfo);

    $id = $_GET['id'];
    $Observaciones = $_POST['Observaciones'];
    $Respuesta = $_POST['Respuesta'];

    if ($Respuesta == "Aceptado") {

        $id = $_GET['id'];

        $c = sqlsrv_connect($serverName, $connectionInfo);

    }

    $query = "UPDATE PERMISOS SET detalles = '$Observaciones', estado = '$Respuesta' WHERE permisos_id = '$id';";

    $Post = sqlsrv_query($c, $query);

    $sql = "SELECT detalles FROM PERMISOS WHERE permisos_id = '$id';";

    $stmt = sqlsrv_query($conn, $sql);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $detallespermiso = $row['detalles'];
    }

    if ($Post) {
        // Create an instance of PHPMailer class 
        $mail = new PHPMailer;
        $SMTP_BLOCK = "0";

        // SMTP configuration
        $mail->isSMTP();
        $mail->Host     = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'reportesccq@gmail.com';
        $mail->Password = 'lazznqpzijzelmjk';
        $mail->SMTPSecure = 'tls';
        $mail->Port     = 587;

        // Sender info 
        $mail->setFrom('reportesccq@gmail.com', 'Gestion');
        $mail->addReplyTo($correouser);

        // Add a recipient 
        $mail->addAddress($correouser);

        // Email subject 
        $mail->Subject = 'Gestion Humana';

        // Set email format to HTML 
        $mail->isHTML(true);

        // Email body content 
        $mailContent = "<h2> <h2 style='text-align: center; color: #26906C; font-family: inherit;'>Estado De Permisos<h2/> <br> <h2 style='text-align: center; color: #26906C;'>Respuesta a tu solicitud de permiso generada el dia {$fecha} <br> como {$tipo_ausencia}<br> <h3 style='text-align: center; color: #242424;'>El estado de solicitud es {$Respuesta} <br>Detalles: {$detallespermiso}<h3/> <br> <h3 style='text-align: center; color: #242424;'> Inicia sesion en tu cuenta aqui http://172.30.0.3:83/gestion/inicia.php<h3/> <br> <p style='text-align: center; color: #88898c;'>¡No responder a este correo!, si la informacion no corresponde ignorar el mensaje<p> <h2/>";
        $mail->Body = $mailContent;

        // Send email 
        if (!$mail->send()) {
        }

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
                        Tu Respuesta Ha Sido Guardada
                    </div>
                </div>
            </div>
        </div>

    <?php } else { ?>

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
                        Es Probable Que Alguno De Sus Datos Este Incorrecto
                    </div>
                </div>
            </div>
        </div>

<?php }
} ?>

<?php include("includes/footer.php") ?>