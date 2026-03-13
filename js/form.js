const name = document.getElementById('name');
const email = document.getElementById('email');
const password = document.getElementById('password');
const form = document.getElementById('form');
const name_error = document.getElementById('nameError');
const email_error = document.getElementById('emailError');
const password_error = document.getElementById('passwordError');


form.addEventListener('submit', function(e){
    let valid = true;
    if(name){
        const nameValue = name.value.trim();
        const pattern = /^[A-Za-z]+(?:[ '-][A-Za-z]+)*$/;
        if(!pattern.test(nameValue)){
            name_error.innerText = 'Only letters, spaces, hyphens or apostrophes allowed';
            valid = false;
        } else if(nameValue.length < 2 || nameValue.length > 50){
            name_error.innerText = "Name length must be between 2 and 50 character";
            valid = false;
        } else {
            name_error.innerText = '';
        }
    }

    if(email){
        const pattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        if(!pattern.test(email.value)){
            email_error.innerText = "Invalid Email";
            valid = false;
        }else {
            email_error.innerText = '';
        }
    }

    if(password){
        if(password.value.length > 0){
            if(password.value.length < 8 || password.value.length > 30){
                password_error.innerText = "Password must be between 8 and 30 character";
                valid = false;
            } else {
                password_error.innerText = '';
            }
        }
    }

    if(!valid){
        e.preventDefault();
       
    }
});

