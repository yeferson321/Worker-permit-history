<?php include("includes/header.php") ?>

<form class="form" method="POST" action="" name="procesa">

    <div class="mb-4">
        <img src="static files/CENTRAL.png" width="160" />
    </div>

    <div class="mb-3">
        <h3>Recuperar Contraseña</h3>
    </div>

    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Correo</label>
        <input name='Correo' value="<?php if (isset($_POST['Correo'])) echo $_POST['Correo'] ?>" type="text" class="form-control" id="exampleInputPassword1" required>
    </div>

    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Cedula</label>
        <input name='Cedula' type="text" value="<?php if (isset($_POST['Cedula'])) echo $_POST['Cedula'] ?>" class="form-control" id="exampleInputPassword1" required>
    </div>

    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Nueva Contraseña</label>
        <input name='Contraseña' type="password" class="form-control" id="exampleInputPassword1" required>
    </div>

    <button type="submit" name="procesa" id="btn" class="btn btn-primary button1">Cambiar</button>

    <div class="mb-3">
        <span class="title_span">
            Reperar Contraseña
            <a class="link-to" href="http://172.30.0.3:83/gestion/inicia.php">Inicia aquí</a>
        </span>
    </div>

</form>

<?php

if (isset($_POST['procesa'])) {

    include("conexion.php");

    $c = sqlsrv_connect($serverName, $connectionInfo);

    $Correo = $_POST['Correo'];
    $Cedula = $_POST['Cedula'];
    $Contraseña = $_POST['Contraseña'];

    $query1 = "SELECT * FROM USUARIOS WHERE correo = '$Correo' and cedula = '$Cedula'";

    $Post = sqlsrv_query($c, $query1);

    while ($f = sqlsrv_fetch_array($Post, SQLSRV_FETCH_ASSOC)) {

        if (!isset($Correodb, $Ceduladb)) {
            $Correodb = $f['correo'];
            $Ceduladb = $f['cedula'];
        }
    }

    if (!isset($Correodb, $Ceduladb)) {
        $Correodb = $f['correo'];
        $Ceduladb = $f['cedula'];
    }

    if ($Correo == $Correodb and $Cedula == $Ceduladb) {

        $query = "UPDATE USUARIOS SET contraseña = '$Contraseña' WHERE correo = '$Correo' and cedula = '$Cedula'";
        $Post = sqlsrv_query($c, $query);

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
                        Hola, Su Contraseña Se Actualizo Correctamente <a href="http://172.30.0.3:83/gestion/inicia.php" class="alert-link">Inicia Aqui</a>
                    </div>
                </div>
            </div>
        </div>

    <?php

    } else {

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
                        Hola, Los Datos Ingresados No Corresponden A Ningun Usuario
                    </div>
                </div>
            </div>
        </div>

<?php
    }
} else {
}

?>

<?php include("includes/footer.php") ?>