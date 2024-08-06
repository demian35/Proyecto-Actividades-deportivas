$(document).ready(function(){
    $(document).on('click','.deletePrueba',function(){
        var prueba =$(this).data('prueba');
        console.log(prueba);
        if(prueba && prueba.idPrueba){
            var idPrueba=prueba.idPrueba;
            console.log(idPrueba);
            //solicitud ajax para enviar los datos al servidor
            $.ajax({
                type: 'POST',
                url: '../conexiones/eliminaPrueba.php',
                data: { idPrueba: idPrueba },
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
                error:function(xhr,status,error){
                    //mostrar mensaje de error genereico con sweetAlert
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Error al eliminar la Prueba. Por favor, inténtalo de nuevo.'
                    });
                    console.log("Error en la solicitud AJAX:");
                    console.log("Estado: " + status);
                    console.log("Error: " + error);
                    console.log("Respuesta del servidor:");
                    console.log(xhr.responseText);
                }
            });
        }else{
            console.error("No se pudo obtener la prueba");
        }
    })
})