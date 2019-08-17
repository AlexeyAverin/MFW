<?php



ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

set_include_path(get_include_path() // Добавляем в переменную по умолчанию пути для поиска классов
                    .PATH_SEPARATOR.'app/ctr'
                    .PATH_SEPARATOR.'app/mdl'
                    .PATH_SEPARATOR.'app/vws');
function __autoload($class){
    require_once($class.'.php');
}

$front = FrontController::getInstance();
$front->route();




echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <title>MFW</title>
        <link rel='stylesheet' type='text/css' href='/css/styles.css'>
    </head>
    <body>

        <header>
            <div class='logotip'>MFW</div>
            <div class='company'>Добрый день!!!</div>
            <div class='menu'>";
echo $front->getNav();
echo "
            </div>
        </header>

        <div class='contents'>
            <div> </div>
        ";

echo $front->getBody();

echo "
        </div>
        <div class='contacts'>
            <div class='contactsItems'>Российская Федерация</div>
            <div class='contactsItems'>+7 (123) 123-12-12</div>
            <div class='contactsItems'>Все права защищены</div>
        </div>
    </body>
</html>";

?>