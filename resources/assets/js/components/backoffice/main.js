$( document ).ready(function() {
    $('.modal').modal();
    $('select').material_select();
    $('.datepicker').pickadate({
        selectMonths: true,
        selectYears: 15
    });

    if ($('#errorMessage').length) {
        var errorMessage = $('#errorMessage').val();
        var toastContent = $('<span>ผิดพลาด: ' + errorMessage + '</span>');

        Materialize.toast(toastContent, 5000, 'red');
    }
});