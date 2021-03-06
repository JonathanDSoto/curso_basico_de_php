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
                                Usuarios registrados
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
                                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal" onclick="editar('<?= $user['name'] ?>','<?= $user['lastname'] ?>','<?= $user['address'] ?>','<?= $user['phone_number'] ?>','<?= $user['email'] ?>',<?= $user['role'] ?>,<?= $user['id'] ?>)">
                                                        <i class="fa fa-pencil"></i>
                                                        Editar
                                                    </button>

                                                    <button onclick="remove(<?= $user['id'] ?>,this)" class="btn btn-danger">
                                                      <i class="fa fa-trash"></i>
                                                      Eliminar
                                                    </button>
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

              <form action="<?= BASE_PATH ?>users" method="post"> 
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
                        <input type="text" class="form-control" id="phone_number" placeholder="" name="phone_number" required="">
                      </div>

                      <div class="form-group">
                        <label for="cover">Email</label>
                        <input type="text" class="form-control" id="email" placeholder="" name="email" required="">
                      </div>

                      <div class="form-group">
                        <label for="cover">Contraseña</label>
                        <input type="password" class="form-control" id="password" placeholder="" name="password" required="">
                      </div>

                      <div class="form-group">
                        <label for="status">Rol</label>
                        <select class="form-control" id="role" name="role" required="">
                            <option selected="" disabled=""> Seleccione uno </option>
                          <option value="1" >Alumno</option>
                          <option value="2" >Instructor</option> 
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

        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Editar usuario
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <form action="<?= BASE_PATH ?>users" method="post" name="formulario_actualizar"> 
                  <div class="modal-body">
                    

                      <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" id="editar_name" placeholder="" name="name" required="">
                      </div>
                       
                      <div class="form-group">
                        <label for="description">Apellido</label>
                        <textarea class="form-control" id="editar_lastname" name="lastname" rows="3" required=""></textarea>
                      </div>

                      <div class="form-group">
                        <label for="cover">Direccion</label>
                        <input type="text" class="form-control" id="editar_address" placeholder="" name="address" required="">
                      </div>

                      <div class="form-group">
                        <label for="cover">Numero de telefono</label>
                        <input type="text" class="form-control" id="editar_phone_number" placeholder="" name="phone_number" required="">
                      </div>

                      <div class="form-group">
                        <label for="cover">Email</label>
                        <input type="text" class="form-control" id="editar_email" placeholder="" name="email" required="">
                      </div>

                      <div class="form-group">
                        <label for="status">Rol</label>
                        <select class="form-control" id="editar_role" name="role" required="">
                            <option selected="" disabled=""> Seleccione uno </option>
                          <option value="1" >Alumno</option>
                          <option value="2" >Instructor</option> 
                        </select>
                      </div>
                     
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    <input type="hidden" value="update" name="action">
                    <input type="hidden" name="token" value="<?= $_SESSION['token'] ?>">
                    <input type="hidden" id="editar_id" name="id">
                  </div>
              </form>

            </div>
          </div>
        </div>

        <?php include "../layouts/scripts.template.php"; ?>
        <script type="text/javascript">
            function editar(name1,lastname1,address1,phone_number1,email1,role1,id1){

                var formulario = document.formulario_actualizar;

                formulario.name.value = name1;
                formulario.lastname.value = lastname1;
                formulario.address.value = address1;
                formulario.phone_number.value = phone_number1;
                formulario.email.value  = email1;
                formulario.role.value  = role1;
                formulario.id.value  = id1;

            }


            function remove(id1,target)
            {
              swal({
                title: "¿Desea eliminar el registro?",
                text: "Una vez eliminado, no podrá recuperar el reigstro",
                icon: "warning",
                buttons: true,
                dangerMode: true,
              })
              .then((willDelete) => {
                if (willDelete) { 

                  $.ajax({ 
                    url : '<?= BASE_PATH ?>users', 
                    data : { action : 'delete',id:id1,token:"<?= $_SESSION['token'] ?>" }, 
                    type : 'POST', 
                    dataType : 'json', 
                    success : function(respuesta) {
                      if (respuesta.code>0) {
                        $(target).parent().parent().remove();
                        swal(respuesta.message, { icon: "success", });
                      }else{
                        swal(respuesta.message, { icon: "error", }); 
                      }
                    }, 
                    error : function(xhr, status) {
                      console.log(xhr)
                      console.log(status)
                        swal(respuesta.message, { icon: "error", }); 
                    }
                  }); 

                } else {
                  swal("","El registro no se ha eliminado","error");
                }
              });
              console.log(id1)
            }
        </script>
    </body>
</html>
