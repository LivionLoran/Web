<!DOCTYPE html>
<html>
<head>
    <title>We use <blank>!</title>
</head>
<body>

<?php
session_start();
if (isset($_POST["exit"]))
{
    unset($_SESSION["login"]);
    session_destroy();
}
?>

<form action="script.php" method="POST">
    <input type="text" name="login" pattern=".{2,}"><a> Введите логин</a></br>
    <input type="text" name="password" pattern=".{5,}"><a> Введите пароль</a></br>
    <input type="submit" name="enter" value="Авторизоваться">
    <input type="submit" name="register" value="Зарегистрироваться">
</form></br>
</body>
</html>
118  script.php
@@ -0,0 +1,118 @@
<!DOCTYPE html>
<html>
<head>
    <title>We use <blank>!</title>
</head>
<body>
<?php
session_start();

//страница для авторизованного пользователя
if (isset($_POST["update"]))
{
    $tmp = $_SESSION['login'];
    echo "<a>Привет, $tmp</a>";
    echo '<form action="Lab6.php" method="POST">';
    echo '<input type="submit" name="exit" value="Не хочешь выйти?">';
    echo '</form></br>';
    echo '<form method="POST">';
    echo '<input type="submit" name="update" value="Обновить">';
    echo '</form></br>';
}

//Авторизация
if (isset($_POST["enter"]))
{
    //Соединение с БД
    $link = mysqli_connect("localhost", "root", "Vkontakte13", "productsdb")
    or die("Ошибка " . mysqli_error($link));
    //Смена кодировки
    mysqli_set_charset($link, "utf8");

    $login = htmlentities(mysqli_real_escape_string($link, $_POST["login"]));
    $password = htmlentities(mysqli_real_escape_string($link, $_POST["password"]));
    $query = "SELECT hash FROM usrdata WHERE login LIKE '$login'";
    $result = mysqli_query($link, $query);
    $rows = mysqli_num_rows($result);
    //Поиск аккаунта с таким логином
    if ($rows == 1)
    {
        $row = mysqli_fetch_row($result);
        //Проверка пароля
        if (password_verify($password, $row[0]))
        {
            printf('Неправильный логин\пароль');
            echo '<form action="Lab6.php" method="POST">';
            echo '<input type="submit" name="exit" value="Назад">';
            echo '</form></br>';
        }
        else
        {
            $_SESSION['login'] = $login;
            $tmp = $_SESSION['login'];
            echo "<a>Привет, $tmp</a>";
            echo '<form action="Lab6.php" method="POST">';
            echo '<input type="submit" name="exit" value="Не хочешь выйти?">';
            echo '</form></br>';
            echo '<form method="POST">';
            echo '<input type="submit" name="update" value="Обновить">';
            echo '</form></br>';
        }
    }
    else
    {
        printf('Логин не найден');
        echo '<form action="Lab6.php" method="POST">';
        echo '<input type="submit" name="exit" value="Назад">';
        echo '</form></br>';
    }
    mysqli_close($link);
}

//Регистрация
if (isset($_POST["register"]))
{
    //Соединение с БД
    $link = mysqli_connect("localhost", "root", "Vkontakte13", "productsdb")
    or die("Ошибка " . mysqli_error($link));
    //Смена кодировки
    mysqli_set_charset($link, "utf8");

    $login = htmlentities(mysqli_real_escape_string($link, $_POST["login"]));
    $password = htmlentities(mysqli_real_escape_string($link, $_POST["password"]));
    $hash = password_hash("rasmuslerdorf", PASSWORD_BCRYPT);
    $query = "SELECT * FROM usrdata WHERE login LIKE '$login'";
    $result = mysqli_query($link, $query);
    $length = mysqli_num_rows($result);
    //Проверка занятости логина
    if ($length == 0)
    {
        $query = "INSERT INTO usrdata(login, password, hash) VALUES('$login', '$password', '$hash')";
        $result = mysqli_query($link, $query);
        //Попытка добавить пользователя в БД
        if (!$result)
        {
            printf('Не добавило в БД T_T');
        }
        else
        {
            $_SESSION['login'] = $login;
            $tmp = $_SESSION['login'];
            echo "<a>Привет, $tmp</a>";
            echo '<form action="Lab6.php" method="POST">';
            echo '<input type="submit" name="exit" value="Не хочешь выйти?">';
            echo '</form></br>';
            echo '<form method="POST">';
            echo '<input type="submit" name="update" value="Обновить">';
            echo '</form></br>';
        }
    }
    else
    {
        printf('Логин занят');
    }
    mysqli_close($link);
}
?>
</body>
</html>