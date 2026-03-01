const buttons = document.querySelectorAll('.change_button');

buttons.forEach(button => {
    button.addEventListener('click', function(){
        const section = this.closest('.profile_section');
        const info = section.querySelector('.info');
        const edit = section.querySelector('.edit_info');
        info.classList.toggle('hide');
        edit.classList.toggle('show');
    });
});

const name_form = document.querySelector('.edit_name_form');
const name = document.getElementById('name');
const name_error = document.getElementById('nameError');

name_form.addEventListener('submit', (e) => {
    let valid = true;
    const nameValue = name.value.trim();
    const pattern = /^[A-Za-z]+(?:[ '-][A-Za-z]+)*$/;
    if(!pattern.test(nameValue)){
        name_error.innerText = 'Only letters, spaces, hyphens or apostrophes allowed';
        valid = false;
    } else if(nameValue.length < 2 || nameValue.length > 50){
        name_error.innerText = "Name length must be between 2 and 50 character";
        valid = false;
    }

    if(!valid){
        e.preventDefault();
    }
});

const email_form = document.querySelector('.edit_email_form');
const email = document.getElementById('email');
const email_error = document.getElementById('emailError');

email_form.addEventListener('submit', (e) => {
    e.preventDefault();
    let valid = true;
    const pattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    if(!pattern.test(email.value)){
        email_error.innerText = "Invalid Email";
        valid = false;
    }

    if(!valid){
        return;
    }

    const formData = new FormData();
    formData.append('email', email.value);

    fetch('../../backend/user/update_email.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {

        if (data.status === 'error') {
            email_error.innerText = data.message;
        } else {
            window.location.reload();
        }

    });
    
});

const password_form = document.querySelector('.edit_password_form');
const password = document.getElementById('password');
const password_error = document.getElementById('passwordError');

password_form.addEventListener('submit', (e) => {
    let valid = true;
    if(password.value.length < 8 || password.value.length > 30){
        password_error.innerText = "Password must be between 8 and 30 character";
        valid = false;
    }

    if(!valid){
        e.preventDefault();
    }
});