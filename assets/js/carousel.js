$(document).ready(function(event) {
  //source: https://www.w3schools.com/bootstrap/tryit.asp?filename=trybs_ref_js_carousel_js&stacked=h
  // variables for Carousel selection
  var carouselSelector;
  var carouselItemNumber;

  // Activate Carousel
  $(".projectCarousel").carousel({ interval: 2300, pause: "hover" });

  // Enable Carousel Indicators
  $(".item-visual").click(function() {
    carouselSelector = "#myCarousel" + $(this).attr("carouselnumber");
    carouselItemNumber = parseInt($(this).attr("itemnumber"), 10) - 1;
    $(carouselSelector).carousel(carouselItemNumber);
  });

  // Enable Carousel Controls
  $(".left").click(function(event) {
    event.preventDefault();
    carouselSelector = "#myCarousel" + $(this).attr("carouselnumber");
    $(carouselSelector).carousel("prev");
  });

  $(".right").click(function(event) {
    event.preventDefault();
    carouselSelector = "#myCarousel" + $(this).attr("carouselnumber");
    $(carouselSelector).carousel("next");
  });
});
