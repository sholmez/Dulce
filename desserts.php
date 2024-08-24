<?php
require 'core.php';

$db = new Database();
$conn = $db->connect();
$session = new SessionManager();

// Отримання всіх закусок
$query = "SELECT * FROM dishes WHERE type = 'dessert_dish'";
$stmt = $conn->prepare($query);
$stmt->execute();
$desserts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <head>
    <!-- Site Title-->
    <title>Десерти</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <!-- Stylesheets-->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Monoton">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
		<!--[if lt IE 10]>
    <div style="background: #212121; padding: 10px 0; box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3); clear: both; text-align:center; position: relative; z-index:1;"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img src="images/ie8-panel/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>
    <script src="js/html5shiv.min.js"></script>
		<![endif]-->
    <style>
        .link-button {
            background: none;
            border: none;
            color: inherit;
            font: inherit;
            cursor: pointer;
            text-decoration: none;
            padding: 0;
            margin: 0;
        }
    </style>
  </head>
  <body>
    <!-- Page-->
    <div class="page">
      <div class="preloader">
        <div class="cssload-container">
          <div class="cssload-speeding-wheel"></div>
        </div>
      </div>
      <!-- Page header-->
      <header class="page-header">
        <!-- RD Navbar-->
        <div class="rd-navbar-wrap">
          <nav class="rd-navbar" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-sm-device-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-fixed" data-xl-device-layout="rd-navbar-static" data-xl-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static" data-stick-up-clone="false" data-sm-stick-up="true" data-md-stick-up="true" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true" data-lg-stick-up-offset="69px" data-xl-stick-up-offset="35px" data-xxl-stick-up-offset="35px" data-body-class="rd-navbar-static-smooth">
            <div class="rd-navbar-inner">
              <!-- RD Navbar Panel-->
              <div class="rd-navbar-panel">
                <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                <!-- RD Navbar Brand-->
                <div class="rd-navbar-brand"><a class="brand-name" href="index.php"><img src="images/logo-white-145x33.png" alt="" width="145" height="33"/></a></div>
              </div>
              <!-- Навігація RD Navbar -->
              <div class="rd-navbar-nav-wrap">
                <ul class="rd-navbar-nav">
                  <li class="active"><a href="index.php">Головна</a>
                  </li>
                  <li><a href="about.html">Про нас</a>
                  </li>
                  <li><a href="menu.html">Меню</a>
                    <ul class="rd-navbar-dropdown">
                      <li><a href="menu.html">Меню</a>
                      </li>
                      <li><a href="starters.php">Закуски</a>
                      </li>
                      <li><a href="main-courses.php">Основні страви</a>
                      </li>
                      <li><a href="desserts.php">Десерти</a>
                      </li>
                      <li><a href="drinks.php">Напої</a>
                      </li>
                    </ul>
                  </li>
                  <li><a href="#">сторінки</a>
                    <ul class="rd-navbar-megamenu">
                      <li>
                        <p class="rd-megamenu-header">Основні сторінки</p>
                        <ul class="rd-megamenu-list">
                          <li><a href="our-team.php">команда</a></li>
                          <li><a href="services.html">Послуги</a></li>
                        </ul>
                      </li>
                      <li>
                        <p class="rd-megamenu-header">Додаткові Сторінки</p>
                        <ul class="rd-megamenu-list">
                          <li><a href="privacy-policy.html">Політика конфіденційності</a></li>
                        </ul>
                      </li>
                    </ul>
                  </li>
                  <li><a href="video-post.html">Блог</a>
                  </li>
                  <li><a href="single-portfolio.html">Галерея</a>
                  </li>
                  <li><a href="contacts.php">Контакти</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
        </div>
      </header>
      <section class="breadcrumbs-custom bg-default">
        <div class="container">
          <div class="breadcrumbs-custom__inner">
            <ul class="breadcrumbs-custom__path">
              <li><a href="index.php">Головна</a></li>
              <li><a href="menu.html">Меню</a></li>
              <li class="active">Десерти</li>
            </ul>
          </div>
        </div>
      </section>
      <section class="text-center">
        <section class="section parallax-container" data-parallax-img="images/parallax-08.jpg">
          <div class="parallax-content parallax-header rd-parallax-light">
            <div class="parallax-header__inner">
              <div class="parallax-header__content">
                <div class="container">
                  <div class="row justify-content-sm-center">
                    <div class="col-md-10 col-xl-8">
                      <h1>Десерти</h1>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

      </section>
      <section class="section-lg bg-default">
        <div class="container">
            <div class="row row-80">
                <?php if (!empty($desserts)): ?>
                    <?php foreach ($desserts as $dessert): ?>
                        <div class="col-md-6 col-lg-4">
                            <!-- Thumb corporate-->
                            <div class="thumb thumb-corporate">
                                <div class="thumb-corporate__main">
                                    <img src="images/<?php echo $dessert['image']; ?>" alt="<?php echo $dessert['name']; ?>" width="418" height="315"/>
                                </div>
                                <div class="thumb-corporate__caption">
                                    <p class="thumb__title">
                                        <a href="single-product.php?id=<?php echo $dessert['id']; ?>"><?php echo $dessert['name']; ?></a>
                                    </p>
                                    <p class="thumb__subtitle">₴<?php echo $dessert['price']; ?></p>
                                    <p><?php echo $dessert['composition']; ?></p>
                                    <p><?php echo $dessert['size']; ?>гр</p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Нажаль наразі немає десертів для показу.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>
      <section class="section-sm"> </section>
      <!-- Page Footer-->
      <footer class="footer-minimal">
        <div class="container"><a class="figure-inline" href="./">
            <figure><img src="images/logo-black-145x33.png" alt="" width="145" height="33"/>
            </figure></a>
          <ul>
            <li class="font-italic">Рожище</li>
            <li class="font-italic">
              <dl class="list-terms-minimal">
                <dt>Графік роботи:</dt>
                <dd>Пн-Пт 10:00 - 22:00, Сб-Нд 11:00 - 20:00</dd>
              </dl>
            </li>
            <li>
              <dl class="list-terms-minimal">
                <dt>Замовити</dt>
                <dd><a href="callto:#">(063) 123-4567            </a></dd>
              </dl>
            </li>
          </ul>
          <ul class="list-inline-sm footer-minimal__list">
            <li><a class="icon icon-sm icon-gray-4 fa fa-facebook" target="_blank" href="https://www.facebook.com/groups/760975300607643"></a></li>
            <li><a class="icon icon-sm icon-gray-4 fa fa-youtube" target="_blank" href="https://www.youtube.com/channel/UCJ6nWoNk-sqNNbjbqdR1u1Q"></a></li>
          </ul>
          <p class="rights"><span>©</span> <span class="copyright-year"></span> <span>Dulces </span><span>&nbsp;</span><span>ВСІ ПРАВА ЗАХИЩЕНО!!!! </span><span>&nbsp;</span><span></span><a href="privacy-policy.html">ПОЛІТИКА КОНФІДЕНЦІЙНОСТІ</a>
          </p>
        </div>
      </footer>
    </div>
    <!-- Global Mailform Output-->
    <div class="snackbars" id="form-output-global"></div>
    <!-- Javascript-->
    <script src="js/core.min.js"></script>
    <script src="js/script.js"></script>
  </body>
</html>