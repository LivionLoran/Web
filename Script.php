<!DOCTYPE html>
<html>
<head>
    <title>We use Database!</title>
</head>
<body>
<form  method="POST">
    <input type="text" name="id">
    <a>Введите id(кроме добавления)</a>
    </br>
    <input type="text" name="name">
    <a>Введите имя</a>
    </br>
    <input type="number" name="price" min="0" max="10000">
    <a>Введите цену</a>
    </br>
    <input type="submit" name="add" value="Добавить запись">
    <input type="submit" name="edit" value="Редакировать запись"></br>
    <input type="submit" name="delete" value="Удалить запись">
    <input type="submit" name="update" value="Обновить"> <?php //Обновление страницы для избавления от возможных выводов ошибки/обновления БД ?>
</form></br>

<?php
//Соединение с БД
$link = mysqli_connect("localhost", "root", "Vkontakte13", "productsdb")
or die("Ошибка " . mysqli_error($link));
//Смена кодировки
mysqli_set_charset($link, "utf8");

//Обработка добавления
if (isset($_POST["add"]) && isset($_POST["name"]) && isset($_POST["price"]))
{
    $name = htmlentities(mysqli_real_escape_string($link, $_POST['name']));
    $price = htmlentities(mysqli_real_escape_string($link, $_POST['price']));
    $query = "INSERT INTO products(productname, price) VALUES('$name', $price)";
    $result = mysqli_query($link, $query);
    if (!$result)
    {
        printf('Не добавилось T_T');
    }
}

//Обработка редактирования
if (isset($_POST["edit"]) && isset($_POST["id"]) && isset($_POST["name"]) && isset($_POST["price"]))
{
    $id = $_POST["id"];
    $name = htmlentities(mysqli_real_escape_string($link, $_POST['name']));
    $price = $_POST['price'];
    $query = "UPDATE products SET productname='$name', price=$price WHERE id=$id";
    $result = mysqli_query($link, $query);
    if (!$result)
    {
        printf('Не изменилось T_T');
    }
}

//Обработка удаления
if (isset($_POST["delete"]) && (isset($_POST["id"]) || isset($_POST["name"]) || isset($_POST["price"])))
{
    if (!empty($_POST["id"]))
    {
        $id = $_POST["id"];
        $query = "DELETE FROM products WHERE id=$id";
        $result = mysqli_query($link, $query);
        if (!$result)
        {
            printf('Не изменилось T_T(1)');
        }
    }
    else
    {
        if (!empty($_POST["name"]))
        {
            $name = htmlentities(mysqli_real_escape_string($link, $_POST['name']));
            $query = "DELETE FROM products WHERE productname='$name'";
            $result = mysqli_query($link, $query);
            if (!$result)
            {
                printf('Не изменилось T_T(2)');
            }
        }
        else
        {
            $price = $_POST['price'];
            $query = "DELETE FROM products WHERE price=$price";
            $result = mysqli_query($link, $query);
            if (!$result)
            {
                printf('Не изменилось T_T(3)');
            }
        }
    }
}

//Отрисовка БД таблицей, выполняется всегда
$result = mysqli_query($link, "SELECT * FROM products");
if ($result)
{
    $rows = mysqli_num_rows($result);
    echo "<table border=1px><tr><th>Id</th><th>Товар</th><th>Цена</th></tr>";
    for ($i = 0 ; $i < $rows ; ++$i)
    {
        $row = mysqli_fetch_row($result);
        echo "<tr>";
        for ($j = 0 ; $j < 3 ; ++$j) echo "<td>$row[$j]</td>";
        echo "</tr>";
    }
    echo "</table>";

    // очищаем результат
    mysqli_free_result($result);
}
else
{
    printf("Ow shit, i'm sorry");
}

//Закрытие соединения
mysqli_close($link);
?>
</body>
</html>