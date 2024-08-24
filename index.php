<?php
require 'core.php';

$db = new Database();
$conn = $db->connect();
$session = new SessionManager();

// Отримання перших 6 закусок
$query = "SELECT * FROM dishes LIMIT 6";
$stmt = $conn->prepare($query);
$stmt->execute();
$dishes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html class="wide wow-animation" lang="uk">
  <head>
    <!-- Заголовок сайту -->
    <title>Домашня сторінка</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <!-- Стили -->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Monoton">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
		<!--[if lt IE 10]>
    <div style="background: #212121; padding: 10px 0; box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3); clear: both; text-align:center; position: relative; z-index:1;"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img src="images/ie8-panel/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="Ви використовуєте застарілий браузер. Для швидшого і безпечнішого перегляду оновіть браузер безкоштовно."></a></div>
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
    <!-- Сторінка -->
    <div class="page">
      <div class="preloader">
        <div class="cssload-container">
          <div class="cssload-speeding-wheel"></div>
        </div>
      </div>
      <!-- Заголовок сторінки -->
      <header class="page-header">
        <!-- RD Navbar -->
        <div class="rd-navbar-wrap">
          <nav class="rd-navbar rd-navbar_transparent" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-sm-device-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-fixed" data-xl-device-layout="rd-navbar-static" data-xl-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static" data-stick-up-clone="false" data-sm-stick-up="true" data-md-stick-up="true" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true" data-lg-stick-up-offset="100px" data-xl-stick-up-offset="100px" data-xxl-stick-up-offset="100px" data-body-class="rd-navbar-absolute rd-navbar_transparent-linked">
            <div class="rd-navbar-inner">
              <!-- Панель RD Navbar -->
              <div class="rd-navbar-panel">
                <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                <!-- Бренд RD Navbar -->
                <div class="rd-navbar-brand"><a href="index.php"><img src="images/logo-white-145x33.png" alt="" width="145" height="33"/></a></div>
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
      <section class="fullwidth-page bg-accent text-center section-first-screen bg-image" style="background-image: url('images/index-1-1920x1080.jpg')">
        <div class="container section-xxl">
          <div class="row justify-content-sm-center">
            <div class="col-md-10 col-xl-8">
              <h1 style="overflow: hidden;"><span class="wow fadeInUpSmall" data-wow-delay="2.2s">ЛАСКАВО ПРОСИМО</span></h1>
              <div style="overflow: hidden;"><span class="wow fadeInUpSmall" data-wow-delay="2.2s">
                <span>-----------------</span>
              </div>
              <ul style="overflow: hidden;">
                  <dl class="list-terms-minimal"><span class="wow fadeInUpSmall" data-wow-delay="2.2s">
                    <dt>Графік роботи</dt>
                    <dd>Пн-Пт 10:00 - 22:00, Сб-Нд 11:00 - 20:00</dd></span>
                  </dl>
                </li>
                <li class="wow fadeInDownSmall" data-wow-delay="2.6s">
                  <dl class="list-terms-minimal">
                    <dt>Замовити</dt>
                    <dd><a href="callto:#">(063) 111-11-11</a></dd>
                  </dl>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </section>
      <section class="section-xl bg-default">
        <div class="container-fluid container-limit">
          <div class="row row-50 justify-content-sm-center align-items-xxl-center">
            <div class="col-lg-6">
              <div class="row justify-content-center justify-content-lg-end">
                <div class="col-11 col-xl-9">
                  <h1>Dulces  <br> Ресторан</h1>
                  <h5>Ідеальне місце щоб поїсти<h5>
                  <p>Dulces  Restaurant & Bar — заклад традиційної європейської кухні, де подають найкращі страви та напої з усього асортименту європейських кухонь. Неперевершений районний заклад на площі Дейвіс, Dulces  пропонує невимушену їжу в невимушеній обстановці для гостей з усіх верств суспільства.</p>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="row">
                <div class="col-xl-6">
                  <div class="row row-50">
                    <div class="col-md-6 col-lg-12">
                      <figure><img src="images/index-1-433x315.jpg" alt="" width="433" height="315"/>
                      </figure>
                    </div>
                    <div class="col-md-6 col-lg-12">
                      <figure><img src="images/index-2-433x313.jpg" alt="" width="433" height="313"/>
                      </figure>
                    </div>
                  </div>
                </div>
                <div class="col-xl-6 d-none d-xl-block">
                  <figure><img src="images/index-3-453x700.jpg" alt="" width="453" height="700"/>
                  </figure>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="section-xl bg-default text-center">
        <div class="container-fluid">
          <div class="row no-gutters align-items-lg-center flex-lg-row-reverse">
            <div class="col-lg-6 section-sm">
              <div class="row justify-content-sm-center">
                <div class="col-sm-11 col-md-9">
                  <h1>З 2024</h1>
                  <h5>Dulces  пишається тим, що протягом року пропонує вишукані страви європейської кухні!</h5>
                </div>
              </div>
            </div>
            <div class="col-lg-6"><img class="img-fullwidth" src="images/index-4-982x652.jpg" alt="" width="982" height="652"/>
            </div>
          </div>
        </div>
      </section>

    <!-- menu-->
    <div class="container">
            <h1>Меню</h1>
            <div class="row row-80">
                <?php if (!empty($dishes)): ?>
                    <?php foreach ($dishes as $dish): ?>
                        <div class="col-md-6 col-lg-4">
                            <!-- Thumb corporate-->
                            <div class="thumb thumb-corporate">
                                <div class="thumb-corporate__main">
                                    <img src="images/<?php echo $dish['image']; ?>" alt="<?php echo $dish['name']; ?>" width="418" height="315"/>
                                </div>
                                <div class="thumb-corporate__caption">
                                    <p class="thumb__title">
                                        <a href="single-product.php?id=<?php echo $dish['id']; ?>"><?php echo $dish['name']; ?></a>
                                    </p>
                                    <p class="thumb__subtitle">₴<?php echo $dish['price']; ?></p>
                                    <p><?php echo $dish['composition']; ?></p>
                                    <p><?php echo $dish['size']; ?>гр</p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Нажаль наразі немає закусок для показу.</p>
                <?php endif; ?>
            </div>
        </div>
        <a class="button button-gray-light-outline" href="menu.html"><span>Подивитись меню</span></a>

    </section>

      <!-- Blurbs-->
      <section class="section-xl bg-default">
        <div class="container-fluid">
          <div class="row row-50 justify-content-sm-center">
            <div class="col-sm-8 col-md-6 col-lg-4">
              <div class="img-thumbnail-variant-1">
                <figure><img src="images/index-11-605x606.jpg" alt="" width="605" height="606"/>
                </figure>
                <div class="caption img-thumbnail-text">
                  <h1>Кухня</h1>
                  <h5>Серце ресторана</h5>
                </div>
              </div>
            </div>
            <div class="col-sm-8 col-md-6 col-lg-4">
              <div class="img-thumbnail-variant-1">
                <figure><img src="images/index-12-605x606.jpg" alt="" width="605" height="606"/>
                </figure>
                <div class="caption img-thumbnail-text">
                  <h1>Інтер'єр</h1>
                  <h5>Дружня розслабляюча атмосфера</h5>
                </div>
              </div>
            </div>
            <div class="col-sm-8 col-md-6 col-lg-4">
              <div class="img-thumbnail-variant-1">
                <figure><img src="images/index-13-605x606.jpg" alt="" width="605" height="606"/>
                </figure>
                <div class="caption img-thumbnail-text">
                  <h1>Бар</h1>
                  <h5>Для душі</h5>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="section-xl bg-default text-center">
        <div class="container">
          <h1>Відгуки відвідувачів:</h1>
          <div class="row row-50">
            <div class="col-md-6">
              <!-- Quote default-->
              <div class="quote-default quote-default_left-v2">
                <div class="quote-default__image"><img src="images/testimonials-1-120x120.jpg" alt="" width="120" height="120"/>
                </div>
                <div class="quote-default__text">
                  <p class="q">Я їм їхні бізнес-ланчі протягом останніх 2 місяців. Я жодного разу не мала жодного неприємного досвіду.</p>
                </div>
                <p class="quote-default__cite">Яна Ц.</p><span class="quote-default__source"></span>
              </div>
            </div>
            <div class="col-md-6">
              <!-- Quote default-->
              <div class="quote-default quote-default_left-v2">
                <div class="quote-default__image"><img src="images/testimonials-2-120x120.jpg" alt="" width="120" height="120"/>
                </div>
                <div class="quote-default__text">
                  <p class="q">Кожен раз я витрачаю менше грошей, ніж будь-де, і отримую смачну домашню вечерю!</p>
                </div>
                <p class="quote-default__cite">Геннадій Ц.</p><span class="quote-default__source"></span>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Gallery-->
      <section class="section-lg bg-default" data-lightgallery="group">
        <div class="container-fluid">
          <div class="row row-50">
            <div class="col-md-4 col-xl-3"><a class="thumb-modern" data-lightgallery="item" href="images/portfolio-single-3-1200x800.jpg" data-size="1200x800">
                <figure><img src="images/index-gallery-1-442x332.jpg" alt="" width="442" height="332"/>
                </figure>
                <div class="thumb-modern__overlay"></div></a></div>
            <div class="col-md-4 col-xl-3"><a class="thumb-modern" data-lightgallery="item" href="images/image-original-2-1200x800.jpg" data-size="1200x800">
                <figure><img src="images/index-gallery-2-442x332.jpg" alt="" width="442" height="332"/>
                </figure>
                <div class="thumb-modern__overlay"></div></a></div>
            <div class="col-md-4 col-xl-3"><a class="thumb-modern" data-lightgallery="item" href="images/image-original-3-1200x800.jpg" data-size="1200x800">
                <figure><img src="images/index-gallery-3-442x332.jpg" alt="" width="442" height="332"/>
                </figure>
                <div class="thumb-modern__overlay"></div></a></div>
            <div class="col-md-4 col-xl-3"><a class="thumb-modern" data-lightgallery="item" href="images/image-original-4-1200x800.jpg" data-size="1200x800">
                <figure><img src="images/index-gallery-4-442x332.jpg" alt="" width="442" height="332"/>
                </figure>
                <div class="thumb-modern__overlay"></div></a></div>
            <div class="col-md-4 col-xl-3"><a class="thumb-modern" data-lightgallery="item" href="images/image-original-5-1200x800.jpg" data-size="1200x800">
                <figure><img src="images/index-gallery-5-442x332.jpg" alt="" width="442" height="332"/>
                </figure>
                <div class="thumb-modern__overlay"></div></a></div>
            <div class="col-md-4 col-xl-3"><a class="thumb-modern" data-lightgallery="item" href="images/portfolio-single-6-1200x800.jpg" data-size="1200x800">
                <figure><img src="images/index-gallery-6-442x332.jpg" alt="" width="442" height="332"/>
                </figure>
                <div class="thumb-modern__overlay"></div></a></div>
            <div class="col-md-4 col-xl-3"><a class="thumb-modern" data-lightgallery="item" href="images/image-original-7-1200x800.jpg" data-size="1200x800">
                <figure><img src="images/index-gallery-7-442x332.jpg" alt="" width="442" height="332"/>
                </figure>
                <div class="thumb-modern__overlay"></div></a></div>
            <div class="col-md-4 col-xl-3"><a class="thumb-modern" data-lightgallery="item" href="images/image-original-8-1200x800.jpg" data-size="1200x800">
                <figure><img src="images/index-gallery-8-442x332.jpg" alt="" width="442" height="332"/>
                </figure>
                <div class="thumb-modern__overlay"></div></a></div>
          </div>
        </div>
      </section>

      <!-- Page Footer -->
      <footer class="footer-minimal">
        <div class="container"><a class="figure-inline" href="./">
            <figure><img src="images/logo-black-145x33.png" alt="" width="145" height="33"/>
            </figure></a>
          <ul>
            <li class="font-italic">Рожище</li>
            <li class="font-italic">
              <dl class="list-terms-minimal">
                <dt>Графік роботи</dt>
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