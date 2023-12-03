function guardarDatos() {
    // Obtener los valores de los campos del formulario excepto la imagen
    var nombreProd = document.getElementsByName("nombreProd")[0].value;
    var costo = document.getElementsByName("costo")[0].value;
    var peso = document.getElementsByName("peso")[0].value;
    var tamaño = document.getElementsByName("tamaño")[0].value;
    var cantidad = document.getElementsByName("cantidad")[0].value;
    var categoria = document.getElementsByName("categoria")[0].value;
    var descripcion = document.getElementsByName("descripcion")[0].value;

    // Validar que no haya campos vacíos
    if (nombreProd === '' || costo === '' || peso === '' || tamaño === '' || cantidad === '' || categoria === '' || descripcion === '') {
        alert('Por favor, complete todos los campos.');
        return; // Detener el proceso si hay campos vacíos
    }

    // Hacer la solicitud AJAX para guardar los datos
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                alert('Datos guardados correctamente.');
                // Aquí podrías redirigir o realizar alguna acción adicional después de guardar los datos
            } else {
                alert('Error al guardar los datos.');
            }
        }
    };

    // Preparar los datos a enviar
    var datos = new FormData();
    datos.append('nombreProd', nombreProd);
    datos.append('costo', costo);
    datos.append('peso', peso);
    datos.append('tamaño', tamaño);
    datos.append('cantidad', cantidad);
    datos.append('categoria', categoria);
    datos.append('descripcion', descripcion);

    // Enviar los datos al archivo PHP para guardar en la base de datos
    xhr.open('POST', '../ImpulsArt/PHP/SubirObra.php', true);
    xhr.send(datos);
}
