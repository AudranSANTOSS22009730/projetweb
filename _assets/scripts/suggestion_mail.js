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

// Suggestions pour l'e-mail
const emailInput = document.getElementById("email");
const emailSuggestions = document.getElementById("email-suggestions");
const emailSuggestionItems = emailSuggestions.getElementsByClassName("email-suggestion");

// Fonction pour afficher les suggestions
function showSuggestions() {
    emailSuggestions.style.display = "block";
}

// Fonction pour masquer les suggestions
function hideSuggestions() {
    emailSuggestions.style.display = "none";
}

// Fonction pour détecter le type d'adresse e-mail et afficher les suggestions pertinentes
function detectEmailType() {
    const inputText = emailInput.value.toLowerCase();
    showSuggestions(); // Toujours afficher les suggestions lors de la saisie

    for (let suggestion of emailSuggestionItems) {
        const suggestionText = suggestion.textContent.toLowerCase();
        if (suggestionText.includes(inputText)) {
            suggestion.style.display = "block";
        } else {
            suggestion.style.display = "none";
        }
    }
}

// Ajouter un écouteur d'événement pour la saisie dans le champ d'e-mail
emailInput.addEventListener("input", detectEmailType);

// Ajouter des écouteurs d'événements pour gérer les interactions avec les suggestions
emailInput.addEventListener("focus", showSuggestions);
emailInput.addEventListener("blur", hideSuggestions);

for (let suggestion of emailSuggestionItems) {
    suggestion.addEventListener("click", function () {
        emailInput.value = suggestion.textContent;
        hideSuggestions();
    });
}

// Ajouter des écouteurs d'événements aux cases à cocher pour afficher/masquer le mot de passe
document.getElementById("showPassword").addEventListener("change", function () {
    togglePasswordVisibility("password", "showPassword");
});

document.getElementById("showPasswordRetype").addEventListener("change", function () {
    togglePasswordVisibility("password_retype", "showPasswordRetype");
});
