$(function () {
    $('.chk').click(function () {
        if ($(this).attr('checked') === undefined) {
            $(this).attr('checked', "");
            $(this).removeAttr('unchecked');
            $(this).html('X');
            $('input[type=checkbox]').prop('checked', true);
        } else {
            $(this).removeAttr('checked');
            $(this).attr('unchecked', "");
            $(this).html('');
            $('input[type=checkbox]').prop('checked', false);
        }
    });


    $.ajax({
        method: "GET",
        url: "../controller/getClientInfo.php",
        contentType: "json",
        success: res => {
            console.log(res);

            $('#nom').val(res.nom);
            $('#prenom').val(res.prenom);
            $('#no_civic').val(res.fk_addresse.no_civique);
            $('#rue').val(res.fk_addresse.rue);
            $('#code_postal').val(res.fk_addresse.code_postal);
            $('#tel').val(res.telephone);
            $('#couriel').val(res.fk_utilisateur.courriel);


        }
    });

});
