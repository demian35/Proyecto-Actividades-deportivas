// Agrega controladores de eventos para los campos de entrada de teléfono y celular
document.getElementById("telefono").addEventListener("input", function(e) {
    // Elimina caracteres no numéricos y asegura que tenga un máximo de 10 dígitos
    this.value = this.value.replace(/[^0-9]/g, "").slice(0, 10);
});

document.getElementById("celular").addEventListener("input", function(e) {
    // Elimina caracteres no numéricos y asegura que tenga un máximo de 10 dígitos
    this.value = this.value.replace(/[^0-9]/g, "").slice(0, 10);
});