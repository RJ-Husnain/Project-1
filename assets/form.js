console.log("Script Start from here!");

let form = document.querySelector('form');
let passwordInput = document.getElementById('password');
let cpasswordInput = document.getElementById('cpassword');

let errorWeak = document.querySelector('.weak');
let errorMatch = document.querySelector('.match');

let valid_password = false;
let password_match = false;

passwordInput.addEventListener('input', function () {
    let password = passwordInput.value;

    valid_password = true;

    // Length check
    if (password.length < 8) {
        valid_password = false;
    }

    // Uppercase check
    if (!(/[A-Z]/.test(password))) {
        valid_password = false;
    }

    // Lowercase check
    if (!(/[a-z]/.test(password))) {
        valid_password = false;
    }

    // Number check
    if (!(/[0-9]/.test(password))) {
        valid_password = false;
    }

    // Symbol check
    if (!(/[!@#\$%\^\&*\)\(+=._-]/.test(password))) {
        valid_password = false;
    }

    if (!valid_password) {
        errorWeak.style.display = 'block';
        errorWeak.style.color = '#a70000';
        errorWeak.innerText = "Password is Weak!";
    } else {
        errorWeak.style.display = 'block';
        errorWeak.style.color = 'rgb(0 171 109)';
        errorWeak.innerText = "Password is Strong!";
    }
});

// Confirm Password
cpasswordInput.addEventListener('input', function () {
    let cpassword = cpasswordInput.value;
    let password = passwordInput.value;

    if (cpassword !== password) {
        password_match = false;
        errorMatch.style.display = 'block';
        errorMatch.style.color = '#a70000';
        errorMatch.innerText = "Password doesn't Match!";
    } else {
        password_match = true;
        errorMatch.style.display = 'block';
        errorMatch.style.color = 'rgb(0 171 109)';
        errorMatch.innerText = "Password Matched!";
    }
});

// Form submission
form.addEventListener('submit', function (event) {

    passwordInput.dispatchEvent(new Event('input'));
    cpasswordInput.dispatchEvent(new Event('input'));

    if (!valid_password || !password_match) {
        event.preventDefault();
        alert("Please fix password errors before submitting the form.");
    }
});
