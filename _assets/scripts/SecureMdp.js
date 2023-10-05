// Fonction pour obtenir un élément par son ID
function getElementById(id) {
    return document.getElementById(id);
}

// Fonction pour ajouter un écouteur d'événement au changement d'une case à cocher
function addCheckboxListener(checkbox, field) {
    checkbox.addEventListener('change', function () {
        handleShowPasswordChange(this, field);
    });
}

// Fonction pour évaluer la sécurité du mot de passe
function evaluatePasswordSecurity(password) {
    let strength = 0;
    if (password.length >= 8) {
        strength++;
    } else if (password.length >= 6) {
        strength--;
    }

    if (/[A-Z]/.test(password) && /[a-z]/.test(password)) {
        strength++;
    } else if (/[A-Z]/.test(password) || /[a-z]/.test(password)) {
        strength--;
    }

    if (/[0-9]/.test(password)) {
        strength++;
    }

    return strength;
}

// Fonction pour afficher le niveau de sécurité du mot de passe
function displayPasswordStrength(strength) {
    const strengthTexts = ['Très faible', 'Faible', 'Modéré', 'Fort', 'Très fort', 'Excellent'];
    const strengthColors = ['red', 'orange', 'yellow', 'green', 'blue', 'purple'];
    const passwordStrength = getElementById('passwordStrength');

    const strengthText = strengthTexts[strength];
    const strengthColor = strengthColors[strength];

    passwordStrength.innerHTML = `Niveau de sécurité du mot de passe : <span style="color: ${strengthColor};">${strengthText}</span>`;
}

// Fonction pour gérer le changement d'affichage du mot de passe
function handleShowPasswordChange(checkbox, field) {
    field.type = checkbox.checked ? 'text' : 'password';
}

document.addEventListener('DOMContentLoaded', function () {
    const showPasswordCheckbox = getElementById('showPassword');
    const passwordField = getElementById('password');
    const showPasswordRetypeCheckbox = getElementById('showPasswordRetype');
    const passwordRetypeField = getElementById('password_retype');
    const submitButton = document.querySelector('button[type="submit"]');

    // Ajout des écouteurs d'événements pour afficher/masquer les mots de passe
    addCheckboxListener(showPasswordCheckbox, passwordField);
    addCheckboxListener(showPasswordRetypeCheckbox, passwordRetypeField);

    // Évaluation de la sécurité du mot de passe en temps réel
    passwordField.addEventListener('input', function () {
        const password = this.value;
        const strength = evaluatePasswordSecurity(password);
        displayPasswordStrength(strength);
    });

    // Validation des mots de passe correspondants
    passwordRetypeField.addEventListener('input', function () {
        const password = passwordField.value;
        const passwordRetype = this.value;
        const isMatch = (password === passwordRetype);

        if (isMatch) {
            this.classList.remove('password-mismatch');
            submitButton.disabled = false;
        } else {
            this.classList.add('password-mismatch');
            submitButton.disabled = true;
        }
    });
});