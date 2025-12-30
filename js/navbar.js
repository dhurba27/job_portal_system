const button = document.getElementById('nav_profile_button');
const profile_menu = document.getElementById("nav_profile_menu");
button.addEventListener('click', (e) => {
    e.stopPropagation();
    profile_menu.classList.toggle('show');
});

document.addEventListener('click', () => {
    profile_menu.classList.remove('show');
});