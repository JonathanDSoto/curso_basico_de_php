<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">

            <div class="sb-sidenav-menu-heading">Core</div>
            <a class="nav-link" href="<?= BASE_PATH."cursos" ?>" >
                <div class="sb-nav-link-icon">
                    <i class="fas fa-tachometer-alt"></i>
                </div>
                Cursos
            </a >

            <a class="nav-link" href="<?= BASE_PATH."usuarios" ?>" >
                <div class="sb-nav-link-icon">
                    <i class="fas fa-users"></i>
                </div>
                Usuarios
            </a > 
             
        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">Accedió como:</div>
        <?= $_SESSION['name'] ?>
    </div>
</nav>