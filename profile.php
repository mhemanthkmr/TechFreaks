<?php
include('auth.php');
$title = "Profile";
include('includes/header.php');
include('config/app.php');
?>

  <!-- Preloader -->
  <!-- <div id="iot-preloader">
    <div class="center-preloader d-flex align-items-center">
      <div class="spinners">
        <div class="spinner01"></div>
        <div class="spinner02"></div>
      </div>
    </div>
  </div> -->

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
      <a class="navbar-brand px-lg-3 px-1 mr-0" href="profile.php">EthicElectronics</a>
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
            <li class="nav-item">
              <a class="nav-link" href="climate.php">
                <svg class="icon-sprite">
                  <use xlink:href="assets/images/icons-sprite.svg#thermometer" />
                </svg> <span>Climate</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="profile.php">
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
              <div class="col-sm-12">
                <?php include('message.php'); ?>
              </div>
            </div>
            <div class="row">
              <div class="col-12 col-sm-10 offset-sm-1">
                <!-- Profile tabs START -->
                <ul class="nav nav-tabs nav-fill" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#personal" role="tab">PERSONAL</a>
                  </li>
                  <!-- <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#address" role="tab">ADDRESS</a>
                  </li> -->
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#password" role="tab">PASSWORD</a>
                  </li>
                </ul>
                <div class="info-holder info-ct">
                  <div data-toggle="popover-all" data-content="Customized tabbed interface" data-original-title="Tabs"
                    data-placement="top" data-offset="0,48"></div>
                </div>
                <!-- Profile tab panes -->
                <div class="tab-content px-4 px-sm-0 py-sm-4 mt-4">
                  <!-- Personal pane START -->
                  <div class="tab-pane fade show active" id="personal" role="tabpanel">
                  <?php
                    if(isset($_SESSION['auth_user']['id'])) 
                    {
                      $user_id = $_SESSION['auth_user']['id'];
                      $users = "SELECT * FROM `auth` WHERE id='$user_id'";
                      // die($users);
                      $users_run = mysqli_query($con,$users);
                      if(mysqli_num_rows($users_run) > 0)
                      { 
                          foreach($users_run as $user)
                          // die(print_r($user));
                          {  ?>
                            <form action="code.php" method="post"> 
                              <input type="hidden" name="id" value="<?=$user_id?>">
                              <div class="form-group row">
                                <label for="first-name" class="col-12 col-sm-3 col-form-label">Name</label>
                                <div class="col-12 col-sm-9">
                                  <input class="form-control custom-focus" name="name" type="text" value="<?=$user['name']?>" id="first-name">
                                </div>
                              </div>
                              <div class="form-group disabled row">
                                <label for="user-email" class="col-12 col-sm-3 col-form-label">Email</label>
                                <div class="col-12 col-sm-9">
                                  <input class="form-control custom-focus" name="email" type="email" value="<?=$user['email']?>"
                                    id="user-email">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="user-email" class="col-12 col-sm-3 col-form-label">Phone</label>
                                <div class="col-12 col-sm-9">
                                  <input class="form-control custom-focus" name="phone" type="text" value="<?=$user['phone']?>"
                                    id="user-phone">
                                </div>
                              </div>
                              <!-- <div class="form-group row">
                                <label for="user-tel" class="col-12 col-sm-3 col-form-label">Phone</label>
                                <div class="col-12 col-sm-9">
                                  <input class="form-control custom-focus" type="tel" name="phone" value="" id="user-tel">
                                </div>
                              </div> -->
                              <div class="form-group row">
                                <div class="offset-xs-0 offset-sm-3 col-12 col-sm-9 mt-3">
                                  <button type="submit" name="profile_save_bio" class="btn btn-success">Save</button>
                                </div>
                              </div>
                            </form> <?php
                          }
                        }
                      } ?>
                  </div>
                  <!-- Personal pane END -->
                  <!-- Address pane START -->
                  <!-- <div class="tab-pane fade" id="address" role="tabpanel">
                    <form>
                      <div class="form-group row">
                        <label for="street" class="col-12 col-sm-3 col-form-label">Street</label>
                        <div class="col-12 col-sm-9">
                          <input class="form-control custom-focus" type="text" value="Street address, P.O. BOX 49"
                            id="street">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="city" class="col-12 col-sm-3 col-form-label">City / Town</label>
                        <div class="col-12 col-sm-9">
                          <input class="form-control custom-focus" type="text" value="Fort Progress" id="city">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="city" class="col-12 col-sm-3 col-form-label">State / Region</label>
                        <div class="col-12 col-sm-9">
                          <input class="form-control custom-focus" type="text" value="California" id="city">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="zip" class="col-12 col-sm-3 col-form-label">Zip / Postal</label>
                        <div class="col-12 col-sm-9">
                          <input class="form-control custom-focus" type="text" value="90099" id="zip">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="country" class="col-12 col-sm-3 col-form-label">Country</label>
                        <div class="col-12 col-sm-9">
                          <select class="form-control custom-focus" id="country">
                            <option>USA</option>
                            <option>CANADA</option>
                            <option>GREAT BRITAIN</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-xs-0 offset-sm-3 col-12 col-sm-9 mt-3">
                          <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                      </div>
                    </form>
                  </div> -->
                  <!-- Address pane END -->
                  <!-- Password pane START -->
                  <div class="tab-pane fade" id="password" role="tabpanel">
                    <form action="code.php" method="POST">
                    <div class="form-group row">
                        <input type="hidden" value="<?=$user_id?>" name="id">
                        <label for="user-password" class="col-12 col-sm-3 col-form-label">Current Password</label>
                        <div class="col-12 col-sm-9">
                          <input class="form-control custom-focus" name="current_password" type="password" id="user-password">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="user-password" class="col-12 col-sm-3 col-form-label">Password</label>
                        <div class="col-12 col-sm-9">
                          <input class="form-control custom-focus" name="password" type="password" id="user-password">
                        </div>
                      </div>
                      <div class="form-group row has-success">
                        <label for="user-password-confirm" class="col-12 col-sm-3 col-form-label">Confirm
                          password</label>
                        <div class="col-12 col-sm-9">
                          <input class="form-control custom-focus" name="cpassword" type="password"
                            id="">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-xs-0 text-center offset-sm-3 col-12 col-sm-9 mt-3">
                          <button type="submit" name="profile_save_password" class="btn btn-success">Save Password</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- Password pane END -->
                </div>
                <!-- Profile tabs END -->
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
          fill: url(profile.php)
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


      // Side menu toogler for medium and small devices
      $('[data-toggle="offcanvas"]').click(function() {
        $('.row-offcanvas').toggleClass('active');
      });

      // Reposition to center when a modal is shown
      $('.modal.centered').on('show.bs.modal', iot.centerModal);

      // Alerts "Close" callback - hide modal and alert indicator icon dot when user close all alerts
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

      // "Timeout" function is not neccessary - important is to hide preloader overlay
      setTimeout(function() {

        // Hide preloader overlay when content is loaded
        $('#iot-preloader,.card-preloader').fadeOut();
        $("#wrapper").removeClass("hidden");

        // Check if Main contents scrollbar visibility and set right position for FAB button
        iot.positionFab();

      }, 800);

    });

    // Apply necessary changes if window resized
    $(window).on('resize', function() {

      // Modal reposition when the window is resized
      $('.modal.centered:visible').each(iot.centerModal);

      // Check if Main contents scrollbar visibility and set right position for FAB button
      iot.positionFab();
    });

  </script>

</body>

</html>