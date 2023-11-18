<?php
include('connect.php');
$delete = mysqli_prepare($cuber, "DELETE FROM cart WHERE item_id = ? AND user_id = ?");
mysqli_stmt_bind_param($delete, 'ii', $_GET["delete_id"], $_SESSION["user_id"]);
mysqli_stmt_execute($delete);
$_SESSION["item" . $_GET['delete_id']] = false;
header("Location: ../Cart/cart.php");
