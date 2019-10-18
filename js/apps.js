//Selecciono el ID contacto
const formularioContactos = document.querySelector('#contacto');

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
               console.log(respuesta.datos.empresa);
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