<?php
	include "../controllers/config.php";
    include "../controllers/userController.php";
    $userController = new UserController();
    $users = $userController->get();	
    $bread = $userController->bread; 
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


          <!-- Modal -->
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Añadir nuevo usuario
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <form action="<?= BASE_PATH ?>/controllers/userController.php" method="post"> 
                  <div class="modal-body">
                    

                      <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" id="name" placeholder="" name="name" required="">
                      </div>
                       
                      <div class="form-group">
                        <label for="description">Apellido</label>
                        <textarea class="form-control" id="lastname" name="lastname" rows="3" required=""></textarea>
                      </div>

                      <div class="form-group">
                        <label for="cover">Direccion</label>
                        <input type="text" class="form-control" id="address" placeholder="" name="address" required="">
                      </div>

                      <div class="form-group">
                        <label for="cover">Numero de telefono</label>
                        <input type="text" class="form-control" id="phone_numbe" placeholder="" name="phone_numbe" required="">
                      </div>

                      <div class="form-group">
                        <label for="cover">Email</label>
                        <input type="text" class="form-control" id="address" placeholder="" name="address" required="">
                      </div>

                      <div class="form-group">
                        <label for="cover">Contraseña</label>
                        <input type="text" class="form-control" id="password" placeholder="" name="password" required="">
                      </div>

                      <div class="form-group">
                        <label for="status">Rol</label>
                        <select class="form-control" id="role" name="role" required="">
                            <option selected="" disabled=""> Seleccione uno </option>
                          <option value="1" >Alumno</option>
                          <option value="0" >Instructor</option> 
                        </select>
                      </div>
                     
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    <input type="hidden" value="add" name="action">
                    <input type="hidden" name="token" value="<?= $_SESSION['token'] ?>">
                  </div>
              </form>

            </div>
          </div>
        </div>

        <?php include "../layouts/scripts.template.php"; ?>
    </body>
</html>
