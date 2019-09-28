$(document).ready(function(event) {
  //source: https://www.w3schools.com/bootstrap/tryit.asp?filename=trybs_ref_js_carousel_js&stacked=h
  // variables for Carousel selection
  var carouselNumber;
  var carouselSelector;
  var carouselItemNumber;

  // Activate Carousel
  $("#myCarousel1").carousel({ interval: 2300, pause: "hover" });
  $("#myCarousel2").carousel({ interval: 2300, pause: "hover" });

  // Enable Carousel  Indicators
  $(".item-visual").click(function() {
    carouselNumber = $(this).attr("carouselnumber");
    carouselSelector = "#myCarousel" + carouselNumber;
    carouselItemNumber = parseInt($(this).attr("itemnumber"), 10) - 1;
    $(carouselSelector).carousel(carouselItemNumber);
  });

  // Enable Carousel  Controls
  $(".left").click(function(event) {
    event.preventDefault();
    carouselNumber = $(this).attr("carouselnumber");
    carouselSelector = "#myCarousel" + carouselNumber;
    $(carouselSelector).carousel("prev");
  });

  $(".right").click(function(event) {
    event.preventDefault();
    carouselNumber = $(this).attr("carouselnumber");
    carouselSelector = "#myCarousel" + carouselNumber;
    $(carouselSelector).carousel("next");
  });
});
