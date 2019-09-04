
$(document).ready(() => {
   $(".form").click((e) => {
       e.preventDefault();
       console.log("were in");
       let email = $('#email').val();
       let password = $('#password').val();

       if (email !== '' && password !== '') {
           $.ajax({
               type: "POST",
               url: "http://localhost:8080/website/controller/getCredentials.php",
               data: {
                   email: email,
                   password: password
               },
               dataType: "json",
               success: res => {
                   if (res.status === "logged") {
                       window.location.href = "http://127.0.0.1:8080/website/catalogue/catalogue.php"
                   }
               },
               error: (error, status, err) => {
                   console.log(error);
                   console.log(err);
                   console.log(status);
               }
           });
       }
   });
});

