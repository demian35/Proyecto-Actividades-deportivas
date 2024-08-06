//script para enviar los datos de la edicion del estatus
$(document).ready(function(){
    $('#editarButtonCedula').on('click',function(e){
        e.preventDefault();

        //obtenemos los datos del formulario
        var idInscripcion=obtenerIdInscripcion();
        var estatusCedula=$('#newEstatus').val();

           // Mostrar los datos que se están enviando en la consola para verificar
           console.log("ID Inscripcion: ", idInscripcion);
           console.log("Estatus: ", estatusCedula);

           //realizamos la solicitud ajax
           $.ajax({
            type:'POST',
            url:'../conexiones/editaEstatusCedula.php',
            data:{
                idInscripcion:idInscripcion,
                estatusInscripcion: estatusCedula
            },
            success:function(response){
                console.log(response);
                //notificacion de exito de sweetAlert
                Swal.fire({
                    icon: 'success',
                    title: 'Estatus Actualizado',
                    showConfirmButton: false,
                    timer: 2500
                }).then(function () {
                    // Recargar la página u otra acción necesaria después de eliminar el torneo
                    location.reload();
                });
                //cerramos el modal de la edicion
                $('#editaEstatusModal').modal('hide');

            },
            error: function(error){
                console.log('Error en la solicitud ajax', error);
                Swal.fire({
                    icon: 'error',
                    title: 'Error en la solicitud',
                    text: 'Ha ocurrido un error al realizar la solicitud.',
                    timer: 2500
                });
            }
           })

    })



    function obtenerIdInscripcion() {
        var cedulaData = $('#editaEstatusModal').data('cedula');
        return cedulaData.idInscripcion;
    }

    //asignamos la cedula al hacer click en el boton edita estatus
    $(document).on('click','.editaEstatus',function(){
        var cedulaData=$(this).data('cedula');
        console.log(cedulaData);//verifica el objeto cedulaData

        //asigna los datos de la cedula al modal
        $('#editaEstatusModal').data('cedula',cedulaData);
        $('#newEstatus').val(cedulaData.estatusInscripcion);
    })

})