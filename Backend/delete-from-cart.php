<?php
include('connect.php');
$delete = "DELETE FROM cart WHERE item_id = $_GET[delete_id] AND user_id = $_SESSION[user_id]";
mysqli_query($cuber, $delete);
//$item = "item" . $_GET['delete_id'];
//$count = "count" . $_GET['delete_id'];
$_SESSION[$item] = false;
//unset($_SESSION[$count]);
header("Location: ../Cart/cart.php");