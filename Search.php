<!DOCTYPE html>
<html lang=ru-RU>
<head>
    <meta charset="UTF-8"/>
    <title>JMYH-Airlines</title>
    <link href="Tours.css" rel="stylesheet" type="text/css"/>
</head>
<body class="body">
<div class="container">
    <div class="subcontainer">
        <article>
            <h1 class="title">Здравствуйте</h1>
            <div class="block">
                <form action="script.php" method="POST">
                    <p>Введите данные<br></p>
                    <p><input type="text" cols="40" rows="15" name="send" pattern="[A-ZА-ЯЁ][a-zа-яё]*(,[ ]*[a-zа-яё]+)*."></p>
                    <p><input type="text" cols="40" rows="15" name="send" pattern="[1-0]+"></p>
                    <p><input type="submit" value="Отправить" name="Отправить">
                        <input type="reset" value="Очистить" name="Очистить"></p>
                </form>
            </div>
        </article>
        <div class="column">
            <nav>
                <span class="ntitle">Навигация</span>
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