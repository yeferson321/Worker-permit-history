<?php include("includes/header.php") ?>
<?php include("includes/nav_admin.php") ?>

<?php

if (!key_exists('Correo', $_COOKIE)) { 

    header("Location:inicio_admin.php");

  } 
?>

<div class="container-principal2">

    <div class="container-primary2">

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

        <h6><?php echo $_COOKIE["Area"] ?></h6>

    </div>

    <div class="divider"></div>

    <div class="container-secondary">

        <div class="row row-cols-1 row-cols-md-2 g-4 alert2">
            <div class="col">
                <div class="card">
                    <div class="card-body card2 alert-primary">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:">
                            <use xlink:href="#info-fill"/>
                        </svg>
                        <?php

                        include("conexion.php");

                        $c = sqlsrv_connect($serverName, $connectionInfo);

                        $sql = "SELECT count(correo) from USUARIOS";

                        $Post = sqlsrv_query($conn, $sql);

                        while ($f = sqlsrv_fetch_array($Post, SQLSRV_FETCH_ASSOC)) {

                            if (!isset($id_usuarios)) {
                                $id_usuarios = $f[''];
                            }?>

                            <a> Usuarios Activos  (<?php echo  $id_usuarios  ?>)</a>

                            <?php }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body card2 alert-success">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:">
                            <use xlink:href="#info-fill" />
                        </svg>
                        <?php

                        include("conexion.php");

                        $c = sqlsrv_connect($serverName, $connectionInfo);

                        $sql = "SELECT count(tipo_ausencia) from PERMISOS WHERE estado = 'Aceptado';";

                        $Post = sqlsrv_query($conn, $sql);

                        while ($f = sqlsrv_fetch_array($Post, SQLSRV_FETCH_ASSOC)) {

                            if (!isset($respuesta)) {
                                $respuesta = $f[''];
                            }?>

                            <a href="http://172.30.0.3:83/gestion/permisos_aceptados.php">Permisos Aceptados (<?php echo  $respuesta ?>)</a>

                            <?php }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body card2 alert-warning">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                        <?php

                        include("conexion.php");

                        $c = sqlsrv_connect($serverName, $connectionInfo);

                        $sql = "SELECT count(tipo_ausencia) from PERMISOS WHERE estado = 'pendiente';";

                        $Post = sqlsrv_query($conn, $sql);

                        while ($f = sqlsrv_fetch_array($Post, SQLSRV_FETCH_ASSOC)) {

                            if (!isset($respuest)) {
                                $respuest = $f[''];
                            }?>

                            <a href="http://172.30.0.3:83/gestion/permisos_admin.php">Permisos Pendientes (<?php echo  $respuest ?>)</a>

                            <?php }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" >
                    <div class="card-body card2 alert-info">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:">
                            <use xlink:href="#exclamation-triangle-fill" />
                        </svg>
                        
                        <?php

                        include("conexion.php");

                        $c = sqlsrv_connect($serverName, $connectionInfo);

                        $sql = "SELECT count(tipo_ausencia) from PERMISOS;";

                        $Post = sqlsrv_query($conn, $sql);

                        while ($f = sqlsrv_fetch_array($Post, SQLSRV_FETCH_ASSOC)) {

                            if (!isset($respues)) {
                                $respues = $f[''];
                            }?>

                            <a href="http://172.30.0.3:83/gestion/todos_los_permisos.php">Todos Los Permisos (<?php echo  $respues ?>)</a>

                            <?php }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
            </symbol>
            <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
            </symbol>
            <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
            </symbol>
        </svg>

    </div>

</div>

<?php include("includes/footer.php") ?>