<?php
#Добрый вечер!!!


class FrontController {
    protected $_controller, $_action, $_params, $_body;
    static $_instance;

    public static function getInstance() {
        if (!(self::$_instance instanceof self))
            self::$_instance = new self();
        return self::$_instance;
    }

    

    private function __construct(){
        $request = $_SERVER['REQUEST_URI'];
        $splits = explode('/', trim($request, '/'));
        //Controler 31:06
        $this->_controller = !empty($splits[0]) ? ucfirst($splits[0]).'Controller' : 'IndexController';

        //Action
        $this->_action = !empty($splits[1]) ? $splits[1].'Action' : 'indexAction';

        //Есть ли параметры и их значения
        if (!empty($splits[2])){
            $keys = $values = [];
            for ( $i = 2, $cnt = count($splits); $i < $cnt; $i++ ) {
                if ($i % 2 == 0){ // Четное, ключ параметр

                    $keys[] = $splits[$i];
                }else{ // Значение параметра
                    $values[] = $splits[$i];
                }
            }
            $this->_params = array_combine($keys, $values);
        }
    }

    public function route(){
        if (class_exists($this->getController())){ // Проверка существование класса
            $rc = new ReflectionClass($this->getController()); // Если класс существует, тогда получаем копию его Reflection
            if ($rc->implementsInterface('IController')){ // Реализует данный класс ли интерфейс IController
                if ($rc->hasMethod($this->getAction())){ // Реализован ли метод
                    $controller = $rc->newInstance(); // Создаем экземпляр класса
                    $method = $rc->getMethod($this->getAction()); // Выбираем метод
                    $method->invoke($controller); // Исполни метод на этом самом контролере
                }else{ // Если метод нереализован тогда выбрасываем исключение

                    throw new Exception("Action");
                }
            }else{ // Если интерфейс нереализован тогда выбрасываем исключение
                throw new Exception("Interface");
            }
        }else{ // Если класса нет тогда выбрасываем исключение

            throw new Exception("Controller");
        }
    }

    public function getParams(){
        return $this->_params;
    }

    public function getController(){
        return $this->_controller;
    }

    public function getAction(){
        return $this->_action;
    }

    public function getBody(){
        return $this->_body;
    }

    public function setBody($body){

        $this->_body = $body;
    }
}

?>