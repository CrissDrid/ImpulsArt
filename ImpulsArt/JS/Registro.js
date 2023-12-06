function validarYRedirigirregistro() {
    var nombre = document.getElementById("nombre").value;
    var apellido = document.getElementById("apellido").value;
    var correo = document.getElementById("correo").value;
    var contrasena = document.getElementById("contrasena").value;
    var fecha_nacimiento = document.getElementById("fecha_nacimineto").value;
    var direccion = document.getElementById("direccion").value;
    var Numero = document.getElementById("Numero").value;
    var mensajeError = document.getElementById("mensajeError");

    if (nombre==""||apellido==""||correo==""||contrasena==""||fecha_nacimiento==""||direccion==""||Numero=="") {
        mensajeError.textContent = "Falta llenar uno o más campos.";
        mensajeError.style.display = "block";
    } else {
        window.location.href = "ImpulsArt.html";
    }
}