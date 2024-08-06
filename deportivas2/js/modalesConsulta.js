$(document).ready(function() { //funcion para mostrar modal consulta torneo
    $(document).on("click", ".readTorneo", function() {
        var torneo = $(this).data("torneo");

        if (torneo !== undefined && torneo !== null) {
            // Rellena el contenido del modal con los detalles del torneo
            $("#detalleTorneoID").text("ID: " + torneo.idTorneo);
            $("#detalleTorneoNombre").text("Nombre: " + torneo.nomTorneo);
            $("#detalleTorneoEslogan").text("Eslogan: " + torneo.eslogan);
            $("#detalleTorneoVigencia").text("Vigencia: " + torneo.vigencia);

            // Muestra el modal de detalles del torneo sin cerrar el fondo
            $("#detalleTorneoModal").modal("show");
        } else {
            console.error("El atributo 'data-torneo-info' es indefinido o nulo.");
        }
    });
});

//funcion para mostrar modal de  consulta de disciplinas
$(document).ready(function() {
    $(document).on("click", ".btn-consultar-Disciplina", function() {
        var disciplina = $(this).data("disciplina");

        if (disciplina !== undefined && disciplina !== null) {
            // Rellena el contenido del modal con los detalles de la disciplina
            $("#detalleDiciplinaID").text("ID: " + disciplina.idDisciplina);
            $("#detalleDisciplinaNombre").text("Nombre: " + disciplina.nomDisciplina);
            $("#detalleminimoJugadores").text("Mínimo de jugadores: " + disciplina.numMinJugador);
            $("#detallemaximoJugadores").text("Máximo de jugadores: " + disciplina.numMaxJugador);

            // Muestra el modal de detalles de la disciplina sin cerrar el fondo
            $("#detalleDisciplinaModal").modal("show");
        } else {
            console.error("El atributo 'data-disciplina' es indefinido o nulo.");
        }
    });
});

//funcion para mostrar modal de  consulta de categorias
$(document).ready(function() {
    $(document).on("click", ".readCategoria", function() {
        var categoria = $(this).data("categoria");

        if (categoria !== undefined && categoria !== null) {
            // Rellena el contenido del modal con los detalles de la disciplina
            $("#detalleCategoriaID").text("ID: " + categoria.idCategoria);
            $("#detalleCategoriaNombre").text("Nombre: " + categoria.nomCategoria);

            // Muestra el modal de detalles de la disciplina sin cerrar el fondo
            $("#detalleCategoriaModal").modal("show");
        } else {
            console.error("El atributo 'data-Categoria' es indefinido o nulo.");
        }
    });
});



//funcion para mostrar modal de  consulta de pruebas
$(document).ready(function() {
    $(document).on("click", ".readPrueba", function() {
        var prueba = $(this).data("prueba");

        if (prueba !== undefined && prueba !== null) {
            // Rellena el contenido del modal con los detalles de la disciplina
            $("#detallePruebaID").text("ID: " + prueba.idPrueba);
            $("#detallePruebaNombre").text("Nombre: " + prueba.nomPrueba);

            // Muestra el modal de detalles de la disciplina sin cerrar el fondo
            $("#detallepruebaModal").modal("show");
        } else {
            console.error("El atributo 'data-prueba' es indefinido o nulo.");
        }
    });
});


//funcion para mostrar modal consulta eventos
$(document).ready(function(){
    $(document).on("click",".readEvento", function(){
        var evento =$(this).data("evento");
        console.log(evento);

        if(evento!==undefined && evento !==null ){
            //mostramos los datos de la fila en el modal
            $("#detalleEventoID").text("ID: " + evento.idTorneo);
            $("#detalleNombreEvento").text("Evento: " + evento.nomTorneo);
            $("#detalleNombreDisciplina").text("Disciplina: " + evento.nomDisciplina);
            $("#detalleNombrePrueba").text("Prueba: " + evento.nomPrueba);
            $("#detalleNombreCategoria").text("Categoría: " + evento.nomCategoria);
            $("#detalleRama").text("Rama: " + evento.rama);
            $("#detalleFechaInicio").text("Incio del torneo: " + evento.fechaInicio);
            $("#detalleFechaFin").text("Fin del torneo: " + evento.fechaFin);
            $("#detalleFechaInicioInsc").text("Inicio de las inscripciones: " + evento.fechaInicioIns);
            $("#detalleFechaFinInsc").text("Fin de las inscricpiones: " + evento.fechaFinIns);


            
            $("#detalleEventoModal").modal("show")
        }else{
            console.error("El atributo 'data-evento' es indefinido o nulo.");
        }
    })
})

$(document).ready(function(){
    $(document).on("click",".readCedula",function(){
        var cedula=$(this).data("cedula");
        console.log(cedula);
        if(cedula!==undefined && cedula !==null){
            //mostramos los datos en la fila del modal
            $("#detallecedulaInscripcion").text("Número de cedula: " +cedula.idInscripcion);
            $("#detallestatus").text("Estatus del torneo: " +cedula.estatusInscripcion);
            $("#detalleTorneo").text("Torneo: " +cedula.nomTorneo);
            $("#detalleNombreDisciplina").text("Disciplina: " +cedula.nomDisciplina);
            $("#detalleNombrePrueba").text("Prueba: " +cedula.nomPrueba);
            $("#detalleNombreCategoria").text("Categoría: " +cedula.nomCategoria);
            $("#detalleRama").text("Rama: " +cedula.rama);
            $("#detallenumParticipantes").text("Número de participantes: " +cedula.num_participantes);
            $("#detalleSede").text("Sede: " +cedula.sede);
            $("#detalleclavePlantel").text("Numero de cedula: " +cedula.ptl_ptl);
            $("#detallefolioPago").text("Folio de pago: " +cedula.idFolioPago);
            $("#detalleCorreo").text("Email entrenador: " +cedula.correoEntrenador);


        }
    })
})

$(document).ready(function(){
    $(document).on("click",".readPlayer",function(){
        var jugador=$(this).data("jugador");
        console.log(jugador);
        if(jugador!==undefined && jugador!==null){
             // Actualizar el contenido del cuerpo del modal con los datos del jugador
             $('#consultaJugadorModal').find('#nombreCompleto').text(jugador.nombre.a_nom + ' ' + jugador.nombre.a_pat + ' ' + jugador.nombre.a_mat);
            $('#consultaJugadorModal').find('#a_exp').text('Número de expediente: ' + jugador.a_exp);
            $('#consultaJugadorModal').find('#idJugador').text('ID del jugador: ' + jugador.idJugador);
            // Mostrar el modal
            $('#consultaJugadorModal').modal('show');
        }
    })
})
