$(function () {
    $('#btn-menu').click(function () {
        $('#sidebar').sidebar('setting', 'dimPage', true).sidebar('setting', 'transition', 'push').sidebar('toggle');
    });
});