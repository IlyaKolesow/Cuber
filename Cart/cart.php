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
      $count = "SELECT count FROM cart WHERE user_id = $_SESSION[user_id]";
      $count = mysqli_query($cuber, $count);
      $num_rows = mysqli_num_rows($count);
    }
    if ($num_rows > 0) : ?>
      <section class="cart">

        <div class="all-items">

          <?php
          $select = "SELECT * FROM items WHERE id IN (SELECT item_id FROM cart WHERE user_id = $_SESSION[user_id])";
          $result = mysqli_query($cuber, $select);
          $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
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
                $count = "SELECT count FROM cart WHERE user_id = $_SESSION[user_id] AND item_id = $row[id]";
                $count = mysqli_query($cuber, $count);
                $count = mysqli_fetch_assoc($count);
                $count = $count['count'];
                $_SESSION['count' . $row['id']] = $count;
                ?>
                <input type="number" class="item__count_number" value="<?php echo $_SESSION['count' . $row['id']]; ?>" min="1" max="30"></input>
                <a href="../Backend/update-count.php?operation=plus&item_id=<?php echo $row['id']; ?>" class="item__count_plus">+</a>
              </div>
            </div>

          <?php endforeach; ?>

        </div>
        <div class="desc">
          <div class="desc__count-price">
            <?php
            $total_items = "SELECT SUM(count) AS total_items FROM cart WHERE user_id = $_SESSION[user_id]";
            $total_items = mysqli_query($cuber, $total_items);
            $total_items = mysqli_fetch_assoc($total_items);
            $total_items = $total_items['total_items'];

            $discount = 3.56;
            $delivery = "Free";
            $address = "Zubenko Michail, 3, Orshanskaya, Moscow";

            $select = "SELECT item_id, count FROM cart WHERE user_id = $_SESSION[user_id]";
            $result = mysqli_query($cuber, $select);
            $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
            $start_price = 0;
            foreach ($result as $row) {
              $select = "SELECT price FROM items WHERE id = $row[item_id]";
              $price = mysqli_query($cuber, $select);
              $price = mysqli_fetch_assoc($price);
              $price = $price['price'] * $row['count'];
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