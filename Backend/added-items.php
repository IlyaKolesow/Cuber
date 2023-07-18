<?php
if($_SESSION['auth'])
{
  $select = "SELECT item_id FROM cart WHERE user_id = $_SESSION[user_id]";
  $select = mysqli_query($cuber, $select);
  $item_ids = mysqli_fetch_all($select, MYSQLI_ASSOC);
  foreach($item_ids as $row)
  {
    $item_id = $row['item_id'];
    $item = "item" . $item_id;
    $_SESSION[$item] = true;
  }
}
?>