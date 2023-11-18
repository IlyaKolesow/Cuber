<?php
if ($_SESSION['auth']) {
  $select = mysqli_prepare($cuber, "SELECT item_id FROM cart WHERE user_id = ?");
  mysqli_stmt_bind_param($select, 'i', $_SESSION["user_id"]);
  mysqli_stmt_execute($select);
  mysqli_stmt_bind_result($select, $id);
  while (mysqli_stmt_fetch($select)) {
    $item = "item" . $id;
    $_SESSION[$item] = true;
  }
  mysqli_stmt_close($select);
}
