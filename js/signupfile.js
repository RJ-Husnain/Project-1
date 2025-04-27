let passwordInput = document.getElementById('password');
let usernameInput = document.getElementById('username'); 
let errorlenght = document.querySelector('.errorlenght');
let cpasswordInput = document.getElementById('cpassword');
let error = document.querySelector('.error');
let lengthicon = document.getElementById('length-icon');
let uppercaseicon = document.getElementById('uppercase-icon');
let lowercaseicon = document.getElementById('lowercase-icon');
let numbericon = document.getElementById('digit-icon');
let symbolicon = document.getElementById('symbol-icon');

cpasswordInput.disabled = true;
passwordInput.addEventListener('input', function() {
    const password = passwordInput.value;
    let valid_password = true;
    // length 
    if (password.length >= 8) {
        lengthicon.src = 'images/tick.png';
    } else {
        lengthicon.src = 'images/cross.png';
        valid_password = false;
    }
    // uppercase 
    if (/[A-Z]/.test(password)) {
        uppercaseicon.src = 'images/tick.png';
    } else {
        uppercaseicon.src = 'images/cross.png';
    }
    // lowercase 
    if (/[a-z]/.test(password)) {
        lowercaseicon.src = 'images/tick.png';
    } else {
        lowercaseicon.src = 'images/cross.png';
    }
    // number 
    if (/[0-9]/.test(password)) {
        numbericon.src = 'images/tick.png';
    } else {
        numbericon.src = 'images/cross.png';
    }
    // symbol 
    if (/[!@#\$%\^\&*\)\(+=._-]/.test(password)) {
        symbolicon.src = 'images/tick.png';
    } else {
        symbolicon.src = 'images/cross.png';
    }
    if (!valid_password) {
        cpasswordInput.disabled = false;
    }
});

document.querySelector('form').addEventListener('submit', function(event) {
    const password = passwordInput.value;
    const username = usernameInput.value; 

    if (
        password.length < 8 ||
        !/[A-Z]/.test(password) ||
        !/[a-z]/.test(password) ||
        !/[0-9]/.test(password) ||
        !/[!@#\$%\^\&*\)\(+=._-]/.test(password)
    ) {
        event.preventDefault();
        alert('Your Password must contain A-Z, a-z, 0-9, and any Symbol');
    }
    if (password !== cpasswordInput.value) {
        event.preventDefault();
        error.style.display = "block";
    }
    if (username.length < 8) { 
        event.preventDefault();
        errorlenght.style.display = "block";
    }

});