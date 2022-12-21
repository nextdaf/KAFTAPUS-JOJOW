<!--start:footer-->
<footer id="footer" class="footer footer-white">
    <div class="container">
      <div class="row">
        <div class="footer-left col-lg-3 col-md-5 col-sm-12">
          <div class="footer-widget wow fadeInUp">
            <a href="#" class="logo">JOJOW</a>
            <p class="description"></p>
            <ul class="footer-sosmed">
              <li><button class="btn btn-rounded btn-sm bg-gray-100 text-gray btn-ic"><i
                    class="fab fa-facebook-f"></i></button></li>
              <li><button class="btn btn-rounded btn-sm bg-gray-100 text-gray btn-ic"><i
                    class="fab fa-twitter"></i></button></li>
              <li><button class="btn btn-rounded btn-sm bg-gray-100 text-gray btn-ic"><i
                    class="fab fa-instagram"></i></button></li>
              <li><button class="btn btn-rounded btn-sm bg-gray-100 text-gray btn-ic"><i
                    class="fab fa-linkedin"></i></button></li>
            </ul>
          </div>
        </div>
        <div class="footer-right col-lg-8 col-md-7 col-sm-12">
          <div class="row">
            <?php
            // // Load Komponen Kolom Satu Kolom
            // include "footer/kolomsatu.php";
            // // Load Komponen Dua Kolom
            // include "footer/kolomdua.php";
            // // Load Komponen Tiga Kolom
            // include "footer/kolomtiga.php";
            // // Load Komponen Empat Kolom
            // include "footer/kolomempat.php";
            ?>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12 col-xl-12">
          <div class="footer-copyright wow fadeInUp">
            <p>Copyright © 2022. KAFTAPUS CORP.</p>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <span id="bp_tablet" class="bp_checking"></span>
  <!--end:footer-->

  <!--start:javascript-->
  <script src="./assets/js/jquery.min.js"></script>
  <script src="./assets/js/popper.min.js"></script>
  <script src="./assets/js/bootstrap.min.js"></script>
  <script src="./assets/js/bootstrap-select.min.js"></script>
  <script src="./assets/js/wow.min.js"></script>
  <script src="./assets/js/index.js"></script>
  <script src="./assets/js/owl.carousel.min.js"></script>
  <script>
    // ---------------------------------------------------- //
    // VISIBILITY CHECKING
    // ---------------------------------------------------- //
    var isVisible = function (element) {
      return $(element).is(':visible');
    };

    // ---------------------------------------------------- //
    // BREAKPOINTS MANAGE
    // ---------------------------------------------------- //
    var breakpoints = function () {

      /*** Vars ***/
      var breakpoints = {},
        breakpoint_selector,
        breakpoint_isVisible;

      /*** Init ***/
      var init = function () {

        // First pass, loop on breakpoints
        $('.bp_checking').each(function () {
          manage($(this).attr('id'));
        });

        // On resize, don't use DOM, loop on array
        $(window).on('resize', function () {
          $.each(breakpoints, function (breakpoint_id) {
            manage(breakpoint_id);
          });
        });
      };

      /*** Breakpoint testing ***/
      var is = function (breakpoint) {
        return breakpoints[breakpoint];
      };

      /*** Manage array ***/
      var manage = function (breakpoint_id) {
        breakpoint_selector = '#' + breakpoint_id;
        breakpoint_isVisible = isVisible(breakpoint_selector);
        breakpoints[breakpoint_id] = breakpoint_isVisible;
      };

      /*** Public methods ***/
      return {
        init: init,
        is: is
      };

    }();

    // Init
    breakpoints.init();

    // ---------------------------------------------------- //
    // SLIDER CATEGORIES
    // ---------------------------------------------------- //
    var sliderCategories = function () {

      /*** Vars ***/
      var categories = '#categories',
        slider = false;

      /*** Init ***/
      var init = function () {

        manage(); // On load (1*)

        $(window).on('resize', function () { // On resize (2*)
          waitForFinalEvent(function () {
            manage();
          }, 200, "sliderCategories");
        });

      };

      /*** Manage slider ***/
      var manage = function () {

        var isTablet = breakpoints.is('bp_tablet'); // Test breakpoint

        if (isTablet && !slider) { // If tablet and slider not built yet = build
          build();
        } else if (!isTablet && slider) { // Not tablet but slider built = destroy
          destroy();
        }

      };

      /*** Build slider ***/
      var build = function () {
        slider = $(categories).addClass('owl-carousel'); // Add owl slider class (3*)
        slider.owlCarousel({ // Initialize slider
          loop: true,
          responsive: {
            576: {
              items: 3,
              stagePadding: 50
            },
            768: {
              items: 5,
              stagePadding: 10
            },
            992: {
              items: 6,
              stagePadding: 30
            }
          }
        });
      };

      /*** Destroy slider ***/
      var destroy = function () {
        slider.trigger('destroy.owl.carousel'); // Trigger destroy event (4*)
        slider = false; // Reinit slider variable
        $(categories).removeClass('owl-carousel'); // Remove owl slider class (3*)
      };

      /*** Public methods***/
      return {
        init: init
      };

    }();

    // ---------------------------------------------------- //
    // SLIDER RECOMMENDED
    // ---------------------------------------------------- //
    var sliderRecommended = function () {

      /*** Vars ***/
      var recommended = '#recommended',
        slider = false;

      /*** Init ***/
      var init = function () {

        manage(); // On load (1*)

        $(window).on('resize', function () { // On resize (2*)
          waitForFinalEvent(function () {
            manage();
          }, 200, "sliderRecommended");
        });

      };

      /*** Manage slider ***/
      var manage = function () {

        var isTablet = breakpoints.is('bp_tablet'); // Test breakpoint

        if (isTablet && !slider) { // If tablet and slider not built yet = build
          build();
        } else if (!isTablet && slider) { // Not tablet but slider built = destroy
          destroy();
        }

      };

      /*** Build slider ***/
      var build = function () {
        slider = $(recommended).addClass('owl-carousel'); // Add owl slider class (3*)
        slider.owlCarousel({ // Initialize slider
          loop: true,
          responsive: {
            576: {
              items: 1,
              stagePadding: 120
            },
            768: {
              items: 2,
              stagePadding: 60
            },
            992: {
              items: 3,
              stagePadding: 20
            }
          }
        });
      };

      /*** Destroy slider ***/
      var destroy = function () {
        slider.trigger('destroy.owl.carousel'); // Trigger destroy event (4*)
        slider = false; // Reinit slider variable
        $(recommended).removeClass('owl-carousel'); // Remove owl slider class (3*)
      };

      /*** Public methods***/
      return {
        init: init
      };

    }();


    // ---------------------------------------------------- //
    // PREVENT MULTIPLE CALLS
    // ---------------------------------------------------- //
    var waitForFinalEvent = (function () {
      var timers = {};
      return function (callback, ms, uniqueId) {
        if (!uniqueId) {
          uniqueId = "Don't call this twice without a uniqueId";
        }
        if (timers[uniqueId]) {
          clearTimeout(timers[uniqueId]);
        }
        timers[uniqueId] = setTimeout(callback, ms);
      };
    })();

    // ---------------------------------------------------- //
    // DOCUMENT READY
    // ---------------------------------------------------- //			
    $(document).ready(function () {

      // Init slider categories
      sliderCategories.init();

      // Init slider recommended
      sliderRecommended.init();
    });
  </script>
  <!--end:javascript-->

</body>

</html>