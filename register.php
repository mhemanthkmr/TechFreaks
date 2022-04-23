<?php 
$title = "Register";
include('includes/header.php');
?>
<body class="pt-0">
  <div id="login" class="d-flex align-items-center pb-4">
    <div class="row mx-auto" style="width:100%;max-width:24rem;">
      <div class="col-12 mb-2 text-center">
        <!-- <img src="assets/images/tE.svg" alt="SYMBIOT 4" class="mx-auto"> -->
        <!-- <h1 class="primary">TechFreaks Home Automation</h1> -->
      </div>
      
      <div class="col-12">
        <!-- Login form START -->
        <?php include('message.php');?>
        <div class="card px-4 pt-2">
          <form action="code.php" method="POST" class="p-2">
          <div class="form-group row">
              <label for="user-name" class="col-12 col-form-label">Name</label>
              <div class="col-12">
                <input class="form-control custom-focus" name="name" type="text" value="" id="user-name">
              </div>
            </div>
            <div class="form-group row">
              <label for="user-name" class="col-12 col-form-label">Username</label>
              <div class="col-12">
                <input class="form-control custom-focus" name="username" type="text" value="" id="user-name">
              </div>
            </div>
            <div class="form-group row">
              <label for="user-name" class="col-12 col-form-label">Email</label>
              <div class="col-12">
                <input class="form-control custom-focus" name="email" type="email" value="" id="user-name">
              </div>
            </div>
            <div class="form-group row">
              <label for="user-password" class="col-12 col-form-label">Password</label>
              <div class="col-12">
                <input class="form-control custom-focus" name="password" type="password" value="" id="user-password">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-12 mt-3 mb-2 text-center">
                <button type="submit" name="register_btn" class="btn btn-primary btn-block">Register</button>
              </div>
            </div>
          </form>
        </div>
        <!-- Login form END -->
        <div class="text-center">
              <h6 style="color:white">Need to Login ? <a class="text-primary" href="login.php">Click Here</a></h6>
            </div>
      </div>
    </div>
  </div>

<?php
include('includes/footer.php');
?>