<?php
include('connect.php');
$_SESSION['auth'] = false;
session_destroy();
header("Location: /Main/index.php");
exit;
?>