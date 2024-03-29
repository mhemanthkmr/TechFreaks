<?php
include('auth.php');
$title = "Appliances";
include("includes/header.php");
include("firebasecon.php");
?>

<!-- Preloader -->
<div id="iot-preloader">
  <div class="center-preloader d-flex align-items-center">
    <div class="spinners">
      <div class="spinner01"></div>
      <div class="spinner02"></div>
    </div>
  </div>
</div>

<!-- Alerts Modal -->
<div class="modal modal-nobg centered fade" id="alertsModal" tabindex="-1" role="dialog" aria-label="Alerts" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="alert alert-danger alert-dismissible fade show border-0" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button> Security SW update available
        </div>
        <div class="alert alert-warning alert-dismissible fade show border-0" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button> New device recognized
        </div>
        <div class="alert alert-warning alert-dismissible fade show border-0" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button> User profile is not complete
        </div>
      </div>
    </div>
  </div>
  <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

<!-- Alarm Modal -->
<div class="modal modal-danger centered fade" id="alarmModal" tabindex="-1" role="dialog" aria-label="ALARM" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content" data-dismiss="modal">
      <div class="modal-body d-flex">
        <svg class="icon-sprite icon-2x icon-pulse">
          <use xlink:href="assets/images/icons-sprite.svg#alarm" />
        </svg>
        <h3 class="text-right font-weight-bold ml-auto align-self-center">MOTION DETECTED!</h3>
      </div>
    </div>
    <p class="mt-2 text-center text-danger">Click the red area to accept/close message</p>
  </div>
</div>

<!-- Wrapper START -->
<div id="wrapper" class="hidden">
  <!-- Top navbar START -->
  <nav class="navbar navbar-expand fixed-top d-flex flex-row justify-content-start">
    <div class="d-none d-lg-block">
      <form>
        <div id="menu-minifier">
          <label>
            <svg width="32" height="32" viewBox="0 0 32 32">
              <rect x="2" y="8" width="4" height="3" class="menu-dots"></rect>
              <rect x="2" y="15" width="4" height="3" class="menu-dots"></rect>
              <rect x="2" y="22" width="4" height="3" class="menu-dots"></rect>
              <rect x="8" y="8" width="21" height="3" class="menu-lines"></rect>
              <rect x="8" y="15" width="21" height="3" class="menu-lines"></rect>
              <rect x="8" y="22" width="21" height="3" class="menu-lines"></rect>
            </svg>
            <input id="minifier" type="checkbox">
          </label>
          <div class="info-holder info-rb">
            <div data-toggle="popover-all" data-content="Checkbox element using localStorage to remember the last status." data-original-title="Side menu narrowing" data-placement="right"></div>
          </div>
        </div>
      </form>
    </div>
    <a class="navbar-brand px-lg-3 px-1 mr-0" href="appliances.php#">Ethic Electronics</a>
    <div class="ml-auto">
      <div class="navbar-nav flex-row navbar-icons">
        <div class="nav-item">
          <button id="alerts-toggler" class="btn btn-link nav-link" title="Alerts" type="button" data-alerts="3" data-toggle="modal" data-target="#alertsModal">
            <svg class="icon-sprite">
              <use xlink:href="assets/images/icons-sprite.svg#alert" />
              <svg class="text-danger">
                <use class="icon-dot" xlink:href="assets/images/icons-sprite.svg#icon-dot" />
              </svg>
            </svg>
          </button>
        </div>
        <div id="user-menu" class="nav-item dropdown">
          <button class="btn btn-link nav-link dropdown-toggle" title="User" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <svg class="icon-sprite">
              <use xlink:href="assets/images/icons-sprite.svg#user" />
            </svg>
          </button>
          <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="profile.php">Profile</a>
            <div class="dropdown-divider"></div>
            <form action="code.php" method="post">
              <button type="submit" name="logout_btn" class="dropdown-item" href="login.php">Logout</button>
            </form>
          </div>
        </div>
        <div class="nav-item d-lg-none">
          <button id="sidebar-toggler" type="button" class="btn btn-link nav-link" data-toggle="offcanvas">
            <svg class="icon-sprite">
              <use xlink:href="assets/images/icons-sprite.svg#menu" />
            </svg>
          </button>
        </div>
      </div>
    </div>
  </nav>
  <!-- Top navbar END -->
  <!-- wrapper-offcanvas START -->
  <div class="wrapper-offcanvas">
    <!-- row-offcanvas START -->
    <div class="row-offcanvas row-offcanvas-left">
      <!-- Side menu START -->
      <div id="sidebar" class="sidebar-offcanvas">
        <ul class="nav flex-column nav-sidebar">
          <li class="nav-item">
            <a class="nav-link" href="index.php">
              <svg class="icon-sprite">
                <use xlink:href="assets/images/icons-sprite.svg#home" />
              </svg> Home
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="lights.php">
              <svg class="icon-sprite">
                <use xlink:href="assets/images/icons-sprite.svg#bulb-eco" />
              </svg> Lights
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="cameras.php">
              <svg class="icon-sprite">
                <use xlink:href="assets/images/icons-sprite.svg#camera" />
              </svg> Cameras
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link active" href="appliances.php">
              <svg class="icon-sprite">
                <use xlink:href="assets/images/icons-sprite.svg#appliances" />
              </svg> Appliances
            </a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="climate.php">
              <svg class="icon-sprite">
                <use xlink:href="assets/images/icons-sprite.svg#thermometer" />
              </svg> <span>Climate</span>
            </a>
          </li> -->
          <li class="nav-item">
            <a class="nav-link" href="profile.php#">
              <svg class="icon-sprite">
                <use xlink:href="assets/images/icons-sprite.svg#settings" />
              </svg> Settings
            </a>
          </li>
        </ul>
      </div>
      <!-- Side menu END -->
      <!-- Main content START -->
      <div id="main">
        <div class="container-fluid">
          <div class="row">
            <!-- Appliances  START -->
            <div class="col-sm-12 col-md-6">
              <!-- Fridge  START -->
              <div class="card active" data-unit="home-fridge">
                <ul class="list-group borderless">
                  <li class="list-group-item align-items-center">
                    <svg class="icon-sprite icon-1x">
                      <use class="glow" fill="url(#radial-glow)" xlink:href="assets/images/icons-sprite.svg#glow" />
                      <use xlink:href="assets/images/icons-sprite.svg#home-fridge" />
                    </svg>
                    <h5>AC</h5>
                    <p class="ml-auto status">ON</p>
                  </li>
                </ul>
                <hr class="my-0">
                <div class="d-flex justify-content-between" data-rangeslider="fridge-temp">
                  <ul class="list-group borderless px-1 align-items-stretch">
                    <li class="list-group-item">
                      <p class="specs mr-auto mb-auto">Temperature</p>
                    </li>
                    <li class="list-group-item d-flex flex-column pb-4">
                      <p class="mr-auto mt-2 mb-0 display-5">
                        <span id="fridge-temp-F"><?= $fetchdata['temperature'] ?></span><sup>°F</sup>
                      </p>
                      <p class="mr-auto mt-2 mb-0 lead text-primary">
                        <span id="fridge-temp-C">1.67</span><sup>°C</sup>
                      </p>
                    </li>
                  </ul>
                  <div class="p-4" style="position:relative;">
                    <input id="fridge-temp" type="range" min="33.8" max="39.2" step="0.1" value="35" data-orientation="vertical">
                    <div class="info-holder info-lc">
                      <div data-toggle="popover-all" data-content="jQuery range slider using localStorage to remember the last status." data-original-title="Temperature control" data-placement="left" data-offset="0 -12px"></div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Fridge  END -->
            </div>
            <div class="col-sm-12 col-md-6">
              <!-- Fridge  START -->
              <div class="card active" data-unit="home-fridge">
                <ul class="list-group borderless">
                  <li class="list-group-item align-items-center">
                    <svg class="icon-sprite icon-1x">
                      <use class="glow" fill="url(#radial-glow)" xlink:href="assets/images/icons-sprite.svg#glow" />
                      <use xlink:href="assets/images/icons-sprite.svg#home-fridge" />
                    </svg>
                    <h5>AC</h5>
                    <p class="ml-auto status">ON</p>
                  </li>
                </ul>
                <hr class="my-0">
                <div class="d-flex justify-content-between" data-rangeslider="fridge-temp">
                  <ul class="list-group borderless px-1 align-items-stretch">
                    <li class="list-group-item">
                      <p class="specs mr-auto mb-auto">Temperature</p>
                    </li>
                    <li class="list-group-item d-flex flex-column pb-4">
                      <p class="mr-auto mt-2 mb-0 display-5">
                        <span id="fridge-temp-F"><?= $fetchdata['temperature'] ?></span><sup>°F</sup>
                      </p>
                      <p class="mr-auto mt-2 mb-0 lead text-primary">
                        <span id="fridge-temp-C">1.67</span><sup>°C</sup>
                      </p>
                    </li>
                  </ul>
                  <div class="p-4" style="position:relative;">
                    <input id="fridge-temp" type="range" min="33.8" max="39.2" step="0.1" value="35" data-orientation="vertical">
                    <div class="info-holder info-lc">
                      <div data-toggle="popover-all" data-content="jQuery range slider using localStorage to remember the last status." data-original-title="Temperature control" data-placement="left" data-offset="0 -12px"></div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Fridge  END -->
            </div>
            <!-- Main content overlay when side menu appears  -->
            <div class="cover-offcanvas" data-toggle="offcanvas"></div>
          </div>
          <!-- Main content END -->
        </div>
        <!-- row-offcanvas END -->
      </div>
      <!-- wrapper-offcanvas END -->
    </div>
    <!-- Wrapper END -->

    <!-- FAB button - bottom right on large screens -->
    <button id="info-toggler" type="button" class="btn btn-primary btn-fab btn-fixed-br d-none d-lg-inline-block">
      <svg class="icon-sprite">
        <use xlink:href="assets/images/icons-sprite.svg#info" />
      </svg>
    </button>

    <!-- SVG assets - not visible -->
    <svg id="svg-tool" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
      <defs>
        <style type="text/css">
          .glow circle {
            fill: url(appliances.php)
          }
        </style>
        <filter id="blur" x="-25%" y="-25%" width="150%" height="150%">
          <feGaussianBlur in="SourceGraphic" stdDeviation="3" />
        </filter>
        <radialGradient id="radial-glow" fx="50%" fy="50%" r="50%">
          <stop offset="0" stop-color="#0F9CE6" stop-opacity="1" />
          <stop offset="1" stop-color="#0F9CE6" stop-opacity="0" />
        </radialGradient>
      </defs>
    </svg>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

    <!-- Bootstrap bundle -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <!-- Cross browser support for SVG icon sprites -->
    <script src="assets/js/svg4everybody.min.js"></script>

    <!-- jQuery countdown timer plugin (Exit modal, Garage doors, Washing machine) -->
    <script src="assets/js/iot-timer.min.js"></script>

    <!-- jQuery range-slider plugin (Dimmers, Fridge temperature) -->
    <script src="assets/js/iot-range-slider.min.js"></script>

    <!-- Basic theme functionality (arming, garage doors, switches ...) - using jQuery -->
    <script src="assets/js/iot-functions.min.js"></script>

    <script>
      $(document).ready(function() {


        // Get checkbox statuses from localStorage if available (IE)
        if (localStorage) {

          // Menu minifier status (Contract/expand side menu on large screens)
          var checkboxValue = localStorage.getItem('minifier');

          if (checkboxValue === 'true') {
            $('#sidebar,#menu-minifier').addClass('mini');
            $('#minifier').prop('checked', true);

          } else {

            if ($('#minifier').is(':checked')) {
              $('#sidebar,#menu-minifier').addClass('mini');
              $('#minifier').prop('checked', true);
            } else {
              $('#sidebar,#menu-minifier').removeClass('mini');
              $('#minifier').prop('checked', false);
            }
          }

          // Switch statuses
          var switchValues = JSON.parse(localStorage.getItem('switchValues')) || {};

          $.each(switchValues, function(key, value) {

            // Apply only if element is included on the page
            if ($('[data-unit="' + key + '"]').length) {

              if (value === true) {

                // Apply appearance of the "unit" and checkbox element
                $('[data-unit="' + key + '"]').addClass("active");
                $("#" + key).prop('checked', true);
                $("#" + key).closest("label").addClass("checked");

              } else {
                $('[data-unit="' + key + '"]').removeClass("active");
                $("#" + key).prop('checked', false);
                $("#" + key).closest("label").removeClass("checked");

              }
            }
          });

          // Range Slider values
          var rangeValues = JSON.parse(localStorage.getItem('rangeValues')) || {};

          $.each(rangeValues, function(key, value) {

            // Apply only if element is included on the page
            if ($('[data-rangeslider="' + key + '"]').length) {

              if (key === 'fridge-temp') {
                // Update Range slider - special case Fridge
                var temperatureFar = value;
                var temperatureCel = (temperatureFar - 32) * 5 / 9;
                var roundCel = Number(Math.round(temperatureCel + 'e2') + 'e-2');
                $('[data-rangeslider="' + key + '"] #fridge-temp-F').html(temperatureFar);
                $('[data-rangeslider="' + key + '"] #fridge-temp-C').html(roundCel);

              } else {
                // Update Range slider - universal
                $('[data-rangeslider="' + key + '"] input[type="range"]').val(value);
                $('[data-rangeslider="' + key + '"] .range-output').html(value);
              }
            }
          });

        }


        // Contract/expand side menu on click. (only large screens)
        $('#minifier').click(function() {

          $('#sidebar,#menu-minifier').toggleClass('mini');

          // Save side menu status to localStorage if available (IE)
          if (localStorage) {
            checkboxValue = this.checked;
            localStorage.setItem('minifier', checkboxValue);
          }

        });

        // Side menu toogler for medium and small screens
        $('[data-toggle="offcanvas"]').click(function() {
          $('.row-offcanvas').toggleClass('active');
        });

        // Switch (checkbox element) toogler
        $('.switch input[type="checkbox"]').on("change", function(t) {

          // Check the time between changes to prevert Android native browser execute twice
          // If you dont need support for Android native browser - just call "switchSingle" function
          if (this.last) {

            this.diff = t.timeStamp - this.last;

            // Don't execute if the time between changes is too short (less than 250ms) - Android native browser "twice bug"
            // The real time between two human taps/clicks is usually much more than 250ms"
            if (this.diff > 250) {

              this.last = t.timeStamp;

              iot.switchSingle(this.id, this.checked);

            } else {
              return false;
            }

          } else {

            // First attempt on this switch element
            this.last = t.timeStamp;

            iot.switchSingle(this.id, this.checked);

          }
        });

        // Wash machine controls
        $('.wash-control').click(function() {

          var target = $(this).closest('.timer-controls').data('controls');
          var action = $(this).data('action');

          iot.washMachine(target, action);
        });


        // Reposition to center when a modal is shown
        $('.modal.centered').on('show.bs.modal', iot.centerModal);

        // Alerts "Close" callback - hide modal and alert indicator dot when user closes all alerts
        $('#alertsModal .alert').on('close.bs.alert', function() {
          var sum = $('#alerts-toggler').attr('data-alerts');
          sum = sum - 1;
          $('#alerts-toggler').attr('data-alerts', sum);

          if (sum === 0) {
            $('#alertsModal').modal('hide');
            $('#alerts-toggler').attr('data-toggle', 'none');

          }

        });

        // Show/hide tips (popovers) - FAB button (right bottom on large screens)
        $('#info-toggler').click(function() {

          if ($('body').hasClass('info-active')) {
            $('[data-toggle="popover-all"]').popover('hide');
            $('body').removeClass('info-active');
          } else {
            $('[data-toggle="popover-all"]').popover('show');
            $('body').addClass('info-active');
          }
        });

        // Hide tips (popovers) by clicking outside
        $('body').on('click', function(pop) {

          if (pop.target.id !== 'info-toggler' && $('body').hasClass('info-active')) {
            $('[data-toggle="popover-all"]').popover('hide');
            $('body').removeClass('info-active');
          }

        });

        // Data binding for numeric representation of Fridge range slider
        $(document).on('input', 'input[type="range"]#fridge-temp', function() {
          var temperatureFar = this.value;
          var temperatureCel = (temperatureFar - 32) * 5 / 9;
          var roundCel = Number(Math.round(temperatureCel + 'e2') + 'e-2');
          $('[data-rangeslider="' + this.id + '"] #fridge-temp-F').html(temperatureFar);
          $('[data-rangeslider="' + this.id + '"] #fridge-temp-C').html(roundCel);
        });

        // Data binding for numeric representation of TV Volumee range slider
        $(document).on('input', 'input[type="range"].volume', function() {
          $('[data-rangeslider="' + this.id + '"] .range-output').html(this.value);
        });

      });

      // Apply necessary changes, functionality when content is loaded
      $(window).on('load', function() {

        // This script is necessary for cross browsers icon sprite support (IE9+, ...) 
        svg4everybody();

        // Washing machine - demonstration of running program/cycle
        $('#wash-machine').timer({
          countdown: true,
          format: '%H:%M:%S',
          duration: '1m10s',
          //                duration: '1h17m10s',
          callback: function() {
            $('[data-unit="wash-machine"]').removeClass('active');
            $('[data-unit="wash-machine"] .status').html('OFF');
          }
        });

        $('[data-unit="wash-machine"] .timer-controls button[data-action="pause"]').css("display", "block");

        // "Timeout" function is not neccessary - important is to hide the preloader overlay
        setTimeout(function() {

          // Hide preloader overlay when content is loaded
          $('#iot-preloader,.card-preloader').fadeOut();
          $("#wrapper").removeClass("hidden");

          // Initialize range sliders
          $('input[type="range"]').rangeslider({
            polyfill: false,
            onSlideEnd: function(position, value) {

              var rangeValues = JSON.parse(localStorage.getItem('rangeValues')) || {};
              // Update localStorage
              if (localStorage) {
                rangeValues[this.$element[0].id] = value;
                localStorage.setItem("rangeValues", JSON.stringify(rangeValues));
              }
            }

          });

          // Check for Main contents scrollbar visibility and set right position for FAB button
          iot.positionFab();

        }, 800);

      });

      // Apply necessary changes if window resized
      $(window).on('resize', function() {

        // Modal reposition when the window is resized
        $('.modal.centered:visible').each(iot.centerModal);

        // Check for Main contents scrollbar visibility and set right position for FAB button
        iot.positionFab();
      });
    </script>

    </body>

    </html>