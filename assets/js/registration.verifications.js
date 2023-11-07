
const regNoInput = document.getElementById('reg-no-text');
const regNoError = document.getElementById('reg-no-error');

regNoInput.addEventListener('input', function () {
    const regNumber = this.value;
    const regNoPattern = /^T\/DEG\/\d{4}\/\d{4}$/i;

    if (!regNoPattern.test(regNumber) && regNumber !== '') {
        regNoError.textContent = 'Invalid Registration Number';
        regNoError.classList.add('errorVisible');
    } else {
        regNoError.textContent = '';
        regNoError.classList.remove('errorVisible');
    }
});

const phoneInput = document.getElementById('phone-text');
const phoneError = document.getElementById('phone-error');

phoneInput.addEventListener('input', function() {
    const phoneNumber = this.value;
    const phoneNumberFormat = /^(?:\+255|0)[1-9]\d{8}$/;

    if (!phoneNumberFormat.test(phoneNumber) && phoneNumber !== '') {
        phoneError.textContent = "Invalid phone number";
        phoneError.classList.add('errorVisible');
    } else {
        phoneError.textContent = "";
        phoneError.classList.remove('errorVisible');
    }
});


const passwordInput = document.getElementById('password-text');
const passwordError = document.getElementById('password-error');

passwordInput.addEventListener('input', function() {
    const password = this.value;
    const passwordFormat = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

    if (!passwordFormat.test(password) && password !== '') {
        passwordError.textContent = "Password must be strong: at least 8 characters, including upper and lower case letters, numbers, and special characters";
        passwordError.classList.add('errorVisible');
    } else {
        passwordError.textContent = "";
        passwordError.classList.remove('errorVisible');
    }
});


const confPasswordInput = document.getElementById('conf-password-text');
const confPasswordError = document.getElementById('conf-password-error');

confPasswordInput.addEventListener('input', function() {
    const confPassword = confPasswordInput.value;
    const password = passwordInput.value;

    if (password !== confPassword && confPassword !== '') {
        confPasswordError.textContent = "Password do not match";
        confPasswordError.classList.add('errorVisible');
    } else {
        confPasswordError.textContent = "";
        confPasswordError.classList.remove('errorVisible');
    }
});


// preventing form submission if there is any error in the inputs
const form = document.getElementById('reg-form');
form.addEventListener('submit', function(event) {
    const regNoInput = document.getElementById('reg-no-text');
    const phoneInput = document.getElementById('phone-text');
    const passwordInput = document.getElementById('password-text');
    const confPasswordInput = document.getElementById('conf-password-text');
    const regNoError = document.getElementById('reg-no-error');
    const phoneError = document.getElementById('phone-error');
    const passwordError = document.getElementById('password-error');
    const confPasswordError = document.getElementById('conf-password-error');

    // clear previous error messages
    regNoError.textContent = '';
    phoneError.textContent = '';
    passwordError.textContent = '';
    confPasswordError.textContent = '';

    //registration number validation
    const regNumberRegex = /^T\/DEG\/\d{4}\/\d{4}$/i;
    if (!regNumberRegex.test(regNoInput.value)) {
        regNoError.textContent = 'Invalid Registration number';
        event.preventDefault(); // prevent form submission
    }

    //phone number validation
    const phoneNumberRegex = /^(?:\+255|0)[1-9]\d{8}$/;
    if (!phoneNumberRegex.test(phoneInput.value)) {
        phoneError.textContent = 'Invalid phone number';
        event.preventDefault(); // prevent form submission
    }

    //password validation
    const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
    if (!passwordRegex.test(passwordInput.value)) {
        passwordError.textContent = 'Password must be strong: at least 8 characters, including upper and lower case letters, numbers, and special characters';
        event.preventDefault(); // prevent form submission
    }

    //password confirmation validation
    if (passwordInput.value !== confPasswordInput.value) {
        confPasswordError.textContent = 'Password do not match';
        event.preventDefault(); // prevent form submission
    }
})

