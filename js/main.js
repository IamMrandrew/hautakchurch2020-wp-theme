const nav = document.querySelector('nav');
const textWrapper = document.querySelector('.hero .container .text-wrapper');
const jumboVerse = document.querySelector('.jumbotron-verse');

const textWrapperObserverOptions = {
    // rootMargin: "-382px 0px 0px 0px"
    rootMargin: "-460px 0px 0px 0px"
};

const textWrapperObserver = new IntersectionObserver(function(entries) {
    entries.forEach(entry => {
        if (!entry.isIntersecting) {
            nav.classList.add('nav-scrolled');
        } else {
            nav.classList.remove('nav-scrolled');
        }
    })
}, textWrapperObserverOptions);

textWrapperObserver.observe(textWrapper);