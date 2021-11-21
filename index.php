<?php
    require "db.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>J4M</title>
        <link rel="stylesheet" href="css/index.css">
        <link rel="icon" href="https://cdn.worldvectorlogo.com/logos/just-for-me.svg">
    </head>

    <body>
        <ul class="menu">
            <li><a href="#">Главная</a></li>
            <li><a href="/miniblog.php">О себе</a></li>
            <li><a href="/guess.php">Разное</a></li>
            <?php if (isset($_SESSION['logged_user'])) : ?>
                <li><a href="/shop.php">Магазин</a></li>
            <?php if ($_SESSION['logged_user']->role == 'a') : ?>
                <li><a href="/secret.php">Секретнная страница!</a></li>
            <?php endif; ?>
            <?php endif; ?>
        </ul>
        
        <marquee class="size-marq" scrollamount="20" direction="down"  behavior="alternate">
            <marquee behavior="alternate" >
                <img src="https://i.gifer.com/origin/51/518532f622d962be53e2e1f8989263a8_w200.gif" class="back">
                Отдам котят!
                <img src="https://i.gifer.com/origin/51/518532f622d962be53e2e1f8989263a8_w200.gif">
            </marquee>
        </marquee>
        <div>
            <?php if (isset($_SESSION['logged_user'])) : ?>
            <footer><a href="/logout.php">Выйти</a></footer>
            <?php else : ?>
            <footer><a href="/login.php">Войти</a></footer>
            <?php endif; ?>
        </div>

    </body>
</html>