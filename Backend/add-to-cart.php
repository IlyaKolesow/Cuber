<?php
include('connect.php');
if ($_SESSION['auth']) {
  $items_count = 9;
  for ($item_number = 1; $item_number <= $items_count; $item_number++) {
    $post_key = 'item' . $item_number;
    if ((isset($_POST[$post_key]))) {
      $item_id = $item_number;
      break;
    }
  }
  $insert = mysqli_prepare($cuber, "INSERT INTO cart (user_id, item_id, count) VALUES (?, ?, ?)");
  $count = 1;
  mysqli_stmt_bind_param($insert, 'iii', $_SESSION["user_id"], $item_id, $count);
  mysqli_stmt_execute($insert);
  $_SESSION[$post_key] = true;
  header("Location: ../Catalog/catalog.php");
} else {
  header("Location: ../Catalog/catalog.php#auth-to-add");
}
