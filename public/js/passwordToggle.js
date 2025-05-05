// passwordToggle.js

document.addEventListener('DOMContentLoaded', function () {
    // Select checkbox and password input field
    const showPasswordCheckbox = document.getElementById('showPasswordCheckbox');
    const passwordInput = document.getElementById('password');

    // Add event listener to checkbox
    showPasswordCheckbox.addEventListener('change', function() {
        // If checkbox is checked, change password field type to text
        if (this.checked) {
            passwordInput.type = 'text';
        } else {
            // If checkbox is unchecked, change password field type to password
            passwordInput.type = 'password';
        }
    });
});
