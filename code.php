<?php
session_start();
include('config/app.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader

require 'vendor/autoload.php';
function sendemail_otp_verify($name,$email,$verify_token)
{
    $mail = new PHPMailer();
    //$mail->SMTPDebug = 2;									
	$mail->isSMTP();											
	$mail->Host	 = 'smtp.gmail.com;';					
	$mail->SMTPAuth = true;							
	$mail->Username = 'hemanth.techfreaks@gmail.com';				
	$mail->Password = 'Hemanth123$';						
	$mail->SMTPSecure = 'tls';							
	$mail->Port	 = 587;

	$mail->setFrom('hemanth.techfreaks@gmail.com', 'OTP Verification from TechFreaks');		
	$mail->addAddress($email);
    $mail->isHTML(true);	

	$mail->Subject = 'OTP Verification from TechFreaks';
    $email_template = "<h2>You have Changing the Password TechFreaks</h2>
         <h5>Your OTP IS</h5>
         <br/><br/>
         <h1>$verify_token</h1>
         ";
    $mail->Body = $email_template;
	//$mail->AltBody = 'Body in plain text for non-HTML mail clients';
	$mail->send();
	//echo "Mail has been sent successfully!";
}
function sendemail_verify($name,$email,$verify_token)
{
    $mail = new PHPMailer();
    //$mail->SMTPDebug = 2;									
	$mail->isSMTP();											
	$mail->Host	 = 'smtp.gmail.com;';					
	$mail->SMTPAuth = true;							
	$mail->Username = 'hemanth.techfreaks@gmail.com';				
	$mail->Password = 'Hemanth123$';						
	$mail->SMTPSecure = 'tls';							
	$mail->Port	 = 587;

	$mail->setFrom('hemanth.techfreaks@gmail.com', 'Email Verification from TechFreaks');		
	$mail->addAddress($email);
    $mail->isHTML(true);	

	$mail->Subject = 'Email Verification from TechFreaks';
    $email_template = "<h2>You have Register with the TechFreaks</h2>
         <h5>Verify Your email to login with the below given link</h5>
         <br/><br/>
         <a href='http://localhost/TechFreaks/verifyemail.php?token=$verify_token'>Click Me</a>";

    $mail->Body = $email_template;
	//$mail->AltBody = 'Body in plain text for non-HTML mail clients';
	$mail->send();
	//echo "Mail has been sent successfully!";
}

if(isset($_POST['register_btn'])){
    if(!empty(trim($_POST['username'])) && !empty(trim($_POST['password']))&&!empty(trim($_POST['email'])) && !empty(trim($_POST['name'])))
    {
        $name = $_POST['name'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $options = [
            'cost' => 9,
        ];
        $password = password_hash($password, PASSWORD_BCRYPT, $options);
        $verify_token = md5(rand());
        $check_email_query = "SELECT email FROM users WHERE email='$email' LIMIT 1";
        $check_email_query_run = mysqli_query($con , $check_email_query);
        if(mysqli_num_rows($check_email_query_run) > 0)
        {
            $_SESSION['flag'] = 2;
            $_SESSION['message'] = "Email Exists Please Login";
            header("Location: login.php");
        }
        else 
        {
            $check_username_query = "SELECT username FROM users WHERE username='$username' LIMIT 1";
            $check_username_query_run = mysqli_query($con , $check_username_query);
            if(mysqli_num_rows($check_username_query_run) > 0)
            {
                $_SESSION['flag'] = 2;
                $_SESSION['message'] = "Username Exists Please Login";
                header("Location: login.php");
            }
            else 
            {
                sendemail_verify($name, $email, $verify_token);
                $query = "INSERT INTO `TechFreaks`.`users` (`name`, `username`, `email`, `password`, `ver_token`) VALUES ('$name', '$username', '$email', '$password', '$verify_token');";
                // die($query);
                $query_run = mysqli_query($con,$query);
                if($query_run)
                {
                    $_SESSION['flag'] = 1;
                    $_SESSION['message'] = 'Registration Success ! Please verify your Email Address';
                    header("Location: login.php");
                }
                else 
                {
                    $_SESSION['message'] = "Registration Failed";
                    $_SESSION['flag'] = 2;
                    header("Location: register.php");
                }
            }
        }
    }
    else
    {
        $_SESSION['flag'] = 2;
        $_SESSION['message'] = "All Fields are Mandatory";
        header("Location: register.php");
    }
}
// UPDATE `TechFreaks`.`users` SET `name` = 'ss', `email` = 'harishsekarss1423@gmail.com', `phone` = '454544545' WHERE (`id` = '3');

if(isset($_POST['profile_save_bio']))
{
    if(!empty(trim($_POST['email'])) && !empty(trim($_POST['name']))&&!empty(trim($_POST['phone'])) && !empty(trim($_POST['name'])))
    {
        // die(print_r($_POST));
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        // die($email);
        $phone = $_POST['phone'];

        $update_profile = "UPDATE `TechFreaks`.`users` SET `name` = '$name', `email` = '$email', `phone` = '+91$phone' WHERE (`id` = '$id');";
        // die(print_r($update_profile));
        $update_profile_run = mysqli_query($con , $update_profile);
        // die($update_profile_run);
        if($update_profile_run)
        {
            $_SESSION['flag'] = 1;
            $_SESSION['message'] = "Successfully Updated";
            header("Location: profile.php");
        }
        else
        {
            $_SESSION['flag'] = 2;
            $_SESSION['message'] = "Something Wrong";
            header("Location: profile.php");
        }
    }
    else
    {
        $_SESSION['flag'] = 2;
        $_SESSION['message'] = "All Fields are Mandatory";
        header("Location: profile.php");
    }
}

if(isset($_POST['profile_save_password'])) 
{
    if(!empty(trim($_POST['current_password'])) && !empty(trim($_POST['password'])) && !empty(trim($_POST['cpassword'])))
    {
        $current_password = mysqli_real_escape_string($con,$_POST['current_password']);
        $password = mysqli_real_escape_string($con,$_POST['password']);
        $cpassword = mysqli_real_escape_string($con,$_POST['cpassword']);
        $id = $_POST['id'];

        // die(print_r($_POST));
        $login_query = "SELECT * FROM users WHERE id = $id LIMIT 1";
        $login_query_run = mysqli_query($con,$login_query);

        if(mysqli_num_rows($login_query_run) == 1)
        {
            $row = mysqli_fetch_array($login_query_run);
            // echo $row['verify_status'];
            if (password_verify($current_password, $row['password']))
            {
                if($password == $cpassword)
                {
                    $options = [
                        'cost' => 9,
                    ];
                    $hashed_password = password_hash($password, PASSWORD_BCRYPT, $options);
                    $query = "UPDATE `TechFreaks`.`users` SET `password` = '$hashed_password' WHERE (`id` = '$id');";
                    $update_profile_run = mysqli_query($con , $query);
                    if($update_profile_run)
                    {
                        $_SESSION['flag'] = 1;
                        $_SESSION['message'] = "Successfully Updated";
                        header("Location: profile.php");
                    }
                    else
                    {
                        $_SESSION['flag'] = 2;
                        $_SESSION['message'] = "Something Wrong";
                        header("Location: profile.php");
                    }
                }
                else 
                {
                    $_SESSION['message'] = "Password Not Match";
                    $_SESSION['flag'] = 2;
                    header("Location:profile.php#password");
                    exit(0);
                }
            }
            else 
            {
                $_SESSION['message'] = "Invalid Password";
                $_SESSION['flag'] = 2;
                header("Location:profile.php#password");
                exit(0);
            }
        }
        else 
        {
            $_SESSION['message'] = "Invalid Password";
            $_SESSION['flag'] = 2;
            header("Location:profile.php#password");
            exit(0);
        }
    }
    else 
    {
        $_SESSION['message'] = "All Fields are Mandatory";
        $_SESSION['flag'] = 2;
        header("Location:profile.php");
        exit(0);
    }
}

if(isset($_POST['forget_btn'])) 
{
    if(!empty(trim($_POST['password'])) && !empty(trim($_POST['cpassword'])) && !empty(trim($_POST['email'])))
    {
        $email = mysqli_real_escape_string($con,$_POST['email']);
        $password = mysqli_real_escape_string($con,$_POST['password']);
        $cpassword = mysqli_real_escape_string($con,$_POST['cpassword']);

        if($password == $cpassword)
        {
            $email_query = "SELECT * FROM users WHERE email = '$email' LIMIT 1;";
            $email_query_run = mysqli_query($con,$email_query);
            // die($email_query);
            if (mysqli_num_rows($email_query_run) == 1) 
            {
                $row = mysqli_fetch_array($email_query_run);
                $otp = rand(100000, 999999);
                sendemail_otp_verify($row['name'], $row['email'], $otp);
                $options = [
                    'cost' => 9,
                ];
                $hashed_password = password_hash($password, PASSWORD_BCRYPT, $options);
                $_SESSION['password'] = $hashed_password;
                $_SESSION['email'] = $email;
                $_SESSION['otp'] = $otp;
                $_SESSION['message'] = "Verify OTP !";
                $_SESSION['flag'] = 1;
                header("Location:otp_verify.php");
                exit(0);
            }
            
            else
            {
                $_SESSION['message'] = "User does not exist";
                $_SESSION['flag'] = 2;
                header("Location:forget_password.php");
                exit(0);
            }
        }
        else
        {
            $_SESSION['message'] = "Password and Cofirm Password Not Match";
            $_SESSION['flag'] = 2;
            header("Location:forget_password.php");
            exit(0);
        }

    }
    else
    {
        $_SESSION['message'] = "All Fields are Mandatory";
        $_SESSION['flag'] = 2;
        header("Location:forget_password.php");
        exit(0);
    }
}

if(isset($_POST['verify_otp']))
{
    if(!empty(trim($_POST['otp'])))
    {
        $otp = $_POST['otp'];
        $orginal_otp = $_SESSION['otp'];
        if($otp == $orginal_otp)
        {
            $password = $_SESSION['password'];
            $email = $_SESSION['email'];
            // die("$password.$email");
            $query = "UPDATE `TechFreaks`.`users` SET `password` = '$password' WHERE (`email` = '$email');";
            $update_profile_run = mysqli_query($con , $query);
            if($update_profile_run)
            {
                $_SESSION['flag'] = 1;
                $_SESSION['message'] = "Successfully Updated";
                unset($_SESSION['password']);
                unset($_SESSION['email']);
                unset($_SESSION['otp']);
                header("Location: login.php");
            }
            else
            {
                $_SESSION['flag'] = 2;
                unset($_SESSION['password']);
                unset($_SESSION['email']);
                unset($_SESSION['otp']);
                $_SESSION['message'] = "Something Wrong";
                header("Location: login.php");
            }
        }
        else 
        {
            unset($_SESSION['password']);
            unset($_SESSION['email']);
            unset($_SESSION['otp']);
            $_SESSION['message'] = "OTP is Wrong";
            $_SESSION['flag'] = 2;
            header("Location:otp_verify.php");
            exit(0);
        }
    }
    else 
    {
        unset($_SESSION['password']);
        unset($_SESSION['email']);
        unset($_SESSION['otp']);
        $_SESSION['message'] = "All Fields are Mandatory";
        $_SESSION['flag'] = 2;
        header("Location:otp_verify.php");
        exit(0);
    }
}
if(isset($_POST['logout_btn'])) {
    unset($_SESSION['authenticated']);
    unset($_SESSION['auth_user']);

    $_SESSION['flag'] = 1;
    $_SESSION['message'] = "Logged out Successfully";
    header("Location: login.php");
    exit(0);
}
?>