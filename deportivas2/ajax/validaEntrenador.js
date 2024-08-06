$(document).ready(function () {
    $("#guardar").click(function () {
        // Obtener los valores del formulario
        var correoEntrenador = $("#correoEntrenador").val();
        var confirmaCorreo = $("#confirmaCorreo").val();


        // Validar que los correos electrónicos coincidan
        if (correoEntrenador !== confirmaCorreo) {
            // Mostrar alerta de SweetAlert
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Los correos electrónicos no coinciden. Por favor, verifique.'
            });
            return; // Detener la ejecución si los correos no coinciden
        }

        var nombreEntrenador = $("#nombreEntrenador").val();
        var apaternoEntrenador = $("#apaternoEntrenador").val();
        var amaternoEntrenador = $("#amaternoEntrenador").val();
        var telefono = $("#telefono").val();
        var celular = $("#celular").val();


        // Asignar un valor a numJugadores, por ejemplo, desde algún campo del formulario
        var numJugadores = $("#numParticipantes").val();
        var torneoSeleccionado = $("#torneos").val();
        var disciplinaSeleccionada = $("#disciplinas").val();
        var categoriaSeleccionada = $("#categorias").val();
        var pruebaSeleccionada = $("#pruebas").val();
        var ramaSeleccionada = $("#ram").val();
        var numFolio = $("#numFolio").val();
        var claveInc = $("#claveInc").val();
        var propuestaSwitch = $("#propuestaSwitch").is(":checked") ? "Si" : "No";
        var horariosContainer = $("#horarios").val();

        if (!correoEntrenador || !confirmaCorreo || !nombreEntrenador || !apaternoEntrenador || !amaternoEntrenador || !telefono || !celular) {
            // Muestra la notificación de error de SweetAlert si faltan campos
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Debes completar todos los campos.',
            });
        } else {
            $.ajax({
                type: "POST",
                url: "../conexiones/registraEntrenador.php", // Reemplaza con la ruta correcta a tu script PHP
                data: {
                    correoEntrenador: correoEntrenador,
                    confirmaCorreo: confirmaCorreo,
                    nombreEntrenador: nombreEntrenador,
                    apaternoEntrenador: apaternoEntrenador,
                    amaternoEntrenador: amaternoEntrenador,
                    telefono: telefono,
                    celular: celular,
                    numJugadores: numJugadores,
                    torneoSeleccionadoInput: torneoSeleccionado,
                    disciplinaSeleccionadaInput: disciplinaSeleccionada,
                    categoriaSeleccionadaInput: categoriaSeleccionada,
                    pruebaSeleccionadaInput: pruebaSeleccionada,
                    ramaSeleccionadaInput: ramaSeleccionada,
                    numFolio: numFolio,
                    claveInc: claveInc,
                    propuestaSwitch: propuestaSwitch,
                    horario: horariosContainer
                },
                success: function (response) {

                    realizarInscripcion(correoEntrenador, torneoSeleccionado, disciplinaSeleccionada, categoriaSeleccionada, pruebaSeleccionada, ramaSeleccionada, numJugadores, claveInc, numFolio, propuestaSwitch, horariosContainer);

                },
                error: function (error) {
                    // Manejar errores de la solicitud aquí
                    console.log("Error: " + error);
                }
            });
        }
        // Realizar la solicitud AJAX al servidor
    });
});
$(document).ready(function () {
    $("#button-addon3").click(function () {
        var correoEntrenador = $("#correoEntrenador").val();
        console.log(correoEntrenador);

        // Validar el formato del correo electrónico antes de enviar la solicitud AJAX
        if (!validateEmail(correoEntrenador)) {
            // Mostrar alerta de SweetAlert para indicar que el formato del correo electrónico no es válido
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'El formato del correo electrónico no es válido.'
            });
            // Deshabilitar los campos y detener la ejecución
            $("#confirmaCorreo").prop('disabled', true);
            $("#nombreEntrenador").prop('disabled', true);
            $("#apaternoEntrenador").prop('disabled', true);
            $("#amaternoEntrenador").prop('disabled', true);
            $("#telefono").prop('disabled', true);
            $("#celular").prop('disabled', true);
            return; // Detener la ejecución si el formato del correo no es válido
        }

        $.ajax({
            type: "POST",
            url: "../conexiones/registraEntrenador.php",
            data: { correoEntrenador: correoEntrenador },
            success: function (response) {
                var data = JSON.parse(response);
                console.log(response);
                if (data.success) {
                    if (data.existe_entrenador) {
                        // El entrenador existe, rellenar los campos del formulario
                        $("#confirmaCorreo").val(data.datos_entrenador['correoEntrenador']);
                        $("#nombreEntrenador").val(data.datos_entrenador['nomEntrenador']);
                        $("#apaternoEntrenador").val(data.datos_entrenador['primerApellido']);
                        $("#amaternoEntrenador").val(data.datos_entrenador['segundoApellido']);
                        $("#telefono").val(data.datos_entrenador['telefono']);
                        $("#celular").val(data.datos_entrenador['celular']);
                        // Habilitar los campos
                        habilitarCampos();
                        // Habilitar el botón de editar y deshabilitar el de guardar
                        $("#editarEntrenador").prop('disabled', false);
                        $("#editarEntrenador").attr('hidden', false);
                        //$("#guardar").prop('disabled', true).hide();
                        $("#guardar").attr('hidden', true);
                    } else {
                        // El entrenador no existe, limpiar los campos del formulario
                        limpiaCampos();
                        // Habilitar el botón de guardar y deshabilitar el de editar
                        $("#editarEntrenador").attr('hidden', true)
                        $("#guardar").attr('hidden', false)
                    }
                } else {
                    // El entrenador no existe, limpiar los campos del formulario
                    limpiaCampos();
                    // Mostrar alerta de SweetAlert
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Usted no está registrado aún, Regístrese.'
                    });
                    // Habilitar los campos
                    habilitarCampos();
                    $("#editarEntrenador").attr('hidden', true)
                    $("#guardar").attr('hidden', false)
                }
            },
            error: function (xhr, status, error) {
                console.error("Error al realizar la solicitud:", error);
                alert("Error al verificar el correo del entrenador. Consulta la consola para más detalles.");
            }
        });
    });

    // Función para validar el formato del correo electrónico
    function validateEmail(email) {
        var re = /\S+@\S+\.\S+/;
        return re.test(email);
    }

    // Función para habilitar los campos
    function habilitarCampos() {
        $("#confirmaCorreo").prop('disabled', false);
        $("#nombreEntrenador").prop('disabled', false);
        $("#apaternoEntrenador").prop('disabled', false);
        $("#amaternoEntrenador").prop('disabled', false);
        $("#telefono").prop('disabled', false);
        $("#celular").prop('disabled', false);
    }
});



$(document).ready(function () {

    // Manejar clic en el botón de buscar correo
    $('#button-addon3').click(function () {
        var correoEntrenador = $("#correoEntrenador").val();
        if (correoEntrenador === '') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Debe ingresar un correo electronico.',
            });
        } else {
            // Habilitar los campos
            $('#confirmaCorreo').prop('readonly', false);
            $('#nombreEntrenador').prop('readonly', false);
            $('#apaternoEntrenador').prop('readonly', false);
            $('#amaternoEntrenador').prop('readonly', false);
            $('#telefono').prop('readonly', false);
            $('#celular').prop('readonly', false);
        }

    });
});


//edita los datos del entrenador y genera una nueva inscripcion
$(document).ready(function () {
    $("#editarEntrenador").click(function () {
        // Obtener los valores del formulario
        var correoEntrenador = $("#correoEntrenador").val();
        var confirmaCorreo = $("#confirmaCorreo").val();
        var nombreEntrenador = $("#nombreEntrenador").val();
        var apaternoEntrenador = $("#apaternoEntrenador").val();
        var amaternoEntrenador = $("#amaternoEntrenador").val();
        var telefono = $("#telefono").val();
        var celular = $("#celular").val();

        // Asignar un valor a numJugadores, por ejemplo, desde algún campo del formulario
        var numJugadores = $("#numParticipantes").val();
        var torneoSeleccionado = $("#torneos").val();
        var disciplinaSeleccionada = $("#disciplinas").val();
        var categoriaSeleccionada = $("#categorias").val();
        var pruebaSeleccionada = $("#pruebas").val();
        var ramaSeleccionada = $('#ram').val();
        var numFolio = $("#numFolio").val();
        var claveInc = $("#claveInc").val();
        var propuestaSwitch = $("#propuestaSwitch").is(":checked") ? "Si" : "No";
        var horariosContainer = $("#horarios").val();


        // Validar que los correos electrónicos coincidan
        if (correoEntrenador !== confirmaCorreo) {
            // Mostrar alerta de SweetAlert
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Los correos electrónicos no coinciden. Por favor, verifique.'
            });
            return; // Detener la ejecución si los correos no coinciden
        }
        if (!correoEntrenador || !confirmaCorreo || !nombreEntrenador || !apaternoEntrenador || !amaternoEntrenador || !telefono || !celular) {
            // Muestra la notificación de error de SweetAlert si faltan campos
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Debes completar todos los campos.',
            });
        } else {
            // Realizar la solicitud AJAX al servidor
            $.ajax({
                type: "POST",
                url: "../conexiones/editaEntrenador.php", // Reemplaza con la ruta correcta a tu script PHP
                data: {
                    correoEntrenador: correoEntrenador,
                    confirmaCorreo: confirmaCorreo,
                    nombreEntrenador: nombreEntrenador,
                    apaternoEntrenador: apaternoEntrenador,
                    amaternoEntrenador: amaternoEntrenador,
                    telefono: telefono,
                    celular: celular,
                    numJugadores: numJugadores,
                    torneoSeleccionadoInput: torneoSeleccionado,
                    disciplinaSeleccionadaInput: disciplinaSeleccionada,
                    categoriaSeleccionadaInput: categoriaSeleccionada,
                    pruebaSeleccionadaInput: pruebaSeleccionada,
                    ramaSeleccionadaInput: ramaSeleccionada,
                    numFolio: numFolio,
                    claveInc: claveInc,
                    propuestaSwitch: propuestaSwitch,
                    horario: horariosContainer

                },
                success: function (response) {
                    // Manejar la respuesta del servidor aquí
                    console.log(response);
                    // Acceder a la propuestaSede
                    realizarInscripcion(correoEntrenador, torneoSeleccionado, disciplinaSeleccionada, categoriaSeleccionada, pruebaSeleccionada, ramaSeleccionada, numJugadores, claveInc, numFolio, propuestaSwitch, horariosContainer);

                },
                error: function (error) {
                    // Manejar errores de la solicitud aquí
                    console.log("Error: " + error);
                }
            });
        }


    });
});


// Función para realizar la inserción en la tabla de inscripciones
function realizarInscripcion(correoEntrenador, torneoSeleccionado, disciplinaSeleccionada, categoriaSeleccionada, pruebaSeleccionada, ramaSeleccionada, numJugadores, claveInc, numFolio, propuestaSwitch, horariosContainer) {
    console.log("Datos a enviar:", {
        correoEntrenador: correoEntrenador,
        torneoSeleccionadoInput: torneoSeleccionado,
        disciplinaSeleccionadaInput: disciplinaSeleccionada,
        categoriaSeleccionadaInput: categoriaSeleccionada,
        pruebaSeleccionadaInput: pruebaSeleccionada,
        ramaSeleccionadaInput: ramaSeleccionada,
        numParticipantes: numJugadores,
        claveInc: claveInc,
        propuestaSwitch: propuestaSwitch,
        numFolio: numFolio,
        horario: horariosContainer
    });

    $.ajax({
        type: "POST",
        url: "../conexiones/inscripcion.php",
        data: {
            correoEntrenador: correoEntrenador,
            torneoSeleccionadoInput: torneoSeleccionado,
            disciplinaSeleccionadaInput: disciplinaSeleccionada,
            categoriaSeleccionadaInput: categoriaSeleccionada,
            pruebaSeleccionadaInput: pruebaSeleccionada,
            ramaSeleccionadaInput: ramaSeleccionada,
            numParticipantes: numJugadores,
            claveInc: claveInc,
            propuestaSwitch: propuestaSwitch,
            numFolio: numFolio,
            horario: horariosContainer
        },
        success: function (inscripcionResponse) {
            try {
                // Intenta parsear la respuesta JSON
                var response = JSON.parse(inscripcionResponse);

                if (response.success) {
                    // Notificación de éxito con SweetAlert
                    Swal.fire({
                        icon: 'success',
                        title: 'Inscripción realizada con éxito',
                        text: 'Tu número de cédula es: ' + response.idInscripcion,
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        // Redireccionar a la página correspondiente después de hacer clic en OK
                        window.location.href = "../Admin/index.php";
                    });
                } else {
                    // Si la respuesta indica que hubo un error, mostrar el mensaje de error en un SweetAlert
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'El formato del correo electrónico no es válido.'
                    });
                }
            } catch (e) {
                // Si hay un error al parsear la respuesta JSON
                console.error("Error al parsear la respuesta JSON:", e);
                console.log("Respuesta sin procesar:", inscripcionResponse); // Agrega esta línea
            }
        },
        error: function (inscripcionError) {
            console.log("Error en la solicitud de inscripción: " + inscripcionError);
            alert("Error al realizar la inscripción. Consulta la consola para más detalles.");
        }
    });
}

function limpiaCampos() {
    $("#confirmaCorreo").val('');
    $("#nombreEntrenador").val('');
    $("#apaternoEntrenador").val('');
    $("#amaternoEntrenador").val('');
    $("#telefono").val('');
    $("#celular").val('');
}
