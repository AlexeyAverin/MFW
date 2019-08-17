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
        $model = new Model();

        $model->label = '';
        $model->name = "Somebody"; //"Добрый вечер, Вы в своем личном кабинете!!!";
        $model->indexNav = 1;
        $results = $model->render('../vws/viewIncom.php');
        $resultsNav = $model->render('../vws/viewUserNav.php');
        $fc->setBody($results);
        $fc->setNav($resultsNav);
    }

    public function logoutAction(){
        $fc = FrontController::getInstance();
        $model = new Model();
        $model->label = "Для регистрации Вам необходимо заполнить регистрационую форму!";

        $results = $model->render('../vws/viewRegistr.php');
        $fc->setBody($results);
    }
}