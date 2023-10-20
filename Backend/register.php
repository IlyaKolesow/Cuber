<?php
include('connect.php');
if (isset($_POST["email"]) && isset($_POST["name"]) && isset($_POST["password"]))
{
    $_SESSION['name'] = htmlentities(trim($_POST["name"]));
    $_SESSION['email'] = htmlentities(trim($_POST["email"]));
    $_SESSION['pass'] = md5(trim($_POST["password"]));
    $select = "SELECT id FROM users WHERE email = '$_SESSION[email]'";
    $query = mysqli_query($cuber, $select);

    if (mysqli_num_rows($query) > 0)
    {
        $_SESSION['auth'] = false;
        header("Location: ../Main/index.php?message=already_registered#reg-popup");
        exit();
    }
    else
    {
        $insert = "INSERT INTO users (name, email, pass) VALUES ('$_SESSION[name]','$_SESSION[email]','$_SESSION[pass]')";
        mysqli_query($cuber, $insert);
        $select = mysqli_query($cuber, $select);
        $select = mysqli_fetch_assoc($select);
        $_SESSION['auth'] = true;
        $_SESSION['user_id'] = $select['id']; 
        header("Location: ../Main/index.php");
        exit();
    }
}
?>
