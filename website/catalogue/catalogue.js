$.ajax({
    type: "POST",
    dataType: "text",
    contentType: "application/json",
    url: "/DeveloppementWebSimon/website/controller/getAllServices.php",
    success: data => {
        let JSONObject = $.parseJSON(data);

        for (let key in JSONObject) {
            if (JSONObject.hasOwnProperty(key)) {
                createCard(JSONObject[key]);
            }
        }
    },
    error: error => {
        console.log(error);
    }
});


function createCard(service) {
    let card = '<div class="card">' +
        '<img src="../../images/services/' + service['image'] + '" alt="Image service" class="img">' +
        '<div class="informations">' +
        '    <div class="title">' + service['service_titre'] + '</div>' +
        '<div class="description">' + service['service_description'] + '</div>' +
        '<div class="footer">' +
        '<div class="price">Tarif: ' + Math.trunc(service['tarif']) + '$</div>' +
        '<div class="duration">Durée: ' + service['duree'] + 'h</div>' +
        '<img src="../../images/icones/panier.png" alt="cart logo" >' +
        '</div>' +
        '</div>' +
        '</div>';
    $('.page').append(card);
}
