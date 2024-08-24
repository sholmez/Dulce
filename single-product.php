<?php
require 'core.php';

$db = new Database();
$conn = $db->connect();
$message = ''; // Змінна для повідомлення

// Отримання dish_id з URL
$dish_id = $_GET['id'] ?? null;

// Якщо ID все ще відсутній, перенаправити на головну сторінку
if (!$dish_id) {
  header('Location: index.php');
  exit();
}

// Отримання даних про страву за ID
$dish = $db->getDataById('dishes', $dish_id);

// Отримання коментарів для поточного dish_id
$query = "SELECT * FROM comments WHERE dish_id = :dish_id ORDER BY time DESC";
$stmt = $conn->prepare($query);
$stmt->bindParam(':dish_id', $dish_id);
$stmt->execute();
$comments = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Обробка форми
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['name']) && isset($_POST['message']) && $dish_id) {
    // Збір даних з форми
    $name = $_POST['name'] ?? 'Гість'; // Якщо ім'я не введено, використовувати 'Гість'
    $user_message = $_POST['message'] ?? '';
    $time = date('Y-m-d H:i:s'); // Поточний час

    // SQL запит на вставку
    $query = "INSERT INTO comments (time, name, content, dish_id) VALUES (:time, :name, :content, :dish_id)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':time', $time);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':content', $user_message);
    $stmt->bindParam(':dish_id', $dish_id);

    if ($stmt->execute()) {
        $message = "Коментар успішно залишено!";
        // Перезавантаження сторінки
        echo "<script type='text/javascript'>window.location.href = window.location.href;</script>";
        exit();
    } else {
        $error_info = $stmt->errorInfo();
        $message = "Помилка при залишенні коментаря. Помилка: " . $error_info[2];
    }
}
?>

<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
<head>
    <!-- Site Title-->
    <title>1 продукт</title>
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
    <div style="background: #212121; padding: 10px 0; box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3); clear: both; text-align:center; position: relative; z-index:1;">
        <a href="http://windows.microsoft.com/en-US/internet-explorer/">
            <img src="images/ie8-panel/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today.">
        </a>
    </div>
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
                        <!-- RD Navbar Nav-->
                        <!-- Навігація RD Navbar -->
                        <div class="rd-navbar-nav-wrap">
                            <ul class="rd-navbar-nav">
                                <li class="active"><a href="index.php">Головна</a></li>
                                <li><a href="about.html">Про нас</a></li>
                                <li><a href="menu.html">Меню</a>
                                    <ul class="rd-navbar-dropdown">
                                        <li><a href="menu.html">Меню</a></li>
                                        <li><a href="starters.php">Закуски</a></li>
                                        <li><a href="main-courses.php">Основні страви</a></li>
                                        <li><a href="desserts.php">Десерти</a></li>
                                        <li><a href="drinks.php">Напої</a></li>
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
                                <li><a href="video-post.html">Блог</a></li>
                                <li><a href="single-portfolio.html">Галерея</a></li>
                                <li><a href="contacts.php">Контакти</a></li>
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
                        <li class="active">1 продукт</li>
                    </ul>
                </div>
            </div>
        </section>
        <div class="section-md">
            <div class="container">
                <div class="row row-60 justify-content-sm-center">
                    <div class="col-lg-8 section-divided__main">
                        <section class="section-sm post-single-body">
                            <h4><?php echo $dish['name']; ?></h4>
                            <img src="images/<?php echo $dish['image']; ?>" alt="" width="886" height="668"/>
                            <p><?php echo $dish['description']; ?></p>
                            <ul class="list-inline-sm footer-minimal__list">
                                <li><a class="icon icon-sm icon-gray-4 fa fa-facebook" target="_blank" href="https://www.facebook.com/groups/760975300607643"></a></li>
                                <li><a class="icon icon-sm icon-gray-4 fa fa-youtube" target="_blank" href="https://www.youtube.com/channel/UCJ6nWoNk-sqNNbjbqdR1u1Q"></a></li>
                            </ul>
                        </section>
                        <section class="section-sm">
                            <h5>Залиште відгук</h5>
                            <!-- RD Mailform-->
                            <form class="rd-mailform rd-mailform_style-1 text-left" method="post" action="">
                                <div class="form-wrap">
                                    <input class="form-input" id="contact-name" type="text" name="name" data-constraints="@Required" placeholder="Ваше ім'я" required>
                                    <label class="form-label" for="contact-name"></label>
                                </div>
                                <div class="form-wrap">
                                    <textarea class="form-input" id="contact-message" name="message" data-constraints="@Required" placeholder="Ваше повідомлення" required></textarea>
                                    <label class="form-label" for="contact-message"></label>
                                </div>
                                <button class="button button-gray-light-outline" type="submit"><span>ЗАЛИШИТИ КОМЕНТАР</span></button>
                            </form>
                        </section>
                        <!-- Секція для відображення коментарів -->
                        <section class="section-sm">
                            <h5>Коментарі</h5>
                            <hr style="border: none; height: 2px; background-color: black; margin-bottom: 25px;">
                            <?php if (!empty($comments)): ?>
                                <ul class="list-unstyled">
                                    <?php foreach ($comments as $comment): ?>
                                      <?php $formattedTime = date('d.m.Y H:i', strtotime($comment['time'])); ?>
                                        <li class="mb-3">
                                            <div class="comment">
                                                <div class="comment-header">
                                                    <strong><?php echo htmlspecialchars($comment['name']); ?></strong> <span class="text-muted" style="font-size: 0.5em;"><?= $formattedTime ?></span>
                                                </div>
                                                <div class="comment-body">
                                                    <p style="font-size: 0.75em; color: #000;"><?php echo nl2br(htmlspecialchars($comment['content'])); ?></p>
                                                </div>
                                            </div>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php else: ?>
                                <p>Немає коментарів для цієї страви.</p>
                            <?php endif; ?>
                        </section>
                    </div>
                    <div class="col-lg-4 section-divided__aside section-divided__aside-left">
                        <section class="section-sm section-style-1">
                            <h5>Ціна: ₴<?php echo $dish['price']; ?></h5>
                        </section>
                        <section class="section-sm">
                            <h5>Розмір порції</h5>
                            <p>Вага: <?php echo $dish['size']; ?>гр</p>
                        </section>
                        <section class="section-sm">
                            <h5>Склад</h5>
                            <p><?php echo $dish['composition']; ?></p>
                        </section>
                        <section class="section-sm">
                            <h5>Харчова цінність</h5>
                            <p>Калорій: <?php echo $dish['kkal']; ?></p>
                        </section>

                        <!-- Custom post-->
                        <section class="section-sm">
                            <h5>Вам також може сподобатись:</h5>
                            <ul class="list-md">
                                <li>
                                    <article class="unit flex-sm-row unit-spacing-sm">
                                        <div class="unit-left">
                                            <figure class="figure-inline"><img src="images/aside-single-producy-1-133x100.jpg" alt="" width="133" height="100"/>
                                            </figure>
                                        </div>
                                        <div class="unit-body post-inline"><a class="post-inline__link" href="#">Карпаччо зі свіжою телятиною</a></div>
                                    </article>
                                </li>
                                <li>
                                    <article class="unit flex-sm-row unit-spacing-sm">
                                        <div class="unit-left">
                                            <figure class="figure-inline"><img src="images/aside-single-producy-2-133x100.jpg" alt="" width="133" height="100"/>
                                            </figure>
                                        </div>
                                        <div class="unit-body post-inline"><a class="post-inline__link" href="#">Італійські ароматні оливки</a></div>
                                    </article>
                                </li>
                            </ul>
                        </section>

                    </div>
                </div>
            </div>
        </div>
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