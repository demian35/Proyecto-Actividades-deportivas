$(document).ready(function(){
    $(document).on('click','.deleteTorneo',function(){
        var torneo=$(this).data('torneo');
        console.log(torneo);

        //verificamos si los datos existen
        if(torneo && torneo.idTorneo){
            //obtenemos el torneo
            var idTorneo=torneo.idTorneo;
            console.log(idTorneo);
            $.ajax({
                type: 'POST',
                url: '../conexiones/eliminaCatalogo.php',
                data: { idTorneo: idTorneo },
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
                        text: 'Error al eliminar el torneo. Por favor, inténtalo de nuevo.'
                    });
                    console.log("Error en la solicitud AJAX:");
                    console.log("Estado: " + status);
                    console.log("Error: " + error);
                    console.log("Respuesta del servidor:");
                    console.log(xhr.responseText);
                }
            });
        }else{
            console.error('No se pudo obtener el ID del torneo.'); 
        }
    })
})