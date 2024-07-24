<html>
<head>
    <meta charset="utf-8">
    <title>Вход</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

    
    <div class="content">
    <form class="input" method="post">
        <h1 >Вход</h1>
        <input type="text" name="login" class="inp" value="<?php echo !$_POST["login"]?$_GET["login"]:$_POST["login"]?>" placeholder="Логин" >
        <input type="password" name="password" class="inp" value="<?php echo !$_POST["password"]?$_GET["password"]:$_POST["password"]?>" placeholder="Пароль" >
        <input value="Отправить" type="submit" class="send" name="send">
         <h1>или</h1>
         <a href="registration.php" class='link'>Регистрация</a>
    </form>
       
            <?php 
    $sql=mysqli_connect("127.0.0.1","root","kilsnart","sites");
    mysqli_set_charset($sql,"utf8");
    $query=mysqli_query($sql,"select * from users where login='{$_POST["login"]}' AND password='{$_POST["password"]}'");
    $query2=mysqli_query($sql,"select * from users where login='{$_COOKIE["login"]}' AND password='{$_COOKIE["password"]}'");
    $data=mysqli_fetch_array($query);
    if(mysqli_fetch_lengths($query2)>=1){
     header("Location:main.php");
    }
    if($_POST["send"]){
        if(mysqli_fetch_lengths($query)>=1){
        setcookie("login",$_POST["login"],strtotime("+30days"));
        setcookie("password",$_POST["password"],strtotime("+30days"));
        header("Location:main.php");
        }else{
            echo '<p class="message"> Не верный логин или пароль</p>';
        }
    }
    
    ?>
    </div>
</body>
</html>