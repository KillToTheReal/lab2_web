<?php
        session_start();

        $login= filter_var(trim($_POST['login']),FILTER_SANITIZE_STRING);

        $name= filter_var(trim($_POST['name']),FILTER_SANITIZE_STRING);
        
        $pass= filter_var(trim($_POST['pass']),FILTER_SANITIZE_STRING);
        
        $surname = filter_var(trim($_POST['surname']),FILTER_SANITIZE_STRING);
        
        $passcheck= filter_var(trim($_POST['pass-check']),FILTER_SANITIZE_STRING);


    if($pass === $passcheck)   //Проверка повтора пароля для регистрации
    {
        require_once "../blocks/bd.php";
    
        $status = rand(1,2);
        if($status==1){
            $status = 'Ученик';
        } else {
            $status = 'Учитель';
        }
        $payment = rand(0,1000); //Потому что лень заполнять секретную таблицу руками (Это кол-во внесенных за ремонт денег)

        $pass= md5($pass."lmaokek");

        $mysql->query("INSERT INTO `users`(`name`,`login`,`pass`,`surname`) VALUES ('$name','$login','$pass','$surname')");

        $mysql->query("INSERT INTO `secret`(`amount`,`status`) VALUES ('$payment','$status') ");

        $mysql->close();

        header('Location: ../login.php');

    } else 
    {

        $_SESSION['message'] = 'Пароли не совпадают';
        header('Location: ../regpage.php');
    }
?>
