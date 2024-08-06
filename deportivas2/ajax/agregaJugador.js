$(document).ready(function(){
    
    // Manejo del evento click para el botón de guardar 
    $('#buttonRegistraJugador').on('click', function(e){
        e.preventDefault();
    
        var idInscripcion = $("#idinscripcion").val();
        var expediente = $("#expJugador").val();
        var ptl_ptl = $("#ptl_ptl").val();
        

        // Verificar si el número de expediente está vacío
        if($.trim(expediente)===""){
             // Mostrar una notificación de campo vacío
             Swal.fire({
                icon: 'warning',
                title: 'Campo vacío',
                text: 'Por favor, ingresa el número de expediente.'
            });
            return; // Salir de la función
        }

        // Enviamos los datos con AJAX
        $.ajax({
            type: 'POST',
            url: '../conexiones/agregaJugador.php',
            data: {
                idinscripcion: idInscripcion,
                expediente: expediente,
                ptl_ptl: ptl_ptl
            },
            success: function(response){
                console.log(response); // Verifica la respuesta en la consola

                // Manejar las respuestas del servidor
                if (response.trim() === "success") {
                    // Si el jugador se registra correctamente
                    Swal.fire({
                        icon: 'success',
                        title: 'Jugador Registrado',
                        showConfirmButton: false,
                        timer: 2500
                    }).then(function () {
                        location.reload(); // Recargar la página
                         // Aquí quitamos el atributo disabled del botón
                    });
                } else if (response === "El alumno no esta vigente o no pertenece a su plantel") {
                    // Si el número de expediente no coincide con el plantel
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: response
                    });
                } else if (response === "El jugador ya está registrado") {
                    // Si el jugador ya está registrado
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: response
                    });
                } else {
                    // Si hay otro error al registrar al jugador
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: response
                    });
                }
            },
            error: function(xhr, status, error){
                // Si hay un error en la solicitud AJAX
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Error al registrar al jugador. ' + error
                });
            }
        });
    });
});

 // Agrega un controlador de eventos para el campo de entrada
 document.getElementById("expJugador").addEventListener("input", function(e) {
    console.log('Evento de entrada de expJugador');
    // Elimina caracteres no numéricos y asegura que tenga un máximo de 5 dígitos
    this.value = this.value.replace(/[^0-9]/g, "").slice(0, 9);
});
