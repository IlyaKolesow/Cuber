<?php
include('connect.php');

if(isset($_POST["email"]) && isset($_POST["password"]))
{
    $email= htmlentities(trim($_POST["email"]));
    $pass = md5(trim($_POST["password"]));
    $select_id = "SELECT id FROM users WHERE email = '$email'";
    $select_pass = "SELECT pass FROM users WHERE email = '$email'";
    $select_name = "SELECT name FROM users WHERE email = '$email'";
    $name = mysqli_query($cuber,$select_name);
    $name = mysqli_fetch_assoc($name);
    $name = $name['name'];
    $query = mysqli_query($cuber,$select_id);
    $user_id = mysqli_fetch_assoc($query);
    
    $_SESSION['email'] = $email;
    $_SESSION['pass'] = $pass;
    $_SESSION['name'] = $name;

    if(mysqli_num_rows($query) > 0)
    {
        $query = mysqli_query($cuber,$select_pass);
        $query_pass = mysqli_fetch_assoc($query);
        $string_pass = $query_pass['pass'];
        if($_SESSION['pass'] != $string_pass)
        {
            $_SESSION['auth'] = false;
            header("Location: ../Main/index.php?message=wrong_password#auth-popup");
            exit();
        }
        else
        {
            $_SESSION['auth'] = true;
            $_SESSION['user_id'] = $user_id['id'];
            header("Location: ../Main/index.php");
            exit();
        }
    }
    else
    {
        $_SESSION['auth'] == false;
        header("Location: ../Main/index.php?message=wrong_password#auth-popup");
    }
}
?>