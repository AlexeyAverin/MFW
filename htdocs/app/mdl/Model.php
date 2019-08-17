<?php
//Добрый вечер


class Model{
    public $indexNavOne, $indexNavTwo, $indexNavThree;
    public function render($file){              //Принимает шаблон
        ob_start();                             // Включает буферизацию
        include(dirname(__FILE__).'/'.$file);   // Присоединяем что нужно
        return ob_get_clean();                  // Винимаем из буфера и возращаем
    }

    public function renderNav($file){
        ob_start();
        
 
        $this->indexNavOne = $this->indexNav == 1 ? 'selected' : 'noselect'; 
        $this->indexNavTwo = $this->indexNav == 2 ? 'selected' : 'noselect';
        $this->indexNavThree = $this->indexNav == 3 ? 'selected' : 'noselect';
    
        include(dirname(__FILE__).'/'.$file);

        return ob_get_clean();

    }
}