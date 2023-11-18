<?php
include('connect.php');

if (isset($_POST["email"]) && isset($_POST["password"])) {
    $email = htmlentities(trim($_POST["email"]));
    $pass_input = md5(trim($_POST["password"]));
    $select = mysqli_prepare($cuber, "SELECT id, pass, name FROM users WHERE email = ?");

    mysqli_stmt_bind_param($select, 's', $email);
    mysqli_stmt_execute($select);
    mysqli_stmt_bind_result($select, $user_id, $pass_db, $name);
    mysqli_stmt_fetch($select);

    if ($pass_input == $pass_db) {
        $_SESSION['auth'] = true;
        $_SESSION['user_id'] = $user_id;
        $_SESSION['email'] = $email;
        $_SESSION['pass'] = $pass_input;
        $_SESSION['name'] = $name;
        header("Location: ../Main/index.php");
        exit();
    } else {
        $_SESSION['auth'] = false;
        header("Location: ../Main/index.php?message=wrong_password#auth-popup");
        exit();
    }
}
