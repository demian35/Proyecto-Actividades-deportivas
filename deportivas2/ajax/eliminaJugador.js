$(document).ready(function () {
    $(document).on('click', '.deletePlayer', function () {
        var jugador = $(this).data('jugador');
        console.log(jugador);
        //verificamos que el jugador exista
        if (jugador && jugador.idJugador) {
            var idJugador = jugador.idJugador;
            console.log(idJugador);
            // Mostrar cuadro de diálogo de confirmación antes de eliminar al jugador
            Swal.fire({
                title: "¿Está seguro de eliminar a este jugador?",
                text: "Esta acción no se puede deshacer.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Eliminar Jugador"
            }).then((result) => {
                if (result.isConfirmed) {
                    // Si el usuario confirma, enviar la solicitud de eliminación al servidor
                    $.ajax({
                        type: 'POST',
                        url: '../conexiones/eliminaJugador.php',
                        data: {
                            idJugador: idJugador
                        },
                        dataType: 'json',
                        success: function (response) {
                            if (response.success) {
                                // Mostrar mensaje de éxito
                                Swal.fire({
                                    title: "Jugador Eliminado!",
                                    text: "El jugador ha sido dado de baja con éxito.",
                                    icon: "success"
                                }).then(function () {
                                    // Recargar la página u otra acción necesaria después de eliminar el jugador
                                    location.reload();
                                });
                            } else {
                                // Mostrar mensaje de error con SweetAlert
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: response.message
                                });
                            }
                        },
                        error: function (xhr, status, error) {
                            // Mostrar mensaje de error genérico con SweetAlert
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Error al eliminar el jugador. Por favor, inténtalo de nuevo.'
                            });
                            console.log("Error en la solicitud AJAX:");
                            console.log("Estado: " + status);
                            console.log("Error: " + error);
                            console.log("Respuesta del servidor:");
                            console.log(xhr.responseText);
                        }
                    });
                }
            });
        } else {
            console.error('No se pudo obtener el ID del jugador');
        }
    });
});
