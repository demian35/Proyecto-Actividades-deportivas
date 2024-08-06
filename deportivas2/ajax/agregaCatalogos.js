
//solicitud para agregar un nuevo torneo a los catalogos
$(document).ready(function () {
    // Manejo del evento click para el botón de guardar en el formulario de Torneos
    $('#guardarButton').on('click', function (e) {
        e.preventDefault();

        var nombre = $('#nombre').val();
        var eslogan = $('#eslogan').val();

        if (!nombre || !eslogan) {
            // Muestra la notificación de error de SweetAlert si faltan campos
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Debes completar todos los campos.',
            });
        } else {
            // Realiza la solicitud AJAX si todos los campos están completos
            $.ajax({
                type: 'POST',
                url: '../conexiones/agregaTorneo.php',
                data: {
                    nombre: nombre,
                    eslogan: eslogan
                },
                success: function (response) {
                    // Muestra la notificación de éxito de SweetAlert
                    Swal.fire({
                        icon: 'success',
                        title: 'Torneo Registrado',
                        showConfirmButton: false,
                        timer: 2500
                    }).then(function () {
                        // Recargar la página u otra acción necesaria después de eliminar el torneo
                        location.reload();
                    });

                    // Puedes añadir más lógica aquí, como limpiar los campos del formulario
                    $('#nombre').val('');
                    $('#eslogan').val('');
                },
                error: function (error) {
                    // Muestra la notificación de error de SweetAlert si hay un problema con la solicitud
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Error al registrar el torneo.',
                    });
                }
            });
        }
    });
});

//solicitud para agregar una disciplina a los catalogos

$(document).ready(function () {
    $('#guardarButtonDisciplina').on('click', function (e) {
        e.preventDefault();

        var claveDis = $('#claveDis').val();
        var nombreDis = $('#nombreDis').val();
        var min = $('#min').val();
        var max = $('#max').val();
        var clavePago = $('#clavepago').val();

        if (!claveDis || !nombreDis || !min || !max || !clavePago) {
            // Muestra la notificación de error de SweetAlert si faltan campos
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Debes completar todos los campos.',
            });
        } else {
            // Realiza la solicitud AJAX si todos los campos están completos
            $.ajax({
                type: 'POST',
                url: '../conexiones/agregaDisciplina.php',
                data: {
                    claveDis: claveDis,
                    nombreDis: nombreDis,
                    min: min,
                    max: max,
                    clavepago: clavePago
                },
                success: function (response) {
                    console.log("Respuesta del servidor (éxito):", response);
                    // Parsea la respuesta JSON
                    var parsedResponse = JSON.parse(response);
                    if (parsedResponse.success) {
                        // Muestra la notificación de éxito de SweetAlert
                        Swal.fire({
                            icon: 'success',
                            title: 'Disciplina Registrada',
                            showConfirmButton: false,
                            timer: 2500
                        }).then(function () {
                            // Recargar la página u otra acción necesaria después de eliminar el torneo
                            location.reload();
                        });

                        $('#claveDis').val('');
                        $('#nombreDis').val('');
                        $('#min').val('');
                        $('#max').val('');
                        $('#clavepago').val('');
                    } else {
                        // Muestra la notificación de error de SweetAlert con detalles específicos
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: parsedResponse.error || 'Error al registrar la disciplina.',
                        });
                    }
                },
                error: function (xhr, status, error) {
                    // Muestra la notificación de error de SweetAlert con detalles específicos
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Error en la solicitud AJAX. Detalles: ' + error,
                    });
                }
            });
        }
    });
});

//agregar nueva categoria

$(document).ready(function () {
    $('#guardarButtonCategoria').on('click', function (e) {
        e.preventDefault();

        var nombreCategoria = $('#nombreCategoria').val();

        if (!nombreCategoria) {
            // Muestra la notificación de error de SweetAlert si faltan campos
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Debes completar todos los campos.',
            });
        } else {
            $.ajax({
                type: 'POST',
                url: '../conexiones/agregaCategoria.php',
                data: {
                    nombreCategoria: nombreCategoria,
                },
                success: function (response) {
                    console.log("Respuesta del servidor (exito):", response);
                    var parsedResonse = JSON.parse(response);
                    if (parsedResonse.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Categoria Registrada',
                            showConfirmButton: false,
                            timer: 2500
                        }).then(function () {
                            // Recargar la página u otra acción necesaria después de eliminar el torneo
                            location.reload();
                        });
                        $('#nombreCategoria').val('');
                    } else {
                        // Muestra la notificación de error de SweetAlert con detalles específicos
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: parsedResponse.error || 'Error al registrar la disciplina.',
                        });
                    }
                },
                error: function (xhr, status, error) {
                    // Muestra la notificación de error de SweetAlert con detalles específicos
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Error en la solicitud AJAX. Detalles: ' + error,
                    });
                }
            })
        }
    })
})

//agregar prueba
$(document).ready(function () {
    $('#guardarButtonPrueba').on('click', function (e) {
        e.preventDefault();

        var nombrePrueba = $('#nombrePrueba').val();

        if (!nombrePrueba) {
            // Muestra la notificación de error de SweetAlert si faltan campos
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Debes completar todos los campos.',
            });
        } else {
            $.ajax({
                type: 'POST',
                url: '../conexiones/agregaPrueba.php',
                data: {
                    nombrePrueba: nombrePrueba,
                },
                success: function (response) {
                    console.log("Respuesta del servidor (exito):", response);
                    var parsedResonse = JSON.parse(response);
                    if (parsedResonse.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Prueba Registrada',
                            showConfirmButton: false,
                            timer: 2500
                        }).then(function () {
                            // Recargar la página u otra acción necesaria después de eliminar el torneo
                            location.reload();
                        });
                        $('#nombrePrueba').val('');
                    } else {
                        // Muestra la notificación de error de SweetAlert con detalles específicos
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: parsedResponse.error || 'Error al registrar la disciplina.',
                        });
                    }
                },
                error: function (error) {
                    // Muestra la notificación de error de SweetAlert con detalles específicos
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Error en la solicitud AJAX. Detalles: ' + error,
                    });
                }
            })
        }
    })
})

//evento
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