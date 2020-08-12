
let clicking = false;

document.addEventListener('click', function() {
    if (clicking){
        clicking = false;
    } else if (document.getElementsByClassName('display-submenu').length > 0) {
        document.querySelector('.display-submenu').classList.remove('display-submenu');
    }
});

let dropdownMenus = document.querySelectorAll('.nav-list li ul');

dropdownMenus.forEach(dropdownMenu => {
    dropdownMenu.parentNode.addEventListener('click', function() {
        dropdownMenu.classList.add('display-submenu');
        clicking = true;
    })

})

document.querySelector('.burger').addEventListener('click', function() {
    document.querySelector('.nav-list').classList.toggle('nav-list-active');
    document.querySelector('.burger').classList.toggle('burger-active');
});

