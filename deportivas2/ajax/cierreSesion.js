


document.getElementById('continuarRegistro').addEventListener('click', function (event) {
    event.preventDefault(); // Prevenir la acción predeterminada del enlace
    
    // Realizar una solicitud Ajax para cerrar la sesión
    $.ajax({
        type: 'POST',
        url: 'cerrarSesion.php', // Nombre del archivo que contendrá la lógica para cerrar la sesión
        dataType: 'json',
        success: function (response) {
            if (response.success) {
                // Redirigir a la página de inicio de sesión u otra página deseada
                window.location.href = '../Registro/nuevoRegistro.php';
            } else {
                // Manejar el caso en que no se pueda cerrar la sesión
                alert('Error al cerrar la sesión');
            }
        },
        error: function () {
            // Manejar errores de la solicitud Ajax
            alert('Error en la solicitud Ajax');
        }
    });
});