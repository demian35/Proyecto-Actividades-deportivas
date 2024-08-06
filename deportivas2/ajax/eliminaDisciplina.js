$(document).ready(function () {
    $(document).on('click', '.eliminar', function () {
        var disciplina = $(this).data('disciplina');
        console.log(disciplina);


        if (disciplina && disciplina.idDisciplina) {
            var idDisciplina = disciplina.idDisciplina;
            console.log(idDisciplina);
            $.ajax({
                type: 'POST',
                url: '../conexiones/eliminaDisciplina.php',
                data: { idDisciplina: idDisciplina },
                dataType: 'json',
                success: function (response) {
                    if (response.success) {
                        // Mostrar mensaje de éxito con SweetAlert
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
                        text: 'Error al eliminar la disciplina. Por favor, inténtalo de nuevo.'
                    });
                    console.log("Error en la solicitud AJAX:");
                    console.log("Estado: " + status);
                    console.log("Error: " + error);
                    console.log("Respuesta del servidor:");
                    console.log(xhr.responseText);
                }
            });
        } else {
            console.error('No se pudo obtener el ID de la disciplina.');
        }

    })
})