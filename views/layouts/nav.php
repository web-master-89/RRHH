<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><?php echo $_SESSION["fecha"]; ?></a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../assets/logout.php">cerrar-sesión</a>
                </li>
                <?php 
                
                if ($_GET["rol"] === "2") {
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="./propuestas.php?rol=<?php echo $_GET['rol']; ?>">propuestas</a>
                </li>
                <?php }?>
            </ul>
        </div>
    </div>
</nav>