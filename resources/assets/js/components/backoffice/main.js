$( document ).ready(function() {
    $('.modal').modal();
    $('select').material_select();
    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15 // Creates a dropdown of 15 years to control year
    });
    
    if ($('#errorMessage').length) {
        let errorMessage = $('#errorMessage').val();
        let toastContent = $('<span>Fail: ' + errorMessage + '</span>');

        Materialize.toast(toastContent, 5000, 'red');
    }
});