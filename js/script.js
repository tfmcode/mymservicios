// Este código es opcional, se utiliza para agregar efectos de scroll suave
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();

        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});

function enviarMensaje() {
    var telefono = '+5491159313201'; // Reemplaza con el número de teléfono al que quieres enviar el mensaje
    var mensaje = '¡Hola!'; // Reemplaza con el mensaje que deseas enviar

    // Crear el enlace para abrir WhatsApp
    var url = 'https://api.whatsapp.com/send?phone=' + telefono + '&text=' + encodeURIComponent(mensaje);

    // Abrir WhatsApp en una nueva pestaña
    window.open(url, '_blank');
}

function abrirInicio() {

    // Crear el enlace para abrir WhatsApp
    var url = 'https://mymserviciosambientales.com.ar/';

    // Abrir WhatsApp en una nueva pestaña
    window.open(url, 'self');
}

function reproducirVideo(indice) {

    var video = document.getElementById(indice);
    if (video.paused) {
        video.play();
    } else {
        video.pause();
    }
}