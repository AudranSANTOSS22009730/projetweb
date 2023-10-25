document.addEventListener("DOMContentLoaded", function() {
    const emailInput = document.getElementById("email");
    const emailSuggestions = document.getElementById("email-suggestions");

    const emailDomains = ["gmail.com", "yahoo.com", "hotmail.com", "outlook.com", "protonmail.com", "aol.com"];

    emailInput.addEventListener("keyup", function(e) {
        const inputValue = this.value;
        const atIndex = inputValue.indexOf('@');

        if (atIndex !== -1 && e.key !== "Backspace" && e.key !== "Delete") {
            const inputPrefix = inputValue.substring(0, atIndex + 1);
            const domainPart = inputValue.substring(atIndex + 1).toLowerCase();

            let matchedDomains = emailDomains.filter(domain => domain.startsWith(domainPart));

            if (matchedDomains.length === 1) {
                emailInput.value = inputPrefix + matchedDomains[0];
            } else {
                renderSuggestions(inputPrefix, matchedDomains);
                emailSuggestions.style.display = 'block';
            }
        } else {
            emailSuggestions.innerHTML = "";
            emailSuggestions.style.display = 'none';
        }
    });

    emailInput.addEventListener("blur", function() {
        setTimeout(() => {
            emailSuggestions.style.display = 'none';
        }, 100);
    });

    function renderSuggestions(prefix, domains) {
        emailSuggestions.innerHTML = "";

        domains.forEach(domain => {
            let suggestion = document.createElement("div");
            suggestion.textContent = prefix + domain;
            suggestion.className = "email-suggestion";

            suggestion.addEventListener("click", function() {
                emailInput.value = this.textContent;
                emailSuggestions.innerHTML = "";
            });

            emailSuggestions.appendChild(suggestion);
        });
    }
});
