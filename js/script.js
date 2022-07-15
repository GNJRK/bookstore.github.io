/* transisi scroll nav */
window.addEventListener('scroll', function(){
    let header = document.querySelector('nav');

    header.classList.toggle('scrolling-active', window.scrollY > 0);
});

/* Burger manu */
const navSlide = () =>{
    const burger = document.querySelector('.burger');
    const nav = document.querySelector('.nav-links');
    const navLinks= document.querySelectorAll('.nav-links li');

    burger.addEventListener('click', ()=> {
        nav.classList.toggle('nav-active');
    });

    navLinks.forEach((link, index) => {
        link.style.animation = `navLinkFade 0.5s ease forwards ${index / 7 + 1}s`;
    })
}
navSlide();
