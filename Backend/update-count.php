<?php
include('connect.php');
$count = "SELECT count FROM cart WHERE user_id = $_SESSION[user_id] AND item_id = $_GET[item_id]";
$result = mysqli_query($cuber, $count);
$count = mysqli_fetch_assoc($result);
$count = $count['count'];
//$count_id = "count" . $_GET['item_id'];
//$_SESSION[$count_id] = $count;
if($count == 1 && $_GET['operation'] == 'minus')
{
  header("Location: delete-from-cart.php?delete_id=$_GET[item_id]");
  exit();
}
else if($count == 30 && $_GET['operation'] == 'plus')
{
  header("Location: ../Cart/cart.php");
  exit();
}
else
{
    if($_GET['operation'] == 'minus')
    {
      $count--;
      $update = "UPDATE cart SET count = $count WHERE user_id = $_SESSION[user_id] AND item_id = $_GET[item_id]";
      mysqli_query($cuber, $update);
    }
    else if($_GET['operation'] == 'plus')
    {
      $count++;
      $update = "UPDATE cart SET count = $count WHERE user_id = $_SESSION[user_id] AND item_id = $_GET[item_id]";
      mysqli_query($cuber, $update);
    }
    //$_SESSION[$count_id] = $count;
    header("Location: ../Cart/cart.php");
}