<?php include("includes/header.php") ?>

<form class="form" method="POST" action="" name="procesa">

    <div class="mb-4">
        <img src="static files/CENTRAL.png" width="160" />
    </div>

    <div class="mb-3">
        <h3>Inicia sesion</h3>
    </div>

    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Correo</label>
        <input name='Correo' value="<?php if (isset($_POST['Correo'])) echo $_POST['Correo'] ?>" type="text" class="form-control" id="exampleInputPassword1" required>
    </div>

    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Contraseña</label>
        <input name='Password' type="password" class="form-control" id="exampleInputPassword1" required>
    </div>

    <button type="submit" name="procesa" id="btn" class="btn btn-primary button1">Iniciar</button>

    <div class="mb-3">
        <span class="title_span">
            ¿No tienes una cuenta?
            <a class="link-to" href="http://172.30.0.3:83/gestion/registro.php">Registrate</a>
        </span>
    </div>

    <div class="mb-3">
        <span class="title_span">
            ¿Eres administrador?
            <a class="link-to" href="http://172.30.0.3:83/gestion/inicio_admin.php">Inicia aquí</a>
        </span>
    </div>

    <div class="mb-3">
        <span class="title_span">
            Recuperar Contraseña
            <a class="link-to" href="http://172.30.0.3:83/gestion/recuperar.php">Aquí</a>
        </span>
    </div>

</form>

<?php

if (isset($_POST['procesa'])) {

    include("conexion.php");

    $c = sqlsrv_connect($serverName, $connectionInfo);

    $Correo = $_POST['Correo'];
    $Password = $_POST['Password'];

    $query = "SELECT correo, contraseña FROM USUARIOS WHERE correo = '$Correo' and contraseña = '$Password'";

    $Post = sqlsrv_query($c, $query);

    while ($f = sqlsrv_fetch_array($Post, SQLSRV_FETCH_ASSOC)) {

        if (!isset($correodb, $contraseñadb)) {
            $correodb = $f['correo'];
            $contraseñadb = $f['contraseña'];
        }
    }
?>
    <?php

    if (!isset($correodb, $contraseñadb)) {
        $correodb = $f['correo'];
        $contraseñadb = $f['contraseña'];
    }

    if ($Correo == $correodb and $Password == $contraseñadb) {

        if ($Correo == "lidergestion@clinicacentral.co") { ?>

            <div class="alert alert-warning" role="alert">
                <div>
                    Su Usuario pertenece a una cuenta de administrador <a href="http://172.30.0.3:83/gestion/inicia.php" class="alert-link">Inicia Aqui</a>
                </div>
            </div>

        <?php
        } else {

            $query = "SELECT correo, contraseña, nombres_apellidos, cedula, area FROM USUARIOS WHERE correo = '$Correo' and contraseña = '$Password'";

            $Post = sqlsrv_query($c, $query);

            while ($f = sqlsrv_fetch_array($Post, SQLSRV_FETCH_ASSOC)) {

                if (!isset($ceduladb, $nombredb, $correodb)) {
                    $ceduladb = $f['cedula'];
                    $nombredb = $f['nombres_apellidos'];
                    $correodb = $f['correo'];
                }
            }

            $query2 = "SELECT puntos FROM PUNTOS WHERE id_usuario = '$ceduladb'";

            $Post2 = sqlsrv_query($c, $query2);

            while ($f = sqlsrv_fetch_array($Post2, SQLSRV_FETCH_ASSOC)) {

                if (!isset($puntosdb)) {
                    $puntosdb = $f['puntos'];
                }
            }

            ob_start();  
            
            header("Location:perfil.php");

            setcookie("Cedula", "$ceduladb", time() + 14600);
            setcookie("Nombre", "$nombredb", time() + 14600);
            setcookie("Correo", "$correodb", time() + 14600);
            setcookie("Puntos", "$puntosdb", time() + 14600);
        }
 
    } else { ?>

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
                        Hola, Su Usuario o Contraseña Son Incorrectos
                    </div>
                </div>
            </div>
        </div>

    <?php } ?>

<?php } ?>

<?php include("includes/footer.php") ?>