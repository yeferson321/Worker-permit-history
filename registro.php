<?php include("includes/header.php") ?>

<form class="form" method="POST" action="" name="procesar">

    <div class="mb-4">
        <img src="static files/CENTRAL.png" width="160" />
    </div>

    <div class="mb-3">
        <h3>Crea tu cuenta</h3>
    </div>

    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Correo (Solo Gmail)</label>
        <input name='Correo' value="<?php if (isset($_POST['Correo'])) echo $_POST['Correo'] ?>" type="text" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Contraseña</label>
        <input name='Password1' type="password" value="<?php if (isset($_POST['Password1'])) echo $_POST['Password1'] ?>" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Confirmar Contraseña</label>
        <input name='Password2' type="password" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Nombres y Apellidos</label>
        <input name="Nombres_Apellidos" value="<?php if (isset($_POST['Nombres_Apellidos'])) echo $_POST['Nombres_Apellidos'] ?>" type="text" class="form-control" required aria-describedby="emailHelp">
    </div>

    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Cedula o Numero de Idenficacion</label>
        <input name='Cedula' value="<?php if (isset($_POST['Cedula'])) echo $_POST['Cedula'] ?>" type="text" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Numero De Celular</label>
        <input name='Celular' value="<?php if (isset($_POST['Celular'])) echo $_POST['Celular'] ?>" type="text" class="form-control" required>
    </div>

    <div class="mb-3">
        <select name='Area' class="form-select form-select-sm" aria-label=".form-select-sm example">
            <option selected>Grupo o Cargo</option>
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

    <button type="submit" name="procesar" class="btn btn-primary button1">Crear</button>

    <div class="ti">
        <span class="title_span">
            ¿Ya tienes una cuenta?
            <a class="link-to " href="http://172.30.0.3:83/gestion/inicia.php">Ingresa aquí</a>
        </span>
    </div>

</form>

<?php

if (isset($_POST['procesar'])) {

    include("conexion.php");

    $c = sqlsrv_connect($serverName, $connectionInfo);

    $Correo = $_POST['Correo'];
    $Password = $_POST['Password1'];
    $Password2 = $_POST['Password2'];
    $Nombres_Apellidos = $_POST['Nombres_Apellidos'];
    $uppernombredb = strtoupper($Nombres_Apellidos);
    $Cedula = $_POST['Cedula'];
    $celular = $_POST['Celular'];
    $Area = $_POST['Area'];
    $puntosdb = "100";

    if ($Password == $Password2) {

        $query = "INSERT INTO USUARIOS (correo, contraseña, nombres_apellidos, cedula, area, celular)
        VALUES ('$Correo', '$Password', '$uppernombredb', '$Cedula', '$Area' , '$Celular')";

        $query2 = "INSERT INTO PUNTOS (puntos, id_usuario)
        VALUES ('$puntosdb', '$Cedula')";

        $Post = sqlsrv_query($c, $query);
        $Post2 = sqlsrv_query($c, $query2);

        if ($Post ) {

            ob_start();

            header("Location:perfil.php");

            setcookie("Cedula", "$Cedula", time() + 14600);
            setcookie("Nombre", "$uppernombredb", time() + 14600);
            setcookie("Correo", "$Correo", time() + 14600);
            setcookie("Puntos", "$puntosdb", time() + 14600);
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
                        Hola, Una de sus contraseñas esta incorrecta
                    </div>
                </div>
            </div>
        </div>

<?php
    }
} ?>

<?php include("includes/footer.php") ?>