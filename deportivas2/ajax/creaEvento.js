$(document).ready(function () {
    $('#ButtonCrearEvento').on('click', function (e) {
        e.preventDefault();

        const listaTorneos = document.getElementById("listaTorneos").value;
        const listaDisciplinas = document.getElementById("listaDisciplinas").value;
        const listaPruebas = document.getElementById("listaPruebas").value;
        const listaCategorias = document.getElementById("listaCategorias").value;
        const listaRamas = document.getElementById("listaRamas").value;
        const fechaIniciotorneo = document.getElementById("fechaIniciotorneo").value;
        const fechaFintorneo = document.getElementById("fechaFintorneo").value;
        const fechaInicioinscripciones = document.getElementById("fechaInicioinscripciones").value;
        const fechaFininscripciones = document.getElementById("fechaFininscripciones").value;

        if (listaTorneos === "0" ||
            listaDisciplinas === "0" ||
            listaPruebas === "0" ||
            listaCategorias === "0" ||
            listaRamas === "0" ||
            fechaIniciotorneo === "" ||
            fechaFintorneo === "" ||
            fechaInicioinscripciones === "" ||
            fechaFininscripciones === "") {
            // Muestra la notificación de error de SweetAlert si faltan campos
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Debes completar todos los campos.',
            });
        } else {//realizamos la solicitud ajax si se llenan todos los campos
            $.ajax({
                type: 'POST',
                url: '../conexiones/creaTorneo.php',
                data: {
                    listaTorneos: listaTorneos,
                    listaDisciplinas: listaDisciplinas,
                    listaCategorias: listaCategorias,
                    listaPruebas: listaPruebas,
                    listaRamas: listaRamas,
                    fechaIniciotorneo: fechaIniciotorneo,
                    fechaFintorneo: fechaFintorneo,
                    fechaInicioinscripciones: fechaInicioinscripciones,
                    fechaFininscripciones: fechaFintorneo
                },
                success: function (response) {
                    // Muestra la notificación de éxito
                    Swal.fire({
                        icon: 'success',
                        title: 'Evento Creado Exitosamente',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(function () {
                        // Recargar la página u otra acción necesaria después de eliminar el torneo
                        location.reload();
                    });
                    console.log(response);
                },
                error: function (error) {

                    // Muestra la notificación de error de SweetAlert si hay un problema con la solicitud
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Error al registrar el evento.',
                    });
                    console.log(error);

                }
            });
        }

    });
});
