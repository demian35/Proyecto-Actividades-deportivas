$(document).ready(function () {
    $(document).on('click', '.deleteCategoria', function () {
        var categoria = $(this).data('categoria');
        console.log(categoria);

        //verificamos que se este recibiendo algo
        if (categoria && categoria.idCategoria) {
            var idCategoria = categoria.idCategoria;
            console.log(idCategoria);
            //solicitud ajax para enviar los datos al servidor
            $.ajax({
                type: 'POST',
                url: '../conexiones/eliminaCategoria.php',
                data: { idCategoria: idCategoria },
                dataType: 'json',
                success: function (response) {
                    if (response.success) {
                        //mostramos mensaje de exito con sweetAlert
                        Swal.fire({
                            icon: 'success',
                            title: 'Éxito',
                            text: response.message
                        }).then(function () {
                            // Recargar la página u otra acción necesaria después de eliminar el torneo
                            location.reload();
                        });
                    } else {
                        //Mostrar mensaje de error con SweetAlert
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
                        text: 'Error al eliminar la Categoria. Por favor, inténtalo de nuevo.'
                    });
                    console.log("Error en la solicitud AJAX:");
                    console.log("Estado: " + status);
                    console.log("Error: " + error);
                    console.log("Respuesta del servidor:");
                    console.log(xhr.responseText);
                }
            });
        } else {
            console.error("No se pudo obtener el Id de la categoria");
        }
    })
})