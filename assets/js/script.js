document.addEventListener('scroll', scrolListener);

function scrolListener() {
    let menu = document.getElementById('header');

    if(window.scrollY > 10) {
        menu.style.backgroundColor = '#000';  
    }else {
        menu.style.backgroundColor = '';
    }
}

function closeModal() {
    document.querySelector('.area-trailer').style.display = 'none';
    document.querySelector('.fade').style.display = 'none';
}

function openModal() {
    document.querySelector('.area-trailer').style.display = 'block';
    document.querySelector('.fade').style.display = 'block';
}


function openModalRateMovie() {
    document.querySelector('.shadow-rate-movie').style.display = 'flex';
}

function closeModalRateMovie() {
    document.querySelector('.shadow-rate-movie').style.display = 'none';
}