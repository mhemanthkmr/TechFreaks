<?php
include('auth.php');
$title = "Cameras";
include('includes/header.php');
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
    <a class="navbar-brand px-lg-3 px-1 mr-0" href="cameras.php#">Ethic Electronics</a>
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
          <li class="nav-item active">
            <a class="nav-link active" href="cameras.php">
              <svg class="icon-sprite">
                <use xlink:href="assets/images/icons-sprite.svg#camera" />
              </svg> Cameras
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="appliances.php">
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
            <div class="col-sm-12 col-md-6">
              <!-- Camera 1  START -->
              <div class="card active" data-unit="switch-camera-1">
                <div class="card-img-top card-stream">
                  <div class="embed-responsive embed-responsive-16by9">
                    <video muted loop>
                      <source src="assets/videos/street.mp4" type="video/mp4" />
                      <source src="assets/videos/street.webm" type="video/webm" />
                    </video>
                    <div class="card-preloader">
                      <div class="center-preloader d-flex align-items-center">
                        <div class="spinners">
                          <div class="spinner01"></div>
                          <div class="spinner02"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-img-top card-stream off">
                  <div class="embed-responsive embed-responsive-16by9">
                    <h2 class="center-abs">OFF</h2>
                  </div>
                </div>
                <!-- Camera switch START -->
                <div class="card-body d-flex">
                  <svg class="icon-sprite">
                    <use class="glow" fill="url(#radial-glow)" xlink:href="assets/images/icons-sprite.svg#glow" />
                    <use xlink:href="assets/images/icons-sprite.svg#camera" />
                  </svg>
                  <h5>Outdoor front</h5>
                  <label class="switch ml-auto checked">
                    <input type="checkbox" id="switch-camera-1" checked>
                  </label>
                </div>
                <!-- Camera switch END -->
                <hr class="my-0">
                <!-- Bulb details START -->
                <ul class="list-group borderless px-1">
                  <li class="list-group-item pt-3 pb-2">
                    <p class="specs">Connection</p>
                    <p class="ml-auto mb-0 py-1 text-success">OK</p>
                  </li>
                  <li class="list-group-item py-2">
                    <p class="specs">Night vision</p>
                    <div class="btn-group btn-group-toggle ml-auto py-1" data-toggle="buttons">
                      <label class="btn btn-label btn-sm mb-0 active">
                        <input type="radio" name="options" id="c1-nv-auto" autocomplete="off" checked> AUTO
                      </label>
                      <label class="btn btn-label btn-sm mb-0">
                        <input type="radio" name="options" id="c1-nv-on" autocomplete="off"> ON
                      </label>
                      <label class="btn btn-label btn-sm mb-0">
                        <input type="radio" name="options" id="c1-nv-off" autocomplete="off"> OFF
                      </label>
                    </div>
                  </li>
                  <li class="list-group-item pt-2 pb-4">
                    <p class="specs">Timelaps recording</p>
                    <div class="btn-group btn-group-toggle ml-auto py-1" data-toggle="buttons">
                      <label class="btn btn-label btn-sm mb-0 active">
                        <input type="radio" name="options" id="c1-rec-on" autocomplete="off" checked> ENABLE
                      </label>
                      <label class="btn btn-label btn-sm mb-0">
                        <input type="radio" name="options" id="c1-rec-off" autocomplete="off"> DISABLE
                      </label>
                    </div>
                  </li>
                </ul>
                <!-- Bulb details END -->
              </div>
              <!-- Camera 1  END -->
            </div>
            <div class="col-sm-12 col-md-6">
              <!-- Camera 2  START -->
              <div class="card" data-unit="switch-camera-2">
                <div class="card-img-top card-stream">
                  <div class="embed-responsive embed-responsive-16by9">
                    <video muted loop>
                      <source src="assets/videos/room.mp4" type="video/mp4" />
                      <source src="assets/videos/room.webm" type="video/webm" />
                    </video>
                    <div class="card-preloader">
                      <div class="center-preloader d-flex align-items-center">
                        <div class="spinners">
                          <div class="spinner01"></div>
                          <div class="spinner02"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-img-top card-stream off">
                  <div class="embed-responsive embed-responsive-16by9">
                    <h2 class="center-abs">OFF</h2>
                  </div>
                </div>
                <!-- Camera switch START -->
                <div class="card-body d-flex">
                  <svg class="icon-sprite">
                    <use class="glow" fill="url(#radial-glow)" xlink:href="assets/images/icons-sprite.svg#glow" />
                    <use xlink:href="assets/images/icons-sprite.svg#camera" />
                  </svg>
                  <h5>Joe's room</h5>
                  <label class="switch ml-auto">
                    <input type="checkbox" id="switch-camera-2">
                  </label>
                </div>
                <!-- Camera switch END -->
                <hr class="my-0">
                <!-- Bulb details START -->
                <ul class="list-group borderless px-1">
                  <li class="list-group-item pt-3 pb-2">
                    <p class="specs">Connection</p>
                    <p class="ml-auto mb-0 py-1 text-success">OK</p>
                  </li>
                  <li class="list-group-item flex-column py-2">
                    <p class="specs w-100">Night vision</p>
                    <div class="btn-group btn-group-toggle w-100 py-2" data-toggle="buttons">
                      <label class="btn btn-label btn-sm mb-0 col-4 active">
                        <input type="radio" name="options" id="c2-nv-auto" autocomplete="off" checked> AUTO
                      </label>
                      <label class="btn btn-label btn-sm mb-0 col-4">
                        <input type="radio" name="options" id="c2-nv-on" autocomplete="off"> ON
                      </label>
                      <label class="btn btn-label btn-sm mb-0 col-4">
                        <input type="radio" name="options" id="c2-nv-off" autocomplete="off"> OFF
                      </label>
                    </div>
                    <div class="info-holder info-ct">
                      <div data-toggle="popover-all" data-content="Group of radio buttons." data-original-title="Option settings" data-placement="bottom" data-offset="0,-32"></div>
                    </div>
                  </li>
                  <li class="list-group-item flex-column pt-2 pb-4">
                    <p class="specs w-100">Timelaps recording</p>
                    <div class="btn-group btn-group-toggle w-100 ml-auto py-2" data-toggle="buttons">
                      <label class="btn btn-label btn-sm mb-0 w-100 active">
                        <input type="radio" name="options" id="c2-rec-on" autocomplete="off" checked> ENABLE
                      </label>
                      <label class="btn btn-label btn-sm mb-0 w-100">
                        <input type="radio" name="options" id="c2-rec-off" autocomplete="off"> DISABLE
                      </label>
                    </div>
                  </li>
                </ul>
                <!-- Bulb details END -->
              </div>
              <!-- Camera 2  END -->
            </div>
          </div>
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
        fill: url(cameras.php)
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

            //In case of Camera unit - play video
            if (key === "switch-camera-1" || key === "switch-camera-2") {
              $('[data-unit="' + key + '"] video')[0].play();
            }

          } else {
            $('[data-unit="' + key + '"]').removeClass("active");
            $("#" + key).prop('checked', false);
            $("#" + key).closest("label").removeClass("checked");
            if (key === "switch-camera-1" || key === "switch-camera-2") {
              $('[data-unit="' + key + '"] video')[0].pause();
            }
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

  });

  // Apply necessary changes, functionality when content is loaded
  $(window).on('load', function() {

    // This script is necessary for cross browsers icon sprite support (IE9+, ...) 
    svg4everybody();

    if ($('[data-unit="switch-camera-1"]').hasClass("active")) {
      var activeVideo = $('[data-unit="switch-camera-1"] video').get(0);

      if (activeVideo.paused) {
        activeVideo.autoplay = true;
        activeVideo.load();
        activeVideo.play();
      } else {
        activeVideo.pause();
      }
    }

    if ($('[data-unit="switch-camera-2"]').hasClass("active")) {
      var activeVideo = $('[data-unit="switch-camera-2"] video').get(0);

      if (activeVideo.paused) {
        activeVideo.autoplay = true;
        activeVideo.load();
        activeVideo.play();
      } else {
        activeVideo.pause();
      }
    }

    // "Timeout" function is not neccessary - important is to hide the preloader overlay
    setTimeout(function() {

      // Hide preloader overlay when content is loaded
      $('#iot-preloader,.card-preloader').fadeOut();
      $("#wrapper").removeClass("hidden");

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