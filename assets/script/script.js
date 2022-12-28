let menu = document.getElementById('header');

document.addEventListener('scroll', scrolListener);

function scrolListener() {
    if(window.scrollY > 10) {
        menu.style.backgroundImage = 'linear-gradient(to right, rgb(17, 0, 11), rgb(2, 0, 8))';
    }else {
        menu.style.backgroundImage = '';
    }
}

function closeModal() {
    let AreaTrailer = document.querySelector('.area-trailer');
    let fade = document.querySelector('.fade');

    if(AreaTrailer.style.display == 'block' && fade.style.display == 'block') {
        AreaTrailer.style.display = 'none';
        fade.style.display = 'none';
    }
}

function openModal() {
    let AreaTrailer = document.querySelector('.area-trailer');
    let fade = document.querySelector('.fade');

    if(AreaTrailer.style.display == 'block' && fade.style.display == 'block') {
        AreaTrailer.style.display = 'none';
        fade.style.display = 'none';
    }else {
        AreaTrailer.style.display = 'block';
        fade.style.display = 'block';
    }
}
