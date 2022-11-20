// main.js scripts

function headerStylesOnScroll() {
    var header = document.querySelector('.header');
    window.addEventListener('scroll', function () {
        if (window.scrollY >= 10) {
            header.classList.add('header--scrolled');
        } else {
            header.classList.remove('header--scrolled');
        }
    });
}

headerStylesOnScroll();

function showToTopBtnOnScroll() {
    var toTopBtn = document.querySelector('.to-top-btn');
    window.addEventListener('scroll', function () {
        if (window.scrollY >= 600) {
            toTopBtn.classList.add('active');
        } else {
            toTopBtn.classList.remove('active');
        }
    });
}

showToTopBtnOnScroll();
