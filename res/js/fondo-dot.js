$(function() {

    var cont = `<div class="dot-green"></div><div class="dot-gray"></div>`;

    for (let index = 1; index < 700; index++) {
        $('#fondo-dot').append(cont);
    }

    setTimeout(function() {
        $('.dot-green').css('transform', 'translateY(0)');
    }, 50);
    setTimeout(function() {
        $('.dot-gray').css('transform', 'translateY(0)');
    }, 50);
});