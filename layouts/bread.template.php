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