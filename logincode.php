<?php 
session_start();
include('config/app.php');
if(isset($_POST['login_btn'])) 
{
    if(!empty(trim($_POST['username'])) && !empty(trim($_POST['password'])))
    {
        $username = mysqli_real_escape_string($con,$_POST['username']);
        $password = mysqli_real_escape_string($con,$_POST['password']);

        $login_query = "SELECT * FROM users WHERE username = '$username'LIMIT 1";
        $login_query_run = mysqli_query($con,$login_query);

        if(mysqli_num_rows($login_query_run) == 1)
        {
            $row = mysqli_fetch_array($login_query_run);
            // echo $row['verify_status'];
            if (password_verify($password, $row['password']))
            {
                if($row['status'] == 1)
                {
                    $_SESSION['authenticated'] = TRUE;
                    $_SESSION['auth_user'] = [
                        'email' => $row['email'],
                        'username' => $row['uername'],
                        'email' => $row['email']
                    ];
                    $_SESSION['message'] = "You are Logged in Succesfully";
                    $_SESSION['flag'] = 1;
                    header("Location:index.php");
                    exit(0);
                }
                else 
                {
                    $_SESSION['message'] = "Please Verify your Email Address to Login";
                    $_SESSION['flag'] = 2;
                    header("Location:login.php");
                    exit(0);
                }
            }
            else 
            {
                $_SESSION['message'] = "Invalid Email or Password";
                $_SESSION['flag'] = 2;
                header("Location:login.php");
                exit(0);
            }
        }
        else 
        {
            $_SESSION['message'] = "Invalid Email or Password";
            $_SESSION['flag'] = 2;
            header("Location:login.php");
            exit(0);
        }
    }
    else 
    {
        $_SESSION['message'] = "All Fields are Mandatory";
        $_SESSION['flag'] = 2;
        header("Location:login.php");
        exit(0);
    }
}

?>