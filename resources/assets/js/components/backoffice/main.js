$( document ).ready(function() {
    $('.modal').modal();
    $('select').material_select();
    $('.datepicker').pickadate({
        selectMonths: true,
        selectYears: 15
    });

    if ($('#errorMessage').length) {
        let errorMessage = $('#errorMessage').val();
        let toastContent = $('<span>ผิดพลาด: ' + errorMessage + '</span>');

        Materialize.toast(toastContent, 5000, 'red');
    }
});