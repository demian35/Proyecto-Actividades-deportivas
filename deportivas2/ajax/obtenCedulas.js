document.getElementById('listaEquipos').addEventListener('change', function() {
    var disciplinaSeleccionada = this.value;
    if (disciplinaSeleccionada !== '0') {
        //realizamos la solicitud ajax
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                //mostramos los resultados en la tabla
                document.getElementById('resultadosTabla').innerHTML = xhr.responseText;
            }
        };
        xhr.open('GET', '../conexiones/obtenCedulas.php?disciplina=' + disciplinaSeleccionada, true);
        xhr.send();
    }
});