<?php
include('../Backend/connect.php');
include('../Backend/forms.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./pages/index.css">
  <link rel="reset" href="./../reset.css">
  <title>Cart</title>
</head>

<body class="page">
  <header class="header">
    <nav class="nav">
      <a href="../Main/index.php" class="nav__link">
        <div class="nav__img">
          <img class="nav__logo" src="images/favicon/favicon.png" alt="Логотип">
        </div>
      </a>
      <ul class="nav__list">
        <li class="nav__item">
          <a href="../Catalog/catalog.php" class="nav__link">
            Catalog
          </a>
        </li>

        <li class="nav__item">
          <a href="../Cart/cart.php" class="nav__link nav__current">
            Cart
          </a>
        </li>

        <li class="nav__item">
          <a href="../Reviews/reviews.php" class="nav__link">
            Reviews
          </a>
        </li>

        <li class="nav__item">
          <a href="../Contacts/contacts.php" class="nav__link">
            Contacts
          </a>
        </li>
        <li class="nav__item">
          <?php if ($_SESSION['auth']) : ?>
            <a href="#exit-form" class="nav__sign-in nav__link"><?php echo "$_SESSION[name]"; ?></a>
          <?php else : ?>
            <a href="#auth-popup" class="nav__sign-in nav__link"><?php echo "Sign in"; ?></a>
          <?php endif; ?>
        </li>
      </ul>
    </nav>
  </header>

  <main class="main">
    <h1 class="title">Your shopping cart</h1>
    <?php
    if (isset($_SESSION['user_id'])) {
      $select_any_row = mysqli_prepare($cuber, "SELECT count FROM cart WHERE user_id = ?");
      mysqli_stmt_bind_param($select_any_row, 'i', $_SESSION["user_id"]);
      mysqli_stmt_execute($select_any_row);
      mysqli_stmt_store_result($select_any_row);
    }
    if (mysqli_stmt_num_rows($select_any_row) > 0) : ?>
      <section class="cart">

        <div class="all-items">

          <?php
          $select = mysqli_prepare($cuber, "SELECT * FROM items WHERE id IN (SELECT item_id FROM cart WHERE user_id = ?)");
          mysqli_stmt_bind_param($select, 'i', $_SESSION["user_id"]);
          mysqli_stmt_execute($select);
          mysqli_stmt_bind_result($select, $item_id, $name, $price, $type);
          $result = array();
          while (mysqli_stmt_fetch($select)) {
            $row = array();
            $row['id'] = $item_id;
            $row['name'] = $name;
            $row['price'] = $price;
            $row['type'] = $type;
            $result[] = $row;
          }
          mysqli_stmt_close($select);
          foreach ($result as $row) : ?>

            <div class="item">
              <div class="item__img">
                <img src="images/products/id<?php echo $row['id']; ?>.png" alt="item">
              </div>
              <div class="item__name-price">
                <p class="item__name-price_name"><?php echo $row['name']; ?></p>
                <p class="item__name-price_price">$<?php echo $row['price']; ?></p>
              </div>
              <a href="../Backend/delete-from-cart.php?delete_id=<?php echo $row['id'] ?>" class="delete-from-cart">&times;</a>
              <div class="item__count">
                <a href="../Backend/update-count.php?operation=minus&item_id=<?php echo $row['id']; ?>" class="item__count_minus">–</a>
                <?php
                $select_count = mysqli_prepare($cuber, "SELECT count FROM cart WHERE user_id = ? AND item_id = ?");
                mysqli_stmt_bind_param($select_count, 'ii', $_SESSION["user_id"], $row['id']);
                mysqli_stmt_execute($select_count);
                mysqli_stmt_bind_result($select_count, $count);
                mysqli_stmt_fetch($select_count);
                $_SESSION['count' . $row['id']] = $count;
                ?>
                <input type="number" class="item__count_number" value="<?php echo $_SESSION['count' . $row['id']]; ?>" min="1" max="30"></input>
                <a href="../Backend/update-count.php?operation=plus&item_id=<?php echo $row['id']; ?>" class="item__count_plus">+</a>
              </div>
            </div>

          <?php mysqli_stmt_close($select_count);
          endforeach;
          ?>

        </div>
        <div class="desc">
          <div class="desc__count-price">
            <?php
            $select_sum = mysqli_prepare($cuber, "SELECT SUM(count) AS total_items FROM cart WHERE user_id = ?");
            mysqli_stmt_bind_param($select_sum, 'i', $_SESSION["user_id"]);
            mysqli_stmt_execute($select_sum);
            mysqli_stmt_bind_result($select_sum, $total_items);
            mysqli_stmt_fetch($select_sum);
            mysqli_stmt_close($select_sum);

            $discount = 3.56;
            $delivery = "Free";
            $address = "Zubenko Michail, 3, Orshanskaya, Moscow";

            $select = mysqli_prepare($cuber, "SELECT item_id, count FROM cart WHERE user_id = ?");
            mysqli_stmt_bind_param($select, 'i', $_SESSION["user_id"]);
            mysqli_stmt_execute($select);
            mysqli_stmt_bind_result($select, $item_id, $count);
            $result = array();
            while (mysqli_stmt_fetch($select)) {
              $row = array();
              $row['item_id'] = $item_id;
              $row['count'] = $count;
              $result[] = $row;
            }
            mysqli_stmt_close($select);
            $start_price = 0;
            foreach ($result as $row) {
              $select = mysqli_prepare($cuber, "SELECT price FROM items WHERE id = ?");
              mysqli_stmt_bind_param($select, 'i', $row["item_id"]);
              mysqli_stmt_execute($select);
              mysqli_stmt_bind_result($select, $price);
              mysqli_stmt_fetch($select);
              mysqli_stmt_close($select);
              $price = $price * $row['count'];
              $price = $price + $start_price;
              $start_price = $price;
            }

            $total_price = $price - $discount;
            ?>
            <p class="desc__count-price_count">Items, <?php echo $total_items; ?> pcs</p>
            <p class="desc__count-price_price">$<?php echo $price; ?></p>
          </div>
          <div class="desc__discount">
            <p class="desc__discount_title">Discount</p>
            <p class="desc__discount_value">$<?php echo $discount; ?></p>
          </div>
          <div class="desc__delivery">
            <p class="desc__delivery_title">Delivery</p>
            <p class="desc__delivery_value"><?php echo $delivery; ?></p>
          </div>
          <p class="desc__address-title">Address</p>
          <p class="desc__address-value"><?php echo $address; ?></p>
          <p class="desc__payment">Payment: Online</p>
          <p class="desc__total">Total: $<?php echo $total_price; ?></p>
          <div class="desc__button">
            <p class="desc__button_text">Buy</p>
          </div>
        </div>
      </section>
    <?php else : ?>
      <p class="empty-cart">The items you want to buy will be stored here</p>
      <p class="empty-cart">Go to the catalog and choose your favorite products!</p>
    <?php endif; ?>
  </main>

  <footer class="footer">
    <div class="footer__icons">
      <a href="#" class="icon">
        <img src="images/icons/vk.png" alt="VK">
      </a>
      <a href="#" class="icon">
        <img src="images/icons/telegram.png" alt="Telegram">
      </a>
      <a href="#" class="icon">
        <img src="images/icons/youtube.png" alt="YouTube">
      </a>
    </div>
    <p class="footer__text">©CUBER, 2022-<?php echo date('Y'); ?></p>
  </footer>
</body>

</html>