<?php
	include 'includes/layout/header.php'; 
	include 'includes/funciones/consultas.php';
?>

<div class="contenedor-barra centrar-texto blanco">
	<h1>Agenda para el Registro Contactos de la Organización</h1>
</div><!--contenedor-barra -->

<div class="bg-amarillo contenedor sombra">
	<form id="contacto" action="#">
		<legend>Añada un contacto <span>mmgv todos los campos son obligatorios</span></legend>

	<?php include 'includes/layout/formulario.php'; ?>

		
	</form>
</div><!-- Background amarillo -->

<div class="bg-blanco contenedor sombra contacto">
	<div class="contenedor-contactos">
		<h2 class="centrar-texto">Contactos</h2>
		<input type="text" id="buscar" class="buscador sombra" placeholder="Buscar contacto">

		<p class="total-contactos"><span>3</span> Contactos</p>
		<div class="contenedor-table">
			<table id="listado-contactos" class="listado-contactos">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Empresa</th>
						<th>Teléfono</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					<?php $contactos = obtenerContactos();  
						foreach($contactos as $contacto){ ?><!--Cierro -->
							<tr>
								<td><?php print $contacto['nombre'];?></td>
								<td><?php print $contacto['empresa'];?></td>
								<td><?php print $contacto['telefono'];?></td>
								<td>
									<a class="btn-editar btn" href="editar.php?id=1"><i class="tiny material-icons">edit</i></a>
									<button class="btn-borrar btn" type="button" data-id="1">
										<i class="tiny material-icons">delete_forever</i>
									</button>
								</td>
							</tr>
					<?php } 
				?><!-- Cierro nuevamente Php-->
				</tbody>
			</table>
		</div><!--Contenedor table -->

	</div><!-- Contenedor contactos -->	
</div><!-- Background Blanco -->








<?php include 'includes/layout/footer.php'; ?>