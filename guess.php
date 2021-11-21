<?php
    require "db.php";
?>

<?php
if(isset($_POST["submit-number"]))
{
    $number = $_POST["number"];
    $guess = $_POST["guess"];

    if ($guess != '')
    {
        if($guess == $number)
        {
            $message = "Правильный ответ! <br/>Попробуйте отгадать новое число";
            $number= rand(1,99);
        }
        elseif($guess < $number)
        {
            $message = "Ваше число меньше, чем ответ! <br/>Попробуйте число больше";
        }
        elseif($guess > $number)
        {
            $message = "Ваше число больше, чем ответ! <br/>Попробуйте число меньше";
        }

    }
    else{
         $message = "Вы ничего не ввели!";
    }
}
else
{
    $message="Попробуй угадать заданное число!";
    $number= rand(1,99);
}
?>

<?php
if(isset($_POST["submit-quest"]))
{
    if($_POST['question'] != '')
    {
        $var = array("Бесспорно","Предрешено","Никаких сомнений","Определённо да","Можешь быть уверен в этом",
            "Мне кажется — «да»","Вероятнее всего","Хорошие перспективы","Знаки говорят — «да»","Да",
            "Пока не ясно, попробуй снова","Спроси позже", "Лучше не рассказывать", "Сейчас нельзя предсказать","Сконцентрируйся и спроси опять",
            "Даже не думай", "Мой ответ — «нет»", "По моим данным — «нет»", "Перспективы не очень хорошие", "Весьма сомнительно");
        $answer= $var[array_rand($var)];
    }
    else{
        $answer = 'Вопроса нет!';
    }
}
else
{
    $answer="Введи свой вопрос!";
}
?>

<?php    if (isset($_SESSION['logged_user'])):?>
<!DOCTYPE html>
<html>
    <head>
        <title>Разное</title>
        <link rel="stylesheet" href="css/myblog.css">
        <link rel="icon" href="https://st2.depositphotos.com/1435425/6999/v/950/depositphotos_69990255-stock-illustration-numbers-counting-icon-set.jpg">
    </head>
    
    <body>
        <div class="section">
            <h1>Угадайте число в диапазоне от 1 до 99!</h1>
            <form action="" method="POST">
                <div class="text-guess"><?php echo $message;?></div>
                <br>
                <input type="text" name="guess" class="input-t" autocomplete="off">
                <br>
                <input type="hidden" name="number" value="<?php echo $number;?>">
                <button name="submit-number" class="submit">Проверить</button>

            </form>
        </div>

        <div class="section">
            <h1>Магический шар 8</h1>
            <form action="" method="POST">
                <div class="text-guess"><?php echo $answer;?></div>
                <br>
                <input type="text" name="question" class="input-t" autocomplete="off">
                <br>
                <button name="submit-quest" class="submit">Проверить</button>

            </form>
        </div>
        
        <footer> <a class="back" href="/index.php">Bернуться на главную</a> </footer>
    </body>

</html>
<?php else: {
    header('Location: /error.php');
}
?>

<?php endif; ?>