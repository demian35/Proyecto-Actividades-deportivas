//validaDisciplina
$(document).ready(function () {
    $('#torneos').on('change', function () {
        var torneoSeleccionado = $(this).val();
        
        

        // Realizar una solicitud AJAX al servidor
        $.ajax({
            type: 'POST',
            url: '../conexiones/datosDisciplinas.php',
            data: { torneos: torneoSeleccionado },
            dataType: 'json',
            success: function (disciplinasOptions) {
                // Actualizar el select de disciplinas con la respuesta del servidor
                var disciplinasSelect = $('#disciplinas');
                disciplinasSelect.empty().append('<option value="0">Elige una opción</option>');

                $.each(disciplinasOptions, function (index, disciplina) {
                    disciplinasSelect.append('<option value="' + disciplina.idDisciplina + '">' + disciplina.nomDisciplina + '</option>');
                });
            },
            error: function (xhr, status, error) {
                console.error('Error en la solicitud AJAX:', status, error);
            }
        });
    });
});

//validaPrueba
$(document).ready(function () {
    $('#disciplinas').on('change', function () {
        var disciplinaSeleccionada = $(this).val();
        var torneoSeleccionado = $('#torneos').val();
        

        // Realizar una solicitud AJAX al servidor
        $.ajax({
            type: 'POST',
            url: '../conexiones/datosPruebas.php',
            data: { torneos: torneoSeleccionado, disciplinas: disciplinaSeleccionada },
            dataType: 'json',
            success: function (pruebasOptions) {
                // Actualizar el select de pruebas con la respuesta del servidor
                var pruebasSelect = $('#pruebas');
                pruebasSelect.empty().append('<option value="0">Elige una opción</option>');

                if (pruebasOptions.length > 0) {
                    $.each(pruebasOptions, function (index, prueba) {
                        pruebasSelect.append('<option value="' + prueba.idPrueba + '">' + prueba.nomPrueba + '</option>');
                    });
                } else {
                    console.log('No hay pruebas disponibles para la disciplina y torneo seleccionados.');
                }
            },
            error: function (xhr, status, error) {
                console.error('Error en la solicitud AJAX:', status, error);
            }
        });
    });
});


//validaCategoria
$(document).ready(function() {
    $('#pruebas').on('change', function() {
        var torneoSeleccionado = $('#torneos').val();
        var disciplinaSeleccionada = $('#disciplinas').val();
        var pruebaSeleccionada = $(this).val();
       

        // Realizar una solicitud AJAX al servidor
        $.ajax({
            type: 'POST',
            url: '../conexiones/datosCategorias.php',
            data: {
                torneos: torneoSeleccionado,
                disciplinas: disciplinaSeleccionada,
                pruebas: pruebaSeleccionada
            },
            dataType: 'json',
            success: function(categoriasOptions) {
                // Actualizar el select de categorías con la respuesta del servidor
                var categoriasSelect = $('#categorias');
                categoriasSelect.empty().append('<option value="0">Elige una opción</option>');

                $.each(categoriasOptions, function(index, categoria) {
                    categoriasSelect.append('<option value="' + categoria.idCategoria + '">' + categoria.nomCategoria + '</option>');
                });
            },
            error: function(xhr, status, error) {
                console.error('Error en la solicitud AJAX:', status, error);
            }
        });
    });
});


//valida Ramas
$(document).ready(function() {
    // Evento que se activa cuando cambia la opción en el select de "Torneos", "Disciplinas", "Pruebas" o "Categorías"
    $('#torneos, #disciplinas, #pruebas, #categorias').on('change', function() {
        // Obtén los valores seleccionados en los otros selects
        var idTorneo = $('#torneos').val();
        var idDisciplina = $('#disciplinas').val();
        var idPrueba = $('#pruebas').val();
        var idCategoria = $('#categorias').val();


        // Realiza una solicitud AJAX al servidor para obtener las ramas actualizadas
        $.ajax({
            type: 'POST',
            url: '../conexiones/datosRamas.php', // Ajusta la ruta de acuerdo a tu estructura de archivos
            data: {
                torneos: idTorneo,
                disciplinas: idDisciplina,
                pruebas: idPrueba,
                categorias: idCategoria
            },
            dataType: 'json',
            success: function(data) {
                // Limpiar el select de "Rama" antes de agregar nuevas opciones
                $('#ram').empty();

                // Agregar la opción predeterminada
                $('#ram').append('<option value="0">Elige una opción</option>');

                // Agregar las nuevas opciones de "Rama" según la respuesta del servidor
                $.each(data, function(index, value) {
                    $('#ram').append('<option value="' + value.rama + '">' + value.rama + '</option>');
                });
            },
            error: function(error) {
                // Manejar errores de la solicitud AJAX, si es necesario
                console.error('Error en la solicitud AJAX: ' + JSON.stringify(error));
            }
        });
    });
});

//valida participantes
document.addEventListener('DOMContentLoaded', function() {
    // Obtener referencias a los elementos del formulario
    var disciplinasSelect = document.getElementById('disciplinas');
    var numPlayersInput = document.getElementById('numParticipantes');

    // Agregar un evento al cambio en la selección de disciplinas
    disciplinasSelect.addEventListener('change', function() {
        // Obtener el valor seleccionado
        var disciplinaSeleccionada = disciplinasSelect.value;

        // Realizar una solicitud AJAX para obtener los límites desde el servidor
        $.ajax({
            url: '../conexiones/limiteJugadores.php',
            type: 'POST',
            dataType: 'json',
            data: {
                disciplinas: disciplinaSeleccionada
            },
            success: function(data) {
                // Establecer límites predeterminados (6 y 12)
                var minPlayers = 6;
                var maxPlayers = 12;
                // Actualizar los límites según los datos recibidos
                numPlayersInput.setAttribute('min', data.numMinJugador);
                numPlayersInput.setAttribute('max', data.numMaxJugador);
                console.log('Respuesta del servidor:', data);

                // Asegurarse de que el valor actual esté dentro del nuevo rango
                var valorActual = parseInt(numPlayersInput.value);
                if (valorActual < data.numMinJugador) {
                    numPlayersInput.value = data.numMinJugador;
                } else if (valorActual > data.numMaxJugador) {
                    numPlayersInput.value = data.numMaxJugador;
                }
            },
            error: function(xhr, status, error) {
                console.error('Error al obtener los límites de jugadores.');
                console.error('Error al obtener los límites de jugadores:', status, error);
                console.log('Respuesta del servidor:', xhr.responseText);
            }
        });
    });

});
