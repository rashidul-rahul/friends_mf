<?php
include "inc/header.php";

?>

      <div class="container-fluid">
          <div class="row">
              <div id="background-carousel">
                  <div id="myCarousel" class="carousel slide" data-ride="carousel">
                      <div class="carousel-inner">
                          <div class="item item4 active" ></div>
                          <div class="item item1"></div>
                          <div class="item item2"></div>
                          <div class="item item3"></div>

                      </div>
                  </div>
              </div>
             <div class="text-only"><p class="title">SERVING THE HUMANITY</p></div>

          </div>
      </div>


        

</div>
<script>
    // Get the modal
    var modal = document.getElementById('id01');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    var modal2 = document.getElementById('id02');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal2) {
            modal2.style.display = "none";
        }
    }
</script>



<script src="js/vendor/jquery-1.12.0.min.js"></script>
<script src="js/plugins.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.slicknav.min.js"></script>
<script src="js/jquery.fitvids.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/main.js"></script>

<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
<script>
    (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
        function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
        e=o.createElement(i);r=o.getElementsByTagName(i)[0];
        e.src='https://www.google-analytics.com/analytics.js';
        r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
    ga('create','UA-XXXXX-X','auto');ga('send','pageview');
</script>
</body>
</html>
