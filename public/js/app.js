
//Función para que la pagina se valla poniendo gris a medida que se desplaza

window.addEventListener('scroll', function() {
    // Obtiene la posición de desplazamiento vertical actual
    let scrollTop = window.scrollY;

    // Obtiene la altura total del documento
    let documentHeight = document.documentElement.scrollHeight - window.innerHeight;

    // Calcula la fracción de desplazamiento
    let scrollFraction = scrollTop / documentHeight;

    // Convierte la fracción de desplazamiento en un valor entre blanco y gris oscuro
    let grayValue = Math.floor(255 - (scrollFraction * 215));

    // Aplica el color de fondo gris
    document.body.style.backgroundColor = `rgb(${grayValue}, ${grayValue}, ${grayValue})`;
    });

//Funciones de la ventana emergente

    // Obtén una referencia al botón "Aceptar" y a los enlaces del navbar
    var closeButton = document.getElementById('close-button');
    var navbarLinks = document.querySelectorAll('.navbar-link');

    // Agrega un controlador de eventos de clic al botón "Aceptar"
    closeButton.addEventListener('click', function(event) {
        // Evita el comportamiento predeterminado del enlace
        event.preventDefault();

        // Oculta la ventana emergente
        var windowNotice = document.getElementById('window-notice');
        windowNotice.style.display = 'none';

        // Habilita los botones del navbar
        enableNavbarLinks();
    });

    function disableNavbarLinks() {
        // Deshabilita los botones del navbar
        navbarLinks.forEach(function(link) {
            link.classList.add('disabled-link');
        });
    }

    function enableNavbarLinks() {
        // Habilita los botones del navbar
        navbarLinks.forEach(function(link) {
            link.classList.remove('disabled-link');
        });
    }

    // Deshabilita los enlaces del navbar cuando se abre la ventana emergente
    disableNavbarLinks();