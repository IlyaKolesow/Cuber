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

  <main class="main">
    <h1 class="title">Catalog</h1>
    <h2 class="sub-title">Cubes</h2>
    <section class="cubes">
      <div class="cubes__item item">
        <img src="images/products/cube1.png" alt="cube">
        <p class="cubes__price price">$79,99</p>
        <p class="cubes__name name">Gan 13 M Maglev 3x3x3</p>
        <?php if ($_SESSION['item1']) : ?>
          <div class="added">Added to cart</div>
        <?php else : ?>
          <form action="../Backend/add-to-cart.php" method="post">
            <input type="submit" class="add" name="item1" value="Add to cart">
          </form>
        <?php endif; ?>
      </div>
      <div class="cubes__item item">
        <img src="images/products/cube2.png" alt="cube">
        <p class="cubes__price price">$17,99</p>
        <p class="cubes__name name">MoYu 3x3x3 WeiLong</p>
        <?php if ($_SESSION['item2']) : ?>
          <div class="added">Added to cart</div>
        <?php else : ?>
          <form action="../Backend/add-to-cart.php" method="post">
            <input type="submit" class="add" name="item2" value="Add to cart">
          </form>
        <?php endif; ?>
      </div>
      <div class="cubes__item item">
        <img src="images/products/cube3.png" alt="cube">
        <p class="cubes__price price">$15,99</p>
        <p class="cubes__name name">YJ 3x3x3 MGC v2</p>
        <?php if ($_SESSION['item3']) : ?>
          <div class="added">Added to cart</div>
        <?php else : ?>
          <form action="../Backend/add-to-cart.php" method="post">
            <input type="submit" class="add" name="item3" value="Add to cart">
          </form>
        <?php endif; ?>
      </div>
    </section>
    <h2 class="sub-title">Pyraminxes</h2>
    <section class="pyraminxes">
      <div class="pyraminxes__item item">
        <img src="images/products/pyraminx1.png" alt="pyraminx">
        <p class="pyraminxes__price price">$26,99</p>
        <p class="pyraminxes__name name">Gan Pyraminx M Enhanced Core</p>
        <?php if ($_SESSION['item4']) : ?>
          <div class="added">Added to cart</div>
        <?php else : ?>
          <form action="../Backend/add-to-cart.php" method="post">
            <input type="submit" class="add" name="item4" value="Add to cart">
          </form>
        <?php endif; ?>
      </div>
      <div class="pyraminxes__item item">
        <img src="images/products/pyraminx2.png" alt="pyraminx">
        <p class="pyraminxes__price price">$6,99</p>
        <p class="pyraminxes__name name">YuXin Pyraminx Little Magic</p>
        <?php if ($_SESSION['item5']) : ?>
          <div class="added">Added to cart</div>
        <?php else : ?>
          <form action="../Backend/add-to-cart.php" method="post">
            <input type="submit" class="add" name="item5" value="Add to cart">
          </form>
        <?php endif; ?>
      </div>
      <div class="pyraminxes__item item">
        <img src="images/products/pyraminx3.png" alt="pyraminx">
        <p class="pyraminxes__price price">$12,99</p>
        <p class="pyraminxes__name name">MoYu Pyraminx Magnetic</p>
        <?php if ($_SESSION['item6']) : ?>
          <div class="added">Added to cart</div>
        <?php else : ?>
          <form action="../Backend/add-to-cart.php" method="post">
            <input type="submit" class="add" name="item6" value="Add to cart">
          </form>
        <?php endif; ?>
      </div>
    </section>
    <h2 class="sub-title">Megaminxes</h2>
    <section class="megaminxes">
      <div class="megaminxes__item item">
        <img src="images/products/megaminx1.png" alt="megaminx">
        <p class="megaminxes__price price">$49,99</p>
        <p class="megaminxes__name name">Gan Megaminx</p>
        <?php if ($_SESSION['item7']) : ?>
          <div class="added">Added to cart</div>
        <?php else : ?>
          <form action="../Backend/add-to-cart.php" method="post">
            <input type="submit" class="add" name="item7" value="Add to cart">
          </form>
        <?php endif; ?>
      </div>
      <div class="megaminxes__item item">
        <img src="images/products/megaminx2.png" alt="megaminx">
        <p class="megaminxes__price price">$13,99</p>
        <p class="megaminxes__name name">YuXin Megaminx v2</p>
        <?php if ($_SESSION['item8']) : ?>
          <div class="added">Added to cart</div>
        <?php else : ?>
          <form action="../Backend/add-to-cart.php" method="post">
            <input type="submit" class="add" name="item8" value="Add to cart">
          </form>
        <?php endif; ?>
      </div>
      <div class="megaminxes__item item">
        <img src="images/products/megaminx3.png" alt="megaminx">
        <p class="megaminxes__price price">$14,99</p>
        <p class="megaminxes__name name">Shengshou Megaminx</p>
        <?php if ($_SESSION['item9']) : ?>
          <div class="added">Added to cart</div>
        <?php else : ?>
          <form action="../Backend/add-to-cart.php" method="post">
            <input type="submit" class="add" name="item9" value="Add to cart">
          </form>
        <?php endif; ?>
      </div>
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