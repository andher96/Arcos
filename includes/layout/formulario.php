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
<!--Boton -->
<div class="campo enviar">
	<input type="hidden" id="accion" value="crear">
	<input type="submit" value="Añadir Contacto">
</div><!--Campo, enviar -->	