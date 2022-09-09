<?php
    session_start();

    if($_SESSION['user']) {
        header('Location: profile.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='css/style.css' rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <title>Авторизация</title>
</head>
<body> 
    <form class='auth_form'>
            <h1 class='auth_title'>Авторизация</h1>
            
            <input type="text" class='auth_input auth_login' placeholder='Логин' name='login'>
            
            <input type="password" class='auth_input auth_password' placeholder='Пароль' name='password'>

            <button type='submit' class='auth_btn'>Войти</button>

            <p>У вас нет аккаунта? - <a href="/registration.php">Зарегистрироваться</a></p>

             <p class='msg none'></p>
    </form>
    
    <script src='js/jquery-3.4.1.min.js'></script>
    <script src='js/index.js'></script>
    
</body>
</html>