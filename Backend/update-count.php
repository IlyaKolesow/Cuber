<?php
include('connect.php');
$select = mysqli_prepare($cuber, "SELECT count FROM cart WHERE user_id = ? AND item_id = ?");
mysqli_stmt_bind_param($select, 'ii', $_SESSION["user_id"], $_GET["item_id"]);
mysqli_stmt_execute($select);
mysqli_stmt_bind_result($select, $count);
mysqli_stmt_fetch($select);
mysqli_stmt_close($select);
if ($count == 1 && $_GET['operation'] == 'minus') {
  header("Location: delete-from-cart.php?delete_id=$_GET[item_id]");
  exit();
} else if ($count == 30 && $_GET['operation'] == 'plus') {
  header("Location: ../Cart/cart.php");
  exit();
} else {
  $update = mysqli_prepare($cuber, "UPDATE cart SET count = ? WHERE user_id = ? AND item_id = ?");
  if ($_GET['operation'] == 'minus') {
    mysqli_stmt_bind_param($update, 'iii', --$count, $_SESSION["user_id"], $_GET["item_id"]);
    mysqli_stmt_execute($update);
  } else if ($_GET['operation'] == 'plus') {
    mysqli_stmt_bind_param($update, 'iii', ++$count, $_SESSION["user_id"], $_GET["item_id"]);
    mysqli_stmt_execute($update);
  }
  header("Location: ../Cart/cart.php");
}
