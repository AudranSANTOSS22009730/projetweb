// secure.js

const passwordInput = document.getElementById("password");
const passwordStrength = document.getElementById("password-strength");

//  fiablité du mot de passe
function updatePasswordStrength() {
    const password = passwordInput.value;

    // Vous pouvez mettre en place votre propre logique de fiabilité ici
    let strengthClass = "very-weak";
    if (password.length >= 8) {
        strengthClass = "weak";
    }
    if (/[0-9]/.test(password)) {
        strengthClass = "medium";
    }
    if (/[@$]/.test(password)) {
        strengthClass = "strong";
    }

    // Classe de fiabilité à la barre
    passwordStrength.className = strengthClass;
}

// Écouter les changements dans le champ de saisie du mot de passe
passwordInput.addEventListener("input", updatePasswordStrength);
