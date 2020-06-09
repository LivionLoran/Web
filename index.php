<?php
$names = array('Главная', 'Туры', 'Поиск', 'О ситуации в мире', 'Контакты');
$urls = array('Main','Tours','Search','Ref','Contacts');
if(isset($_GET["active"])) {
    $curr= $_GET["active"];
    switch ($curr) {
        case 0:
            $filename="Main.php";
            break;
        case 1:
            $filename="Tours.php";
            break;
        case 2:
            $filename="Search.php";
            break;
        case 3:
            $filename="Ref.php";
            break;
        case 4:
            $filename="Contacts.php";
            break;
    }
    $data=file_get_contents($filename);
    echo $data;
}
else {
    $data=file_get_contents("Default.php");
    echo $data;
}
?>