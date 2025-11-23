const email = document.getElementById('email');
const password = document.getElementById('password');
const form = document.getElementById('login_form');
const email_error = document.getElementById('emailError');
const password_error = document.getElementById('passwordError');

form.addEventListener('submit', function(e){
    let valid = true;

    const pattern = /^[^\s1@]+@[^\s@]+\.[^\s@]+$/;
    if(!pattern.test(email.value)){
        email_error.innerText = "Invalid Email";
        valid = false;
    }

    if(password.value.length < 8 || password.value.length > 20){
        password_error.innerText = "password must be longer then 8 character and shorter than 20 character";
        valid = false;
    }

    if(!valid){
        e.preventDefault();
    }
});