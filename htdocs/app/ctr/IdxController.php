<?php
//Добрый вечер


class IdxController implements IController{
    public function idxAction(){
        $fc = FrontController::getInstance();
        // Добавляем
        //$params = $fc-> getParams();
        $model = new Model(); //Инициализируем модель
        $model->name = "Quest";

        //$model->secondName = "Quest";        
        //$model->$params['name'];
        $results = $model->render('../vws/view.php'); // Дергается метод модели, вот вьюха заполни и верни

        //$resultNav = 'Добрый день!!!';
        $fc->setNav("<a href='\idx\\registr'>Регистрация</a><a href='\idx\login'>Вход</a><a class='selected' href='\'>Главная</a>");
        $fc->setBody($results);
    }


    public function loginAction(){
        $fc = FrontController::getInstance();
        $model = new Model();
        $model->label = "Что бы зайти в личный кабинет необходимо ввести Ваш логин и пароль!";
        $results = $model->render('../vws/viewAuth.php');
        $fc->setNav("<a href='\idx\\registr'>Регистрация</a><a class='selected' href='\idx\login'>Вход</a><a href='\'>Главная</a>");
        $fc->setBody($results);
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
        
        $fc->setBody($results);
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