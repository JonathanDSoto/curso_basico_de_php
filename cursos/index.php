<?php
	include "../controllers/config.php";
	
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <?php include "../layouts/head.template.php"; ?>
    </head>
    <body class="sb-nav-fixed">
        <?php include "../layouts/nav.template.php"; ?>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <?php include "../layouts/sidebar.template.php"; ?>
            </div>
            <div id="layoutSidenav_content">

                <main>
                	<div class="container-fluid">
                        <?php include "../layouts/bread.template.php"; ?>

                    </div>
                </main>

                <?php include "../layouts/footer.template.php"; ?>
            </div>
        </div>
        <?php include "../layouts/scripts.template.php"; ?>
    </body>
</html>
