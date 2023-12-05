const guardarButton = document.querySelector(".guardar");

guardarButton.addEventListener("click", function () {
    const imgTag = dropArea.querySelector("img"); // Obtener la etiqueta img

    // Obtener los valores del formulario
    var nombreProd = document.getElementsByName("nombreProd")[0].value;
    var costo = document.getElementsByName("costo")[0].value;
    var peso = document.getElementsByName("peso")[0].value;
    var tamaño = document.getElementsByName("tamaño")[0].value;
    var cantidad = document.getElementsByName("cantidad")[0].value;
    var categoria = document.getElementsByName("categoria")[0].value;
    var descripcion = document.getElementsByName("descripcion")[0].value;

    // Verificar si hay una imagen y si todos los campos del formulario están completos
    if (imgTag && (nombreProd !== '' && costo !== '' && peso !== '' && tamaño !== '' && cantidad !== '' && categoria !== '' && descripcion !== '')) {

        // Crear un objeto FormData para enviar los datos
        const formData = new FormData();
        const file = input.files[0]; // Obtener el archivo de imagen seleccionado

        formData.append('imagine', file); // Agregar la imagen al FormData
        formData.append('nombreProd', nombreProd);
        formData.append('costo', costo);
        formData.append('peso', peso);
        formData.append('tamaño', tamaño);
        formData.append('cantidad', cantidad);
        formData.append('categoria', categoria);
        formData.append('descripcion', descripcion);
        formData.append('nombreImg', file.name); // Agregar el nombre del archivo al FormData

        // Crear una solicitud XMLHttpRequest
        const xhr = new XMLHttpRequest();
        const uploadUrl = "../ImpulsArt/PHP/SubirObra.php";

        // Configurar la función que maneja la respuesta de la solicitud
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

        // Abrir una solicitud POST y enviar el FormData
        xhr.open('POST', uploadUrl, true);
        xhr.send(formData);
    } else {
        alert("Por favor, complete todos los campos y seleccione una imagen.");
    }
});
