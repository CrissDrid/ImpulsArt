function validarYRedirigirregistroDomiciliario() {
    var nombre = document.getElementById("nombre").value;
    var apellido = document.getElementById("apellido").value;
    var correo = document.getElementById("correo").value;
    var contrasena = document.getElementById("contrasena").value;
    var fecha_nacimiento = document.getElementById("fecha_nacimineto").value;
    var direccion = document.getElementById("direccion").value;
    var Numero = document.getElementById("Numero").value;
    var placa = document.getElementById("placa").value;
    var  marca= document.getElementById("marca").value;
    var TipoVehiculo = document.getElementById("TipoVehiculo").value;
    var modelo = document.getElementById("modelo").value;
    var mensajeError = document.getElementById("mensajeError");

    if (nombre==""||apellido==""||correo==""||contrasena==""||fecha_nacimiento==""||direccion==""||Numero==""||placa==""||marca==""||TipoVehiculo==""||modelo=="") {
        mensajeError.textContent = "Falta llenar uno o más campos.";
        mensajeError.style.display = "block";
    } else {
        window.location.href = "ImpulsArt.html";
    }
}