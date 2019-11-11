<!DOCTYPE html><html lang="ru"><head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<title>EasySMS24</title>
<meta name="description" content="">
<meta name="author" content="">

<base href="http://easysms24.holding.bz/">
<link href='https://fonts.googleapis.com/css?family=Raleway:300,400,500,700,900' rel='stylesheet' type='text/css'>
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<!--link href="/css/jquery-ui.min.css" rel="stylesheet"-->
<link href="css/bootstrap.min.css" rel="stylesheet">
<!--link href="js/vn-plugin/vn.css" rel="stylesheet"-->
<!--link href="css/animate.min.css" rel="stylesheet"-->
<!--link href="css/owl.carousel.css" rel="stylesheet"-->
<link href="style.css" rel="stylesheet">
<link href="css/responsive-style.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="https://code.jquery.com/ui/1.12.1/themes/start/jquery-ui.css" rel="stylesheet" type="text/css"/><!--Подключаем стили CSS для библиотеки Jquery UI-->
<!--link href="css/colors/theme-color-1.css" rel="stylesheet" id="changeColorScheme"-->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script><![endif]-->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script></head><body>
<!--div id="preloader">
<div class="preloader--spinners">
<div class="preloader--spinner preloader--spinner-1"></div><div class="preloader--spinner preloader--spinner-2"></div></div></div-->
<div id="menu">
<div class="menu--topbar">
<div class="container">
<!--ul class="menu-topbar--social nav navbar-nav hidden-xs">
<li><a href="/#"><i class="fa fa-facebook"></i></a></li><li><a href="/#"><i class="fa fa-twitter"></i></a></li><li><a href="/#"><i class="fa fa-google-plus"></i></a></li><li><a href="/#"><i class="fa fa-rss"></i></a></li></ul-->
<div class="menu-topbar--contact clearfix">
<ul class="nav navbar-nav">
<li><a href="tel:+74993981024"><i class="fa fa-phone"></i>+7 (499) 398-1024</a></li><li><a href="mailto:easysms24@holding.bz"><i class="fa fa-envelope"></i>easysms24@holding.bz</a></li><li></ul>
</div><div class="menu-topbar--btn-group">
<ul class="clearfix">
<?if($auth){?><li><a href="lk"><i class="fa fa-user"></i><span class="hidden-xs">Вы вошли как</span> <b><?=$account[phone];?></b></a> <li><a href="?logout"><i class="fa fa-sign-out"></i> Выйти</a><?}else{?><li><a href="lk"><i class="fa fa-user"></i>Вход / Регистрация</a></li><?}?><li></ul>
</div></div></div><nav id="primaryMenu" class="navbar">
<div class="container">
<div class="primary--logo">
<a href="/"><img src="logo.png" alt="EasySMS24"/></a>
</div><div class="primary--info clearfix">
<!--div class="primary--info-item">
<div class="primary--icon">
<i class="fa fa-headphones"></i>
</div><div class="primary--content">
<p class="count">24/7 Support</p><p>Lorem ipsum dolor</p></div></div--><div class="primary--info-item">
<div class="primary--icon">
<i class="fa fa-check"></i>
</div><div class="primary--content">
<p class="count">Бесплатная интеграция</p><p>При пополнении баланса на 8 000 руб.</p></div></div><div class="primary--info-item">
<div class="primary--icon">
<i class="fa fa-dollar"></i>
</div><div class="primary--content">
<p class="count">Низкие цены</p><p>от 50 до 60 коп. за СМС</p></div></div></div></div></nav>
<nav id="secondaryMenu" class="navbar">
<div class="container">
<div class="secondary-menu--wrapper">
<div class="navbar-header">
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#secondaryNavbar" aria-expanded="false" aria-controls="secondaryNavbar">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<div class="login-btn hidden-lg hidden-md">
<a href="lk" class="btn"><span>Личный кабинет</span></a>
</div></div><div id="secondaryNavbar" class="reset-padding navbar-collapse collapse">
<ul class="secondary-menu-links nav navbar-nav">
<li><a href="/">Главная</a></li>
<li<?/* class="dropdown"*/?>>
<a href="docs"<?/* data-toggle="dropdown"*/?>>Документация<?/*<span class="caret"></span>*/?></a>
<?/*<ul class="dropdown-menu">
<li><a href="docs">Документация</a></li><li><a href="docs/php">Готовая функция для PHP</a></li></ul>*/?>
</li>
<li><a href="partner">Партнёрская программа</a></li>
</li><li><a href="contacts">Контакты</a></li></ul>
<ul class="secondary-menu-links nav navbar-nav navbar-right hidden-xs hidden-sm">
<li><a href="lk" class="btn"><span>Личный кабинет</span></a></li></ul>
</div></div></div></nav>
</div><!--div id="header" class="HeaderAdjust">
<div class="header-slider show-slider-controls">
<div class="header-slider--item bg--overlay bg--img">test

</div>
</div>
</div-->
