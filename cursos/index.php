<?php
	include "../controllers/config.php";
    include "../controllers/courseController.php";
	$courseController = new CourseController();
    $courses = $courseController->get();
    $bread = $courseController->bread; 
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <?php include "../layouts/head.template.php"; ?>
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
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
                                Cursos disponibles 
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Descripción</th>
                                                <th>Portada</th> 
                                                <th>Acciones</th>
                                            </tr>
                                        </thead> 
                                        <tbody>
                                            <?php if (isset($courses) && count($courses)>0): ?>
                                            <?php foreach ($courses as $course): ?>
                                            <tr>
                                                <td><?= $course['name'] ?></td>
                                                <td><?= $course['description'] ?></td>
                                                <td><?= $course['cover'] ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal" onclick="editar('<?= $course['name'] ?>','<?= $course['description'] ?>','<?= $course['cover'] ?>',<?= $course['status'] ?>,<?= $course['id'] ?>)">
                                                        <i class="fa fa-pencil"></i>
                                                        Editar
                                                    </button>

                                                    <button onclick="remove(<?= $course['id'] ?>,this)" class="btn btn-danger">
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
                                                <th>Descripción</th>
                                                <th>Portada</th> 
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
                    Añadir nuevo curso
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <form action="<?= BASE_PATH ?>courses" method="post"> 
                  <div class="modal-body">
                    

                      <div class="form-group">
                        <label for="name">Nombre del curso</label>
                        <input type="text" class="form-control" id="name" placeholder="" name="name" required="">
                      </div>
                       
                      <div class="form-group">
                        <label for="description">Descripción</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required=""></textarea>
                      </div>

                      <div class="form-group">
                        <label for="cover">Portada del curso</label>
                        <input type="text" class="form-control" id="cover" placeholder="" name="cover" required="">
                      </div>

                      <div class="form-group">
                        <label for="status">Estado</label>
                        <select class="form-control" id="status" name="status" required="">
                            <option selected="" disabled=""> Seleccione uno </option>
                          <option value="1" >Activo</option>
                          <option value="0" >Inactivo</option> 
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

        <!-- Modal -->
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Editar curso
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <form action="<?= BASE_PATH ?>courses" method="post" name="formulario_actualizar" > 
                  <div class="modal-body">
                    

                      <div class="form-group">
                        <label for="name">Nombre del curso</label>
                        <input type="text" class="form-control" id="editar_name" placeholder="" name="name" required="">
                      </div>
                       
                      <div class="form-group">
                        <label for="description">Descripción</label>
                        <textarea class="form-control" id="editar_description" name="description" rows="3" required=""></textarea>
                      </div>

                      <div class="form-group">
                        <label for="cover">Portada del curso</label>
                        <input type="text" class="form-control" id="editar_cover" placeholder="" name="cover" required="">
                      </div>

                      <div class="form-group">
                        <label for="status">Estado</label>
                        <select class="form-control" id="editar_status" name="status" required="">
                            <option selected="" disabled=""> Seleccione uno </option>
                          <option value="1" >Activo</option>
                          <option value="0" >Inactivo</option> 
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
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="../assets/demo/datatables-demo.js"></script>
        <script type="text/javascript">
            function editar(name1,description1,cover1,status1,id1){

                var formulario = document.formulario_actualizar;

                formulario.name.value = name1;
                formulario.description.value = description1;
                formulario.cover.value = cover1;
                formulario.status.value = status1;
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
                    url : '<?= BASE_PATH ?>courses', 
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
