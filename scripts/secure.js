function secure() {
    document.addEventListener("DOMContentLoaded", function() {
        const passwordInput = document.getElementById("password");
        const passwordError = document.getElementById("password-error");
        const passwordStrength = document.getElementById("password-strength");

        passwordInput.addEventListener("input", function() {
            const password = passwordInput.value;
            const passwordPattern = /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&]).{8,}$/;

            if (passwordPattern.test(password)) {
                passwordError.style.display = "none";
                passwordStrength.textContent = "Niveau de sécurité du mot de passe : Fort";
                passwordStrength.classList.add("strong-password");
            } else {
                passwordError.style.display = "block";
                passwordStrength.textContent = "Niveau de sécurité du mot de passe : Faible";
                passwordStrength.classList.remove("strong-password");
            }
        });
    });
}
