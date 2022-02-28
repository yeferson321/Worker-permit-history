<?php include("includes/header.php") ?>
<?php include("includes/nav_usuario.php") ?>

<div class="Titulo">

    <h4>Actualizar Datos</h4>

</div>

<?php

include("conexion.php");

$id = $_COOKIE["Cedula"];

$c = sqlsrv_connect($serverName, $connectionInfo);

$sql = "SELECT cedula, correo, nombres_apellidos, area, celular from usuarios where cedula = $id;";

$stmt = sqlsrv_query($conn, $sql);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    $cedula = $row['cedula'];
    $correo = $row['correo'];
    $nombres_apellidos = $row['nombres_apellidos'];
    $area = $row['area'];
    $celular = $row['celular'];
}

?>

<div class="roww">

    <form method="POST" name="procesar" enctype="multipart/form-data">

        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <label for="exampleInputPassword1" class="form-label">Cedula o Numero De Identificacion</label>
                        <h6><?php echo $cedula ?></h6> 
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <label for="exampleInputPassword1" class="form-label">Correo (Gmail)</label>
                        <input name="correo" value="<?php echo $correo ?>" type="text" class="form-control" required aria-describedby="emailHelp">
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <label for="exampleInputPassword1" class="form-label">Nombres y Apellidos</label>
                        <input name="nombres_apellidos" value="<?php echo $nombres_apellidos ?>" type="text" class="form-control" required aria-describedby="emailHelp">
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <label for="exampleInputPassword1" class="form-label">Area o Grupo</label>
                        <select name='area' class="form-select form-select-sm" aria-label=".form-select-sm example">
                            <option selected><?php echo $area ?></option>
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
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <label for="exampleInputPassword1" class="form-label">Numero De Contacto</label>
                        <input name='celular' value="<?php echo $celular ?>" type="text" class="form-control" id="validationCustom01" required>
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

    $c = sqlsrv_connect($serverName, $connectionInfo);

    $Correo = $_POST['correo'];
    $Nombres_Apellidos = $_POST['nombres_apellidos'];
    $uppernombredb = strtoupper($Nombres_Apellidos);
    $celular = $_POST['celular'];
    $Area = $_POST['area'];
    $text = "actualizada";

    $query = "UPDATE USUARIOS
    SET correo = '$Correo', nombres_apellidos = '$uppernombredb', area = '$Area', celular = '$celular'
    WHERE cedula = '1005094096';";


    $Post = sqlsrv_query($c, $query);

    if ($Post) {

        header("Location:perfil.php?id=$text");

        setcookie("Nombre", "$uppernombredb", time() + 14600);
        setcookie("Correo", "$Correo", time() + 14600);

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
                        Hola, Es Probable Que Su Cuenta Ya Exista
                    </div>
                </div>
            </div>
        </div>

<?php }
} ?>

<?php include("includes/footer.php") ?>