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
    let card = '<div class="card" id="' + service['pk_service'] + '">' +
        '<div class="visible">' +
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
        '</div>' +
        '</div>';
    $('.page').append(card);

    addPromotions(service);
}

function addPromotions(service) {
    let promotions = '<div class="promotions" id="promo-' + service['pk_service'] + '">' +
        '<div class="promotions-title">Promotions:</div>' +
        '<div class="code" id="code-' + service['pk_service'] + '">' +
        '</div>' +
        '</div>';
    $('#' + service['pk_service']).append(promotions);

    service['promotions'].forEach(promotion => {
        addPromotion(promotion, service['pk_service']);
    });

    let html = '<div class="add">+</div>';
    $('#code-' + service['pk_service']).append(html);

    let media = '<img src="../../images/icones/medias sociaux.jpeg" alt="medias sociaux">';
    $('#promo-' + service['pk_service']).append(media);

}

function addPromotion(promotion, id) {
    let html = '<img src="../../images/promotions/10.png" alt="promo">';
    $('#code-' + id).append(html);
}