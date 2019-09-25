var scroll = window.requestAnimationFrame;
var elementsToShow = document.querySelectorAll('.show-on-scroll');



$(document).ready(function () {
  
  var rellax = new Rellax('.relax');
  AOS.init();

  $(".showit").click(function () {
    $parent = $(this).parent().parent().find(".col-md-8");
    $parent.find("img").slideToggle();
    $parent.find("#toshow").slideToggle("slow");
  });

});








function isElementInViewport(el) {
  // special bonus for those using jQuery
  if (typeof jQuery === "function" && el instanceof jQuery) {
    el = el[0];
  }
  var rect = el.getBoundingClientRect();
  return (
    (rect.top <= 0
      && rect.bottom >= 0)
    ||
    (rect.bottom >= (window.innerHeight || document.documentElement.clientHeight) &&
      rect.top <= (window.innerHeight || document.documentElement.clientHeight))
    ||
    (rect.top >= 0 &&
      rect.bottom <= (window.innerHeight || document.documentElement.clientHeight))
  );
}
