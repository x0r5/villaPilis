<div class="container-fluid my-5">
    <div class="row justify-content-md-center">
      <div class="embed-responsive embed-responsive-16by9">
        <iframe class="embed-responsive-item"
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2681.0154738438737!2d18.87859201563655!3d47.78114797919658!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4741dc29985c194f%3A0x137415d5aa64cace!2sVilla%20Pilis%20Dunakanyar!5e0!3m2!1shu!2shu!4v1569423361197!5m2!1shu!2shu"
          width="100%" height="100%" frameborder="0" style="border:0;"></iframe>
      </div>
    </div>
</div>

<div class="container-fluid my-5">

    <div class="title-2">Foglalj most!</div>

    <form class="mx-5" id="reservation-form">
        <div class="form-row">
        <div class="form-group col-md-6">
            <label for="input-date">Mikor?</label>
            <input id="input-date" type="text" name="daterange" value="" class="form-control" />
        </div>
        <div class="form-group col-md-3">
            <label for="input-persons">Felnőttek száma</label>
            <select id="input-persons" class=form-control name="input-persons">
            <option selected>Válassz!</option>
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
            <option>6</option>
            <option>7</option>
            <option>8</option>
            <option>9</option>
            <option>10</option>
            <option>11</option>
            <option>12</option>
            <option>13</option>
            <option>14</option>
            </select>
        </div>
        <div class="form-group col-md-3">
            <label for="input-children">Gyerekek 3-11 éves korig</label>
            <select id="input-children" class=form-control name="input-children">
            <option selected>0</option>
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
            <option>6</option>
            </select>
        </div>
        </div>
        <div class="form-row">
        
        <div class="form-group col-md-6">
            <input type="hidden" id='captcha' name="captcha">
            <label for="input-name">Teljes Név</label>
            <input id="input-name" type="text" class="form-control" placeholder="Név" name="input-name">
        </div>
        <div class="form-group col-md-6">
            <label for="input-email">Email cím</label>
            <input id="input-email" type="email" class="form-control" placeholder="email" name="input-email">
        </div>
        </div>


        <div class="form-row">
        <div class="form-group col-md-4">
            <label for="input-villa">Az egész kell?</label>
            <select id="input-villa" class="form-control" name="input-villa">
            <option selected>Az egész villa az enyém!</option>
            <option>4 -en vagyunk, a fél villával is beérem!</option>
            </select>
        </div>
        <div class="form-group col-md-8">
            <label for="input-comment">Megjegyzés</label>
            <textarea class="form-control" id="input-comment" rows="3" name="input-comment"></textarea>
        </div>
        </div>
        <div class="g-recaptcha" data-sitekey="6LchVOAUAAAAAELOhQRZaEyMJX4HbqupnVEgCxZ1"></div>
        <button type="submit" class="send-button btn btn-primary mx-auto">Küldés</button>
        <div id="error"></div>
        <div id="formsent"></div>

    </form>
</div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
    integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
    integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
    crossorigin="anonymous"></script>
  <!-- angular js-->
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.9/angular.min.js"></script>
  <!-- moment js-->
  <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>

  <!-- parallax js -->
  <script src="frameworks/rellax/rellax.min.js"></script>


  <!-- AOS scroll animations-->
  <script src="frameworks/aos/aos.js"></script>

  <!-- datepicker -->
  <script src="frameworks/daterangepicker/daterangepicker.min.js"></script>

  <!-- google captcha -->
  <script src="https://www.google.com/recaptcha/api.js?hl=hu"></script>

  <script src="app.js"></script>

  <script>


  </script>
</body>

</html>