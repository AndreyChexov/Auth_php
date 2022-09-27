<?php
    session_start();
    if(!$_SESSION['user']) {
        header('Location: index.php');
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='./css/style.css' rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title><?php echo $_SESSION['user'];?></title>
</head>
<body> 
    <form class='auth_form'>
        <h1>Hello, <?php echo $_SESSION['user']; ?></h1>
        <a href="logic/out.php">Выход</a>
    </form>


</body>
</html>