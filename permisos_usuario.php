<?php include("includes/header.php") ?>
<?php include("includes/nav_usuario.php") ?>

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
                    Hola, Su Solicitud Se A Eliminado Correctamente
                </div>
            </div>
        </div>
    </div>

<?php  } ?>


<div class="Titulo">
    <h4>Tus Historial De Permisos</h4>
</div>

<div class="table">
    <table class="table table-borderless">
        <thead>
            <tr>
                <th scope="col">Grupo</th>
                <th scope="col">Usuario</th>
                <th scope="col">Tipo Ausencia</th>
                <th scope="col">Estado</th>
            </tr>
        </thead>

        <?php

        include("conexion.php");

        $c = sqlsrv_connect($serverName, $connectionInfo);

        $Cedula= $_COOKIE["Cedula"];

        $sql = "SELECT grupo, lider, tipo_ausencia, estado, permisos_id, usuario, fecha from PERMISOS where id_usuario = '$Cedula'  order by permisos_id desc;";

        $stmt = sqlsrv_query($conn, $sql);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }
        
        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            $grupo = $row['grupo']; $grupo = $row['lider']; $grupo = $row['tipo_ausencia']; $grupo = $row['estado']; $permisos_id = $row['permisos_id'];?>

            <tbody>
                <tr>
                    <td style="color: #084298;"><a class="a" style="color: #084298;" href='detalles_permisos_usuario.php?id=<?php echo $permisos_id?>' id='ver_registro' ><?php echo $row['grupo'] ?></td>
                    <td style="color: #084298;"><a class="a" style="color: #084298;" href='detalles_permisos_usuario.php?id=<?php echo $permisos_id?>' id='ver_registro' ><?php echo $row['usuario'] ?></td>
                    <td><?php echo $row['tipo_ausencia'] ?></td>
                    <td style="color: #664d03;" ><a class="a" href='detalles_permisos_usuario.php?id=<?php echo $permisos_id?>' id='ver_registro' ><?php echo $row['estado'] ?></td>
                <?php }?>
                </tr>
            </tbody>
    </table>
</div>

<?php include("includes/footer.php") ?>