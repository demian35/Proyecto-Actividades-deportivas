$(document).ready(function () {
    $("#ButtonBuscarTorneo").click(function (event) {
        // Evitar que el formulario se envíe normalmente
        event.preventDefault();

        // Obtener datos del formulario
        var selectedTorneo = $("#eleccionTorneo").val();

        // Realizar la petición AJAX
        $.ajax({
            type: "POST",
            url: "../conexiones/editDatesTorneo.php", // Ruta al script PHP
            data: {
                buscarTorneo: true,
                eleccionTorneo: selectedTorneo
            },
            dataType: "json", // Esperar datos en formato JSON
            success: function (response) {
                if (response.success) {
                    console.log("Actualizando tabla con los resultados...");
                    // Actualizar la tabla con los resultados
                    actualizarTabla(response.resultados);
                    console.log("JSON recibido:", response);
                    console.log("Tabla actualizada correctamente.");
                } else {
                    // Manejar el error
                    console.log("Error al obtener resultados: ", response.error);
                }
            },
            error: function (error) {
                console.log("Error en la petición AJAX:", error);
            }
        });
    });

    function actualizarTabla(resultados) {
        var tablaHTML = '';

        resultados.forEach(function (fila) {
            tablaHTML += '<tr>';
            tablaHTML += '<td>' + fila.idTorneo + '</td>';
            tablaHTML += '<td>' + fila.nomTorneo + '</td>';
            tablaHTML += '<td>' + fila.nomDisciplina + '</td>';
            tablaHTML += '<td>' + fila.nomPrueba + '</td>';
            tablaHTML += '<td>' + fila.nomCategoria + '</td>';
            tablaHTML += '<td>' + fila.rama + '</td>';
            tablaHTML += '<td>' + fila.fechaInicio + '</td>';
            tablaHTML += '<td>' + fila.fechaFin + '</td>';
            tablaHTML += '<td>' + fila.fechaInicioIns + '</td>';
            tablaHTML += '<td>' + fila.fechaFinIns + '</td>';
            tablaHTML += '<td>';
            tablaHTML += '<div class="d-flex mt-2">';
            tablaHTML += '<button class="btn btn-warning editDates  custom-spacing-between-buttons" type="button" data-evento=\'' + JSON.stringify(fila).replace(/'/g, "&apos;") + '\'><i class="fa-solid fa-pen-to-square"></i></button>';
            tablaHTML += '<button class="btn btn-info readEvento  custom-spacing-between-buttons" type="button" data-evento=\'' + JSON.stringify(fila).replace(/'/g, "&apos;") + '\' data-backdrop="static" data-keyboard="false">  <i class="fa-solid fa-clipboard-question"></i></button>';
            tablaHTML += '<button type="button" class="btn btn-danger delEvento" data-evento=\'' + JSON.stringify(fila).replace(/'/g, "&apos;") + '\' data-backdrop="static" data-keyboard="false"> <i class="fa-solid fa-trash"></i></button>'
            tablaHTML += '</div>';
            tablaHTML += '</td>';
            tablaHTML += '</tr>';
        });

        // Asignar el HTML generado a la tabla
        $("#tablaResultados tbody").html(tablaHTML);

        $(document).on('click', '.editDates', function () {
            var eventoData = $(this).closest('tr').data('evento');
            console.log(eventoData); // Verifica el objeto eventoData
        
            // Asigna los datos del evento al modal
            $('#modalUpdateDates').data('evento', eventoData);
        
            // Muestra el modal de actualización de fechas
            $('#modalUpdateDates').modal('show');
        });
        

  

        // Vincular el evento de clic para el botón de Consulta después de actualizar la tabla
        $(".readEvento").off("click").on("click", function () {
            var evento = $(this).data("evento");

            // Verifica si evento es un objeto antes de intentar mostrarlo
            if (typeof evento === 'object') {
                console.log("Datos recibidos:", evento);

                // Resto del código para mostrar el modal con los datos
            } else {
                console.error("El atributo 'data-evento' no es un objeto.");
            }


            // ... (código para mostrar el modal con los datos)
            if (evento !== undefined && evento !== null) {
                //mostramos los datos de la fila en el modal
                $("#detalleEventoID").text("ID: " + evento.idTorneo);
                $("#detalleNombreEvento").text("Evento: " + evento.nomTorneo);
                $("#detalleNombreDisciplina").text("Disciplina: " + evento.nomDisciplina);
                $("#detalleNombrePrueba").text("Prueba: " + evento.nomPrueba);
                $("#detalleNombreCategoria").text("Categorìa: " + evento.nomCategoria);
                $("#detalleRama").text("Rama: " + evento.rama);
                $("#FechaInicio").text("Incio del torneo: " + evento.fechaInicio);
                $("#FechaFin").text("Fin del torneo: " + evento.fechaFin);
                $("#FechaInicioInsc").text("Inicio de las inscripciones: " + evento.fechaInicioIns);
                $("#FechaFinInsc").text("Fin de las inscricpiones: " + evento.fechaFinIns);

                $("#detalleEventoModal").modal("show")
            } else {
                console.error("El atributo 'data-evento' es indefinido o nulo.");
            }
        });
    }

    // Vincular el evento de clic para el botón "Edita fechas" (enfoque delegado)
    $("#tablaResultados").on("click", ".editDates", function () {
        // ... (código para mostrar el modal de edición de fechas)
        console.log("Botón 'Edita fechas' presionado.");
        $("#modalUpdateDates").modal("show");
    });



});