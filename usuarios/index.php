<?php
	include "../controllers/config.php";
    include "../controllers/userController.php";
    $userController = new UserController();
    $users = $userController->get();	
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

                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>
                                usuarios registrados
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Apellido</th>
                                                <th>Rol</th> 
                                                <th>Acciones</th>
                                            </tr>
                                        </thead> 
                                        <tbody>
                                            <?php if (isset($users) && count($users)>0): ?>
                                            <?php foreach ($users as $user): ?>
                                            <tr>
                                                <td><?= $user['name'] ?></td>
                                                <td><?= $user['lastname'] ?></td>
                                                <td><?= $user['role'] ?></td>
                                                <td>
                                                    
                                                </td> 
                                            </tr>  
                                            <?php endforeach ?> 
                                            <?php endif ?> 
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Apellido</th>
                                                <th>Rol</th> 
                                                <th>Acciones</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </main>

                <?php include "../layouts/footer.template.php"; ?>
            </div>
        </div>
        <?php include "../layouts/scripts.template.php"; ?>
    </body>
</html>
