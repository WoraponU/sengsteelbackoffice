$( document ).ready(function() {
    if ($('#errorMessage').length) {
        let errorMessage = $('#errorMessage').val();
        let toastContent = $('<span>ผิดพลาด: ' + errorMessage + '</span>');

        Materialize.toast(toastContent, 5000, 'red');
    }
});