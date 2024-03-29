<?php 
include('auth.php');
$title = "Climate";
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
  <div class="modal modal-nobg centered fade" id="alertsModal" tabindex="-1" role="dialog" aria-label="Alerts"
    aria-hidden="true">
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
  <div class="modal modal-danger centered fade" id="alarmModal" tabindex="-1" role="dialog" aria-label="ALARM"
    aria-hidden="true" data-backdrop="static">
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
              <div data-toggle="popover-all"
                data-content="Checkbox element using localStorage to remember the last status."
                data-original-title="Side menu narrowing" data-placement="right"></div>
            </div>
          </div>
        </form>
      </div>
      <a class="navbar-brand px-lg-3 px-1 mr-0" href="climate.php#">EthicElectronics</a>
      <div class="ml-auto">
        <div class="navbar-nav flex-row navbar-icons">
          <div class="nav-item">
            <button id="alerts-toggler" class="btn btn-link nav-link" title="Alerts" type="button" data-alerts="3"
              data-toggle="modal" data-target="#alertsModal">
              <svg class="icon-sprite">
                <use xlink:href="assets/images/icons-sprite.svg#alert" />
                <svg class="text-danger">
                  <use class="icon-dot" xlink:href="assets/images/icons-sprite.svg#icon-dot" />
                </svg>
              </svg>
            </button>
          </div>
          <div id="user-menu" class="nav-item dropdown">
            <button class="btn btn-link nav-link dropdown-toggle" title="User" type="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
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
            <li class="nav-item">
              <a class="nav-link" href="appliances.php">
                <svg class="icon-sprite">
                  <use xlink:href="assets/images/icons-sprite.svg#appliances" />
                </svg> Appliances
              </a>
            </li>
            <li class="nav-item active">
              <a class="nav-link active" href="climate.php">
                <svg class="icon-sprite">
                  <use xlink:href="assets/images/icons-sprite.svg#thermometer" />
                </svg> <span>Climate</span>
              </a>
            </li>
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
                <!-- Living room temperature  START -->
                <div class="card temp-range heating" data-unit="room-temp-02">
                  <ul class="list-group borderless">
                    <li class="list-group-item align-items-center">
                      <svg class="icon-sprite icon-1x">
                        <use xlink:href="assets/images/icons-sprite.svg#thermometer-tiny" />
                      </svg>
                      <h5>Living room</h5>
                      <h5 class="ml-auto status">71.6<sup>°F</sup></h5>
                    </li>
                  </ul>
                  <hr class="my-0">
                  <div class="d-flex justify-content-between" data-rangeslider="room-temp-02">
                    <ul class="list-group borderless px-1 align-items-stretch">
                      <li class="list-group-item">
                        <p class="specs mr-auto mb-auto">Desired temperature</p>
                      </li>
                      <li class="list-group-item d-flex flex-column pb-4">
                        <p class="mr-auto mt-2 mb-0 display-5">
                          <span class="room-temp-F">71.6</span><sup>°F</sup>
                        </p>
                        <p class="mr-auto mt-2 mb-0 lead text-primary">
                          <span class="room-temp-C">22</span><sup>°C</sup>
                        </p>
                      </li>
                    </ul>
                    <div class="p-4" style="position:relative;">
                      <input id="room-temp-02" class="room-temp" type="range" min="66.2" max="77" step="0.1"
                        value="71.6" data-orientation="vertical">
                    </div>
                  </div>
                </div>
                <!-- Living room temperature  END -->
              </div>
              <div class="col-sm-12 col-md-6">
                <!-- Bedroom temperature  START -->
                <div class="card temp-range" data-unit="room-temp-01">
                  <ul class="list-group borderless">
                    <li class="list-group-item align-items-center">
                      <svg class="icon-sprite icon-1x">
                        <use xlink:href="assets/images/icons-sprite.svg#thermometer-tiny" />
                      </svg>
                      <h5>Bedroom</h5>
                      <h5 class="ml-auto status">71.6<sup>°F</sup></h5>
                    </li>
                  </ul>
                  <hr class="my-0">
                  <div class="d-flex justify-content-between" data-rangeslider="room-temp-01">
                    <ul class="list-group borderless px-1 align-items-stretch">
                      <li class="list-group-item">
                        <p class="specs mr-auto mb-auto">Desired temperature</p>
                      </li>
                      <li class="list-group-item d-flex flex-column pb-4">
                        <p class="mr-auto mt-2 mb-0 display-5">
                          <span class="room-temp-F">71.6</span><sup>°F</sup>
                        </p>
                        <p class="mr-auto mt-2 mb-0 lead text-primary">
                          <span class="room-temp-C">22</span><sup>°C</sup>
                        </p>
                      </li>
                    </ul>
                    <div class="p-4" style="position:relative;">
                      <input id="room-temp-01" class="room-temp" type="range" min="66.2" max="77" step="0.1"
                        value="71.6" data-orientation="vertical">
                      <div class="info-holder info-lc">
                        <div data-toggle="popover-all"
                          data-content="jQuery range slider using localStorage to remember the last status."
                          data-original-title="Temperature control" data-placement="left" data-offset="0 -12px"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Bedroom temperature  END -->
              </div>
              <div class="col-sm-12 col-md-6">
                <!-- FAN Kitchen  START -->
                <div class="card active" data-unit="fan-kitchen">
                  <!-- FAN Kitchen switch START -->
                  <ul class="list-group borderless">
                    <li class="list-group-item align-items-center">
                      <svg class="icon-sprite icon-1x">
                        <use xlink:href="assets/images/icons-sprite.svg#fan" />
                      </svg>
                      <h5>Kitchen</h5>
                      <label class="switch ml-auto checked">
                        <input type="checkbox" id="fan-kitchen" checked>
                      </label>
                    </li>
                  </ul>
                  <!-- FAN Kitchen switch END -->
                  <div class="only-if-active">
                    <hr class="my-0">
                    <ul class="list-group borderless px-1">
                      <li class="list-group-item pb-0">
                        <p class="specs">Connection</p>
                        <p class="ml-auto mb-0 text-success">OK</p>
                      </li>
                    </ul>
                    <!-- Speed control - range slider START -->
                    <ul class="list-group borderless px-1" data-rangeslider="fan-01">
                      <li class="list-group-item">
                        <p class="specs">Speed</p>
                        <p class="ml-auto mb-0"><span class="range-output">3</span></p>
                      </li>
                      <li class="list-group-item pt-0 pb-4">
                        <input id="fan-01" class="fanspeed" type="range" min="1" max="6" value="3">
                      </li>
                    </ul>
                    <!-- Speed control - range slider END -->
                  </div>
                </div>
                <!-- FAN Kitchen END -->
              </div>
              <div class="col-sm-12 col-md-6">
                <!-- FAN Bathroom  START -->
                <div class="card active" data-unit="fan-bathroom">
                  <!-- FAN Bathroom switch START -->
                  <ul class="list-group borderless">
                    <li class="list-group-item align-items-center">
                      <svg class="icon-sprite icon-1x">
                        <use xlink:href="assets/images/icons-sprite.svg#fan" />
                      </svg>
                      <h5>Bathroom</h5>
                      <label class="switch ml-auto checked">
                        <input type="checkbox" id="fan-bathroom" checked>
                      </label>
                    </li>
                  </ul>
                  <!-- FAN Bathroom switch END -->
                  <div class="only-if-active">
                    <hr class="my-0">
                    <ul class="list-group borderless px-1">
                      <li class="list-group-item pb-0">
                        <p class="specs">Connection</p>
                        <p class="ml-auto mb-0 text-success">OK</p>
                      </li>
                    </ul>
                    <!-- Speed control - range slider START -->
                    <ul class="list-group borderless px-1" data-rangeslider="fan-02">
                      <li class="list-group-item">
                        <p class="specs">Speed</p>
                        <p class="ml-auto mb-0"><span class="range-output">3</span></p>
                      </li>
                      <li class="list-group-item pt-0 pb-4">
                        <input id="fan-02" class="fanspeed" type="range" min="1" max="6" value="3">
                      </li>
                    </ul>
                    <!-- Speed control - range slider END -->
                  </div>
                </div>
                <!-- FAN Bathroom END -->
              </div>
            </div>
            <hr class="my-2">
            <!-- Outdoor temperature graph START -->
            <div class="row">
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Outdoor temperature</h4>
                  </div>
                  <hr class="my-0">
                  <div class="card-body">
                    <div id="chart02" class="ct-chart"></div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Outdoor temperature END -->
            <!-- Appliances  END -->
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
          fill: url(climate.php)
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
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

  <!-- Bootstrap bundle -->
  <script src="assets/js/bootstrap.bundle.min.js"></script>

  <!-- Cross browser support for SVG icon sprites -->
  <script src="assets/js/svg4everybody.min.js"></script>

  <!-- jQuery range-slider plugin (Dimmers, Fridge temperature) -->
  <script src="assets/js/iot-range-slider.min.js"></script>

  <!-- Basic theme functionality (arming, garage doors, switches ...) - using jQuery -->
  <script src="assets/js/iot-functions.min.js"></script>

  <!-- Chartist.js library - NO jQuery dependency -->
  <script src="assets/js/chartist.min.js"></script>

  <script src="climate.js"></script>

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

            var rangeKey = key.slice(0, -3);

            if (rangeKey === 'room-temp') {
              // Update Range slider - special case Room
              var temperatureFar = value;
              var temperatureCel = (temperatureFar - 32) * 5 / 9;
              var roundCel = Number(Math.round(temperatureCel + 'e2') + 'e-2');
              $('[data-rangeslider="' + key + '"] .room-temp-F').html(temperatureFar);
              $('[data-rangeslider="' + key + '"] .room-temp-C').html(roundCel);

              // If room temperature is lower than desired (71.6 F) - activate it
              if (temperatureFar > 71.59) {
                $('[data-unit="' + key + '"]').addClass("active");
              } else {
                $('[data-unit="' + key + '"]').removeClass("active");
              }

              // Manage temperature visualisation heating/cooling in regard to desired (71.6 F)
              if (temperatureFar > 71.6) {
                $('[data-unit="' + key + '"]').addClass("heating");
                $('[data-unit="' + key + '"]').removeClass("cooling");
              } else if (temperatureFar < 71.6) {
                $('[data-unit="' + key + '"]').addClass("cooling");
                $('[data-unit="' + key + '"]').removeClass("heating");
              } else {
                $('[data-unit="' + key + '"]').removeClass("cooling");
                $('[data-unit="' + key + '"]').removeClass("heating");
              }

              // Update Range slider - universal
              $('[data-rangeslider="' + key + '"] input[type="range"]').val(value);
              $('[data-rangeslider="' + key + '"] .range-output').html(value);

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

      // Data binding for numeric representation of Room temperature range slider
      $(document).on('input', 'input[type="range"].room-temp', function() {
        var temperatureFar = this.value;
        var temperatureCel = (temperatureFar - 32) * 5 / 9;
        var roundCel = Number(Math.round(temperatureCel + 'e2') + 'e-2');
        $('[data-rangeslider="' + this.id + '"] .room-temp-F').html(temperatureFar);
        $('[data-rangeslider="' + this.id + '"] .room-temp-C').html(roundCel);

        // Manage temperature visualisation heating/cooling in regard to desired (71.6 F)
        if (temperatureFar > 71.6) {
          $('[data-unit="' + this.id + '"]').addClass("heating");
          $('[data-unit="' + this.id + '"]').removeClass("cooling");
        } else if (temperatureFar < 71.6) {
          $('[data-unit="' + this.id + '"]').addClass("cooling");
          $('[data-unit="' + this.id + '"]').removeClass("heating");

        } else {
          $('[data-unit="' + this.id + '"]').removeClass("cooling");
          $('[data-unit="' + this.id + '"]').removeClass("heating");
        }
      });

      // Data binding for numeric representation of Fan speed range slider
      $(document).on('input', 'input[type="range"].fanspeed', function() {
        $('[data-rangeslider="' + this.id + '"] .range-output').html(this.value);
      });


      // Charts initializaton - Chartist.js
      var data02 = {
        // Labels array that can contain any sort of values
        labels: ['4:00', '5:00', '6:00', '7:00', '8:00', '9:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00'],
        // Series array that contains series objects or in this case series data arrays
        series: [
          [-8, -7, -6, -4, -1, 1, 2, 4, 5, 4, 3, 2]
        ]
      };

      var options02 = {
        height: 240,
        high: 20,
        low: -20,
        scaleMinSpace: 12,
        onlyInteger: false,
        referenceValue: 0
      };

      var responsive_steps02 = [
        // Show only every second label
        ['screen and (max-width: 768px)', {
          axisX: {
            labelInterpolationFnc: function skipLabels(value, index, labels) {
              return index % 2 === 0 ? value : null;
            }
          }
        }],
        // Show only every fourth label
        ['screen and (max-width: 480px)', {
          axisX: {
            labelInterpolationFnc: function skipLabels(value, index, labels) {
              return index % 4 === 0 ? value : null;
            }
          }
        }]
      ];

      // Initialize a Bar chart in the container with the ID chart01
      new Chartist.Bar('#chart02', data02, options02, responsive_steps02)
        .on('draw', function(data02) {
          if (data02.type === 'bar' && data02.value.y > 0) {
            data02.element.attr({
              class: 'ct-bar abovezero'
            });
          }
        });

    }); //docready END

    // Apply necessary changes, functionality when content is loaded
    $(window).on('load', function() {

      // This script is necessary for cross browsers icon sprite support (IE9+, ...) 
      svg4everybody();

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