
<!DOCTYPE html>
<html lang=ru-RU>
<head>
    <meta charset="UTF-8"/>
    <title>JMYH-Airlines</title>
    <link href="Main.css" rel="stylesheet" type="text/css"/>
</head>

<body class="body">
<?php
$names = array('Главная', 'Туры', 'Поиск', 'О ситуации в мире', 'Контакты');
if(isset($_GET["active"])) {
    $curr= $_GET["active"];
}
else {
    $curr = 4;
}
?>
<div class="container">
    <div class="subcontainer">
        <article>

            <div class="column">
                <nav>
                    <span class="ntitle">Навигация</span>
                    <?php
                    foreach($names as $key => $nav):
                        ?>
                        <a <?php if ($key == $curr) {
                            echo 'class="current"';
                        }?> class="ref" href="Main.php?active=<?=$key?>"><?=$nav?></a>
                    <?php
                    endforeach;
                    ?>
                    <a class="ref" href="Main.php">Главная</a>
                    <a class="ref" href="Tours.php">Туры</a>
                    <a class="ref" href="Search.php">Поиск</a>
                    <a class="ref" href="Ref.php">О ситуации в мире</a>
                    <a class="ref" href="Contacts.php">Контакты</a>
                </nav>
                <news>
                    <span class="ntitle">Новости</span>
                    <p>«По состоянию на 12.04.2020 в Беларуси проведено более 64 тыс.
                        на коронавирусную инфекцию. Для проведения тестирования задействовано 17 лабораторий.
                        Зарегистрировано 2578 человек с наличием коронавирусной инфекции. У большей части пациентов
                        заболевание протекает в легкой или средней форме. 50 пациентов нуждаются в поддержке аппарата
                        искусственной вентиляции легких. После прохождения лечения выздоровело и выписаны 203 человека.
                        Умерло 26 пациентов с рядом хронических заболеваниями с выявленной коронавирусной инфекцией»,
                        говорится в сообщении в официальном телеграм-канале ведомства.
                        Напомним, по данным на субботу в стране с начала вспышки коронавируса было зарегистрировано
                        2 226 случаев COVID-19. За последние сутки число зараженных коронавирусом в Беларуси увеличилось на 352,
                        три человека умерли, 31 был выписан.</p>
                </news>
            </div>
    </div>
    <footer class="footer">
        <h3>JMYH-Airlines, All rights are protected. 2020</h3>
    </footer>
</div>
</body>
</html>