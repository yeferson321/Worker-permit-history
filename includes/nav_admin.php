<?php include("includes/header.php") ?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <img src="static files/logo.png" width="43" />
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
            aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
            </ul>
            <form class="d-flex" method="POST">
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="http://172.30.0.3:83/gestion/permisos_admin.php">Permisos</a>
                        </li>
                        <li class="nav-item">
                            <button type="submit" name="procesa" id="btn" class="nav-link salir">Salir</button>
                        </li>
                    </ul>

                </div>
            </form>
        </div>
    </div>
</nav>

<?php 
if (isset($_POST['procesa'])) {

    header("Location:inicio_admin.php");

    session_destroy();

    setcookie("Nombre", "", time() + -14600);
    setcookie("Correo", "", time() + -14600);
    setcookie("Area", "", time() + -14600);

}
?>

<?php include("includes/footer.php") ?>