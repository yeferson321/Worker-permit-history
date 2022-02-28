<?php include("includes/header.php") ?>
<?php include("includes/nav.php") ?>

<?php

if (!key_exists('Cedula', $_COOKIE)) { 

    header("Location:inicia.php");

  } 
?>

<?php

if (isset($_GET['id'])) { ?>

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
                Hola, Sus Datos Han Sido Actualizados
            </div>
        </div>
    </div>
</div>

<?php  } ?>


<div class="container-principal">

    <div class="container-primary">

        <div class="sesion">
            <p>Sesion Iniciada (Tu)
            <div class="spinner-grow text-primary" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
            </p>
        </div>

        <img src="static files/undraw_doctors_hwty.svg" width="200">

        <h6><?php echo $_COOKIE["Nombre"] ?></h6>

        <h6><?php echo $_COOKIE["Correo"] ?></h6>

        <div class="sesion">
            <p>Puntos Actuales:</p>
            <h6 style="color: #26906C;"><?php echo $_COOKIE["Puntos"] ?></h6>
        </div>

        <div class="col-auto">
            <button type="submit" class="btn btn-primary button2 btn-sm"><a class="link-to" style="color: aliceblue; text-decoration: none" href="http://172.30.0.3:83/gestion/actualizar_perfil.php">Actualizar Datos</a></button>
        </div>

    </div>

    <div class="divider"></div>

    <div class="container-secondary">

        <form class="form1" method="POST" name="proceso" enctype="multipart/form-data">

            <div class="mb-4">
                <img src="static files/CENTRAL.png" width="160" />
            </div>

            <div class="mb-3">
                <h3>Solicita Tu Permiso</h3>
            </div>

            <label for="exampleInputPassword1" class="form-label">Grupo o Cargo</label>
            <div class="mb-3">
                <select name='Grupo' class="form-select form-select-sm" aria-label=".form-select-sm example">
                    <option selected>Seleccionar</option>
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

            <label for="exampleInputPassword1" class="form-label">Lider Del Proceso</label>
            <div class="mb-3">
                <input name='Lider' type="text" class="form-control" id="exampleInputPassword1" placeholder="Lider Directo (Cada area tiene su lider)" required>
            </div>

            <label for="exampleInputPassword1" class="form-label">Tipo De Ausencia</label>
            <div class="mb-3">
                <select name='Tipo_ausencia' class="form-select form-select-sm" aria-label=".form-select-sm example">
                    <option selected>Seleccionar</option>
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
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Justificacion Y Observacion</label>
                <textarea name='Observacion' class="form-control" id="exampleFormControlTextarea1" placeholder="Justifique su solicitud de permiso " rows="3" required></textarea>
            </div>

            <label for="exampleInputPassword1" class="form-label">Horas o Dias</label>
            <div class="mb-3">
                <select name='Dias_horas' class="form-select form-select-sm" aria-label=".form-select-sm example">
                    <option selected>Seleccionar</option>
                    <option value="Horas">Horas</option>
                    <option value="Dias">Dias</option>
                </select>
            </div>

            <label for="exampleInputPassword1" class="form-label">Cantidad de Horas o Dias</label>
            <div class="mb-3">
                <input name='Numero' type="text" class="form-control" id="exampleInputPassword1" placeholder="Solo digite numeros" required>
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Fecha De Salida</label>
                <input name='Fecha_De_Salida' type="date" class="form-control" id="validationCustom01" required>
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Fecha De Entrada</label>
                <input name='Fecha_De_Entrada' type="date" class="form-control" id="exampleInputPassword1" required>
            </div>

            <label for="exampleInputPassword1" class="form-label">Dar Soporte Con Imagen o Pdf</label>
            <div class="mb-3">
                <input type="file" name='file[]' class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
            </div>

            <button type="submit" name="proceso" class="btn btn-primary button1">Enviar solicitud</button>

        </form>

    </div>

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

    if (isset($_FILES['file'])) {

    }
    
    $d = $_COOKIE["Cedula"];
    $id=rand(1, 500000);
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

        if ($tipo_archivo == "application/pdf" Or "image/jpeg" Or "image/png") {

            move_uploaded_file($_FILES['file']['tmp_name'][$i], "documentos/$d/" . $filename);

            if ($tipo_archivo == "image/jpeg") {
                
                $ruta = "$path$filename";

                $rutanueva = "$path$id$nombreArchivoImg";
    
                $nombre = rename ("$ruta", "$rutanueva");

                move_uploaded_file($_FILES['file']['tmp_name'][$i], "documentos/$d/" . $rutanueva);

            } else if ($tipo_archivo == "image/png") {

                $ruta = "$path$filename";

                $rutanueva = "$path$id$nombreArchivoPng";
    
                $nombre = rename ("$ruta", "$rutanueva");

                move_uploaded_file($_FILES['file']['tmp_name'][$i], "documentos/$d/" . $rutanueva);

            }else {

                $ruta = "$path$filename";

                $rutanueva = "$path$id$nombreArchivo";
    
                $nombre = rename ("$ruta", "$rutanueva");

                move_uploaded_file($_FILES['file']['tmp_name'][$i], "documentos/$d/" . $rutanueva); 

            }

        }
    }

    $c = sqlsrv_connect($serverName, $connectionInfo);

    $Grupo = $_POST['Grupo'];
    $Lider = $_POST['Lider'];
    $Tipo_ausencia = $_POST['Tipo_ausencia'];
    $Observacion = $_POST['Observacion'];
    $Dias_horas = $_POST['Dias_horas'];
    $Numero = $_POST['Numero'];
    $Fecha_De_Salida = $_POST['Fecha_De_Salida'];
    $Fecha_De_Entrada = $_POST['Fecha_De_Entrada'];
    $id_usuario = $_COOKIE["Cedula"];
    $Nombre = $_COOKIE["Nombre"];
    $correo = $_COOKIE["Correo"];
    $estado = "Pendiente";
    $archivo = "$rutanueva";

    date_default_timezone_set('America/Toronto');
    $DateAndTime2 = date('Y-m-d', time());

    $query = "INSERT INTO PERMISOS (grupo, lider, tipo_ausencia, observacion, dias_horas, numero, fecha_salida, fecha_entrada, id_usuario, estado, usuario, fecha, archivo1, correouser)
    VALUES ('$Grupo', '$Lider', '$Tipo_ausencia', '$Observacion', '$Dias_horas', '$Numero', '$Fecha_De_Salida', '$Fecha_De_Entrada', '$id_usuario', '$estado', '$Nombre', '$DateAndTime2', '$archivo', '$correo')";

    $Post = sqlsrv_query($c, $query);

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
        $mail->addReplyTo($correo);

        // Add a recipient 
        $mail->addAddress($correo);

        // Email subject 
        $mail->Subject = 'Gestion Humana';

        // Set email format to HTML 
        $mail->isHTML(true);

        // Email body content 
        $mailContent = "<h2> <h2 style='text-align: center; color: #26906C; font-family: inherit;'>Estado De Permisos<h2/> <br> <h2 style='text-align: center; color: #26906C;'>Se acaba de generar una nueva solicitud de permiso, la cual <br> se encuentra en estado {$estado}<br> <h3 style='text-align: center; color: #242424;'>Tu solicitud sera respondida en poco tiempo, <br>Tipo de permiso: {$Tipo_ausencia},<br> Usuario: {$Nombre}.<br> Area o grupo: {$Grupo}<br>Inicia sesion en tu cuenta aqui http://172.30.0.3:83/gestion/inicia.php<h3/> <br> <p style='text-align: center; color: #88898c;'>¡No responder a este correo!, si la informacion no corresponde ignorar el mensaje<p> <h2/>";
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
                        Hola, Su Solicitud Esta En Proceso
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
                        Hubo Un Problema En Realizar Su Solicidud
                    </div>
                </div>
            </div>
        </div>


<?php }
} ?>


<?php include("includes/footer.php") ?>