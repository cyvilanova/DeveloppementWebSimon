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

    getCities();

});

function getCities() {
    $.ajax({
        method: "GET",
        url: "../controller/getCities.php",
        contentType: "json",
        success: res => {
            res.forEach(city => {
                let option = document.createElement("option");
                option.text = city.ville;
                option.value = city.pk_ville;
                $('#cities').append(option);
            });
            getProfile();
        }
    });
}

function getProfile() {
    $.ajax({
        method: "GET",
        url: "../controller/getClientInfo.php",
        contentType: "json",
        success: res => {
            console.log(res);
            if (res) {
                $('#nom').val(res.nom);
                $('#prenom').val(res.prenom);
                $('#no_civic').val(res.fk_addresse.no_civique);
                $('#rue').val(res.fk_addresse.rue);
                $('#code_postal').val(res.fk_addresse.code_postal);
                $('#tel').val(res.telephone);
                $('#couriel').val(res.fk_utilisateur.courriel);
                $('#cities').val(res.fk_addresse.ville.pk_ville);
            }
        }
    });
}