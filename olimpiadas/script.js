function ocultarMensaje() {
    var mensaje = document.getElementById('mensaje');
    if (mensaje) {
        setTimeout(function () {
            mensaje.style.display = 'none';
        }, 3000); 
    }
}







