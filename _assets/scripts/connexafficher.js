// Fonction pour afficher ou masquer le mot de passe
function togglePasswordVisibility() {
    const passwordInput = document.getElementById("password");
    const checkbox = document.getElementById("showPassword");

    if (checkbox.checked) {
        passwordInput.type = "text";
    } else {
        passwordInput.type = "password";
    }
}

document.addEventListener("DOMContentLoaded", function () {
    // Ajouter un écouteur d'événement pour la case à cocher "Afficher le mot de passe"
    const showPasswordCheckbox = document.getElementById("showPassword");
    showPasswordCheckbox.addEventListener("change", togglePasswordVisibility);
});
