<?php
    session_start();
    require_once 'connect.php';
    

    $login = $_POST['login'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];
    $email = $_POST['email'];
    $name = $_POST['name'];

    
    $patternName = '/^[а-яёa-zA-Z]+$/iu';

    $checkLogin = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login'");

    if(mysqli_num_rows($checkLogin) > 0) {
        $response =  [
            "status" => false,
            "type" => 1,
            "message" => 'Такой логин уже существует',
            "fields" => ['login']
        ];

        echo json_encode($response);

        die();

    }

    $errors = [];

    if($login === '' || strlen($login) < 6) {
        $errors[] = 'login';
    }

    if($password === '' || strlen($password) < 6 || !preg_match('/^[a-zA-Z0-9]+$/', $password)) {
        $errors[] = 'password';
    }

    if($confirm === '' || $password !== $confirm) {
        $errors[] = 'confirm';
    }

    if($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'email';
    }

    if($name === '' || strlen($name) < 2 || !preg_match($patternName, $name)) {
        $errors[] = 'name';
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
     
       

    
        if($password === $confirm) {

            $password = md5($password);

            mysqli_query($connect, "INSERT INTO `users` (`id`, `login`, `e-mail`, `password`, `name`) VALUES (NULL, '$login', '$email', '$password', '$name')");
        
            $response =  [
                "status" => true,
                "message" => 'Регистрация прошла успешно',
            ];

            echo json_encode($response);
           
                $user = [
                    "login" => $login,
                    "password" => $password,
                    "email" => $email,
                    "name" => $name
                   ];
            
                   $jsonUser = json_encode($user);
            
                   $file = '../users.json';
            
                   $postUser = file_put_contents($file, $jsonUser, FILE_APPEND);
           
            
            
        } else {
            $response =  [
                "status" => false,
                "message" => 'Пароли не совпадают',
            ];

            echo json_encode($response);
        }
    
       
    

?>