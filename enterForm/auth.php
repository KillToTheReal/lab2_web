<?php
    session_start();
    require_once "../blocks/bd.php";

    $login= filter_var(trim($_POST['login']),FILTER_SANITIZE_STRING);
    $pass= filter_var(trim($_POST['pass']),FILTER_SANITIZE_STRING);

    $pass= md5($pass."lmaokek");

    $name_check = $mysql->query("SELECT `login` FROM `users` WHERE `login`='$login'");

    $pass_check = $mysql->query("SELECT `pass` FROM `users` where `pass`='$pass'");

    if ((mysqli_num_rows($name_check)!=0)AND(mysqli_num_rows($pass_check)!=0)){

        $result = $mysql->query("SELECT * FROM `users` WHERE `login`='$login' AND `pass`='$pass'");

        $user=$result->fetch_assoc();

        $payment1 = $mysql->query("SELECT * FROM `secret` where `id_ref`= '$user[id]' "); //Выборка из секретной таблицы используя ассоциативный массив созданный выше

        $pays=$payment1->fetch_assoc();

        $_SESSION['money'] = $pays['amount']; //Секретные данные в куках не храним

        $_SESSION['status'] = $pays['status']; 

        setcookie('user', $user['name'], time()+3600,"/");

        setcookie('surname', $user['surname'], time()+3600,"/");
        
        header('Location: ../login.php');

    } elseif (mysqli_num_rows($name_check)==0) {

        $_SESSION['message_user'] = 'Такого пользователя не существует';

        header('Location: ../login.php');

    } elseif ((mysqli_num_rows($name_check)!=0)AND( mysqli_num_rows($pass_check)== 0)) {

        $_SESSION['message_user'] = 'Пароль не подходит';

        header('Location: ../login.php');

    }
    $mysql->close();
?>
