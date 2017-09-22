// JS MODAL
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var openslideshow = document.getElementsByClassName("open-slideshow");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
var slideIndex = 1;
Array.from(openslideshow).forEach(function (item) {
    item.onclick = function() {
        modal.style.display = "block";
        slideIndex = item.id;
        showSlides(slideIndex);
    }
});

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}


/*JS SLIDESHOW*/

showSlides(slideIndex);

function plusSlides(n) {
    n = parseInt(n, 10);
    slideIndex = parseInt(slideIndex, 10);
    showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  if (n > slides.length) {modal.style.display = "none"; slideIndex = 1;}
  if (n < 1) {modal.style.display = "none"; slideIndex = 1;}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  slides[slideIndex-1].style.display = "block";
}