<?php
include('auth.php');
$title = "Lights";
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
    <a class="navbar-brand px-lg-3 px-1 mr-0" href="lights.php#">Ethic Electronics</a>
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
          <li class="nav-item active">
            <a class="nav-link active" href="lights.php">
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
          <!-- <li class="nav-item">
              <a class="nav-link" href="climate.php">
                <svg class="icon-sprite">
                  <use xlink:href="assets/images/icons-sprite.svg#thermometer" />
                </svg> <span>Climate</span>
              </a>
            </li> -->
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
          <!-- Interior lights START -->
          <div class="row" data-unit-group="switch-lights-in">
            <div class="col-sm-12 col-md-6 col-xl-4">
              <!-- ON/OFF all interior lights  START -->
              <div class="card">
                <div class="card-body">
                  <h3 class="card-title">Interior Lights</h3>
                </div>
                <hr class="my-0">
                <div class="card-body">
                  <div class="lights-controls text-center" data-controls="switch-lights-in">
                    <button data-action="all-on" type="button" class="btn btn-success mr-5 lights-control">All
                      <strong>ON</strong></button>
                    <button data-action="all-off" type="button" class="btn btn-danger lights-control">All
                      <strong>OFF</strong></button>
                  </div>
                </div>
              </div>
              <!-- ON/OFF all interior lights  END -->
            </div>
            <div class="col-sm-12 col-md-6 col-xl-4">
              <!-- Light unit START -->
              <div class="card active" data-unit="switch-light-1">
                <!-- Light switch START -->
                <div class="card-body d-flex flex-row justify-content-start">
                  <svg class="icon-sprite">
                    <use class="glow" fill="url(#radial-glow)" xlink:href="assets/images/icons-sprite.svg#glow" />
                    <use xlink:href="assets/images/icons-sprite.svg#bulb-eco" />
                  </svg>
                  <h5>Kitchen</h5>
                  <label class="switch ml-auto checked">
                    <input type="checkbox" id="switch-light-1" checked>
                  </label>
                </div>
                <!-- Light switch END -->
                <hr class="my-0">
                <!-- Bulb details START -->
                <ul class="list-group borderless px-1">
                  <li class="list-group-item">
                    <p class="specs">Connection</p>
                    <p class="ml-auto mb-0 text-success">OK</p>
                  </li>
                  <li class="list-group-item pt-0">
                    <p class="specs">Power Consumption</p>
                    <p class="ml-auto mb-0">24W</p>
                  </li>
                  <li class="list-group-item pt-0 pb-4">
                    <p class="specs">Voltage range</p>
                    <p class="ml-auto mb-0">110-130V</p>
                  </li>
                </ul>
                <!-- Bulb details END -->
                <hr class="my-0">
                <!-- Dimmer control - range slider START -->
                <ul class="list-group borderless px-1" data-rangeslider="dimmer-light-1">
                  <li class="list-group-item">
                    <p class="specs">Dim</p>
                    <p class="ml-auto mb-0"><span class="range-output">100</span>%</p>
                  </li>
                  <li class="list-group-item pt-0 pb-4">
                    <input id="dimmer-light-1" type="range" min="10" max="100" value="100">
                  </li>
                </ul>
                <div class="info-holder info-cb">
                  <div data-toggle="popover-all" data-content="jQuery range slider using localStorage to remember the last status." data-original-title="Dimmer control" data-placement="top" data-offset="0,-24"></div>
                </div>
                <!-- Dimmer control - range slider END -->
              </div>
              <!-- Light unit END -->
            </div>
            <div class="col-sm-12 col-md-6 col-xl-4">
              <!-- Light unit START -->
              <div class="card active" data-unit="switch-light-2">
                <!-- Light switch START -->
                <div class="card-body d-flex flex-row justify-content-start">
                  <svg class="icon-sprite">
                    <use class="glow" fill="url(#radial-glow)" xlink:href="assets/images/icons-sprite.svg#glow" />
                    <use xlink:href="assets/images/icons-sprite.svg#bulb-eco" />
                  </svg>
                  <h5>Dining room</h5>
                  <label class="switch ml-auto">
                    <input type="checkbox" id="switch-light-2">
                  </label>
                </div>
                <!-- Light switch END -->
                <hr class="my-0">
                <!-- Bulb details START -->
                <ul class="list-group borderless px-1">
                  <li class="list-group-item">
                    <p class="specs">Connection</p>
                    <p class="ml-auto mb-0 text-success">OK</p>
                  </li>
                  <li class="list-group-item pt-0">
                    <p class="specs">Power Consumption</p>
                    <p class="ml-auto mb-0">18W</p>
                  </li>
                  <li class="list-group-item pt-0 pb-4">
                    <p class="specs">Voltage range</p>
                    <p class="ml-auto mb-0">110-130V</p>
                  </li>
                </ul>
                <!-- Bulb details END -->
                <hr class="my-0">
                <!-- Dimmer control - range slider START -->
                <ul class="list-group borderless px-1" data-rangeslider="dimmer-light-2">
                  <li class="list-group-item">
                    <p class="specs">Dim</p>
                    <p class="ml-auto mb-0"><span class="range-output">100</span>%</p>
                  </li>
                  <li class="list-group-item pt-0 pb-4">
                    <input id="dimmer-light-2" type="range" min="10" max="100" value="100">
                  </li>
                </ul>
                <!-- Dimmer control - range slider END -->
              </div>
              <!-- Light unit END -->
            </div>
            <div class="col-sm-12 col-md-6 col-xl-4">
              <!-- Light unit START -->
              <div class="card active" data-unit="switch-light-3">
                <!-- Light switch START -->
                <div class="card-body d-flex flex-row justify-content-start">
                  <svg class="icon-sprite">
                    <use class="glow" fill="url(#radial-glow)" xlink:href="assets/images/icons-sprite.svg#glow" />
                    <use xlink:href="assets/images/icons-sprite.svg#bulb-eco" />
                  </svg>
                  <h5>Living room</h5>
                  <label class="switch ml-auto">
                    <input type="checkbox" id="switch-light-3">
                  </label>
                </div>
                <!-- Light switch END -->
                <hr class="my-0">
                <!-- Bulb details START -->
                <ul class="list-group borderless px-1">
                  <li class="list-group-item">
                    <p class="specs">Connection</p>
                    <p class="ml-auto mb-0 text-success">OK</p>
                  </li>
                  <li class="list-group-item pt-0">
                    <p class="specs">Power Consumption</p>
                    <p class="ml-auto mb-0">24W</p>
                  </li>
                  <li class="list-group-item pt-0 pb-4">
                    <p class="specs">Voltage range</p>
                    <p class="ml-auto mb-0">110-130V</p>
                  </li>
                </ul>
                <!-- Bulb details END -->
                <hr class="my-0">
                <!-- Dimmer control - range slider START -->
                <ul class="list-group borderless px-1" data-rangeslider="dimmer-light-3">
                  <li class="list-group-item">
                    <p class="specs">Dim</p>
                    <p class="ml-auto mb-0"><span class="range-output">100</span>%</p>
                  </li>
                  <li class="list-group-item pt-0 pb-4">
                    <input id="dimmer-light-3" type="range" min="10" max="100" value="100">
                  </li>
                </ul>
                <!-- Dimmer control - range slider END -->
              </div>
              <!-- Light unit END -->
            </div>
            <div class="col-sm-12 col-md-6 col-xl-4">
              <!-- Light unit START -->
              <div class="card active" data-unit="switch-light-4">
                <!-- Light switch START -->
                <div class="card-body d-flex flex-row justify-content-start">
                  <svg class="icon-sprite">
                    <use class="glow" fill="url(#radial-glow)" xlink:href="assets/images/icons-sprite.svg#glow" />
                    <use xlink:href="assets/images/icons-sprite.svg#bulb-eco" />
                  </svg>
                  <h5>Bedroom</h5>
                  <label class="switch ml-auto">
                    <input type="checkbox" id="switch-light-4">
                  </label>
                </div>
                <!-- Light switch END -->
                <hr class="my-0">
                <!-- Bulb details START -->
                <ul class="list-group borderless px-1">
                  <li class="list-group-item">
                    <p class="specs">Connection</p>
                    <p class="ml-auto mb-0 text-success">OK</p>
                  </li>
                  <li class="list-group-item pt-0">
                    <p class="specs">Power Consumption</p>
                    <p class="ml-auto mb-0">15W</p>
                  </li>
                  <li class="list-group-item pt-0 pb-4">
                    <p class="specs">Voltage range</p>
                    <p class="ml-auto mb-0">110-130V</p>
                  </li>
                </ul>
                <!-- Bulb details END -->
                <hr class="my-0">
                <!-- Dimmer control - range slider START -->
                <ul class="list-group borderless px-1" data-rangeslider="dimmer-light-4">
                  <li class="list-group-item">
                    <p class="specs">Dim</p>
                    <p class="ml-auto mb-0"><span class="range-output">65</span>%</p>
                  </li>
                  <li class="list-group-item pt-0 pb-4">
                    <input id="dimmer-light-4" type="range" min="10" max="100" value="65">
                  </li>
                </ul>
                <!-- Dimmer control - range slider END -->
              </div>
              <!-- Light unit END -->
            </div>
            <div class="col-sm-12 col-md-6 col-xl-4">
              <!-- Light unit START -->
              <div class="card active" data-unit="switch-light-5">
                <!-- Light switch START -->
                <div class="card-body d-flex flex-row justify-content-start">
                  <svg class="icon-sprite">
                    <use class="glow" fill="url(#radial-glow)" xlink:href="assets/images/icons-sprite.svg#glow" />
                    <use xlink:href="assets/images/icons-sprite.svg#bulb-eco" />
                  </svg>
                  <h5>Bathroom</h5>
                  <label class="switch ml-auto">
                    <input type="checkbox" id="switch-light-5">
                  </label>
                </div>
                <!-- Light switch END -->
                <hr class="my-0">
                <!-- Bulb details START -->
                <ul class="list-group borderless px-1">
                  <li class="list-group-item">
                    <p class="specs">Connection</p>
                    <p class="ml-auto mb-0 text-success">OK</p>
                  </li>
                  <li class="list-group-item pt-0">
                    <p class="specs">Power Consumption</p>
                    <p class="ml-auto mb-0">18W</p>
                  </li>
                  <li class="list-group-item pt-0 pb-4">
                    <p class="specs">Voltage range</p>
                    <p class="ml-auto mb-0">110-130V</p>
                  </li>
                </ul>
                <!-- Bulb details END -->
                <hr class="my-0">
                <!-- Dimmer control - range slider START -->
                <ul class="list-group borderless px-1" data-rangeslider="dimmer-light-5">
                  <li class="list-group-item">
                    <p class="specs">Dim</p>
                    <p class="ml-auto mb-0"><span class="range-output">100</span>%</p>
                  </li>
                  <li class="list-group-item pt-0 pb-4">
                    <input id="dimmer-light-5" type="range" min="10" max="100" value="100">
                  </li>
                </ul>
                <!-- Dimmer control - range slider END -->
              </div>
              <!-- Light unit END -->
            </div>
          </div>
          <!-- Interior lights END -->
          <hr class="my-2">
          <!-- Interior Lights charts START -->
          <div class="row">
            <div class="col-sm-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Interior Lights usage</h4>
                </div>
                <hr class="my-0">
                <div class="card-body">
                  <div class="row">
                    <div id="chart01" class="col-sm-12 col-md-8 pb-3 ct-chart">
                      <p class="text-center text-primary">Daily</p>
                    </div>
                    <div id="chart02" class="col-sm-12 col-md-4 pb-3 ct-chart">
                      <p class="text-center text-primary mb-0">Overall</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Interior Lights charts END -->
          <hr class="my-2">
          <!-- Exterior lights START -->
          <div class="row" data-unit-group="switch-lights-ex">
            <div class="col-sm-12 col-md-6 col-xl-4">
              <!-- ON/OFF all interior lights  START -->
              <div class="card">
                <div class="card-body">
                  <h3 class="card-title">Exterior Lights</h3>
                </div>
                <hr class="my-0">
                <div class="card-body">
                  <div class="lights-controls text-center" data-controls="switch-lights-ex">
                    <button data-action="all-on" type="button" class="btn btn-success mr-5 lights-control">All
                      <strong>ON</strong></button>
                    <button data-action="all-off" type="button" class="btn btn-danger lights-control">All
                      <strong>OFF</strong></button>
                  </div>
                </div>
              </div>
              <!-- ON/OFF all interior lights  END -->
            </div>
            <div class="col-sm-12 col-md-6 col-xl-4">
              <div class="card" data-unit="switch-light-6">
                <!-- Light switch START -->
                <div class="card-body d-flex flex-row justify-content-start">
                  <svg class="icon-sprite">
                    <use class="glow" fill="url(#radial-glow)" xlink:href="assets/images/icons-sprite.svg#glow" />
                    <use xlink:href="assets/images/icons-sprite.svg#bulb-eco" />
                  </svg>
                  <h5>Front doors</h5>
                  <label class="switch ml-auto">
                    <input type="checkbox" id="switch-light-6">
                  </label>
                </div>
                <!-- Light switch END -->
                <hr class="my-0">
                <!-- Bulb details START -->
                <ul class="list-group borderless px-1">
                  <li class="list-group-item">
                    <p class="specs">Connection</p>
                    <p class="ml-auto mb-0 text-success">OK</p>
                  </li>
                  <li class="list-group-item pt-0">
                    <p class="specs">Power Consumption</p>
                    <p class="ml-auto mb-0">15W</p>
                  </li>
                  <li class="list-group-item pt-0 pb-4">
                    <p class="specs">Voltage range</p>
                    <p class="ml-auto mb-0">110-130V</p>
                  </li>
                </ul>
                <!-- Bulb details END -->
              </div>
            </div>
            <div class="col-sm-12 col-md-6 col-xl-4">
              <div class="card" data-unit="switch-light-7">
                <!-- Light switch START -->
                <div class="card-body d-flex flex-row justify-content-start">
                  <svg class="icon-sprite">
                    <use class="glow" fill="url(#radial-glow)" xlink:href="assets/images/icons-sprite.svg#glow" />
                    <use xlink:href="assets/images/icons-sprite.svg#bulb-eco" />
                  </svg>
                  <h5>Back doors</h5>
                  <label class="switch ml-auto">
                    <input type="checkbox" id="switch-light-7">
                  </label>
                </div>
                <!-- Light switch END -->
                <hr class="my-0">
                <!-- Bulb details START -->
                <ul class="list-group borderless px-1">
                  <li class="list-group-item">
                    <p class="specs">Connection</p>
                    <p class="ml-auto mb-0 text-success">OK</p>
                  </li>
                  <li class="list-group-item pt-0">
                    <p class="specs">Power Consumption</p>
                    <p class="ml-auto mb-0">15W</p>
                  </li>
                  <li class="list-group-item pt-0 pb-4">
                    <p class="specs">Voltage range</p>
                    <p class="ml-auto mb-0">110-130V</p>
                  </li>
                </ul>
                <!-- Bulb details END -->
              </div>
            </div>
            <div class="col-sm-12 col-md-6 col-xl-4">
              <div class="card" data-unit="switch-light-8">
                <!-- Light switch START -->
                <div class="card-body d-flex flex-row justify-content-start">
                  <svg class="icon-sprite">
                    <use class="glow" fill="url(#radial-glow)" xlink:href="assets/images/icons-sprite.svg#glow" />
                    <use xlink:href="assets/images/icons-sprite.svg#bulb-eco" />
                  </svg>
                  <h5>Pool</h5>
                  <label class="switch ml-auto">
                    <input type="checkbox" id="switch-light-8">
                  </label>
                </div>
                <!-- Light switch END -->
                <hr class="my-0">
                <!-- Bulb details START -->
                <ul class="list-group borderless px-1">
                  <li class="list-group-item">
                    <p class="specs">Connection</p>
                    <p class="ml-auto mb-0 text-success">OK</p>
                  </li>
                  <li class="list-group-item pt-0">
                    <p class="specs">Power Consumption</p>
                    <p class="ml-auto mb-0">30W</p>
                  </li>
                  <li class="list-group-item pt-0 pb-4">
                    <p class="specs">Voltage range</p>
                    <p class="ml-auto mb-0">110-130V</p>
                  </li>
                </ul>
                <!-- Bulb details END -->
              </div>
            </div>
            <div class="col-sm-12 col-md-6 col-xl-4">
              <div class="card" data-unit="switch-light-9">
                <!-- Light switch START -->
                <div class="card-body d-flex flex-row justify-content-start">
                  <svg class="icon-sprite">
                    <use class="glow" fill="url(#radial-glow)" xlink:href="assets/images/icons-sprite.svg#glow" />
                    <use xlink:href="assets/images/icons-sprite.svg#bulb-eco" />
                  </svg>
                  <h5>Garage</h5>
                  <label class="switch ml-auto">
                    <input type="checkbox" id="switch-light-9">
                  </label>
                </div>
                <!-- Light switch END -->
                <hr class="my-0">
                <!-- Bulb details START -->
                <ul class="list-group borderless px-1">
                  <li class="list-group-item">
                    <p class="specs">Connection</p>
                    <p class="ml-auto mb-0 text-success">OK</p>
                  </li>
                  <li class="list-group-item pt-0">
                    <p class="specs">Power Consumption</p>
                    <p class="ml-auto mb-0">15W</p>
                  </li>
                  <li class="list-group-item pt-0 pb-4">
                    <p class="specs">Voltage range</p>
                    <p class="ml-auto mb-0">110-130V</p>
                  </li>
                </ul>
                <!-- Bulb details END -->
              </div>
            </div>
          </div>
          <!-- Exterior lights END -->
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
        fill: url(lights.php)
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

<!-- jQuery range-slider plugin (Dimmers, Fridge temperature) -->
<script src="assets/js/iot-range-slider.min.js"></script>

<!-- Basic theme functionality (arming, garage doors, switches ...) - using jQuery -->
<script src="assets/js/iot-functions.min.js"></script>

<!-- Chartist.js library - NO jQuery dependency -->
<script src="assets/js/chartist.min.js"></script>

<!-- Chartist.js pugin - Legend -->
<script src="assets/js/chartist-legend.min.js"></script>

<script src="homemqtt.js"></script>

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
          // Update Range slider
          $('[data-rangeslider="' + key + '"] input[type="range"]').val(value);
          $('[data-rangeslider="' + key + '"] .range-output').html(value);
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

    // All ON/OFF controls
    $('.lights-control').click(function() {

      var target = $(this).closest('.lights-controls').data('controls');
      var action = $(this).data('action');

      iot.switchGroup(target, action);

      if (action == 'all-on') {
        button = 4;
        console.log(button);
        box = 1;
        console.log(box);
        var url1 =
          "https://io.adafruit.com/api/v2/mhemanthkmr143/feeds/r1/data";
        var url2 =
          "https://io.adafruit.com/api/v2/mhemanthkmr143/feeds/relay2/data";
        var url3 =
          "https://io.adafruit.com/api/v2/mhemanthkmr143/feeds/relay3/data";
        var url4 =
          "https://io.adafruit.com/api/v2/mhemanthkmr143/feeds/relay4/data";
        var url5 =
          "https://io.adafruit.com/api/v2/mhemanthkmr143/feeds/relay5/data";
        $.ajax({
          url: url1,
          type: "post",
          data: {
            value: 1
          },
          headers: {
            "X-AIO-Key": "aio_RXxM62BYFcLuQorYtU44MIsx1ZgX"
          },
          // contentType: 'application/json',
          dataType: "json",
          success: function(data) {
            console.log(data);
          },
        });
        $.ajax({
          url: url2,
          type: "post",
          data: {
            value: 1
          },
          headers: {
            "X-AIO-Key": "aio_RXxM62BYFcLuQorYtU44MIsx1ZgX"
          },
          // contentType: 'application/json',
          dataType: "json",
          success: function(data) {
            console.log(data);
          },
        });
        $.ajax({
          url: url3,
          type: "post",
          data: {
            value: 1
          },
          headers: {
            "X-AIO-Key": "aio_RXxM62BYFcLuQorYtU44MIsx1ZgX"
          },
          // contentType: 'application/json',
          dataType: "json",
          success: function(data) {
            console.log(data);
          },
        });
        $.ajax({
          url: url4,
          type: "post",
          data: {
            value: 1
          },
          headers: {
            "X-AIO-Key": "aio_RXxM62BYFcLuQorYtU44MIsx1ZgX"
          },
          // contentType: 'application/json',
          dataType: "json",
          success: function(data) {
            console.log(data);
          },
        });
        $.ajax({
          url: url5,
          type: "post",
          data: {
            value: 1
          },
          headers: {
            "X-AIO-Key": "aio_RXxM62BYFcLuQorYtU44MIsx1ZgX"
          },
          // contentType: 'application/json',
          dataType: "json",
          success: function(data) {
            console.log(data);
          },
        });
      }

      if (action == 'all-off') {
        button = 2;
        console.log(button);
        var url1 =
          "https://io.adafruit.com/api/v2/mhemanthkmr143/feeds/r1/data";
        var url2 =
          "https://io.adafruit.com/api/v2/mhemanthkmr143/feeds/relay2/data";
        var url3 =
          "https://io.adafruit.com/api/v2/mhemanthkmr143/feeds/relay3/data";
        var url4 =
          "https://io.adafruit.com/api/v2/mhemanthkmr143/feeds/relay4/data";
        var url5 =
          "https://io.adafruit.com/api/v2/mhemanthkmr143/feeds/relay5/data";
        $.ajax({
          url: url1,
          type: "post",
          data: {
            value: 0
          },
          headers: {
            "X-AIO-Key": "aio_RXxM62BYFcLuQorYtU44MIsx1ZgX"
          },
          // contentType: 'application/json',
          dataType: "json",
          success: function(data) {
            console.log(data);
          },
        });
        $.ajax({
          url: url2,
          type: "post",
          data: {
            value: 0
          },
          headers: {
            "X-AIO-Key": "aio_RXxM62BYFcLuQorYtU44MIsx1ZgX"
          },
          // contentType: 'application/json',
          dataType: "json",
          success: function(data) {
            console.log(data);
          },
        });
        $.ajax({
          url: url3,
          type: "post",
          data: {
            value: 0
          },
          headers: {
            "X-AIO-Key": "aio_RXxM62BYFcLuQorYtU44MIsx1ZgX"
          },
          // contentType: 'application/json',
          dataType: "json",
          success: function(data) {
            console.log(data);
          },
        });
        $.ajax({
          url: url4,
          type: "post",
          data: {
            value: 0
          },
          headers: {
            "X-AIO-Key": "aio_RXxM62BYFcLuQorYtU44MIsx1ZgX"
          },
          // contentType: 'application/json',
          dataType: "json",
          success: function(data) {
            console.log(data);
          },
        });
        $.ajax({
          url: url5,
          type: "post",
          data: {
            value: 0
          },
          headers: {
            "X-AIO-Key": "aio_RXxM62BYFcLuQorYtU44MIsx1ZgX"
          },
          // contentType: 'application/json',
          dataType: "json",
          success: function(data) {
            console.log(data);
          },
        });
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

    // Data binding for numeric representation of range slider
    $(document).on('input', 'input[type="range"]', function() {
      $('[data-rangeslider="' + this.id + '"] .range-output').html(this.value);
    });

    // Bar Chart initialization settings - Chartist.js

    var data01 = {
      // Labels array that can contain any sort of values
      labels: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
      // Series array that contains series objects or in this case series data arrays
      series: [{
          "name": "Kitchen",
          "data": [7, 4, 6, 5, 6, 3, 8]
        },
        {
          "name": "Dining room",
          "data": [3, 1, 1, 2, 1, 2, 2]
        },
        {
          "name": "Living room",
          "data": [6, 2, 3, 4, 2, 5, 7]
        },
        {
          "name": "Bedroom",
          "data": [2, 1, 1, 1, 1, 2, 3]
        },
        {
          "name": "Bathroom",
          "data": [6, 5, 6, 7, 5, 12, 9]
        }
      ]
    };

    var options01 = {
      axisY: {
        labelInterpolationFnc: function(value) {
          return value + 'h'
        }
      },
      height: 240,
      high: 14,
      low: 0,
      scaleMinSpace: 6,
      onlyInteger: false,
      referenceValue: 0,
      seriesBarDistance: 8,
      plugins: [
        Chartist.plugins.legend({
          position: 'bottom'
        })
      ]
    };

    var responsive_steps01 = [
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

    // Pie Chart initialization settings - Chartist.js
    var data02 = {
      labels: ['Kitchen', 'Dining room', 'Living room', 'Bedroom', 'Bathroom'],
      series: [28, 12, 20, 9, 31]
    };

    var options02 = {
      chartPadding: 50,
      donut: true,
      donutWidth: 12,
      labelOffset: 20,
      labelDirection: 'explode',
      labelInterpolationFnc: function(value, idx) {
        return data02.series[idx] + '%'
      }
    };

    var responsive_steps02 = [
      ['screen and (max-width: 768px)', {
        height: 240,
        chartPadding: 25
      }]
    ];

    // Initialize a Bar chart in the container with the ID chart01
    new Chartist.Bar('#chart01', data01, options01, responsive_steps01)
      .on('draw', function(data001) {
        if (data001.type === 'bar') {
          data001.element.attr({
            style: 'stroke-width: 6px;'
          });
        }
      });

    // Initialize a Pie chart in the container with the ID chart02
    new Chartist.Pie('#chart02', data02, options02, responsive_steps02);

  }); // docready END

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