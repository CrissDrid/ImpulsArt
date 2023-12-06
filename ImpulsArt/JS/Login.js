function validarYRedirigir() {
    var username = document.getElementById("usernameInput").value;
    var password = document.getElementById("passwordInput").value;
    var mensajeError = document.getElementById("mensajeError");

    if (username === "" || password === "") {
        mensajeError.textContent = "Falta llenar uno o más campos.";
        mensajeError.style.display = "block"; // Mostrar el mensaje de error
    } else {
        // Si ambos campos están llenos, redirige al usuario al enlace deseado
        window.location.href = "ImpulsArt(administrador).html";
    }
}

