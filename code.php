<?php
session_start();
include('config/app.php');
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
                $query = "INSERT INTO `TechFreaks`.`users` (`name`, `username`, `email`, `password`, `ver_token`) VALUES ('$name', '$username', '$email', '$password', '$verify_token');";
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
                    $_SESSION['flag'] = 1;
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
if(isset($_POST['logout_btn'])) {
    unset($_SESSION['authenticated']);
    unset($_SESSION['auth_user']);

    $_SESSION['flag'] = 1;
    $_SESSION['message'] = "Logged out Successfully";
    header("Location: login.php");
    exit(0);
}
?>