function suggestion_mail() {
    const formulaire = document.getElementById("formulaire-inscription");
    const erreurUtilisateur = document.getElementById("erreur-utilisateur");

    formulaire.addEventListener("submit", function(event) {
        event.preventDefault(); // Empêche l'envoi du formulaire par défaut

        const pseudo = document.querySelector('input[name="pseudo"]').value; // Récupère la valeur du champ pseudo

        // Effectuer une requête AJAX pour vérifier si le nom d'utilisateur est déjà utilisé
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "verification_utilisateur.php", true); // Assurez-vous de créer "verification_utilisateur.php" pour gérer la vérification
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                if (xhr.responseText === "utilisateur_existe") {
                    // Nom d'utilisateur déjà utilisé, afficher le message d'erreur
                    erreurUtilisateur.style.display = "block";
                } else {
                    // Le nom d'utilisateur est unique, continuez avec l'inscription
                    formulaire.submit(); // Soumettez le formulaire
                }
            }
        };
        xhr.send("pseudo=" + encodeURIComponent(pseudo));
    });
}

document.addEventListener("DOMContentLoaded", setupFormulaireInscription);
