$(document).ready(() => {
    $(".form #connexion").click((e) => {
        e.preventDefault();
        let email = $('#email').val();
        let password = $('#password').val();

        if (email !== '' && password !== '') {
            $.ajax({
                type: "POST",
                url: "../controller/getCredentials.php",
                data: {
                    email: email,
                    password: password
                },
                success: res => {
                    if (res.status === "logged") {
                        window.location.href = "../catalogue/catalogue.php";
                    }
                },
                error: error => {
                    console.log(error);
                }
            });
        }
    });
});
