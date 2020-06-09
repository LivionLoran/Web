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