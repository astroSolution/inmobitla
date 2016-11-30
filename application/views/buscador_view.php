<!DOCTYPE html>
<html>

	<head>

		<meta charset="UTF-8" />
		<title><?php echo $titulo ?></title>

	</head>

<body>
<div class="container_12">
	<div class="grid_12" id="buscador_multipe">
		<h2>Buscador</h2>
		<?php $atributos = array('class' => 'formulario') ?>
		<?php echo form_open('buscador',$atributos) ?>


			<!--este es nuestro autocompletado-->
			<input type="text" autocomplete="off" onpaste="return false" name="poblacion"
			id="poblacion" class="poblacion" placeholder="Busca tu inmobil" />

            <div class="muestra_poblaciones"></div>

			<?php echo form_submit('buscar','Buscar') ?>

		<?php echo form_close() ?>

	</div>

	<?php //si hay resultados los mostramos

	if(is_array($resultados) && !is_null($resultados))
	{
	?>
	<div class="grid_12 resultados">
		<h2>Resultados</h2>
		<div class="grid_12" id="head_resultados">
			<div class="grid_2">Titulo</div>
			<div class="grid_7">Descripción</div>
		</div>

		<div class="grid_12" id="body_resultados">
		<?php
		foreach($resultados as $fila)
		{
		?>

		<div class="grid_2"><?php echo $fila->titulo ?></div>
		<div class="grid_2"><?php echo $fila->precio ?></div>
		<div class="grid_2"><?php echo $fila->idusuario ?></div>


		<?php
		}
		?>
		</div>
	</div>
	<?php
	}
	?>
</div>
</body>
</html>
