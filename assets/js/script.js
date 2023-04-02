document.addEventListener('scroll', scrolListener);

function scrolListener() {
    let menu = document.getElementById('header');

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


const links = document.querySelectorAll('.link-avaliacao a');
let teste = document.querySelector('.link-avaliacao a');

links.forEach((e) => {

    e.addEventListener('mouseover', () => {
        if(e.getAttribute('data-id') == 1) {
            e.style.color = 'rgb(255, 243, 79)';
        }else if(e.getAttribute('data-id') == 2) {
            e.style.color = 'rgb(255, 243, 79)';
            document.querySelector('a[data-id="1"]').style.color = 'rgb(255, 243, 79)';
        }else if(e.getAttribute('data-id') == 3) {
            e.style.color = 'rgb(255, 243, 79)';
            document.querySelector('a[data-id="2"]').style.color = 'rgb(255, 243, 79)';
            document.querySelector('a[data-id="1"]').style.color = 'rgb(255, 243, 79)';
        }else if(e.getAttribute('data-id') == 4) {
            e.style.color = 'rgb(255, 243, 79)';
            document.querySelector('a[data-id="3"]').style.color = 'rgb(255, 243, 79)';
            document.querySelector('a[data-id="2"]').style.color = 'rgb(255, 243, 79)';
            document.querySelector('a[data-id="1"]').style.color = 'rgb(255, 243, 79)';
        }else {
            e.style.color = 'rgb(255, 243, 79)';
            document.querySelector('a[data-id="4"]').style.color = 'rgb(255, 243, 79)';
            document.querySelector('a[data-id="3"]').style.color = 'rgb(255, 243, 79)';
            document.querySelector('a[data-id="2"]').style.color = 'rgb(255, 243, 79)';
            document.querySelector('a[data-id="1"]').style.color = 'rgb(255, 243, 79)';
        }
    });
   
});

links.forEach((e) => {

    e.addEventListener('mouseout', () => {
        
       if(e.getAttribute('data-id') == 1) {
            e.style.color = '';
       }else if(e.getAttribute('data-id') == 2) {
            e.style.color = '';
            document.querySelector('a[data-id="1"]').style.color = '';
       }else if(e.getAttribute('data-id') == 3) {
            e.style.color = '';
            document.querySelector('a[data-id="2"]').style.color = '';
            document.querySelector('a[data-id="1"]').style.color = '';
       }else if(e.getAttribute('data-id') == 4) {
            e.style.color = '';
            document.querySelector('a[data-id="3"]').style.color = '';
            document.querySelector('a[data-id="2"]').style.color = '';
            document.querySelector('a[data-id="1"]').style.color = '';
       }else {
            e.style.color = '';
            document.querySelector('a[data-id="4"]').style.color = '';
            document.querySelector('a[data-id="3"]').style.color = '';
            document.querySelector('a[data-id="2"]').style.color = '';
            document.querySelector('a[data-id="1"]').style.color = '';
       }
        
    });

});

