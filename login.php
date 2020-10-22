<?php
session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  
    <title>login</title>
    <link rel="stylesheet" href="./css/style.css">
  </head>
  <body>
    <nav class=" navbar navbar-expand-lg navbar-light bg-blue">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse " id="navbarSupportedContent">
              <ul class="navbar-nav justify-content-between align-items-center">
                  <li class="nav-item active">
                      <a class="nav-link" href="index.html" Главная <span class="sr-only">Главная</span> </a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="index2.html">Родителям</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="index3.html">Сведения об организации</a>
                  </li>
                  <li class="nav-item  ">
                      <a class="nav-link " href="login.php"> Личный кабинет </a>
                  </li>
              </ul>
          </div>
      </nav>

    <div class="container mt-4">

      <?php
        if(!isset($_COOKIE['user'])):
      ?>

       <dv class="container mt-4">
        <h1>Форма авторизации</h1>
          <form action="enterForm/auth.php" method="POST">
            <input type="text" class="form-control" name="login" id="login" placeholder="Введите ваш логин">
            <input type="password" class="form-control" name="pass" id="pass" placeholder="Введите ваш пароль">
            <button class="btn btn-success" type="submit"> Авторизоваться</button>
          </form>
            <p> У вас ещё нет аккаунта? <a href="regpage.php"> Зарегистрируйтесь </a> </p>
      <?php 
        if(isset($_SESSION['message_user']))
        {
          echo ' <p class="msg">' . $_SESSION['message_user'] . '</p>';
          unset($_SESSION['message_user']);
        }
      ?>
      <?php else: ?>

        <div class="user-block">
        <div class="user-block-ava">
            <img src="ava 1.png" alt="Здесь должна быть ваша фотография" class="img-fluid">
        </div>
        <div class="user-block-info">

            <div class="user-block-status">Статус:<?php print_r($_SESSION['status'])?></div>
            <div class="user-block-name">Имя пользователя:<?php print_r($_COOKIE['user'])?></div>
            <div class="user-block-adress">Фамилия: <?php print_r($_COOKIE['surname'])?>   </div>
            <div class="user-block-interests">Внесено денег за ремонт: <?php print_r($_SESSION['money'])?></div>
          </div>
        </div>
            <form action="exit.php" method="POST">
              <button class="btn btn-success btn-size" type="submit"> <h4> Выйти из лк</h4> </button>
            </form> </p> 
        <?php 
      endif;
      ?>
    </div>
    <footer>
        <div class="footer-main">
            МОУ СШ №13 г.Волгограда тракторозаводского р-на

            <div class="footer-content">
                <div class="footer-contacts">
                    Контакты:
                    <div class="footer-contacts-less">
                        Телефон приёмной директора: +78005553535
                        <div>Корпоративная почта: 13school4ever@mail.ru</div>
                        <div> Почта директора: svetkamih@gmail.com</div>
                    </div>
                  </div>
                <div class="footer-copy">Никакие права не защищены 2020©</div>
            </div>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>