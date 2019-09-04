
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
               success: res => {
                   console.log(res);
                   if (res.status === "logged") {
                       window.location.href = "localhost:8080/website/login/test.php"
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

