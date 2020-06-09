<!DOCTYPE html>
<html>
<head>
    <title>Обработка данных</title>
    <meta charset="utf-8">
    <meta charset="UTF-8"/>
</head>
<body>
<header>
    <h1>Результат работы:</h1>
</header>
<?php
if(isset($_POST['send']))
{
$sourceText=$_POST['send'];
echo "Ваше сообщение: $sourceText";
$resText = ".";
$tmpText = "";
$i = 0;
$sLen = strlen($sourceText);
$sourceText = lcfirst($sourceText);
for ($i = 0; $i < $sLen; $i++)
{
    switch($sourceText[$i]) {
        case ' ':
            break;
        case '.':
            break;
        case ',':
            if ($resText !== ".")
            {
                $tmpText .= ", ";
            }
            $tmpText .= $resText;
            $resText = $tmpText;
            $tmpText = "";
            break;
        default:
            $tmpText .= $sourceText[$i];
            <?php
	function yearCal($year)
    {
        $weekDays = array('Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб', 'Вс');
        $months = array('Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь');
        $holidays = file("Holidays.txt");
        $hMax = count($holidays)/3;
        $hNum = 0;
        echo "<header>\n<h1>ТАБЛИЦА $year</h1>\n</header>\n";
        echo "<table border=1>\n";
        for ($month = 1; $month <= 12; $month++)
        {
            if ($month % 4 === 1)
            {
                echo "<tr>\n";
            }

            $firstDay = date('N', mktime(0, 0, 0, $month, 1, $year));
            $daysOfMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);

            echo "<td><table border=1><caption valign=\"top\">";
            echo $months[$month - 1];

            echo "</caption>\n";
            for ($day = 0; $day < 7 ; $day++) {
                echo "<th>$weekDays[$day]</th>";
            }
            echo "<tr>\n";
            for ($day = 1; $day < $firstDay; $day++) {
                echo "<td>  </td>";
            }
            for ($day = 1; $day <= $daysOfMonth; $day++) {
                if (($day + $firstDay - 1) % 7 === 1)
                {
                    echo "<tr>\n</tr>\n";
                }
                if ($hNum < $hMax && $month == $holidays[$hNum*3+1] && $day == $holidays[$hNum*3]) {
                    echo "<td style=\"color: red\" title=\"";
                    echo $holidays[$hNum*3+2];
                    echo "\"><b>$day</b></td>";
                    $hNum++;
                }
                else{
                    echo "<td>$day</td>";
                }
            }
            echo "</tr>\n";
            echo "</table>\n</td>\n";

            if ($month % 4 === 0)
            {
                echo "</tr>\n";
            }
        }
    }
    $tmpText .= ", ";
	$tmpText .= $resText;
	$resText = $tmpText;
    $tmpText = "";
    $resText = ucfirst($resText);
    echo "Обратное сообщение: $resText";
    }
    echo "</table>\n";
    return 0;
}

if(isset($_POST['send']))
{
    $year=$_POST['send'];
    $saveFile = 'Cal.html';
    ob_start();
    echo "<!DOCTYPE html>\n<html>\n<head>\n<title>Календарь</title>\n<meta charset=\"utf-8\"/>\n</head>\n<body>\n";
    yearCal($year);
    echo "</body>\n</html>";
    $page = ob_get_contents();
    file_put_contents($saveFile, $page);
}
?>
</body>
</html>