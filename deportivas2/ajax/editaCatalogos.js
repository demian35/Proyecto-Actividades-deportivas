//modificar torneo
$(document).ready(function () {


    $('#editactTorneoButton').on('click', function (e) {
        e.preventDefault();
        // Obtenemos los valores del formulario
        var idTorneo = obtenerIdTorneo();
        var nombre = $('#newNombre').val();
        var eslogan = $('#newEslogan').val();
        var vigencia = $('#newVigencia').val();

        // Validación para verificar si los campos están vacíos
        if (!nombre || !eslogan || !vigencia) {
            // Muestra una notificación de error si algún campo está vacío
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Por favor, complete todos los campos.',
                timer: 2500
            });
            return; // Detiene la ejecución si algún campo está vacío
        }

        //realizamos la solicitud ajax
        $.ajax({
            type: 'POST',
            url: '../conexiones/editaCatalogos.php',
            data: {
                idTorneo: idTorneo,
                nombre: nombre,
                eslogan: eslogan,
                vigencia: vigencia
            },
            success: function (response) {
                //imprimimos la respuesta del servidor
                console.log(response);
                // Muestra la notificación de éxito de SweetAlert
                Swal.fire({
                    icon: 'success',
                    title: 'Torneo Actualizado',
                    showConfirmButton: false,
                    timer: 2500
                }).then(function () {
                    // Recargar la página u otra acción necesaria después de eliminar el torneo
                    location.reload();
                });

                // Cerrar el modal después de la edición
                $('#modalEditaTorneo').modal('hide');
            },
            error: function (error) {
                console.error('Error en la solicitud Ajax:', error);
                Swal.fire({
                    icon: 'error',
                    title: 'Error en la solicitud',
                    text: 'Ha ocurrido un error al realizar la solicitud',
                    timer: 2500
                });
            }
        });
    });

    function obtenerIdTorneo() {
        // Obtener el valor del atributo data-torneo del botón "Editar" que activa el modal
        var torneoData = $('#modalEditaTorneo').data('torneo');
        console.log(torneoData);
        // Verificar si torneoData está definido y si tiene la propiedad idTorneo
        if (torneoData && torneoData.idTorneo) {
            return torneoData.idTorneo;
        } else {
            // Si torneoData no está definido o no tiene la propiedad idTorneo, devuelve null o algún valor predeterminado según sea necesario
            return null;
        }
    }

    // Asigna el torneo al hacer clic en el botón "Editar"
    $('.btn-editar').on('click', function () {
        var torneoData = $(this).data('torneo');
        console.log(torneoData);
        $('#modalEditaTorneo').data('torneo', torneoData);
        $('#newNombre').val(torneoData.nomTorneo);
        $('#newEslogan').val(torneoData.eslogan);
        $('#newVigencia').val(torneoData.vigencia);
    });
});


//modificar  disciplina
$(document).ready(function () {
    $('#editarButtonDisciplina').on('click', function (e) {
        e.preventDefault();

        //obtenemos los valores del formulario
        var idDisciplina = obtenerIdDisciplina();
        var nombreDisciplina = $('#newnombreDis').val();
        var min = $('#newMin').val();
        var max = $('#newMax').val();
        var clavePago = $('#newClavepago').val();

        // Validación para verificar si los campos están vacíos
        if (!nombreDisciplina || !min || !max || !clavePago) {
            // Muestra una notificación de error si algún campo está vacío
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Por favor, complete todos los campos.',
                timer: 2500
            });
            return; // Detiene la ejecución si algún campo está vacío
        }

        //realizamos la solicitud ajax
        $.ajax({
            type: 'POST',
            url: '../conexiones/editaCatalogos.php',
            data: {
                idDisciplina: idDisciplina,
                nombreDis: nombreDisciplina,
                min: min,
                max: max,
                clavePago: clavePago
            },
            success: function (response) {
                //imprimimos la respuesta del servidor
                console.log(response);
                //notificacion de exito de sweetAlert
                Swal.fire({
                    icon: 'success',
                    title: 'Disciplina Actualizada',
                    showConfirmButton: false,
                    timer: 2500
                }).then(function () {
                    // Recargar la página u otra acción necesaria después de eliminar el torneo
                    location.reload();
                });
                // Cerrar el modal después de la edición
                $('#editarDisciplinaModal').modal('hide');
            },
            error: function (error) {
                console.log('Error en la solicitud Ajax', error);
                // Notificación de error utilizando SweetAlert
                Swal.fire({
                    icon: 'error',
                    title: 'Error en la solicitud',
                    text: 'Ha ocurrido un error al realizar la solicitud',
                    timer: 2500
                });
            }
        });
    });

    function obtenerIdDisciplina() {
        var disciplinaData = $('#editarDisciplinaModal').data('disciplina');
        return disciplinaData.idDisciplina;
    }

    // Asigna la nueva disciplina al hacer clic en el botón "Editar"
    $('.btn-editar-Disciplina').on('click', function () {
        var disciplinaData = $(this).data('disciplina');
        $('#editarDisciplinaModal').data('disciplina', disciplinaData);
        console.log(disciplinaData);
        $('#newnombreDis').val(disciplinaData.nomDisciplina);
        $('#newMin').val(disciplinaData.numMinJugador);
        $('#newMax').val(disciplinaData.numMaxJugador);
        $('#newClavepago').val(disciplinaData.cve_concepto_pago);
    });
});

//modificar categoria
$(document).ready(function () {
    $('#editarButtonCategoria').on('click', function (e) {
        e.preventDefault();

        // Obtenemos los datos del formulario
        var idCategoria = obtenerIdCategoria();
        var nombreCategoria = $('#newnomCategoria').val().trim();

        // Validación para verificar si el campo nombreCategoria está vacío
        if (!nombreCategoria) {
            // Muestra una notificación de error si el campo está vacío
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Por favor, ingrese el nombre de la categoría.',
                timer: 2500
            });
            return; // Detiene la ejecución si el campo está vacío
        }

        // Realizamos la solicitud AJAX
        $.ajax({
            type: 'POST',
            url: '../conexiones/editaCatalogos.php',
            data: {
                idCategoria: idCategoria,
                nombreCategoria: nombreCategoria
            },
            success: function (response) {
                // Imprimimos la respuesta del servidor
                console.log(response);
                // Notificación de éxito de SweetAlert
                Swal.fire({
                    icon: 'success',
                    title: 'Categoría Actualizada',
                    showConfirmButton: false,
                    timer: 2500
                }).then(function () {
                    // Recargar la página u otra acción necesaria después de eliminar el torneo
                    location.reload();
                });
                // Cerramos el modal de la edición
                $('#editarCategoriaModal').modal('hide');
            },
            error: function (error) {
                console.log('Error en la solicitud Ajax', error);
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Error en la solicitud AJAX. Detalles: ' + error,
                });
            }

        });
    });

    function obtenerIdCategoria() {
        var categoriaData = $('#editarCategoriaModal').data('categoria');
        return categoriaData.idCategoria;
    }

    // Asigna la categoría al hacer clic en el botón editar
    $('.btn-editaCategoria').on('click', function () {
        var categoriaData = $(this).data('categoria');
        console.log(categoriaData);
        $('#editarCategoriaModal').data('categoria', categoriaData);
        $('#newnomCategoria').val(categoriaData.nomCategoria);
        
    });
});

//modificar prueba 
$(document).ready(function () {
    $('#editarButtonPrueba').on('click', function (e) {
        e.preventDefault();

        //obtenemos los datos del formulario
        var idPrueba = obtenerIdPrueba();
        var nombrePrueba = $('#newnomPrueba').val().trim();

        // Validación para verificar si el campo nombrePrueba está vacío
        if (!nombrePrueba) {
            // Muestra una notificación de error si el campo está vacío
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Por favor, ingrese el nombre de la prueba.',
                timer: 2500
            });
            return; // Detiene la ejecución si el campo está vacío
        }

        //realizamos la solicitud ajax
        $.ajax({
            type: 'POST',
            url: '../conexiones/editaCatalogos.php',
            data: {
                idPrueba: idPrueba,
                nomPrueba: nombrePrueba
            },
            success: function (response) {
                //imprimimos la respuesta
                console.log(response);
                //notificacion de exito de sweetAlert
                Swal.fire({
                    icon: 'success',
                    title: 'Prueba Actualizada',
                    showConfirmButton: false,
                    timer: 2500
                }).then(function () {
                    // Recargar la página u otra acción necesaria después de eliminar el torneo
                    location.reload();
                });
                //cerramos el modal de la edicion
                $('#editarPruebaModal').modal('hide');
            },

            error: function (error) {
                console.log('Error en la solicitud Ajax', error);
                // Muestra una notificación de error si hay un problema con la solicitud
                Swal.fire({
                    icon: 'error',
                    title: 'Error en la solicitud',
                    text: 'Ha ocurrido un error al realizar la solicitud.',
                    timer: 2500
                });
            }
        });
    });

    function obtenerIdPrueba() {
        var pruebaData = $('#editarPruebaModal').data('prueba');
        return pruebaData.idPrueba;
    }

    //asigna la categoria al hacer clic en el boton editar
    $('.updatePrueba').on('click', function () {
        var pruebaData = $(this).data('prueba');
        console.log(pruebaData);
        $('#editarPruebaModal').data('prueba', pruebaData);
        $('#newnomPrueba').val(pruebaData.nomPrueba);

    });
});


//modificar evento
$(document).ready(function () {
    $('#ButtonEditarEvento').on('click', function (e) {
        e.preventDefault();
        //obtenemos los datos del formulario
        var idtorneoDisciplina = obtenerIdTorneoDisciplina();
        var fechainicioTorneo = $('#fechamodIniciotorneo').val();
        var fechaFinTorneo = $('#fechamodFintorneo').val();
        var fechainicioInscripciones = $('#fechamodInicioinscripciones').val();
        var fechafinInscripciones = $('#fechamodFininscripciones').val();

        // Mostrar los datos que se están enviando en la consola para verificar
       /*  console.log("ID Torneo Disciplina: ", idtorneoDisciplina);
        console.log("Fecha Inicio Torneo: ", fechainicioTorneo);
        console.log("Fecha Fin Torneo: ", fechaFinTorneo);
        console.log("Fecha Inicio Inscripciones: ", fechainicioInscripciones);
        console.log("Fecha Fin Inscripciones: ", fechafinInscripciones); */

        //realizamos la solicitud ajax
        $.ajax({
            type: 'POST',
            url: '../conexiones/editaEvento.php',
            data: {
                idTorneoDisciplina: idtorneoDisciplina,
                fechaInicio: fechainicioTorneo,
                fechaFin: fechaFinTorneo,
                fechaInicioIns: fechainicioInscripciones,
                fechaFinIns: fechafinInscripciones
            },
            success: function (response) {
                //imprimimos la respuesta del servidor
                console.log(response);

                //notificacion de exito de sweetAlert
                Swal.fire({
                    icon: 'success',
                    title: 'Evento Actualizado',
                    showConfirmButton: false,
                    timer: 2500
                }).then(function () {
                    // Recargar la página u otra acción necesaria después de eliminar el torneo
                    location.reload();
                });
                //cerramos el modal de la edicion
                $('#modalUpdateDates').modal('hide');
            },
            error: function (error) {
                console.log('Error en la solicitud ajax', error);
            }
        });
    });
    function obtenerIdTorneoDisciplina() {
        var eventoData = $('#modalUpdateDates').data('evento');
        if (eventoData && eventoData.hasOwnProperty('idTorneoDisciplina')) {
            return eventoData.idTorneoDisciplina;
        } else {
            console.error('Error: No se pudo obtener el ID de torneo disciplina');
            return null; // o un valor predeterminado que indique que no se pudo obtener el ID
        }
    }

    $(document).on('click', '.editDates', function () {
        var eventoData = $(this).data('evento');
        console.log(eventoData); // Verifica el objeto eventoData

        // Asigna los datos del evento al modal
        $('#modalUpdateDates').data('evento', eventoData);

    });

})

