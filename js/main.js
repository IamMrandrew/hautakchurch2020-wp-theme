
let clicking = false;

document.addEventListener('click', function() {
    if (clicking){
        clicking = false;
    } else if (document.getElementsByClassName('display-submenu').length > 0) {
        console.log("have");
        document.querySelector('.display-submenu').classList.remove('display-submenu');
    }
});

document.querySelector('.nav-list li ul').parentNode.addEventListener('click', function() {
    document.querySelector('.nav-list li ul').classList.add('display-submenu');
    clicking = true;
});

document.querySelector('.burger').addEventListener('click', function() {
    document.querySelector('.nav-list').classList.toggle('nav-list-active');
});


const nav = document.querySelector('nav');
const h1 = document.querySelector('.hero .container .text-wrapper');
const jumboVerse = document.querySelector('.jumbotron-verse');

const h1ObserverOptions = {
    rootMargin: "-382px 0px 0px 0px"
};

const h1Observer = new IntersectionObserver(function(entries) {
    entries.forEach(entry => {
        if (!entry.isIntersecting) {
            nav.classList.add('nav-scrolled');
        } else {
            nav.classList.remove('nav-scrolled');
        }
    })
}, h1ObserverOptions);

h1Observer.observe(h1);