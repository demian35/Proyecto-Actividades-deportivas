$(document).ready(function () {
    $(document).on('click', '.bajaCedula', function () {
        var cedula = $(this).data('cedula');
        console.log(cedula);

        if (cedula && cedula.idInscripcion) {
            var idInscripcion = cedula.idInscripcion;
            console.log(idInscripcion);

            // Mostrar un mensaje de confirmación antes de eliminar
            Swal.fire({
                title: '¿Está seguro?',
                text: "¿Está seguro de que desea eliminar esta cédula?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminar cédula',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Solicitud AJAX para dar de baja la cédula
                    $.ajax({
                        type: 'POST',
                        url: '../conexiones/eliminaCedula.php',
                        data: { idInscripcion: idInscripcion },
                        dataType: 'json',
                        success: function (response) {
                            if (response.success) {
                                // Mostrar un mensaje de éxito
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Cédula dada de baja con éxito',
                                    text: response.message
                                }).then(function () {
                                    // Recargar la página u otra acción necesaria después de eliminar la cédula
                                    location.reload();
                                });
                            } else {
                                // Mostrar un mensaje de error con la respuesta del servidor
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
                                text: 'Error al eliminar la cédula. Por favor, inténtalo de nuevo.'
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
            console.error('No se pudo obtener el ID de la cédula.');
        }
    });
});
