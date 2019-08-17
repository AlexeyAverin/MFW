<?php
//Добрый вечер


class UserController implements IController{
    public function helloAction(){
        $fc = FrontController::getInstance();
        // Добавляем
        $params = $fc-> getParams();
        $model = new Model(); //Инициализируем модель
        //$model->name = "Mickey";

        //$model->secondName = "Mouse";        
        $model->name = $params['name'];
        $results = $model->render('../vws/view.php'); // Дергается метод модели, вот вьюха заполни и верни

        $fc->setBody($results);
    }
    public function incomAction(){
        $fc = FrontController::getInstance();
        $fc->setNav("<a href='\'>Выход</a><a href='\user\setting'>Настройка</a><a class='selected' href='\user\incom'>Личный кабинет</a>");

        $model = new Model();
        $model->name = "Somebody"; //"Добрый вечер, Вы в своем личном кабинете!!!";
        $results = $model->render('../vws/viewIncom.php');
        $fc->setBody($results);
    }
    public function logoutAction(){
        $fc = FrontController::getInstance();
        $model = new Model();
        $model->label = "Для регистрации Вам необходимо заполнить регистрационую форму!";

        $results = $model->render('../vws/viewRegistr.php');
        $fc->setBody($results);
    }
}