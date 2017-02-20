$( document ).ready(function() {
    if ($('#errorMessage').length) {
        var errorMessage = $('#errorMessage').val();
        var toastContent = $('<span>ผิดพลาด: ' + errorMessage + '</span>');

        Materialize.toast(toastContent, 5000, 'red');
    }
});