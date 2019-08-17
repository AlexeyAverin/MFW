<?php
//Добрый вечер


class IdxController implements IController{
    public function idxAction(){
        $fc = FrontController::getInstance();           // Инициализируем FrontController, второй уже раз по этому вернеться его копия (Singleton patern)
        //$params = $fc-> getParams();
        $model = new Model();                           //Инициализируем модель
        $model->label = 'Добрый вечер!!!';
        $model->name = 'Guest';
        $model->indexNav = 1;     

        //$model->$params['name'];
        $results = $model->render('../vws/view.php');   // Дергается метод модели, вот вьюха заполни и верни
        //$resultNav = 'Добрый день!!!';

        $resultsNav = $model->renderNav('../vws/viewIndexNav.php');
        $fc->setBody($results);                         // Возращает FrontController
        $fc->setNav($resultsNav);
    }


    public function loginAction(){
        $fc = FrontController::getInstance();
        $model = new Model();
        $model->label = "Что бы зайти в личный кабинет необходимо ввести Ваш логин и пароль!";
        $model->name = 'Guest';
        $model->indexNav = 2;
        $results = $model->render('../vws/viewAuth.php');
        $resultsNav = $model->renderNav('../vws/viewIndexNav.php');
        $fc->setBody($results);
        $fc->setNav($resultsNav);
    }

    public function authenticateAction(){
        //Метод аутентификации: получает логин, пароль затем проверяет соответствие и переключает на user\goodday
        $fc = FrontController::getInstance();
        $model = new Model();
        if ($_POST['login'] == 'Mickey' && $_POST['passw'] == '777'){
            $model->label = 'Добрый день!!! Добропожаловать!!!';
            $model->name = $_POST['login'];
            $model->indexNav = 1;
            $results = $model->render('../vws/viewIncom.php');
            $resultsNav = $model->renderNav('../vws/viewUserNav.php');
        } else {
            $model->label = "Добрый день!!! Повторите!!!";
            $model->indexNav = 2;
            $results = $model->render('../vws/viewAuth.php');
            $resultsNav = $model->renderNav('../vws/viewIndexNav.php');
        }
        $fc->setBody($results);
        $fc->setNav($resultsNav);
    }
    public function registrAction(){
        $fc = FrontController::getInstance();
        $model = new Model();
        $model->label = "Для регистрации Вам необходимо заполнить регистрационую форму!";
        $model->indexNav = 3;
        $results = $model->render('../vws/viewRegistr.php');
        $resultsNav = $model->renderNav('../vws/viewIndexNav.php');
        $fc->setBody($results);
        $fc->setNav($resultsNav);
    }
}