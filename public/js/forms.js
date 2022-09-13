
$(document).ready(function () {

    /* TaBToEnter */
    var inputs = $(':input').keypress(function (e) {
        if (e.which == 13) {
            e.preventDefault();
            var nextInput = inputs.get(inputs.index(this) + 1);
            if (nextInput) {
                nextInput.focus();
            }
        }
    });

    /* Adicionar focus no primeiro elemento */
    document.getElementById(1).focus();

    $(".numeric").numeric({ decimal : ".",  negative : false, scale: 3 });

});



