// validation.js

// Fonction de validation d'inscirption
function validateForm() {
    var pseudo = document.getElementsByName("pseudo")[0].value;
    var email = document.getElementsByName("email")[0].value;
    var confirmEmail = document.getElementsByName("confirm_email")[0].value;
    var age = document.getElementsByName("age")[0].value;
    var genre = document.getElementsByName("genre")[0].value;
    var password = document.getElementsByName("password")[0].value;
    var password_retype = document.getElementsByName("password_retype")[0].value;

    // Conditions de validation, par exemple :
    if (pseudo === "") {
        alert("Veuillez entrer un pseudo.");
        return false;
    } else if (email === ""){
    if (email === "") {
        alert("Veuillez entrer une adresse e-mail.");
        return false;
    }
    if (pseudo.length < 5 || pseudo.length > 15) {
        alert("Le pseudo doit contenir entre 5 et 15 caractères.");
        return false;
    }
}
}