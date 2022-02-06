/* carousel.js */

const SLIDE_CHNAGE_TIME = 3000;
var index = 0;

function carousel() {
    let figures = document.querySelectorAll(".myFigures");

    figures.forEach((figure) => {
        figure.style.display = "none";
    });

    index++;
    if(index > figures.length) {
        index = 1;
    }

    figures[index - 1].style.display = "block";
    setTimeout(carousel, SLIDE_CHNAGE_TIME);
}