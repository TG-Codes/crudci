 <footer class="footer">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <img src="assets/img/custom/logowhite.png" alt="logo" style="width: 7rem; height: 4rem;">
          </div>
          <div class="col-md-3">
            <ul class="nav">
              <li class="nav-item">
                <a href="Home" class="nav-link">
                  Home
                </a>
              </li>
             
              <li class="nav-item">
                <a href="examples/profile-page.html" class="nav-link">
                  Profile
                </a>
              </li>
            </ul>
          </div>
          <div class="col-md-3">
            <ul class="nav">
              <li class="nav-item">
                <a href="contact" class="nav-link">
                  Contact Us
                </a>
              </li>
              <li class="nav-item">
                <a href="about" class="nav-link">
                  About Us
                </a>
              </li>
              <li class="nav-item">
                <a href="https://blog.abiatechhub.com" class="nav-link">
                  Blog
                </a>
              </li>
            </ul>
          </div>
          <div class="col-md-3">
            <h3 class="title">Follow us:</h3>
            <div class="btn-wrapper profile">
              <a target="_blank" href="https://www.twitter.com/abiatechhub/" class="btn btn-icon btn-neutral btn-round btn-simple" data-toggle="tooltip" data-original-title="Follow us">
                <i class="fab fa-twitter"></i>
              </a>
              <a target="_blank" href="https://www.instagram.com/abiatechhub/" class="btn btn-icon btn-neutral  btn-round btn-simple" data-toggle="tooltip" data-original-title="Follow us">
                <i class="fab fa-instagram"></i>
              </a>
              <a target="_blank" href="https://web.facebook.com/AbiaTechHub/" class="btn btn-icon btn-neutral btn-round btn-simple" data-toggle="tooltip" data-original-title="Like us">
                <i class="fab fa-facebook-square"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </footer>
  </div>
  <!--   Core JS Files   -->
  <script src="assets/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="assets/js/core/bootstrap.min.js" type="text/javascript"></script>
  <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
  <script src="assets/js/plugins/bootstrap-switch.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
  <!-- Chart JS -->
  <script src="assets/js/plugins/chartjs.min.js"></script>
  <!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
  <script src="assets/js/plugins/moment.min.js"></script>
  <script src="assets/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
  <!-- Black Dashboard DEMO methods, don't include it in your project! -->
  <script src="assets/demo/demo.js"></script>
  <!-- Control Center for Black UI Kit: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/blk-design-system.min.js?v=1.0.0" type="text/javascript"></script>
 <script src="assets/app.js"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
      demo.initLandingPageChart();
    });
  </script>
  <script>
$("#servicesbtn").click(function() {
    $('html, body').animate({
        scrollTop: $("#services").offset().top
    }, 2000);
});
</script>