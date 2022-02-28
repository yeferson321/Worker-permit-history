<?php include("includes/header.php") ?>
<?php include("includes/nav_admin2.php") ?>

<?php

if (!key_exists('Correo', $_COOKIE)) { 

    header("Location:inicio_admin.php");

  } 
?>

<div class="Titulo">
    <h4>Permisos Pendientes</h4>
</div>

<div class="table">
    <table class="table table-borderless">
        <thead>
            <tr>
            <th scope="col">Usuario</th>
                <th scope="col">Cedula</th>
                <th scope="col">Fecha de Apertura</th>
                <th scope="col">Grupo</th>
                <th scope="col">Tipo Ausencia</th>
                <th scope="col">Estado</th>
            </tr>
        </thead>

        <?php

        include("conexion.php");

        $c = sqlsrv_connect($serverName, $connectionInfo);

        $sql = "SELECT grupo, lider, tipo_ausencia, estado, permisos_id, usuario, fecha,id_usuario from PERMISOS where estado = 'pendiente' order by grupo desc;";

        $stmt = sqlsrv_query($conn, $sql);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }

        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            $grupo = $row['grupo']; 
            $grupo = $row['id_usuario']; 
            $grupo = $row['lider']; 
            $grupo = $row['tipo_ausencia']; 
            $grupo = $row['estado']; 
            $permisos_id = $row['permisos_id']; 
            $fecha = $row['fecha']->format('d/m/Y');?>

            <tbody>
                <tr>
                <td><a class="a" style="color: #084298;" href='solicitud_admin.php?id=<?php echo $permisos_id?>' id='ver_registro' ><?php  echo $row['usuario'] ?></td>
                    <td><?php echo $row['id_usuario'] ?></td>
                    <td><?php echo $fecha ?></td>
                    <td><?php echo $row['grupo'] ?></td>
                    <td><?php echo $row['tipo_ausencia'] ?></td>
                    <td style="color: #664d03;" ><a class="a" href='solicitud_admin.php?id=<?php echo $permisos_id?>' id='ver_registro' ><?php echo $row['estado'] ?></td>

                <?php }?>
                </tr>
            </tbody>
    </table>
</div>

<?php include("includes/footer.php") ?>