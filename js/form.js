const name = document.getElementById('name');
const email = document.getElementById('email');
const password = document.getElementById('password');
const form = document.getElementById('form');
const name_error = document.getElementById('nameError');
const email_error = document.getElementById('emailError');
const password_error = document.getElementById('passwordError');
const role = document.getElementById('role');
const selectError = document.getElementById('selectError');


form.addEventListener('submit', function(e){
    let valid = true;
    if(name){
        if(name.value.length < 3){
            name_error.innerText = "name is to short";
            valid = false;
        } else {
            name_error.innerText = '';
        }
    }

    if(email){
        const pattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if(!pattern.test(email.value)){
            email_error.innerText = "Invalid Email";
            valid = false;
        } else if (email_error) {
            //do nothing
        } else {
            email_error.innerText = '';
        }
    }

    if(password){
        if(password.value.length < 8 || password.value.length > 20){
            password_error.innerText = "password must be longer then 8 character and shorter than 20 character";
            valid = false;
        } else {
            password_error.innerText = '';
        }
    }

    if(role){
        if(role.value == "null"){
            selectError.innerText = "select an option";
            valid = false;
        } else {
            selectError.innerText = '';
        }
    }

    if(!valid){
        e.preventDefault();
       
    }
});

