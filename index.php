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







<?php include 'includes/layout/footer.php'; ?>