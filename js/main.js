const ratio = .1;

var options = {
    root: null,
    rootMargin: '0px',
    threshold: ratio
};

const handleIntersect = function (entries, observer) {
    entries.forEach(function (entry) {
        if (entry.intersectionRatio > ratio) {
            entry.target.classList.add('reveal-visible');
            observer.unobserve(entry.target)
        }
    })
};

const observer = new IntersectionObserver(handleIntersect, options);
document.querySelectorAll('[class*="reveal-"]').forEach(function (r) {
    observer.observe(r)
});

// ***********************************
const handleIntersect2 = function (entries2, observer2) {
    entries2.forEach(function (entry) {
        if (entry.intersectionRatio > ratio) {
            entry.target.classList.add('reveal1-visible');
            observer2.unobserve(entry.target)
        }
    })
};

const observer2 = new IntersectionObserver(handleIntersect2, options);
document.querySelectorAll('[class*="reveal1-"]').forEach(function (r) {
    observer2.observe(r)
});

$(document).ready(function () {
    $(".dropdown").hover(function () {
        var dropdownMenu = $(this).children(".dropdown-menu");
        if (dropdownMenu.is(":visible")) {
            dropdownMenu.parent().toggleClass("open");
        }
    });
});

$(window).scroll(function () {
    var navbar = $('.navbar-principale');
    var scrollTop = $(window).scrollTop();

    if (scrollTop >= 100) {
        navbar.addClass('fixed-top');
    }
    else {
        navbar.removeClass('fixed-top');
    }
});