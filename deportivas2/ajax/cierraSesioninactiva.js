// JavaScript para detectar la inactividad del usuario
var inactivityTimeout = 30 * 60 * 1000; // 30 minutos de inactividad
var logoutUrl = '../conexiones/cierraSesion.php'; // URL para cerrar sesión

var inactivityTimer;

function resetInactivityTimer() {
    clearTimeout(inactivityTimer);
    inactivityTimer = setTimeout(logout, inactivityTimeout);
}

function logout() {
    // Realizar una solicitud AJAX para cerrar sesión
    $.ajax({
        type: 'GET',
        url: logoutUrl,
        success: function(response) {
            // Redirigir a la página de inicio de sesión u otra página
            window.location.href = "../Registro/nuevoRegistro.php"// Si deseas redirigir a una página después de cerrar sesión
        },
        error: function(xhr, status, error) {
            console.error('Error al cerrar sesión:', error);
        }
    });
}

// Restablecer el temporizador de inactividad en eventos que indican actividad del usuario
$(document).on('mousemove keydown', function() {
    resetInactivityTimer();
});

// Iniciar el temporizador de inactividad al cargar la página
$(document).ready(function() {
    resetInactivityTimer();
});
