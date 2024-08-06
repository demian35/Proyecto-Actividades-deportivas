$(document).ready(function () {
    // Inicialmente, muestra el formulario de "Folio de Pago" y oculta los demás
    $("#formularioFolio").show();
    $("#formularioEscuela, #formularioRegTorneo,#formularioEntrenador").hide();

    // Escucha el clic en los enlaces del navbar
    $(".navbar-nav a").click(function (event) {
        event.preventDefault(); // Evitar la acción predeterminada del enlace
        var targetFormId = $(this).attr("href"); // Obtener el ID del formulario al que se quiere navegar
        mostrarFormulario(targetFormId);
    });

    // Botones de "Siguiente" en cada formulario
    $("#sigFolio").click(function () {
        mostrarFormulario("#formularioEscuela");
    });

    $("#sigEscuela").click(function () {
        mostrarFormulario("#formularioRegTorneo");
    });

    $("#sigTorneo").click(function () {
        mostrarFormulario("#formularioEntrenador");
    });

    // Botones de "Atras" en cada formulario
    $("#backEscuela").click(function () {
        mostrarFormulario("#formularioFolio");
    });

    $("#backTorneo").click(function () {
        mostrarFormulario("#formularioEscuela");
    });

    $("#backEntrenador").click(function () {
        mostrarFormulario("#formularioRegTorneo");
    });

    // Función para mostrar el formulario deseado
    function mostrarFormulario(formularioId) {
        // Oculta todos los formularios
        $("#formularioFolio, #formularioEscuela, #formularioRegTorneo,#formularioEntrenador").hide();
        // Muestra el formulario correspondiente
        $(formularioId).show();
    }
});

// JavaScript para manejar el clic en el enlace
document.getElementById("linkForminiciarSesion").addEventListener("click", function(event) {
    // Prevenir el comportamiento predeterminado del enlace
    event.preventDefault();
    // Redirigir a la página deseada
    window.location.href = "../login/login.php";
});
