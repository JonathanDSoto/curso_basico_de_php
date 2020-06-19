<div class="row">
	<div class="col">
		<h1 class="mt-4">
			<?= (isset($bread))?$bread['main_title']:'sección' ?>
		</h1>
	</div>
	<div class="col">
		<br>
		<button class="float-right btn btn-info" data-toggle="modal" data-target="#addModal">
			Añadir registro
		</button>
	</div>
</div>

<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item">
    	<a href="">
    		<?= (isset($bread))?$bread['main_title']:'sección' ?>
    	</a>
    </li>
    <?php if(isset($bread) && $bread['second_level']!=""): ?>
    <li class="breadcrumb-item active">
    	<?= (isset($bread))?$bread['second_level']:'sección' ?>
    </li>
	<?php endif; ?>
</ol>

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