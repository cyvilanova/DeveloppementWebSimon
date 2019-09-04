function connect() {
    let email = $('#email').val();
    let password = $('#password').val();

    if (email !== '' && password !== '') {
        getCredentials(email, password);
    }
}

function getCredentials(email, password) {
    $.ajax({
        type: "POST",
        dataType: "text",
        contentType: "application/json",
        url: "/DeveloppementWebSimon/website/controller/getCredentials.php",
        data: JSON.stringify({
            email: email,
            password: password
        }),
        success: res => {
            console.log(res);
        },
        error: error => {
            console.log(error);
        }
    });
}
