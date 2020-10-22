<?php

    session_start();

    setcookie('user', $user['name'], time() - 3600,"/");

    setcookie('surname', $user['surname'], time() - 3600,"/");

    unset($_SESSION['money']);

    header('Location: ./login.php');

?>