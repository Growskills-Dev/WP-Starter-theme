// Header scroll
function fixHeaderOnScroll() {
    const header = document.querySelector('header');
  
    if (window.scrollY >= 1) {
        header.classList.add('fixed');
    } else {
        header.classList.remove('fixed');
    }
}
  
window.addEventListener('scroll', fixHeaderOnScroll);
fixHeaderOnScroll();

// Header menu
const headerBurger = document.querySelector('.header-burger');
let scrollPosition = 0;

headerBurger.addEventListener('click', () => {
    if (document.body.classList.contains('menu-is-open')) {
        document.body.classList.remove('menu-is-open');
        window.scrollTo({top: scrollPosition, behavior: 'auto'});
    } else {
        scrollPosition = window.scrollY;
        document.body.classList.add('menu-is-open');
    }
});
  
window.addEventListener('resize', () => {
    document.body.classList.remove('menu-is-open');
});

// Tiny slider
const sliderWrap = document.querySelector('.slider-wrap');

if(sliderWrap){
    var slider = tns({
        container: '.slider-wrap',
        items: 1,
        mouseDrag: true,
        controls: true,
        nav: false,
        autoHeight: true
    });
}

// AJAX load more

const loadMoreButtons = document.querySelectorAll('.ajax-load-more');
loadMoreButtons.forEach(button => {
    button.addEventListener('click', () => {
        const action = 'load_more';
        const post_type = button.dataset.postType;
        const posts_per_page = parseInt(button.dataset.postsPerPage);
        let offset = parseInt(button.dataset.offset ?? posts_per_page);
        const page = Math.ceil((offset + 1) / posts_per_page); 

        button.dataset.offset = offset + posts_per_page;

        fetch(ajax.url, {
            method: 'POST',
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            body: new URLSearchParams({action, post_type, posts_per_page, page}).toString() 
        })
        .then(response => response.text())
        .then(html => {
            const items = button.closest('section').querySelector('.ajax-container');
            items.insertAdjacentHTML('beforeend', html);
            let newItems = document.querySelectorAll('.new-ajax');
            if (items.querySelector('.hide-ajax-button')) {
                button.remove();
            }
        });

    });
});

