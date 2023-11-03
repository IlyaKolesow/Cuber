<?php
include('../Backend/connect.php');
include('../Backend/forms.php');
include('../Backend/added-items.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./pages/index.css">
  <link rel="reset" href="./../reset.css">
  <title>Catalog</title>
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
          <a href="../Catalog/catalog.php" class="nav__link nav__current">
            Catalog
          </a>
        </li>

        <li class="nav__item">
          <a href="../Cart/cart.php" class="nav__link">
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

  <!-- "auth-to-add" -->
  <div class="auth-to-add" id="auth-to-add">
    <a href="#" class="close-btn">&times;</a>
    <p class="auth-to-add-text">You need to register to add items to your shopping cart</p>
  </div>

  <?php
  $select = "SELECT * FROM items";
  $result = mysqli_query($cuber, $select);
  $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
  ?>

  <main class="main">
    <h1 class="title">Catalog</h1>
    <h2 class="sub-title">Cubes</h2>
    <section class="cubes">

      <?php foreach ($result as $row) :
        if ($row['type'] == "cube") : ?>
          <div class="cubes__item item">
            <img src="images/products/item<?php echo $row['id']; ?>.png" alt="cube">
            <p class="cubes__price price"><?php echo $row['price']; ?></p>
            <p class="cubes__name name"><?php echo $row['name']; ?></p>
            <?php if ($_SESSION["item" . $row["id"]]) : ?>
              <div class="added">Added to cart</div>
            <?php else : ?>
              <form action="../Backend/add-to-cart.php" method="post">
                <input type="submit" class="add" name="item<?php echo $row['id']; ?>" value="Add to cart">
              </form>
            <?php endif; ?>
          </div>
      <?php endif;
      endforeach; ?>
    </section>

    <h2 class="sub-title">Pyraminxes</h2>
    <section class="pyraminxes">

      <?php foreach ($result as $row) :
        if ($row['type'] == "pyraminx") : ?>
          <div class="pyraminxes__item item">
            <img src="images/products/item<?php echo $row['id']; ?>.png" alt="pyraminx">
            <p class="pyraminxes__price price"><?php echo $row['price']; ?></p>
            <p class="pyraminxes__name name"><?php echo $row['name']; ?></p>
            <?php if ($_SESSION["item" . $row["id"]]) : ?>
              <div class="added">Added to cart</div>
            <?php else : ?>
              <form action="../Backend/add-to-cart.php" method="post">
                <input type="submit" class="add" name="item<?php echo $row['id']; ?>" value="Add to cart">
              </form>
            <?php endif; ?>
          </div>
      <?php endif;
      endforeach; ?>
    </section>

    <h2 class="sub-title">Megaminxes</h2>
    <section class="megaminxes">

      <?php foreach ($result as $row) :
        if ($row['type'] == "megaminx") : ?>
          <div class="megaminxes__item item">
            <img src="images/products/item<?php echo $row['id']; ?>.png" alt="megaminx">
            <p class="megaminxes__price price"><?php echo $row['price']; ?></p>
            <p class="megaminxes__name name"><?php echo $row['name']; ?></p>
            <?php if ($_SESSION["item" . $row["id"]]) : ?>
              <div class="added">Added to cart</div>
            <?php else : ?>
              <form action="../Backend/add-to-cart.php" method="post">
                <input type="submit" class="add" name="item<?php echo $row['id']; ?>" value="Add to cart">
              </form>
            <?php endif; ?>
          </div>
      <?php endif;
      endforeach; ?>
    </section>
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