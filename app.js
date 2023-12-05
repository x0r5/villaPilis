var scroll = window.requestAnimationFrame;
var elementsToShow = document.querySelectorAll('.show-on-scroll');
var selectedRoomId;

document.querySelectorAll('.map-dot').forEach(element =>{element.addEventListener("click", (e)=>{handleRoomButtonClick(e)})});

$(document).ready(function(){
  if(window.location.href.includes('.php')){
    handleScrollToTitle();
  }
});

function handleRoomButtonClick(event){
  if(selectedRoomId){
    document.querySelector(`#${selectedRoomId}Carousel`).style.display = 'none';
  }
  selectedRoomId = event.target.id;
  console.log(selectedRoomId);
  let roomContent = document.querySelector(`#${selectedRoomId}Carousel`);
  if(roomContent){
    roomContent.style.display = 'block';
  }
  roomContent.scrollIntoView();
}

function handleScrollToTitle(){
  $('html, body').animate({
    scrollTop: $(".title-main").offset().top
  }, 500);
}

$(function () {

  var date = new Date();
  var today = (date.getFullYear() + "/" + (date.getMonth() + 1) + "/" + date.getDate());
  var enddate = (date.getFullYear() + "/" + (date.getMonth() + 1) + "/" + (date.getDate() + 2));

  var rellax = new Rellax('.relax'); //rellax.js
  AOS.init(); //scroll animations


  $('input[name="daterange"]').daterangepicker({
    "maxSpan": {
      "days": 10
    },
    "minDate": today,
    "locale": {
      "format": "YYYY/MM/DD",
      "separator": " - ",
      "applyLabel": "Tovább",
      "cancelLabel": "Mégsem",
      "fromLabel": "From",
      "toLabel": "To",
      "customRangeLabel": "Custom",
      "weekLabel": "W",
      "daysOfWeek": [
        "Vas",
        "Hé",
        "Ke",
        "Sze",
        "Csü",
        "Pé",
        "Szo"
      ],
      "monthNames": [
        "Január",
        "Február",
        "Március",
        "Április",
        "Május",
        "Június",
        "Július",
        "Augusztus",
        "Szeptember",
        "Október",
        "November",
        "December"
      ],
      "firstDay": 1
    },

    "startDate": today,
    "endDate": enddate
  }, function (start, end, label) {
    console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')');
    let oneDayMs = 1000 * 60 * 60 * 24;
    let difference = (end - start + 1) / oneDayMs;
    if(difference < 3){
      alert('A minimum foglalható éjszakák száma 2.');
    }
  });

});

$("#reservation-form").on("submit", function (event) {
  event.preventDefault();

  let $form = $(this);
  let $inputs = $form.find("input-date, input-persons, input-children, input-name, input-email");
  let formerror = $form.find("[id='error']");
  let formsent = $form.find("[id='formsent']");

  var serializedData = $('#reservation-form').serialize();
  console.log(serializedData);
  $inputs.prop("disabled", true);

  let request = $.ajax({
    url: "reservation.php",
    type: "post",
    dataType: "json",
    data: serializedData
  });

  request.done(function (response, textStatus, jqXHR) {
    console.log("form data sent");
    console.log(response.message);
    console.log(response.error);
    formerror.hide();
    formsent.html(response.message);

  });

  request.fail(function (jqXHR, textStatus, errorThrown) {
    console.log("ajax: the following error occured: " + textStatus, errorThrown, jqXHR);
    formerror.html(textStatus);

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
