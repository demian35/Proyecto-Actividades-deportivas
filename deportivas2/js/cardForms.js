$(document).ready(function () {
    // Asocia eventos de clic a cada botón del grupo
    $(".btn-group .btn").click(function () {
        var idFormulario = $(this).data("formulario");
        mostrarFormulario(idFormulario);
    });

    // Función para mostrar el formulario correspondiente
    function mostrarFormulario(idFormulario) {
        // Oculta todos los formularios
        $(".formulario").hide();

        // Muestra el formulario especificado
        $("#" + idFormulario).show();
    }

    // Muestra automáticamente el formulario de Torneos al cargar la página
    mostrarFormulario("formularioTorneo");
});
