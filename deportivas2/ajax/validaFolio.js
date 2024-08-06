$(document).ready(function () {
    //controlador de eventos para el campo de entrada
    $('#numFolio').on('input', function () {
        var numFolio = $(this).val();

        // Si la longitud del valor del campo es 0 o menos, deshabilitar el botón "Siguiente"
        if (numFolio.length <= 5) {
            $('#sigFolio').prop('disabled', true);
            // Limpiar el nombre del plantel en el encabezado del card
            $('#folioValidofooter').text('');
        }
    });

    // Evento click para el botón "Validar Folio"
    $('#button-addon1').click(function () {
        var numFolio = $('#numFolio').val();
       
        if (!numFolio) {
            // Muestra la notificación de error de SweetAlert si faltan campos
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ingrese el folio porfavor.',
            });
        } else {
            $.ajax({
                type: 'POST',
                url: '../conexiones/validaFolioPago.php',
                data: {
                    numFolio: numFolio
                },
                success: function (response) {
                    if (response === "Folio Válido") {
                        $('#folioValidofooter').text(response).css("color", "#008f4c");
                        $('#sigFolio').prop('disabled', false);
                    } else if (response === "Folio no válido: El pago no ha sido finalizado") {
                        $('#folioValidofooter').text(response).css("color", "red");
                        $('#sigFolio').prop('disabled', true);
                    } else if (response === "Folio no válido: El folio no tiene el concepto de pago requerido") {
                        $('#folioValidofooter').text(response).css("color", "red");
                        $('#sigFolio').prop('disabled', true);
                    } else {
                        $('#folioValidofooter').text(response).css("color", "red");
                        $('#sigFolio').prop('disabled', true);
                    }
                },
                error: function (xhr, status, error) {
                    console.error('Error al enviar la solicitud AJAX: ' + status);
                }
            });
        }
    });
});

 // Agrega un controlador de eventos para el campo de entrada
 document.getElementById("numFolio").addEventListener("input", function(e) {
    console.log('Evento de entrada de expJugador');
    // Elimina caracteres no numéricos y asegura que tenga un máximo de 5 dígitos
    this.value = this.value.replace(/[^0-9]/g, "").slice(0, 12);
});

