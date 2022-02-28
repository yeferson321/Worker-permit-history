<?php include("includes/header.php") ?>

<form class="form" method="POST" action="" name="procesar">

    <div class="mb-4">
        <img src="static files/CENTRAL.png" width="160" />
    </div>

    <div class="mb-3">
        <h3>Crea tu cuenta</h3>
    </div>

    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Correo</label>
        <input name='Correo' type="text" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Contraseña</label>
        <input name='Password' type="password" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Nombres y Apellidos</label>
        <input name="Nombres_Apellidos" type="text" class="form-control" required aria-describedby="emailHelp">
    </div>

    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Cedula o Numero de Idenficacion</label>
        <input name='Cedula' type="text" class="form-control" required>
    </div>

    <select name="Area" class="form-select form-select-sm" aria-label=".form-select-sm example" required>
        <option selected>Area</option>
        <option value="Admistrativo">Admistrativo</option>
        <option value="Facturacion">Facturacion</option>
        <option value="Hospitalizacion">Hospitalizacion</option>
        <option value="Urgencias">Urgencias</option>
        <option value="Cirugia">Cirugia</option>
        <option value="Consulta">Consulta Externa</option>
        <option value="UCI">UCI</option>
    </select>

    <button type="submit" name="procesar" class="btn btn-primary button1">Crear</button>

    <span class="title_span">
        ¿Ya tienes una cuenta?
        <a class="link-to" href="http://172.30.0.3:83/gestion/inicia.php">Ingresa aquí</a>
    </span>

</form>

<?php

if (isset($_POST['procesar'])) {

    include("conexion.php");

    $c = sqlsrv_connect($serverName, $connectionInfo);

    $Correo = $_POST['Correo'];
    $Password = $_POST['Password'];
    $Nombres_Apellidos = $_POST['Nombres_Apellidos'];
    $Cedula = $_POST['Cedula'];
    $Area = $_POST['Area'];

    $query = "INSERT INTO USUARIOS (correo, contraseña, nombres_apellidos, cedula, area)
    VALUES ('$Correo', '$Password', '$Nombres_Apellidos', '$Cedula', '$Area')";

    $query2 = "INSERT INTO PUNTOS (puntos, id_usuario)
    VALUES ('100', '$Cedula')";

    $Post = sqlsrv_query($c, $query);
    $Post2 = sqlsrv_query($c, $query2);

    if ($Post) {

        header('location:http://172.30.0.3:83/gestion/perfil.php');

        exit;

    } else { ?>

        <div class="alert alert-warning" role="alert">
            <div>
                Es Probable Que Su Cuenta Ya Exista
            </div>
        </div>

<?php }
} ?>

<?php include("includes/footer.php") ?>