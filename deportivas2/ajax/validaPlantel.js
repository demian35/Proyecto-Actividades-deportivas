$(document).ready(function () {

    // Controlador de eventos para el campo de entrada
    $('#claveInc').on('input', function () {
        var claveInc = $(this).val();

        // Si la longitud del valor del campo es 0 o menos, deshabilitar el botón "Siguiente"
        if (claveInc.length <= 4) {
            $('#sigEscuela').prop('disabled', true);
            // Limpiar el nombre del plantel en el encabezado del card
            $('#nombrePlantelHeader').text('');
        }
    });


    // Cuando se haga clic en el botón "Buscar"
    $('#button-addon2').on('click', function () {
        var claveInc = $('#claveInc').val();
        if (!claveInc) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ingrese la clave de incorporación de su plantel por favor.',
            });
        } else {
            // Realizar la solicitud AJAX al servidor
            $.ajax({
                url: '../conexiones/buscaPlantel.php',
                method: 'POST',
                dataType: 'json',
                data: { claveInc: claveInc },
                success: function (data) {
                    if (!data.error) {
                        // Clave válida, habilitar el botón "Siguiente"
                        $('#sigEscuela').prop('disabled', false);
                        // Mostrar el nombre del plantel en el pie de la tarjeta
                        $('#nombrePlantelHeader').text(data.nombrePlantel);
                    } else {
                        // Clave no válida, deshabilitar el botón "Siguiente"
                        $('#sigEscuela').prop('disabled', true);
                        // Mostrar mensaje de error en el pie de la tarjeta
                        $('#nombrePlantelHeader').text(data.error);
                    }
                },
                error: function (xhr, status, error) {
                    // Manejar errores en la solicitud AJAX
                    if (xhr.responseText === '') {
                        $('#fotterResultado').text('Este plantel no existe');
                    } else {
                        console.error('Error en la solicitud AJAX:', status, error);
                    }
                }
            });
        }

    });
});
