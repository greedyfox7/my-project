<?php
    require "db.php";
?>

<?php    if (isset($_SESSION['logged_user'])):?>
<!DOCTYPE html>
<html>
    <head>
        <title>Мини-блог</title>
        <link rel="stylesheet" href="css/myblog.css">
		<link rel="icon" href="https://i.pinimg.com/originals/7d/1d/81/7d1d8104d1460bb020561f06a6522bad.png">
    </head>

    <body>
        <div class="section" id="up">

            <p><h1><input type="button" class="block" onClick="document.getElementById('back').scrollIntoView();"
            style="background: url(https://cdn-icons-png.flaticon.com/512/54/54785.png) no-repeat center/80%;">
            Савельев Денис Сергеевич</h1></p>
            <center>
                <img class="myphoto" src="https://i1.sndcdn.com/artworks-Q3teWRd2pq28zZyk-rEEqcQ-t500x500.jpg">
            </center>
        </div>

        <div class="section">
            <h1>Обо мне</h1>
            <p>
            Привет! Меня зовут <strong> Денис</strong> Я начинал как фотограф с желанием
            рассказывать истории, давать людям новые перспективы и способы увидеть <strong>кошек</strong>.
            Сегодня я писатель, фотограф и видеооператор из <strong>CatsLand</strong>.
            </p>
        </div>

        <div class="section">
            <h1>Мое расписание</h1>
            <table>
                <tr>
                    <th>День</th>
                    <th>Понедельник</th>
                    <th>Вторник</th>
                    <th>Среда</th>
                    <th>Четверг</th>
                    <th>Пятница</th>
                </tr>
                <tr>
                    <td>8:50-16:45</td>
                    <td class ="selectedSt">в университете</td>
                    <td class ="selectedSt">в университете</td>
                    <td class ="selectedSt">в университете</td>
                    <td class ="selectedLu">перекус</td>
                    <td class ="selectedSt">в университете</td>
                </tr>
                <tr>
                    <td>13:30-20:30</td>
                    <td class ="selectedSt">в университете</td>
                    <td class ="selectedLu">перекус</td>
                    <td class ="selectedLu">перекус</td>
                    <td class ="selectedSt">в университете</td>
                    <td class ="selectedLu">перекус</td>
                </tr>
                <tr class="selectedTimeZone">
                    <td>17:00-23:00</td>
                    <td>спать</td>
                    <td>тренировка</td>
                    <td>задание</td>
                    <td>свобода!!!</td>
                    <td>игра с кошками</td>
                </tr>
            </table>
        </div>

        <div class="section">
            <h1>Мой блог содержит</h1>

			<li>Кошек<br /><progress min="0" max="100" value="100"></progress></li>
			<li>HTML<br /><progress min="0" max="100" value="30"></progress></li>
			<li>CSS<br /><progress min="0" max="100" value="13"></progress></li>
			<li>PHP <br /><progress min="0" max="100" value="0.2"></progress></li>

        </div>

        <div class="section">
            <h1>Изображение</h1>
                <li>
                    Загружено: 20 Сентября, 2021
                    <br>Скачать:<a href="source/catmeme.jpg" download>Cat image</a></br>
                </li>
        </div>

        <div class="section">
            <h1><input type="button" class="block" onClick="document.getElementById('up').scrollIntoView();"
            style="background: url(https://cdn-icons-png.flaticon.com/512/25/25223.png) no-repeat center/80%;">
            Видео</h1>
            <iframe src="https://vk.com/video_ext.php?oid=-33621085&id=456239691&hash=e8b5c281a95a943e" width="640" height="360"></iframe>
        </div>
        
        <a href="/" class="back" id="back">Вернуться на главную</a>
    </body>
    
</html>
<?php else: {
    header('Location: /error.php');
}
?>

<?php endif; ?>