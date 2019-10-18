//Selecciono el ID contacto
const formularioContactos = document.querySelector('#contacto');
const listadoContactos = document.querySelector('#listado-contactos tbody');

eventListeners();

function eventListeners(){
	//Cuando se ejecute el formulario
	formularioContactos.addEventListener('submit', leerFormulario);
}

//Llamo a la funcion leer formulario
function leerFormulario(e){
	e.preventDefault();
	//Para leer los inputs 
	const nombre = document.querySelector('#nombre').value;
	const empresa = document.querySelector('#empresa').value;
	const telefono = document.querySelector('#telefono').value;
	const accion = document.querySelector('#accion').value;
	if(nombre === '' || empresa === '' || telefono === ''){
		//Llamo a mostrar notificacion, con el mensaje y la clase
		mostrarNotificacion('mmgv, rellena TODOS los campos','error')
	}else{
		//pasa la validacion
		const contactoInfo = new FormData();
		contactoInfo.append('nombre',nombre);
		contactoInfo.append('empresa',empresa);
		contactoInfo.append('telefono',telefono);
		contactoInfo.append('accion',accion);
		if(accion === 'crear'){
			//crea un elemento
			insertarBD(contactoInfo);
		}else{
			//edita el contacto
		}	

	}
}

//Funcion para insertar datos en la base de datos
function insertarBD(contactoInfo){
	//Empezamos con ajax
	//creo el objeto
	const xhr = new XMLHttpRequest();
	//Me conecto, tipo de peticion, a donde se van enviar, true para que sea asincrono
	xhr.open('POST','includes/modelos/modelo-contacto.php',true);
	//Leo la respuesta
	xhr.onload = function() {
          if(this.status === 200) {
               console.log(JSON.parse(xhr.responseText)); 
               const respuesta = JSON.parse(xhr.responseText);
               /*	Muestro el arreglo respuesta y accedo a los datos
                que fueron declarados en el modelo 
               console.log(respuesta.datos); */

               //inserto elementos a la tabla
               const nuevoContacto = document.createElement('tr');
               nuevoContacto.innerHTML = `
                    <td>${respuesta.datos.nombre}</td>
                    <td>${respuesta.datos.empresa}</td>
                    <td>${respuesta.datos.telefono}</td>
               `;
               //Ahora los botones
               const contenedorAcciones = document.createElement('td');
               //icono editar
               const iconoEditar = document.createElement('i');
               iconoEditar.classList.add('tiny','material-icons');
               iconoEditar.innerHTML = `<i class="tiny material-icons">edit</i>`;
               //enlace a editar
               const btnEditar = document.createElement('a');
               btnEditar.appendChild(iconoEditar);
               btnEditar.href=`editar.php?id=${respuesta.datos.nombre}`
               btnEditar.classList.add('btn','btn-editar');
               //agrego el boton
               contenedorAcciones.appendChild(btnEditar);
               //crear el icono eliminar
               const iconoEliminar = document.createElement('i');
               iconoEliminar.classList.add('tiny','material-icons');
               iconoEliminar.innerHTML = `<i class="tiny material-icons">delete_forever</i>`;
               //boton eliminar
               const btnEliminar = document.createElement('button');
               btnEliminar.appendChild(iconoEliminar);
               btnEliminar.setAttribute('data-id',respuesta.datos.telefono);
               btnEliminar.classList.add('btn','btn-borrar');
               //agrego el boton eliminar
               contenedorAcciones.appendChild(btnEliminar);
               //Se agrega al tr
               nuevoContacto.appendChild(contenedorAcciones);
               //agreo el contacto
               listadoContactos.appendChild(nuevoContacto);
               //resetear el formulario
               document.querySelector('form').reset();
               //Notificacion
               mostrarNotificacion('Contacto creado exitosamente','correcto');

          }
     }
	//envio los datos
	xhr.send(contactoInfo)
}

//Creo que la notificacion
function mostrarNotificacion(mensaje, clase){
	//Creo el elemento div
	const notificacion = document.createElement('div');
	//agrego unas clases, y le agrego la clase sombra
	notificacion.classList.add(clase,'notificacion','sombra');
	notificacion.textContent = mensaje;

	//Selecciono el formulario
	formularioContactos.insertBefore(notificacion, document.querySelector('form legend'));

	//Ocultar y mostrar notificacion
	setTimeout(() =>{
		notificacion.classList.add('visible');

		setTimeout(()=>{
			notificacion.classList.remove('visible');
			notificacion.remove();
		}, 3000);
	},100);
}