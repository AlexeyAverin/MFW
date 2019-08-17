<?php
//Добрый вечер


class IndexController implements IController{
    public function indexAction(){
        $fc = FrontController::getInstance();
        // Добавляем
        //$params = $fc-> getParams();
        $model = new Model(); //Инициализируем модель
        $model->name = "Quest";

        //$model->secondName = "Quest";        
        //$model->$params['name'];
        $results = $model->render('../vws/view.php'); // Дергается метод модели, вот вьюха заполни и верни

        $fc->setBody($results);

        $resultNav = 'Добрый день!!!';
        $fc->setNav($resultNav);
    }

    public function loginAction(){

    }

    public function registrAction(){
        
    }
}