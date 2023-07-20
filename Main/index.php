<?php include('../Backend/connect.php'); ?>
<?php include('../Backend/forms.php'); ?>
<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./pages/index.css">
  <link rel="reset" href="./../reset.css">
  <title>Cuber</title>
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
    <div class="header__img">
      <h1 class="header__main-title">CUBER</h1>
      <h3 class="header__second-title">Puzzle store</h3>
    </div>
  </header>

  <main class="main">
    <section class="about">
      <h2 class="about__title">About us</h2>
      <div class="about__text">
        <p class="about__first-text">Rubik's Cube is an ingenious invention, an incredibly interesting puzzle. CUBER store will help you choose the right cube for you. Whether you are a beginner or a speedcuber, we have everything you need!</p>
        <p class="about__second-text">The store has been operating since 2010 and offers you a wide selection of puzzles. We always have new items and timeless classics at low prices!</p>
      </div>
    </section>
    <section class="catalog">
      <h2 class="catalog__title">Catalog</h2>
      <div class="catalog__wrap">
        <div class="catalog__item cube">
          <img class="catalog__img" src="images/catalog/__img-cube.png" alt="Кубик Рубика">
          <p class="catalog__text">Cubes</p>
        </div>
        <div class="catalog__item pyraminx">
          <img class="catalog__img" src="images/catalog/__img-pyraminx.png" alt="Пирамидка">
          <p class="catalog__text">Pyraminxes</p>
        </div>
        <div class="catalog__item megaminx">
          <img class="catalog__img" src="images/catalog/__img-megaminx.png" alt="Мегаминкс">
          <p class="catalog__text">Megaminxes</p>
        </div>
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
