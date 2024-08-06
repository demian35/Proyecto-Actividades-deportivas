$(document).ready(function () {
    // Obtenemos el formulario
    var form = $("#formLogin");

    // Escuchamos el evento submit del formulario
    form.submit(function (event) {
        // Evitamos que se envíe el formulario por defecto
        event.preventDefault();

        // Obtenemos los valores de los campos de entrada
        var noCedula = $("#noCedula").val();
        var noFolioPago = $("#noFolioPago").val();

        if ($.trim(noCedula) === "" || $.trim(noFolioPago) === "") {
            // Mostramos una notificación de campo vacío
            Swal.fire({
                icon: 'warning',
                title: 'Campos vacíos',
                text: 'Por favor, completa todos los campos.'
            });
        } else {
            // Enviar datos al script PHP utilizando AJAX
            $.ajax({
                type: "POST",
                url: "../conexiones/iniciarSesion.php", // Reemplaza con la ruta real de tu archivo PHP
                data: {
                    noCedula: noCedula,
                    noFolioPago: noFolioPago
                },
                success: function (response) {
                    // La respuesta del servidor después de procesar los datos
                    if (response === "success") {
                        if (noCedula === "admin") {
                            window.location.href = "../adminTorneo/inicio.php";
                        } else {
                            window.location.href = "../Admin/index.php";
                        }
                    } else {
                        // Si las credenciales son incorrectas, mostrar una notificación
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Credenciales incorrectas. Por favor, inténtalo de nuevo.'
                        });
                    }
                }
            });
        }
    });
});
