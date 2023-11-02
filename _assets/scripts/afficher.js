// Fonction pour afficher ou masquer le mot de passe
function togglePasswordVisibility(inputId, checkboxId) {
    const passwordInput = document.getElementById(inputId);
    const checkbox = document.getElementById(checkboxId);

    if (checkbox.checked) {
        passwordInput.type = "text";
    } else {
        passwordInput.type = "password";
    }
}

document.addEventListener("DOMContentLoaded", function() {
    // Ajouter des écouteurs d'événements aux cases à cocher
    document.getElementById("showPassword").addEventListener("change", function () {
        togglePasswordVisibility("password", "showPassword");
    });

    document.getElementById("showPasswordRetype").addEventListener("change", function () {
        togglePasswordVisibility("password_retype", "showPasswordRetype");
    });
});
