<?php
//Добрый вечер


class Model{
    public function render($file){ //Принимает шаблон
        ob_start(); // Включает буферизацию
        include(dirname(__FILE__).'/'.$file); // Присоединяем что нужно
        return ob_get_clean(); // Винимаем из буфера и возращаем
    }
}