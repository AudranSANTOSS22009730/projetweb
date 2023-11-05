// Fonction pour afficher ou masquer le mot de passe
function togglePasswordVisibility(inputSelector, checkboxSelector) {
    const passwordInput = document.querySelector(inputSelector);
    const checkbox = document.querySelector(checkboxSelector);

    if (checkbox.checked) {
        passwordInput.type = "text";
    } else {
        passwordInput.type = "password";
    }
}

document.addEventListener("DOMContentLoaded", function() {
    // Ajouter des écouteurs d'événements aux cases à cocher
    togglePasswordVisibility('#password', '#showPassword');
    togglePasswordVisibility('#password_retype', '#showPasswordRetype');
});
