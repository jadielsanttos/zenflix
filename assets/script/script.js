let menu = document.getElementById('header');

document.addEventListener('scroll', scrolListener);

function scrolListener() {
    if(window.scrollY > 10) {
        menu.style.backgroundImage = 'linear-gradient(to right, rgb(17, 0, 11), rgb(2, 0, 8))';
    }else {
        menu.style.backgroundImage = '';
    }
}