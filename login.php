<?php
    require "db.php";
?>

<?php
/*регистрация*/
    $data = $_POST;
    if (isset($data['signup']))
    {
        $errors = array();
        if(trim($data['user'] == ''))
        {
            $errors[] = 'Введите логин!';
        }
        if(trim($data['email'] == ''))
        {
            $errors[] = 'Введите почту!';
        }
        if(trim($data['password'] == ''))
        {
            $errors[] = 'Введите пароль!';
        }
        if(R::count('users', "user = ?",array($data['user'])) > 0)
        {
             $errors[] = 'Пользователь с таким логином существует!';
        }
        if(R::count('users', "email = ?",array($data['email'])) > 0)
        {
             $errors[] = 'Пользователь с такой почтой уже существует!';
        }

        if (empty($errors))
        {
            $user = R::dispense('users');
            $user->user=$data["user"];
            $user->email = $data['email'];
            $user->pass=md5($data['password']);
            R::store($user);
            echo '<div style="color:red;text-align:center;font-weight:bold;font-size:20px;background:white;">Успешно зарегистрированы!</div>';
        }
        else
        {
            echo '<div style="color:red;text-align:center;font-weight:bold;font-size:20px;background:white;">'.array_shift($errors).'</div>';
        }
    }
?>

<?php
/*авторизация*/
    $data = $_POST; 
    if (isset($data['signin']))
    {
        $errors = array();
        $user = R::findOne('users', "user = ?",array($data['user']));
        if ($user)
        {
            if (md5($data['password']) == $user->pass)
            {
                $_SESSION['logged_user'] = $user;
            }
            else
            {
                $errors[] = 'Неверный пароль!';
            }
        }
        else
        {
            $errors[] = 'Пользователь не найден!';
        }
        if (empty($errors))
        {
            header('Location: /index.php');
        }
        else
        {
            echo '<div style="color:red;text-align:center;font-weight:bold;font-size:20px;background:white;">'.array_shift($errors).'</div>';
        }
    }
?>

<?php    if (isset($_SESSION['logged_user'])):
    {
        header('Location: /index.php');
    }

?>

<?php else: ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>Авторизация/Регистрация</title>
        <link rel="stylesheet" href="css/index.css">
        <link rel="icon" href="https://cdn.worldvectorlogo.com/logos/just-for-me.svg">

    </head>

    <body>
    <div class="container">
        <div class="login-signup ">
            <h1>Войти</h1>
            <form action="" method="post" autocomplete="off">
                <input type="text" placeholder="Пользователь" class="input-field" name="user">
                <br><br>
                <input type="password" placeholder="Пароль" class="input-field" name="password">
                <br><br>
                <button class="login-button" type="sumbit" name="signin">Войти</button>
            </form>
        </div>

        <div class="login-signup">
            <h1>Регистрация</h1>
            <form action="" method="post" autocomplete="off">
                <input type="text" placeholder="Пользователь" class="input-field" name="user">
                <br><br>
                <input type="email" placeholder="Почта" class="input-field" name="email">
                <br><br>
                <input type="password" placeholder="Пароль" class="input-field" name="password">
                <br><br>
                <button class="signup-button" type="sumbit" name="signup">Зарегистрироваться</button>
            </form>
        </div>
    </div>
    <footer class='help'>  
        Вход для ленивых:  логин - admin ; пароль - admin
        <br>
        <a href="/">Вернуться на главную</a>
    </footer>
    </body>
</html>
<?php endif; ?>