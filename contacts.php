<?php
require 'core.php'; // Підключаємо файл core.php, де знаходиться клас Database

$db = new Database();
$conn = $db->connect();
$message = ''; // Змінна для повідомлення

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Збір даних з форми
    $name = $_POST['name'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $user_message = $_POST['message'] ?? '';

    // SQL запит на вставку
    $query = "INSERT INTO contacts (name, phone, content, team_id) VALUES (:name, :phone, :content, NULL)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':content', $user_message);

    if ($stmt->execute()) {
        $message = "Запит успішно відправлено!";
    } else {
        $message = "Помилка при відправці запиту.";
    }
}
?>


<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <head>
    <!-- Site Title-->
    <title>Контакти</title>
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
              <li class="active">Контакти</li>
            </ul>
          </div>
        </div>
      </section>
      <section>
        <div class="google-map-container" data-styles="[{&quot;featureType&quot;:&quot;water&quot;,&quot;elementType&quot;:&quot;geometry&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#e9e9e9&quot;},{&quot;lightness&quot;:17}]},{&quot;featureType&quot;:&quot;landscape&quot;,&quot;elementType&quot;:&quot;geometry&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#f5f5f5&quot;},{&quot;lightness&quot;:20}]},{&quot;featureType&quot;:&quot;road.highway&quot;,&quot;elementType&quot;:&quot;geometry.fill&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#ffffff&quot;},{&quot;lightness&quot;:17}]},{&quot;featureType&quot;:&quot;road.highway&quot;,&quot;elementType&quot;:&quot;geometry.stroke&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#ffffff&quot;},{&quot;lightness&quot;:29},{&quot;weight&quot;:0.2}]},{&quot;featureType&quot;:&quot;road.arterial&quot;,&quot;elementType&quot;:&quot;geometry&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#ffffff&quot;},{&quot;lightness&quot;:18}]},{&quot;featureType&quot;:&quot;road.local&quot;,&quot;elementType&quot;:&quot;geometry&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#ffffff&quot;},{&quot;lightness&quot;:16}]},{&quot;featureType&quot;:&quot;poi&quot;,&quot;elementType&quot;:&quot;geometry&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#f5f5f5&quot;},{&quot;lightness&quot;:21}]},{&quot;featureType&quot;:&quot;poi.park&quot;,&quot;elementType&quot;:&quot;geometry&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#dedede&quot;},{&quot;lightness&quot;:21}]},{&quot;elementType&quot;:&quot;labels.text.stroke&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;on&quot;},{&quot;color&quot;:&quot;#ffffff&quot;},{&quot;lightness&quot;:16}]},{&quot;elementType&quot;:&quot;labels.text.fill&quot;,&quot;stylers&quot;:[{&quot;saturation&quot;:36},{&quot;color&quot;:&quot;#333333&quot;},{&quot;lightness&quot;:40}]},{&quot;elementType&quot;:&quot;labels.icon&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;off&quot;}]},{&quot;featureType&quot;:&quot;transit&quot;,&quot;elementType&quot;:&quot;geometry&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#f2f2f2&quot;},{&quot;lightness&quot;:19}]},{&quot;featureType&quot;:&quot;administrative&quot;,&quot;elementType&quot;:&quot;geometry.fill&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#fefefe&quot;},{&quot;lightness&quot;:20}]},{&quot;featureType&quot;:&quot;administrative&quot;,&quot;elementType&quot;:&quot;geometry.stroke&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#fefefe&quot;},{&quot;lightness&quot;:17},{&quot;weight&quot;:1.2}]}]">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d40249.24205554217!2d25.270098949999998!3d50.91303095!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4725bf199179f1b7%3A0x50af2e01c3530cd0!2z0KDQvtC20LjRidC1LCDQktC-0LvRi9C90YHQutCw0Y8g0L7QsdC70LDRgdGC0YwsIDQ1MTAw!5e0!3m2!1sru!2sua!4v1716255147162!5m2!1sru!2sua" width=1920 height=720 style="border:0;" allowfullscreen="true" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </section>
      <section class="section-md bg-default">
        <div class="container">
          <div class="row row-50">
            <div class="col-md-5 col-lg-4">
              <h2>Деталі</h2>
              <ul class="list-xs contact-info">
                <li>
                  <dl class="list-terms-minimal">
                    <dt>Адреса</dt>
                    <dd>Рожище</dd>
                  </dl>
                </li>
                <li>
                  <dl class="list-terms-minimal">
                    <dt>Телефони</dt>
                    <dd>
                      <ul class="list-semicolon">
                        <li><a href="callto:#">(063) 123-45-67</a></li>
                        <li><a href="callto:#">(063) 111-11-11</a></li>
                      </ul>
                    </dd>
                  </dl>
                </li>
                <li>
                  <dl class="list-terms-minimal">
                    <dt>E-mail</dt>
                    <dd>info@dulches.com</dd>
                  </dl>
                </li>
                <li>
                  <dl class="list-terms-minimal">
                    <dt>Ми працюємо</dt>
                    <dd>Пн-Пт 10:00 - 22:00, Сб-Нд 11:00 - 20:00</dd>
                  </dl>
                </li>
                <li>
                  <ul class="list-inline-sm">
                    <li><a class="icon icon-sm icon-gray-4 fa fa-facebook" target="_blank" href="https://www.facebook.com/groups/760975300607643"></a></li>
                    <li><a class="icon icon-sm icon-gray-4 fa fa-youtube" target="_blank" href="https://www.youtube.com/channel/UCJ6nWoNk-sqNNbjbqdR1u1Q"></a></li>
                  </ul>
                </li>
              </ul>
            </div>
            <div class="col-md-7 col-lg-8">
              <h2>Зворотній звязок</h2>
              <!-- RD Mailform-->
              <form class="rd-mailform rd-mailform_style-1 text-center" method="post" action="">
                <div class="form-wrap">
                    <input class="form-input" id="contact-name" type="text" name="name" data-constraints="@Required" placeholder="Імя" required>
                    <label class="form-label" for="contact-name"> </label>
                </div>
                <div class="form-wrap">
                    <input class="form-input" id="contact-phone" type="text" name="phone" data-constraints="@Numeric" placeholder="Телефон" required>
                    <label class="form-label" for="contact-phone"> </label>
                </div>
                <div class="form-wrap">
                    <textarea class="form-input" id="contact-message" name="message" data-constraints="@Required" placeholder="Ваше повідомлення" required></textarea>
                    <label class="form-label" for="contact-message"> </label>
                </div>
                <button class="button button-gray-light-outline" type="submit"><span>Відправити</span></button>
            </form>
            </div>
          </div>
        </div>
      </section>

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