/* carousel.js */

// Time period between slides
const SLIDE_CHNAGE_TIME = 3000;

var index = 0;

/*
 * Change the image on the slide to the next product.
 * The function calls it's self agian after a timeout.
 */
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