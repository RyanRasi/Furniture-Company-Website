const containerSlide = document.querySelector('.containerSlide');
const slider = document.querySelector('.slider');
const headline = document.querySelector('.headline');

const tl = new TimelineMax();

tl.fromTo(containerSlide, 1, {height: "0%"}, {height: "80%", ease: Power2.easeInOut})
.fromTo(containerSlide, 1.2, {width: "100%"}, {width: "80%", ease: Power2.easeInOut})

.fromTo(slider, 1.2, {x: "-100%"}, {x: "0%", ease: Power2.easeInOut}, "-=1.2");