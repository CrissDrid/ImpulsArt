//selecting all required elements
const dropArea = document.querySelector(".drag-area");
(dragText = dropArea.querySelector("header")),
	(button = dropArea.querySelector("button")),
	(input = dropArea.querySelector("input"));
let file; //this is global variable and we'll use it inside multiple functions

button.onclick = () => {
	input.click(); //if user clicks on the button, then the input also clicked
};

input.addEventListener("change", function () {
	//getting user selected file, and [0] means if the user selects multiple files, we'll select only the first one
	file = this.files[0];
	showFile(); //calling function
	dropArea.classList.add("active");
});

//If user Drag File Over DropArea
dropArea.addEventListener("dragover", (event) => {
	event.preventDefault(); //preventing default behavior;
	event.dataTransfer.dropEffect = "copy"; // Añade esta línea para establecer el efecto de caída como "copy"
	dropArea.classList.add("active");
	dragText.textContent = "Suelta para Cargar Archivo";
});

//If user leaves Drag File Over DropArea
dropArea.addEventListener("dragleave", () => {
	dropArea.classList.remove("active");
	dragText.textContent = "Arrastrar y Soltar para Cargar Archivo";
});

//If user drops File on DropArea
dropArea.addEventListener("drop", (event) => {
	event.preventDefault(); //preventing default behavior
	//getting user selected file, and [0] means if the user selects multiple files, we'll select only the first one
	file = event.dataTransfer.files[0];
	showFile(); //calling function
});

function showFile() {
	let fileType = file.type;
	console.log(fileType);

	let validExtensions = ["image/jpeg", "image/jpg", "image/png"]; //adding some valid image extensions in an array
	if (validExtensions.includes(fileType)) {
		//if the user selected file is an image file
		let fileReader = new FileReader(); //creating a new FileReader object
		fileReader.onload = () => {
			let fileURL = fileReader.result; //passing user file source in the fileURL variable
			let imgTag = `<img src="${fileURL}" alt="">`; //creating an img tag and passing the user-selected file source inside the src attribute
			dropArea.innerHTML = imgTag; //adding that created img tag inside the dropArea container
		};
		fileReader.readAsDataURL(file);
	} else {
		alert("Esto no es una imagen... PENDEJO!");
		dropArea.classList.remove("active"); // remove the "active" class to disable the border
		dragText.textContent = "Arrastrar y Soltar para Cargar Archivo";
	}
}

const deleteButton = document.querySelector(".delete");

deleteButton.addEventListener("click", function () {
	// Verificar si hay una imagen para eliminar
	if (dropArea.querySelector("img")) {
		dropArea.innerHTML = `
            <div class="icon"><i class="fas fa-cloud-upload-alt"></i></div>
            <header>Arrastrar y Soltar para Cargar Archivo</header>
            <button>Buscar Archivo</button>
            <input type="file" hidden>`;

		// Restablece el input de archivo para que siga funcionando
		input = dropArea.querySelector("input");
		input.addEventListener("change", function () {
			file = this.files[0];
			showFile();
			dropArea.classList.add("active");
		});

		// Restablece el botón "Browse File" para que vuelva a funcionar
		button = dropArea.querySelector("button");
		button.addEventListener("click", () => {
			input.click();
		});
	} else {
		alert("No hay una imagen para eliminar.");
	}
});

//Comentario
const guardarButton = document.querySelector(".guardar");
guardarButton.addEventListener("click", function () {
	const imgTag = dropArea.querySelector("img");
	if (imgTag) {
		const formData = new FormData();
		formData.append("nombre", file.name);
		formData.append("imagen", file);

		const xhr = new XMLHttpRequest();
		const uploadUrl = "Conexion.php"; // Crearemos un nuevo archivo PHP para manejar la subida de archivos.

		xhr.open("POST", uploadUrl, true);

		xhr.onreadystatechange = function () {
			if (xhr.readyState === XMLHttpRequest.DONE) {
				if (xhr.status === 200) {
					alert(
						"Imagen guardada en la base de datos y en la carpeta SubirObra."
					);
				} else {
					alert(
						"Hubo un error al guardar la imagen en la base de datos o en la carpeta SubirObra."
					);
				}
			}
		};

		xhr.send(formData);
	} else {
		alert("No hay una imagen para guardar.");
	}
});
