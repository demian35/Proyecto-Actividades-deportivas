
$(document).ready(function() {
    // Obtén referencias a los elementos del formulario
    var disciplinasSelect = $('#disciplinas');
    var pruebasSelect = $('#pruebas');
    var categoriasSelect = $('#categorias');
    var ramSelect = $('#ram');
    var numPlayersInput = $('#numParticipantes');
    var siguienteBtn = $('#sigTorneo');

    // Agrega un evento al cambio en la selección de disciplinas
    disciplinasSelect.on('change', validarFormulario);
    pruebasSelect.on('change', validarFormulario);
    categoriasSelect.on('change', validarFormulario);
    ramSelect.on('change', validarFormulario);
    numPlayersInput.on('input', validarFormulario);

    function validarFormulario() {
        // Verifica si hay algún select con el valor "<option value="0">Elige una opción</option>"
        var haySelectInvalido =
            disciplinasSelect.val() === '0' ||
            pruebasSelect.val() === '0' ||
            categoriasSelect.val() === '0' ||
            ramSelect.val() === '0';

        // Habilita o deshabilita el botón "Siguiente" según la validación
        siguienteBtn.prop('disabled', haySelectInvalido || numPlayersInput.val() === '');
    }
});
