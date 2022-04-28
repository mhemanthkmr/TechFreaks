<?php 
include('config/app.php');
session_start();

if(isset($_GET['token'])){
    $token = $_GET['token'];
    $verify_query = "SELECT ver_token,status FROM users WHERE ver_token='$token' LIMIT 1";
    $verify_query_run = mysqli_query($con,$verify_query);

    if(mysqli_num_rows($verify_query_run) > 0){
        $row = mysqli_fetch_array($verify_query_run);
        //echo $row['verify_token'];
        if($row['verify_status'] == 0){
            $clicked_token = $row['ver_token'];
            $update_query = "UPDATE users SET status = '1' WHERE ver_token='$clicked_token' LIMIT 1";
            $update_query_run = mysqli_query($con,$update_query);
            if($update_query_run)
            {
                $_SESSION['message'] = "Your Account Has been Verified Sucessfully ";
                $_SESSION['flag'] = 1;
                header("Location:login.php");
                exit(0);
            }
            else {
                $_SESSION['status'] = "Verification Failed";
                $_SESSION['flag'] = 2;
                header("Location:login.php");
                exit(0);
            }
        } 
        else
        {
            $_SESSION['message'] = "Email Already Verified Please Login";
            $_SESSION['flag'] = 2;
            header("Location:login.php");
            exit(0);
        }
    }
    else 
    {
        $_SESSION['message'] = "This Token does not Exists";
        $_SESSION['flag'] = 2;
        header("Location:login.php");
    }
}
else {
    $_SESSION['message'] = "Not Allowed";
    $_SESSION['flag'] = 2;
    header("Location:login.php");
}

?>