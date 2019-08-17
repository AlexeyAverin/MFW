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

        $fc->setNav("<a href='\idx\\registr'>Регистрация</a><a class='selected' href='\idx\login'>Вход</a><a href='\'>Главная</a>");
    }

    public function authenticateAction(){
        //Метод аутентификации: получает логин, пароль затем проверяет соответствие и переключает на user\goodday
        $fc = FrontController::getInstance();
        $model = new Model();
        if ($_POST['login'] == 'Mickey' && $_POST['passw'] == '777'){
            $model->label = 'Добрый день!!! Добропожаловать!!!';
            $model->name = $_POST['login'];
            $fc->setNav("<a href='\'>Выход</a><a href='\user\setting'>Настройка</a><a class='selected' href='\user\incom'>Личный кабинет</a>");
            $results = $model->render('../vws/viewIncom.php');
        } else {
            $model->label = "Добрый день!!! Повторите!!!";
            $results = $model->render('../vws/viewAuth.php');
        }
        
        $model->indexNav = 3;
        $resultsNav = $model->renderNav('../vws/viewIndexNav.php');
        $fc->setBody($results);
        $fc->setNav($resultNav);
    }
    public function registrAction(){
        $fc = FrontController::getInstance();
        $model = new Model();
        $model->label = "Для регистрации Вам необходимо заполнить регистрационую форму!";
        $results = $model->render('../vws/viewRegistr.php');
        $fc->setNav("<a class='selected' href='\idx\\registr'>Регистрация</a><a href='\idx\login'>Вход</a><a href='\'>Главная</a>");

        $fc->setBody($results);
    }
}