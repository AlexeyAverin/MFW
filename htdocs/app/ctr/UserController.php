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
    public function loginAction(){
        $fc = FrontController::getInstance();
        $model = new Model();

        $model->label = "Что бы зайти в личный кабинет необходимо ввести Ваш логин и пароль!";
        $results = $model->render('../vws/viewAuth.php');
        $fc->setBody($results);
    }
    public function registrAction(){
        $fc = FrontController::getInstance();
        $model = new Model();
        $model->label = "Для регистрации Вам необходимо заполнить регистрационую форму!";

        $results = $model->render('../vws/viewRegistr.php');
        $fc->setBody($results);
    }
}