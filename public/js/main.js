$( document ).ready(function() {
    $('.modal').modal();
    $('select').material_select();

    if ($('#errorMessage').length) {
        let errorMessage = $('#errorMessage').val();
        let toastContent = $('<span>Fail: ' + errorMessage + '</span>');

        Materialize.toast(toastContent, 5000, 'red');
    }
});
//# sourceMappingURL=main.js.map
