<?php
    require "db.php";
?>

<?php    if (isset($_SESSION['logged_user'])):?>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: url(https://sun9-5.userapi.com/impg/EAs1W7kejBUw-7TNm7wLlVndtNrJSa_BVa_DhQ/QzT_zJroUDw.jpg?size=1920x1080&quality=96&sign=469500a9b10a00e1cd5853f27947ca3d&type=album) no-repeat;
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
        .container
        {
          display: grid;
          background:rgb(100, 100, 100);
          width: 350px;
          height: 300px;
          margin: 3% auto;
          border-radius: 20px;
        }
        .product
        {
          text-align: center;
        }
        .input-field
        {
          box-sizing: border-box;
          font-size: 14px;
          padding: 10px;
          border-radius: 7px;
          width: 250px;

        }
        .login-button{
          box-sizing: border-box;
          color: white;
          font-size: 14px;
          padding: 13px;
          border-radius: 7px;
          border: none;
          width: 250px;
          background-color: rgb(20, 22, 29);
        }

        .login-button:hover {
          background-color: rgb(35, 35, 45);
        }

    </style>

    <?php    if ($_SESSION['logged_user']->role2=='a'):?>

        <!DOCTYPE html>
        <html>
            <head>
                <meta charset="UTF-8"/>
                <title>J4M</title>
                <link rel="icon" href="https://cdn.worldvectorlogo.com/logos/just-for-me.svg">

            </head>

            <body>
            <h1>
            Секретная страница, только для админов!
            <a href="https://vk.com/catism">Присоединяйся к нам!</a>
            </h1>
            <div class="container">
                <div class="product">
                    <h1>Сделать запись о новом товаре</h1>
                    <form action="add_product.php" method="post" autocomplete="off">
                        <input type="text" placeholder="Название товара" class="input-field" name="name">
                        <br><br>
                        <input type="text" placeholder="Цена" class="input-field" name="price">
                        <br><br>
                        <button class="login-button" type="sumbit" name="add_products">Добавить товар в БД</button>
                    </form>
                </div>
            </div>


            <div class="container">
                <div class="product">
                    <h1>Удалить запись о товаре</h1>
                    <form action="add_product.php" method="post" autocomplete="off">
                        <input type="text" placeholder="ID Товара" class="input-field" name="id">
                        <br><br>
                        <button class="login-button" type="sumbit" name="delete_products">Удалить товар</button>
                    </form>
                </div>
            </div>



            </body>
        </html>


    <?php else: ?>
        <h1>У вас недостаточно прав :(</h1>

    <?php endif; ?>

    <footer><a href="/index.php"> Вернуться на главную</footer>

<?php else: {
    header('Location: /error.php');
}
?>

<?php endif; ?>