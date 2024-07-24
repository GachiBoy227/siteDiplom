<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="utf-8">
    <title>Задания</title>
</head>
<body>
   <?php 
    if($_GET["exit"]){
    setcookie("login",'',strtotime("-30days"));
        setcookie("password",'',strtotime("-30days"));
    header("Location:index.php");
    }
    $sql=mysqli_connect("127.0.0.1","root","kilsnart","sites");
    $queryy=mysqli_query($sql,"select * from users where login='".$_COOKIE['login']."' AND password='".$_COOKIE['password']."'");
     if($datausers=mysqli_fetch_assoc($queryy)){
        if($datausers["status"]=="admin"){
            header("Location:ticher.php");
        }
     }else{
          header("Location:index.php");
     }
    ?>
    <!--=*=*=*=*=*=* Section Header =*=*=*=*=*=*-->
        <header class="header">

            <h1 class="logo"><span>Log</span>otip</h1>

            <nav class="navmenu">
                <a href="">Главная</a>
                <a href="">Новости</a>
                <a href="">Купить</a>
                <a href="">О нас</a>
            </nav>


            <nav class="navmenu">
                <div class="boxImg"></div>
                <a href="main.php?exit=true">Выход</a>
                <a><?php echo($_COOKIE['login']);?></a>
            </nav>

        </header>

        <section id="sidebar">
            
                <button class="menuButton" id="menuButton" onclick="toggleSidebar()"><i class='bx bx-chevron-right'></i></button> 
            
                <nav class="navit">
                    <a href="estimation.php">Оценки</a>
                    <a href="main.php">Задания</a>
                </nav>
            
          
        </section>

          <script src="js/main.js"></script>

<?php
    
    //запрос на задания
$sql=mysqli_connect("127.0.0.1","root","kilsnart","sites");
mysqli_set_charset($sql,"utf8");
    //запрос на пользователя
 $queryuser=mysqli_query($sql,"select * from users where login='{$_COOKIE["login"]}' and password='{$_COOKIE["password"]}'"); 
$getgruppa=mysqli_fetch_assoc($queryuser)["gruppa"];
$queryzadanie=mysqli_query($sql,"select * from zadanie where gruppa='$getgruppa'");

   
  $file=$_FILES["ready_zadanie"];
$dir="files/";

//запись в бд что файл отправлен
if($file&&$_POST["send"]){
    move_uploaded_file($file["tmp_name"],$dir.$file["name"]);
     $query=mysqli_query($sql,"INSERT INTO `results` (`id`, `name_uchenik`, `id_zadanie`, `file`, `status`) VALUES (NULL, '".$_COOKIE["login"]."', '".$_POST["id_zadanie"]."','".$dir.$file["name"]."', 'Завершено');");
    echo "<script>alert('Загружено');</script>";
}

while($getzadanie=mysqli_fetch_assoc($queryzadanie)){
     //запрос на сверку готовых записей
    
    //тут нужно чтобыы мы принимали не завершённые задания определённого ученика
$queryiszadanie=mysqli_query($sql,"SELECT * FROM results where name_uchenik='".$_COOKIE["login"]."' and id_zadanie='".$getzadanie['id']."'");
if(!mysqli_fetch_assoc($queryiszadanie)){
   echo '<div class="container">';
    echo '<h1 class="glavText">'.$getzadanie["data"].'</h1>';
    echo '</div>';
    echo '<div class="containerCenter">
    <div class="tablichka">
    <div class="head_zadanie">
    <p class="zadanie_title">'.$getzadanie["title"].'</p></div>';
    echo '<div class="body_zadanie2">
           <p class="zadanie_text">'.$getzadanie["text"]."</p></div>";
    echo '<div class="body_zadanie">
            <a href="'.$getzadanie["file"].'" download class="download">Загрузить</a>
        </div>';
    
    
    echo ' <div class="footer_zadanie">
        <form class="inputDownlaod" method="POST" enctype="multipart/form-data">
             <input type="file" style="background-color:red" name="ready_zadanie">
             <input type="text" name="id_zadanie" value="'.$getzadanie["id"].'" style="visibility:hidden;">
             <input type="submit" name="send" class="send" style="margin-left:auto;margin-right:auto;margin-top: 20px;">
        </form>
        </div>
         
        </div>
    </div>';
}
}
    ?>

    
   
   
</body>
</html>