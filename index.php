<?php 
$title = 'Home';
$currentPage = 'Home';
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
    <title>Villa Pilis Dunakanyar</title>
  </head>
  <body>
      <!-- NAVIGATION -->
    <?php include('nav.php');?>
      

      <div class="parallax" id="parallax-1" data-image-src="pictures/villaPilis-05.jpg">
          <div class="caption">
              <button type="button" class="btn btn-dark btn-lg erdekel">Lefoglalom!</button>
          </div>
      </div>
      
<div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="toast-header">
    <img src="..." class="rounded mr-2" alt="...">
    <strong class="mr-auto">Bootstrap</strong>
    <small>11 mins ago</small>
    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="toast-body">
    Hello, world! This is a toast message.
  </div>
</div>
      
      
  <div class="text">
    <h3>Villa a Dunakanyarban</h3>
    <p>Nascetur per nec posuere turpis, lectus nec libero turpis nunc at, sed posuere mollis ullamcorper libero ante lectus, blandit pellentesque a, magna turpis est sapien duis blandit dignissim. Viverra interdum mi magna mi, morbi sociis. Condimentum dui ipsum consequat morbi, curabitur aliquam pede, nullam vitae eu placerat eget et vehicula. Varius quisque non molestie dolor, nunc nisl dapibus vestibulum at, sodales tincidunt mauris ullamcorper, dapibus pulvinar, in in neque risus odio. Accumsan fringilla vulputate at quibusdam sociis eleifend, aenean maecenas vulputate, non id vehicula lorem mattis, ratione interdum sociis ornare. Suscipit proin magna cras vel, non sit platea sit, maecenas ante augue etiam maecenas, porta porttitor placerat leo.</p>
  </div>

  <div class="parallax" id="parallax-2" data-image-src="pictures/villaPilis-03.jpg" data-height="400px">
    <div class="caption">
    </div>
  </div>

  <div class="text">
    <p>Accumsan fringilla vulputate at quibusdam sociis eleifend, aenean maecenas vulputate, non id vehicula lorem mattis, ratione interdum sociis ornare.</p>
  </div>

  <div class="parallax" id="parallax-3" data-image-src="pictures/villaPilis-01.jpg">
    <div class="caption">
      
    </div>
  </div>

  <div class="parallax" id="parallax-4" data-image-src="pictures/villaPilis-02.jpg">
    <div class="caption">
      
    </div>
  </div>

  <div class="parallax" id="parallax-5" data-image-src="pictures/villaPilis-04.jpg">
    <div class="caption">
      
    </div>
  </div>

  <div class="parallax" id="parallax-6" data-image-src="pictures/villaPilis-06.jpg">
    <div class="caption">
      
    </div>
  </div>
      
      
      
      
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
      <!-- parallax js -->
     
      <script src="app.js"></script>
      
      <script>
          function showToast(){
            $('.toast').toast('show');   
          }
      
          $(document).ready(setTimeout(showToast(), 5000));
      
      </script>
  </body>
</html>