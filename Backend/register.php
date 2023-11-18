<?php
include('connect.php');
if (isset($_POST["email"]) && isset($_POST["name"]) && isset($_POST["password"])) {
    $_SESSION['name'] = htmlentities(trim($_POST["name"]));
    $_SESSION['email'] = htmlentities(trim($_POST["email"]));
    $_SESSION['pass'] = md5(trim($_POST["password"]));
    $select = mysqli_prepare($cuber, "SELECT id FROM users WHERE email = ?");
    mysqli_stmt_bind_param($select, 's', $_SESSION["email"]);
    mysqli_stmt_execute($select);
    mysqli_stmt_store_result($select);
    if (mysqli_stmt_num_rows($select) > 0) {
        $_SESSION['auth'] = false;
        header("Location: ../Main/index.php?message=already_registered#reg-popup");
        exit();
    } else {
        $insert = mysqli_prepare($cuber, "INSERT INTO users (name, email, pass) VALUES (?, ?, ?)");
        mysqli_stmt_bind_param($insert, 'sss', $_SESSION["name"], $_SESSION["email"], $_SESSION["pass"]);
        mysqli_stmt_execute($insert);
        mysqli_stmt_bind_param($select, 's', $_SESSION["email"]);
        mysqli_stmt_execute($select);
        mysqli_stmt_bind_result($select, $id);
        mysqli_stmt_fetch($select);
        $_SESSION['auth'] = true;
        $_SESSION['user_id'] = $id;
        header("Location: ../Main/index.php");
        exit();
    }
}
