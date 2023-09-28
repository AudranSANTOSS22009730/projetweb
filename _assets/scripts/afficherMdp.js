const showPasswordCheckbox = document.getElementById('showPassword');
const passwordRetypeField = document.getElementById('password_retype');
const showPasswordRetypeCheckbox = document.getElementById('showPasswordRetype');

showPasswordCheckbox.addEventListener('change', function () {
    passwordField.type = this.checked ? 'text' : 'password';
});

showPasswordRetypeCheckbox.addEventListener('change', function () {
    passwordRetypeField.type = this.checked ? 'text' : 'password';
});
