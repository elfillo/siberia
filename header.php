<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&display=swap&subset=cyrillic" rel="stylesheet">
    <title>Здоровая Сибирь</title>
    <?php wp_head(); ?>
</head>
<body>
<div class="container">
    <header class="header">
        <div class="header_sub">
            <div class="contacts">
                Телефон реаблитационного центра “Здоровая сибирь” <a href="tel:+73952954321">8(3952)95-43-21</a>
            </div>
            <div class="review">
                <a href="#">Отзывы о реаблитиации</a>
            </div>
            <div class="info">
                <p><a href="/info/">Информация об организации</a></p>
                <div class="social">
                    <a href="#"><img src="<?php echo get_template_directory_uri() ?>/img/icons/fb.png" alt="icon"></a>
                    <a href="#"><img src="<?php echo get_template_directory_uri() ?>/img/icons/inst.png" alt="icon"></a>
                    <a href="#"><img src="<?php echo get_template_directory_uri() ?>/img/icons/whatsapp.png" alt="icon"></a>
                </div>
            </div>
        </div>
        <div class="header_main">
            <a class="logo" href="/"><img src="<?php echo get_template_directory_uri() ?>/img/logo.png" alt="logo"></a>
            <nav class="nav">
                <?php wp_nav_menu(array('theme_location'=>'Header', 'menu_class'=>'main_list') );?>
            </nav>
            <div class="button">
                <div class="btn btn--long btn--bold btn--form">
                    МНЕ НУЖНА ПОМОЩЬ
                </div>
            </div>
            <div class="burger"><span></span><span></span><span></span></div>
        </div>
        <div class="header_mobile"></div>
    </header>

