var aboutButton = document.querySelector('a[href="#AcercaDeNosotros"]');
var modal = document.getElementById('myModal');

var contactButton = document.querySelector('a[href="#Contacto"]');
var contactModal = document.getElementById('contactModal');

var close = document.querySelectorAll('.close');

aboutButton.addEventListener('click', function() {
    modal.style.display = 'block';
});

contactButton.addEventListener('click', function() {
    contactModal.style.display = 'block';
});

close.forEach(function(closeBtn) {
    closeBtn.addEventListener('click', function() {
        modal.style.display = 'none';
        contactModal.style.display = 'none';
    });
});

window.addEventListener('click', function(event) {
    if (event.target == modal || event.target == contactModal) {
        modal.style.display = 'none';
        contactModal.style.display = 'none';
    }
});
