<?php

session_start();
require_once 'connect.php';

    $login = $_POST['login'];
    $password = $_POST['password'];
    

         $errors = [];

        if($login === '') {
            $errors[] = 'login';
        }

        if($password === '') {
            $errors[] = 'password';
        }

        if(!empty($errors)) {
            $response =  [
                "status" => false,
                "type" => 1,
                "message" => 'Проверьте правильность ввода данных',
                "fields" => $errors
            ];

            echo json_encode($response);

            die();
    }

   

    $password = md5($password);
    $check = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");

    if(mysqli_num_rows($check) > 0) {

        $user = mysqli_fetch_assoc($check);

        $_SESSION['user'] = [
            "id" => $user['id'],
            "name" => $user['name'],
            "email" => $user['email']
        ];

        $response = [
            "status" => true
        ];

        echo json_encode($response);
        

    } else {
        $response = [
            "status" => false,
            "message" => 'Неверный логин или пароль'
        ];


        echo json_encode($response);
    }


?>