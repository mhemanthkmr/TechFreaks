<?php 
session_start();
if (isset($_SESSION['authenticated'])) {
  $_SESSION['flag'] = 2;
  $_SESSION['message'] = "You are aldready logged in";
  header("Location: index.php");
  exit(0);
}
$title = "Forget Password";
include('includes/header.php');
?>
<body class="pt-0">
  <div id="login" class="d-flex align-items-center pb-4">
    <div class="row mx-auto" style="width:100%;max-width:24rem;">
      <div class="col-12 mb-2 text-center">
        <!-- <img src="assets/images/tE.svg" alt="SYMBIOT 4" class="mx-auto"> -->
      </div>
      <div class="col-12">
        <!-- Login form START -->
        <?php include('message.php');?>
        <div class="card px-4 pt-2">
          <form action="code.php" method="POST" class="p-2">
            <div class="form-group row">
              <label for="user-name" class="col-12 col-form-label">Email</label>
              <div class="col-12">
                <input class="form-control custom-focus" name="email" type="email" value="" id="user-name" required>
              </div>
            </div>
            <div class="form-group row">
              <label for="user-password" class="col-12 col-form-label">New Password</label>
              <div class="col-12">
                <input class="form-control custom-focus" name="password" type="password" value="" id="user-password" required>
              </div>
            </div>
            <div class="form-group row">
              <label for="user-password" class="col-12 col-form-label">Confirm Password</label>
              <div class="col-12">
                <input class="form-control custom-focus" name="cpassword" type="password" value="" id="user-password" required>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-12 mt-3 mb-2 text-center">
                <button type="submit" name="forget_btn" class="btn btn-primary btn-block">Submit</button>
              </div>
            </div>
          </form>
        </div>
        
        <!-- OTP form END -->
      </div>
    </div>
  </div>

<?php 
include('includes/footer.php');
?>