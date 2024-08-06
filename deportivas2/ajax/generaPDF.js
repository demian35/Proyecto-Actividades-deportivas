$(document).ready(function() {
    // Manejar clic en el botón "Finalizar Registro"
    $('#finalizarRegistroBtn').click(function() {
        // Realizar una solicitud AJAX para verificar el número de participantes antes de generar el PDF
        verificarParticipantes();
    });

    // Función para verificar el número de participantes
    function verificarParticipantes() {
        $.ajax({
            type: 'GET',
            url: '../Admin/generaPDF.php',
            success: function(response) {
                if (response === 'FALTAN PARTICIPANTES POR REGISTRAR') {
                    // Mostrar un mensaje de error específico para el caso de que falten participantes
                    mostrarMensajeError('Le faltan participantes por registrar');
                } else {
                    // Si no faltan participantes, continuar con la generación del PDF
                    generarPDF();
                }
            },
            error: function(xhr, status, error) {
                mostrarMensajeError('Error al verificar el número de participantes: ' + error);
            }
        });
    }

    // Función para generar el PDF
    function generarPDF() {
        $.ajax({
            type: 'GET',
            url: '../Admin/generaPDF.php',
            success: function(response) {
                // Abrir el PDF en una nueva ventana o pestaña
                window.open('generaPDF.php', '_blank');
                // Mostrar la notificación de éxito
                mostrarMensajeExito();
            },
            error: function(xhr, status, error) {
                mostrarMensajeError('Error al generar el PDF: ' + error);
            }
        });
    }

    // Función para mostrar un mensaje de error
    function mostrarMensajeError(mensaje) {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: mensaje,
            showConfirmButton: true,
            confirmButtonText: 'OK'
        });
    }

    // Función para mostrar un mensaje de éxito
    function mostrarMensajeExito() {
        Swal.fire({
            icon: 'success',
            title: 'PDF generado exitosamente',
            showConfirmButton: true,
            confirmButtonText: 'OK'
        }).then(function(result) {
            if (result.isConfirmed) {
                // Opcional: recargar la página después de cerrar la notificación de éxito
                 location.reload();
            }
        });
    }
});
