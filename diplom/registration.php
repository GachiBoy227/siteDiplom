<html>
<head>
    <meta charset="utf-8">
    <title>Вход</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

    <div class="content">
    <form class="input" method="post">
        <h1 >Регистрация</h1>
        <input type="text" name="login" class="inp" required  placeholder="Логин" value="<?php echo $_POST["login"]?>">
        <input type="password" name="password" class="inp" required  placeholder="Пароль" value="<?php echo $_POST["password"]?>">
        <input type="text" name="family" class="inp" required placeholder="Фамилия" value="<?php echo $_POST["family"]?>">
        <input type="text" name="name" class="inp" required placeholder="Имя" value="<?php echo $_POST["name"]?>">
        <input type="text" name="father" class="inp" required placeholder="Отчество" value="<?php echo $_POST["father"]?>">
        <input type="text" name="gruppa" class="inp" required placeholder="Группа" value="<?php echo $_POST["gruppa"]?>">
        <input value="Отправить" type="submit" class="send" name="send">
         <h1>или</h1>
         <a href="index.php" class='link'>Вход</a>
    </form>
       
            <?php 
    $sql=mysqli_connect("127.0.0.1","root","kilsnart","sites");
    mysqli_set_charset($sql,"utf8");

if($_POST["send"]){
    $repeat=mysqli_query($sql,"select * from users where login='{$_POST["login"]}'");
    if(!$_POST["login"]&&!$_POST["password"]&&!$_POST["family"]&&!$_POST["name"]&&!$_POST["father"]&&!$_POST["gruppa"]){
        echo '<p class="message" style="color:darkred;"> Заполни поля</p>'.$_POST["login"];
    }
  if(mysqli_fetch_assoc($repeat)){
       echo '<p class="message" style="color:darkred;">Этот логин уже занят</p>';
  }else{
      $login=$_POST["login"];
      $password=$_POST["password"];
      $family=$_POST["family"];
      $name=$_POST["name"];
      $father=$_POST["father"];
      $gruppa=$_POST["gruppa"];
        $query=mysqli_query($sql,"INSERT INTO `users` (`id`, `login`, `password`, `status`, `family`, `name`, `father`, `gruppa`) VALUES (NULL, '".$login."', '".$password."', 'user', '".$family."', '".$name."', '".$father."', '".$gruppa."')");
      if($query){
          header("Location:index.php?login={$_POST["login"]}&&password={$_POST["password"]}");
      }else{
          echo '<p class="message" style="color:darkred;">Группа цифрами!</p>';
      }
  }
       }
    ?>
    </div>
</body>
</html>