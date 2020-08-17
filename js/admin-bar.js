const adminBar = document.querySelector('#wpadminbar');

const adminBarObserver = new IntersectionObserver(function(entries) {
    entries.forEach(entry => {
        if (!entry.isIntersecting) {
            nav.classList.add('nav-to-top');
        } else {
            nav.classList.remove('nav-to-top');
        }
    })
})

adminBarObserver.observe(adminBar);