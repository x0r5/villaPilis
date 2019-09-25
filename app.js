  var scroll = window.requestAnimationFrame;
  var elementsToShow = document.querySelectorAll('.show-on-scroll');

  var rellax = new Rellax('.relax');

  $('#image-big-1').css('background-image', 'url(img/teli-6.jpg)');
  $('#image-big-2').css('background-image', 'url(img/teli-4.jpg)');



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
