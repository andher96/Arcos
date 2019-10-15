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
	if(nombre === '' || empresa === '' || telefono === ''){
		//Llamo a mostrar notificacion, con el mensaje y la clase
		mostrarNotificacion('mmgv, rellena TODOS los campos','error')
	}else{
		mostrarNotificacion('mmgv, TODOS los campos son correctos','correcto');
	}
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