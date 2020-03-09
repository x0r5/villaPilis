var scroll = window.requestAnimationFrame;
var elementsToShow = document.querySelectorAll('.show-on-scroll');



$(document).ready(function () {

  var date = new Date();
  var today=(date.getFullYear()+"/"+(date.getMonth()+1)+"/"+date.getDate());
  var tomorrow =(date.getFullYear()+"/"+(date.getMonth()+1)+"/"+(date.getDate()+1));
  
  var rellax = new Rellax('.relax'); //rellax.js
  AOS.init(); //scroll animations

  $(".showit").click(function () {
    $parent = $(this).parent().parent().find(".col-md-8");
    $parent.find("img").slideToggle();
    $parent.find("#toshow").slideToggle("slow");
  });


  $('input[name="daterange"]').daterangepicker({
    "maxSpan": {
        "days": 10
    },
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
    
    "startDate": this.today,
    "endDate": this.tomorrow
}, function(start, end, label) {
  console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')');
});

});

$("#reservation-form").submit(function(event){
  event.preventDefault();
  var $form = $(this);
  var $inputs = $form.find("input-date, input-persons, input-children, input-villa, input-name, input-email");
  var formerror = $form.find("[id='error']");
  var formsent = $form.find("[id='formsent']");


  var serializedData = $form.serialize();
  $inputs.prop("disabled", true);
  
  request = $.ajax({
    url: "reservation.php",
    type: "post",
    dataType: "json",
    data: serializedData
  });

  request.done(function( response, textStatus, jqXHR){
    console.log("form data sent");
    console.log(response.message);
    console.log(response.error);
    formerror.hide();
    formsent.html(response.message);

  });

  request.fail(function( jqXHR, textStatus, errorThrown){
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
