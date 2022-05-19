$document.ready(function() {
    $(#password2).keyup(function() {
        if( $(this).val() == $(#password1).val() ) {
            $('#verifynote').addclass('hidden');
        }
        else {
            $('#verifynote').removeclass('hidden');
        }
    });
});