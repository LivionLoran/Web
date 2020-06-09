<!DOCTYPE html>
<html>
<head>
    <title>We use <blank>!</title>
</head>
<body>
<?php
//страница для авторизованного пользователя
if (isset($_POST["Sub"]) && isset($_POST["Mes"]))
{
    $link = mysqli_connect("localhost", "root", "Vkontakte13", "productsdb")
    or die("Ошибка " . mysqli_error($link));
    mysqli_set_charset($link, "utf8");

    $query = "SELECT email FROM mails";
    $result = mysqli_query($link, $query);
    $rows = mysqli_num_rows($result);
    $i = 0;

    while ($i < $rows)
    {
        $row = mysqli_fetch_row($result);
        if (mail($row[0], $_POST['Sub'], $_POST['Mes']))
        {
            echo "Успешно отправлено!";
        }
        else
        {
            echo "Произоша ошибка...";
        }
        $i++;
    }
    mysqli_close($link);
}
?>
</body>
</html>