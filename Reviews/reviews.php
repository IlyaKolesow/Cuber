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
    <title>Reviews</title>
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
              <a href="../Reviews/reviews.php" class="nav__link nav__current">
                Reviews
              </a>   
          </li>
      
          <li class="nav__item">
              <a href="../Contacts/contacts.php" class="nav__link">
                Contacts
              </a> 
          </li>
          <li class="nav__item">
            <?php if($_SESSION['auth']):?>
              <a href="#exit-form" class="nav__sign-in nav__link"><?php echo "$_SESSION[name]";?></a>
            <?php else:?>
              <a href="#auth-popup" class="nav__sign-in nav__link"><?php echo "Sign in";?></a>
            <?php endif;?>
          </li>   
        </ul>
      </nav>
      </header>

      <main class="main">
            <h1 class="title">Reviews</h1>
            <h2 class="buyer">Daniel: Gan 13 M Maglev 3x3x3</h2>
            <div class="stars">
              <img class="star" src="images/stars/star.png" alt="star">
              <img class="star" src="images/stars/star.png" alt="star">
              <img class="star" src="images/stars/star.png" alt="star">
              <img class="star" src="images/stars/star.png" alt="star">
              <img class="star" src="images/stars/star.png" alt="star">
            </div>
            <p class="comment">I am absolutely in love with my Gan 13 M Maglev 3x3x3! The magnet levitation technology is incredible and the cube turns like a dream</p>
            <h2 class="buyer">Sophie: YuXin Pyraminx Little Magic</h2>
            <div class="stars">
              <img class="star" src="images/stars/star.png" alt="star">
              <img class="star" src="images/stars/star.png" alt="star">
              <img class="star" src="images/stars/star.png" alt="star">
              <img class="star" src="images/stars/star.png" alt="star">
              <img class="star" src="images/stars/star.png" alt="star">
            </div>
            <p class="comment">My YuXin Pyraminx Little Magic is the perfect Pyraminx for me! It's compact, easy to handle and it turns so smoothly</p>
            <h2 class="buyer">Michael: MoYu Pyraminx Magnetic</h2>
            <div class="stars">
              <img class="star" src="images/stars/star.png" alt="star">
              <img class="star" src="images/stars/star.png" alt="star">
              <img class="star" src="images/stars/star.png" alt="star">
              <img class="star" src="images/stars/star.png" alt="star">
              <img class="star" src="images/stars/star.png" alt="star">
            </div>
            <p class="comment">The MoYu Pyraminx Magnetic is a game-changer! The magnets make it incredibly stable and easy to control, and the smooth turning makes it a joy to solve every time</p>
            <h2 class="buyer">William: Shengshou Megaminx</h2>
            <div class="stars">
              <img class="star" src="images/stars/star.png" alt="star">
              <img class="star" src="images/stars/star.png" alt="star">
              <img class="star" src="images/stars/star.png" alt="star">
              <img class="star" src="images/stars/star.png" alt="star">
              <img class="star" src="images/stars/star.png" alt="star">
            </div>
            <p class="comment">The Shengshou Megaminx is an absolute pleasure to solve. The turning is effortless and the cube has a great feel to it. A great addition to my collection</p>
            <h2 class="buyer">Natalie: Gan Pyraminx M Enhanced Core</h2>
            <div class="stars">
              <img class="star" src="images/stars/star.png" alt="star">
              <img class="star" src="images/stars/star.png" alt="star">
              <img class="star" src="images/stars/star.png" alt="star">
              <img class="star" src="images/stars/star.png" alt="star">
              <img class="star" src="images/stars/star.png" alt="star">
            </div>
            <p class="comment">The Gan Pyraminx M Enhanced Core is hands down the best Pyraminx I've ever had. The turning is smooth and easy to control, and the design is sleek and stylish</p>
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