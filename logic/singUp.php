<?php
    session_start();
    // require_once 'connect.php';


    // Я только недавно начал изучение PHP, с ООП еще не до конца разобрался. Под закоментированным кодом будет все рабоатет, а с ООП не работает:( Не пойму почему...
    
//     class User {
//        protected $login = "";
//        protected $password = "";
//        protected $confirm = "";
//        protected $email = "";
//        protected $name = "";

//     public function setLogin ($value) {
//         $this->login = $value;
//     }

//         public function getLogin () {
//             return $this->login;
//     }

//     public function setPassword ($value) {
//         $this->password = $value;
//     }

//         public function getPassword () {
//             return $this->password;
//     }

//     public function setConfirm ($value) {
//         $this->confirm = $value;
//     }

//         public function getConfirm () {
//             return $this->confirm;
//     }

//     public function setEmail ($value) {
//         $this->email = $value;
//     }

//         public function getEmail () {
//             return $this->email;
//     }

//     public function setName ($value) {
//         $this->name = $value;
//     }

//         public function getName () {
//             return $this->name;
//     }
        
    
//     }
   
//     $newUser = new User();

//     $newUser->setLogin($_POST['login']);
//     $newUser->setPassword($_POST['password']);
//     $newUser->setConfirm($_POST['confirm']);
//     $newUser->setEmail($_POST['email']);
//     $newUser->setName($_POST['name']);


//     $patternName = '/^[а-яёa-zA-Z]+$/iu';

//     $checkLogin = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$newUser->getLogin()'");

//     if(mysqli_num_rows($checkLogin) > 0) {
//         $response =  [
//             "status" => false,
//             "type" => 1,
//             "message" => 'Такой логин уже существует',
//             "fields" => ['login']
//         ];

//         echo json_encode($response);

//         die();

//     }

//     $errors = [];

//     if($newUser->getLogin() === '' || strlen($newUser->getLogin()) < 6) {
//         $errors[] = 'login';
//     }

//     if($newUser->getPassword() === '' || strlen($newUser->getPassword()) < 6 || !preg_match('/^[a-zA-Z0-9]+$/', $newUser->getPassword())) {
//         $errors[] = 'password';
//     }

//     if($newUser->getConfirm() === '' || $newUser->getPassword() !== $newUser->getConfirm()) {
//         $errors[] = 'confirm';
//     }

//     if($newUser->getEmail() === '' || !filter_var($newUser->getEmail(), FILTER_VALIDATE_EMAIL)) {
//         $errors[] = 'email';
//     }

//     if($newUser->getName() === '' || strlen($newUser->getName()) < 2 || !preg_match($patternName, $newUser->getName())) {
//         $errors[] = 'name';
//     }

//     if(!empty($errors)) {
//         $response =  [
//             "status" => false,
//             "type" => 1,
//             "message" => 'Проверьте правильность ввода данных',
//             "fields" => $errors
//         ];

//         echo json_encode($response);

//         die();
// }
     
    
//         if($newUser->getPassword() === $newUser->getConfirm()) {

//             $newUser->getPassword() = md5($newUser->getPassword());

//             mysqli_query($connect, "INSERT INTO `users` (`id`, `login`, `e-mail`, `password`, `name`) VALUES (NULL, '$newUser->getLogin()', '$newUser->getEmail()', '$newUser->getPassword()', '$newUser->getName()')");
        
//             $response =  [
//                 "status" => true,
//                 "message" => 'Регистрация прошла успешно',
//             ];

//             echo json_encode($response);

//             $user = [
//                 "login" => $newUser->getLogin(),
//                 "password" => $newUser->getPassword(),
//                 "email" => $newUser->getEmail(),
//                 "name" => $newUser->getName()
//                 ];



//                 $file = file_get_contents('db.json');
                
//                 $list = json_decode($file, true);

//                 $list[] = $user;
                
//                 file_put_contents('db.json', json_encode($list));
                 
            
              
                
          
//         } else {
//             $response =  [
//                 "status" => false,
//                 "message" => 'Пароли не совпадают',
//             ];

//             echo json_encode($response);
//         }
    
       
    


    $login = $_POST['login'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];
    $email = $_POST['email'];
    $name = $_POST['name'];

    $patternName = '/^[а-яёa-zA-Z]+$/iu';

    // $checkLogin = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login'");

    // if(mysqli_num_rows($checkLogin) > 0) {
    //     $response =  [
    //         "status" => false,
    //         "type" => 1,
    //         "message" => 'Такой логин уже существует',
    //         "fields" => ['login']
    //     ];

    //     echo json_encode($response);

    //     die();

    // }

    $errors = [];

    if($login === '' || strlen($login) < 6) {
        $errors[] = 'login';
    }

    if($password === '' || strlen($password) < 6 || !preg_match('/^[a-zA-Z0-9]+$/', $password)) {
        $errors[] = 'password';
    }

    if($confirm === '' || $confirm !== $password) {
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

    $password = md5($password);

        $user = [
        "login" => $login,
        "password" => $password,
        "email" => $email,
        "name" => $name
        ];


        $file = file_get_contents('db.json');
        
        $list = json_decode($file, true);

        $list[] = $user;
        
        $postUser = file_put_contents('db.json', json_encode($list));

        if(!empty($postUser)) {
            $response =  [
                        "status" => true,
                        "message" => 'Регистрация прошла успешно',
                    ];
        
                    echo json_encode($response);
        } else {
            $response =  [
                "status" => false,
                "message" => 'Что-то пошло не так...',
            ];

            echo json_encode($response);

        }
     
    
        // if($password === $confirm) {


        //     mysqli_query($connect, "INSERT INTO `users` (`id`, `login`, `e-mail`, `password`, `name`) VALUES (NULL, '$login', '$email', '$password', '$name')");
        
        //     $response =  [
        //         "status" => true,
        //         "message" => 'Регистрация прошла успешно',
        //     ];

        //     echo json_encode($response);

        //     $user = [
        //         "login" => $login,
        //         "password" => $password,
        //         "email" => $email,
        //         "name" => $name
        //         ];



        //         $file = file_get_contents('db.json');
                
        //         $list = json_decode($file, true);

        //         $list[] = $user;
                
        //         file_put_contents('db.json', json_encode($list));
                 
            
              
                
          
        // } else {
        //     $response =  [
        //         "status" => false,
        //         "message" => 'Пароли не совпадают',
        //     ];

        //     echo json_encode($response);
        // }
    
       

?>