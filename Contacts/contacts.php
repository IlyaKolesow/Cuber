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
  <title>Contacts</title>
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
          <a href="../Contacts/contacts.php" class="nav__link nav__current">
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
    <h1 class="title">Contacts</h1>
    <h2 class="title__comment">We are always ready to help and we will be happy to answer any question!</h2>
    <h3 class="address sub-title">Address</h3>
    <a href="#" class="address__comment comment">10, Apartment 2, Building 1, Tverskaya street, Moscow, Russia, 125009</a>
    <h3 class="email sub-title">Email</h3>
    <a href="#" class="email__comment comment">info@cuber.com</a>
    <h3 class="social sub-title">Social Media</h3>
    <div>
      <a href="#" class="social__comment comment">https://vk.com/cuber</a>
    </div>
    <div>
      <a href="#" class="social__comment comment">https://t.me/cuber</a>
    </div>
    <div>
      <a href="#" class="social__comment comment">https://www.youtube.com/cuber</a>
    </div>
    <h3 class="phone sub-title">Phone</h3>
    <a href="#" class="phone__comment comment">8-800-555-35-35</a>
    <h1 class="title">We are here:</h1>
    <div class="map">
      <iframe src="https://yandex.ru/map-widget/v1/?from=mapframe&ll=37.609012%2C55.762987&mode=search&ol=geo&ouri=ymapsbm1%3A%2F%2Fgeo%3Fdata%3DCgg1NjcyMzQ2NRI-0KDQvtGB0YHQuNGPLCDQnNC-0YHQutCy0LAsINCi0LLQtdGA0YHQutCw0Y8g0YPQu9C40YbQsCwgMTDRgTEiCg3-bhZCFTANX0I%2C&source=mapframe&tab=inside&utm_source=mapframe&z=18.34" width="100%" height="500" frameborder="0" allowfullscreen="true"></iframe>
    </div>
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