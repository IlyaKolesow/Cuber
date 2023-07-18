<?php
include('connect.php');
$delete = "DELETE FROM cart WHERE item_id = $_GET[delete_id] AND user_id = $_SESSION[user_id]";
mysqli_query($cuber, $delete);
$_SESSION[$item] = false;
header("Location: ../Cart/cart.php");