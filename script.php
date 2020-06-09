<!DOCTYPE html>
<html>
<head>
    <title>Обработка данных</title>
    <meta charset="utf-8">
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
}
}
$tmpText .= ", ";
$tmpText .= $resText;
$resText = $tmpText;
$tmpText = "";
$resText = ucfirst($resText);
echo "Обратное сообщение: $resText";
}
?>
</body>
</html>