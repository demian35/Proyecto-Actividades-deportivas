document.getElementById("ButtonCrearEvento").addEventListener("click", function () {
    const listaTorneos = document.getElementById("listaTorneos").value;
    const listaDisciplinas = document.getElementById("listaDisciplinas").value;
    const listaPruebas = document.getElementById("listaPruebas").value;
    const listaCategorias = document.getElementById("listaCategorias").value;
    const listaRamas = document.getElementById("listaRamas").value;
    const fechaIniciotorneo = document.getElementById("fechaIniciotorneo").value;
    const fechaFintorneo = document.getElementById("fechaFintorneo").value;
    const fechaInicioinscripciones = document.getElementById("fechaInicioinscripciones").value;
    const fechaFininscripciones = document.getElementById("fechaFininscripciones").value;

    if (
        listaTorneos === "0" ||
        listaDisciplinas === "0" ||
        listaPruebas === "0" ||
        listaCategorias === "0" ||
        listaRamas === "0" ||
        fechaIniciotorneo === "" ||
        fechaFintorneo === "" ||
        fechaInicioinscripciones === "" ||
        fechaFininscripciones === ""
    ) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Debes completar todos los campos.',
        });
    } else {
        // Envía el formulario o realiza las acciones necesarias
        // Puedes agregar aquí la lógica para enviar el formulario

        // Muestra la notificación de éxito
        Swal.fire({
            icon: 'success',
            title: 'Torneo Creado Exitosamente',
            showConfirmButton: false,
            timer: 1500
        });
    }

});



