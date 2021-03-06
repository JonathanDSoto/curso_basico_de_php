<?php
	include "controllers/config.php";
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Page Title - SB Admin</title>
        <link href="assets/css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">

                        <?php if (isset($_SESSION['status']) && $_SESSION['status']!= ""): ?>
                        <div class="row">
                            <div class="col"> 
                                <?php if ($_SESSION['status']== "error"): ?> 
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                  <strong>Ha ocurrido un error!</strong> <?= $_SESSION['message'] ?>
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <?php  endif; ?>

                                <?php if ($_SESSION['status']== "success"): ?> 
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                  <strong>Proceso completado correctamente!</strong> <?= $_SESSION['message'] ?>
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php 
                            unset($_SESSION['status']);
                            unset($_SESSION['message']);
                        ?>
                        <?php endif; ?>

                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header">
                                    	<h3 class="text-center font-weight-light my-4">
                                            Login 
                                        </h3>
                                    </div>
                                    <div class="card-body">
                                        <form action="<?= BASE_PATH."auth" ?>" method="POST">
                                            
                                            <div class="form-group">
                                            	<label class="small mb-1" for="inputEmailAddress">Email</label>
                                            	<input class="form-control py-4" id="inputEmailAddress" type="email" placeholder="Enter email address" name="email" required="" /> 
                                            </div>

                                            <div class="form-group">
                                            	<label class="small mb-1" for="inputPassword">Password</label>
                                            	<input class="form-control py-4" id="inputPassword" type="password" placeholder="Enter password" name="password" required="" />
                                            </div> 

                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                	<input class="custom-control-input" id="rememberPasswordCheck" type="checkbox" />
                                                	<label class="custom-control-label" for="rememberPasswordCheck">
                                                		Remember password
                                                	</label>
                                                </div>
                                            </div>

                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                            	<a class="small" href="password.html">Forgot Password?</a>
                                            	<button type="submit" class="btn btn-primary">Login</button>
                                            	<input type="hidden" value="login" name="action">
								  				<input type="hidden" name="token" value="<?= $_SESSION['token'] ?>">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small">
                                        	<a href="register.html">Need an account? Sign up!</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2019</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="assets/js/scripts.js"></script>
    </body>
</html> 