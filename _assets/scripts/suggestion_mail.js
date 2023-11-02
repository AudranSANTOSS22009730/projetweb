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

// Ajouter un écouteur d'événement pour la saisie dans le champ d'e-mail
emailInput.addEventListener("input", function () {
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
});

// Ajouter des écouteurs d'événements pour gérer les interactions avec les suggestions
emailInput.addEventListener("focus", showSuggestions);
emailInput.addEventListener("blur", hideSuggestions);

for (let suggestion of emailSuggestionItems) {
    suggestion.addEventListener("click", function () {
        emailInput.value = suggestion.textContent;
        hideSuggestions();
    });
}
