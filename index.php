<?php include 'includes/layout/header.php'; ?>

<div class="contenedor-barra centrar-texto blanco">
	<h1>Agenda para el Registro Contactos de la Organización</h1>
	
</div><!--contenedor-barra -->

<div class="bg-amarillo contenedor sombra">
	<form id="contacto" action="#">
		<legend>Añada un contacto <span>mmgv todos los campos son obligatorios</span></legend>

		<div class="campos">
			<!-- Para usar flexbox uso otro div como hijo -->
			<div class="campo">
				<label for="nombre">Nombre</label>
				<input type="text" placeholder="Nombre del contacto" id="nombre">
			</div><!-- Campo, hijo para flexbox-->

			<div class="campo"><!-- Empresa -->
				<label for="empresa">Empresa</label>
				<input type="text" placeholder="Nombre de la empresa" id="empresa">
			</div><!-- Campo, hijo para flexbox-->

			<div class="campo"><!-- Telefono -->
				<label for="telefono">Télefono</label>
				<input type="tel" placeholder="Número de télefono" id="telefono">
			</div><!-- Campo, hijo para flexbox-->
		
		</div><!--Campos -->
		<div class="campo enviar">
				<input type="submit" value="Añadir Contacto">
		</div><!--Campo, enviar -->	
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
					<tr>
						<td>Andherson</td>
						<td>Wanai</td>
						<td>66995959595955</td>
						<td>
							<a class="btn-editar btn" href="#"><i class="tiny material-icons">edit</i></a>
							<button class="btn-borrar btn" type="button" data-id="1">
								<i class="tiny material-icons">delete_forever</i>
							</button>
						</td>
					</tr>

					<tr>
						<td>Andherson otra vez</td>
						<td>Wanai</td>
						<td>66995959595955</td>
						<td>
							<a class="btn-editar btn" href="#"><i class="tiny material-icons">edit</i></a>
							<button class="btn-borrar btn" type="button" data-id="1">
								<i class="tiny material-icons">delete_forever</i>
							</button>
						</td>
					</tr>

					<tr>
						<td>Otra vez Andherson</td>
						<td>Wanai</td>
						<td>66995959595955</td>
						<td>
							<a class="btn-editar btn" href="#"><i class="tiny material-icons">edit</i></a>
							<button class="btn-borrar btn" type="button" data-id="1">
								<i class="tiny material-icons">delete_forever</i>
							</button>
						</td>
					</tr>
				</tbody>
			</table>
		</div><!--Contenedor table -->

	</div><!-- Contenedor contactos -->	
</div><!-- Background Blanco -->








<?php include 'includes/layout/footer.php'; ?>