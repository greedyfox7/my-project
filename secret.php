<?php
    require "db.php";
?>

<title>Секрет</title>

<?php    if (isset($_SESSION['logged_user'])):?>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: url(source/secret.jpg) no-repeat;
            background-size: 100%;
        }
        h1{
            font-size: 37px;
            text-align: center;
            color: red;
        }
        a{
            text-decoration: underline dotted blue;
            display: block;
            color: red;
        }
        footer
        {
            position:absolute;
            bottom: 0;
            margin: 0;
            padding:  10px;
            left: 40%;
            font-size: 37px;
        }

    </style>

    <?php    if ($_SESSION['logged_user']->role=='a'):?>
        <h1>
            Секретная страница, только для админов!
            <a href="https://vk.com/catism">Присоединяйся к нам!</a>
        </h1>


    <?php else: ?>
        <h1>У вас недостаточно прав :(</h1>

    <?php endif; ?>

    <footer><a href="/index.php"> Вернуться на главную</footer>

<?php else: {
    header('Location: /error.php');
}
?>

<?php endif; ?>