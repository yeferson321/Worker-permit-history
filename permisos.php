<?php

            include("conexion.php");

            $c = sqlsrv_connect($serverName, $connectionInfo);

            $sql = "SELECT grupo from PERMISOS";

            $stmt = sqlsrv_query($conn, $sql);

            if ($stmt === false) {
                die(print_r(sqlsrv_errors(), true));
            }

            while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                $grupo = $row['grupo'];
                echo $grupo;
            }

            sqlsrv_free_stmt($stmt);
            ?>

            <?php

            include("conexion.php");

            $c = sqlsrv_connect($serverName, $connectionInfo);

            $sql = "SELECT lider from PERMISOS";

            $stmt = sqlsrv_query($conn, $sql);

            if ($stmt === false) {
                die(print_r(sqlsrv_errors(), true));
            }

            while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                $lider = $row['lider'];
                echo $lider;
            }

            sqlsrv_free_stmt($stmt);
            ?>

            <?php

            include("conexion.php");

            $c = sqlsrv_connect($serverName, $connectionInfo);

            $sql = "SELECT tipo_ausencia from PERMISOS";

            $stmt = sqlsrv_query($conn, $sql);

            if ($stmt === false) {
                die(print_r(sqlsrv_errors(), true));
            }

            while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                $tipo_ausencia = $row['tipo_ausencia'];
                echo $tipo_ausencia;
            }

            sqlsrv_free_stmt($stmt);
            ?>

            <?php

            include("conexion.php");

            $c = sqlsrv_connect($serverName, $connectionInfo);

            $sql = "SELECT tipo_ausencia from PERMISOS";

            $stmt = sqlsrv_query($conn, $sql);

            if ($stmt === false) {
                die(print_r(sqlsrv_errors(), true));
            }

            while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                $tipo_ausencia = $row['tipo_ausencia'];
                echo $tipo_ausencia;
            }

            sqlsrv_free_stmt($stmt);
            ?>


<td><?php echo $grupo; ?></td>
                <td><?php echo $lider; ?></td>
                <td><?php echo $tipo_ausencia; ?></td>


