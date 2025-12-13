const password_icon = document.getElementById('password');
const eyeicon = document.getElementById('invisible_icon');

eyeicon.addEventListener('click', function(){
    if(password_icon.type == 'password'){
        password_icon.type = 'text';
        eyeicon.src = '../../icons/eye.png';
    } else {
        password_icon.type = 'password';
        eyeicon.src = '../../icons/invisible.png';
    }
});