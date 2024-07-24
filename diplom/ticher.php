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
        if($datausers["status"]!="admin"){
            header("Location:main.php");
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
if($_POST["setsend"]&&$_POST["settitle"]&&$_POST["setoption"]&&$_FILES["setfile"]&&$_POST["setgroup"]){
    $path="files/";
    if(move_uploaded_file($_FILES["setfile"]["tmp_name"],$path.$_FILES["setfile"]["name"])){
        $path="files/".$_FILES["setfile"]["name"];
      $quer="INSERT INTO `zadanie` (`id`, `title`, `text`, `gruppa`, `file`, `data`) VALUES (NULL, '{$_POST["settitle"]}', '{$_POST["setoption"]}', '{$_POST["setgroup"]}', '$path', CURRENT_TIMESTAMP);";
        mysqli_query($sql,$quer);
    }
}
    ?>
    
<center>
    
        <form method="POST" class="settable" enctype="multipart/form-data">
            <input type="text" class="setgroup" id="setsend" name="setgroup" placeholder="группа">
    <textarea name="settitle" class="settitle" placeholder="Название задания"></textarea>
        <textarea name="setoption" class="setoption" placeholder="Описание задания"></textarea>
	   	<input type="file" name="setfile" class="setfile">         
            <input type="submit" class="send" id="setsend" name="setsend">
            
    </form>
    </center>
    
    
    
    
    <div class="groupstable">
    <div class="groups">
        
<?php
    
    //запрос на задания
$sql=mysqli_connect("127.0.0.1","root","kilsnart","sites");
mysqli_set_charset($sql,"utf8");
    //запрос на пользователя
 $queryuser=mysqli_query($sql,"select * from users where login='{$_COOKIE["login"]}' and password='{$_COOKIE["password"]}'"); 
    $queryGroup=mysqli_query($sql,"SELECT DISTINCT gruppa FROM users");
    while($gruppa=mysqli_fetch_assoc($queryGroup)){
        if($gruppa['gruppa']>=0){
        if($gruppa['gruppa']!=$_GET['gruppa']){
        echo'<a class="group" href="?gruppa='.$gruppa['gruppa'].'">'.$gruppa['gruppa'].'</a>';
        }else{
             echo'<a class="group" id="groupselected" href="?gruppa='.$gruppa['gruppa'].'">'.$gruppa['gruppa'].'</a>';
            }
        
        }
    }
         echo '</div><br>';
        if($_GET['gruppa']){
     $queryuser=mysqli_query($sql,"select * from users where gruppa={$_GET['gruppa']}");
            echo '<div class="groups">';
            while($user=mysqli_fetch_assoc($queryuser)){
            if($user['login']!=$_GET['user']){
            echo'<a class="group" href="?gruppa='.$_GET["gruppa"].'&user='.$user["login"].'">'.$user['family'].' '.$user['name'].' '. $user['father'].'</a>';
            }else{
                 echo'<a class="group" id="groupselected" href="?gruppa='.$_GET["gruppa"].'&user='.$user["login"].'">'.$user['family'].' '.$user['name'].' '. $user['father'].'</a>';
            }
        
        }
            echo '</div><br>';
        }
        
        
        
        
        if($_GET['gruppa']&&$_GET["user"]){     
            //запрос на задания
        //запрос на пользователя
        $queryzadanie=mysqli_query($sql,"select * from zadanie where gruppa='".$_GET['gruppa']."'");
        
            
        //оценивание
        if($_POST["sendocenka"]&&$_POST["estimation"]){
            $querocenka=mysqli_query($sql,"INSERT INTO `estimations` (`id`, `estimation`, `name`, `id_zadanie`) VALUES (NULL, '{$_POST["estimation"]}', '{$_GET["user"]}', '{$_POST["id_zadanie"]}');");
            if($qeurocenka){
                echo("<script>alert('Успешно');</script>");
            }
        }
            
            
        while($getzadanie=mysqli_fetch_assoc($queryzadanie)){
             //запрос на сверку готовых записей
            
            //тут нужно чтобыы мы принимали не завершённые задания определённого ученика
        $queryiszadanie=mysqli_query($sql,"SELECT * FROM results where name_uchenik='".$_GET["user"]."' and id_zadanie='".$getzadanie['id']."'");
        if($datasuczadanie=mysqli_fetch_assoc($queryiszadanie)){
        $queryocenki=mysqli_query($sql,"select * from estimations where name='".$_GET["user"]."' and id_zadanie='".$getzadanie['id']."'");
        $dataocenki=mysqli_fetch_assoc($queryocenki);
        if(!$dataocenki){
           echo '<div class="container">';
            $color=strtotime($getzadanie["data"].'+2 days')>strtotime($datasuczadanie["date"])?"style='color:green'":"style='color:darkred'";
             echo '<h1 class="glavText">Дано:'.$getzadanie["data"].'</h1>';
            echo '<h1 class="glavText"'.$color.'>Сделано:'.$datasuczadanie["date"].'</h1>';
            echo '</div>';
            echo '<div class="containerCenter">
            <div class="tablichka">
            <div class="head_zadanie">
            <p class="zadanie_title">'.$getzadanie["title"].'</p></div>';
            echo '<div class="body_zadanie2">
                   <p class="zadanie_text">'.$getzadanie["text"]."</p></div>";
            echo '<div class="body_zadanie">
                    <a href="'.$datasuczadanie["file"].'" download class="download">Загрузить</a>
                </div>';
            
            //тут нужно изменить под оценки
            echo ' <div class="footer_zadanie">
                <form class="inputDownlaod" method="POST" enctype="multipart/form-data">
                     <input type="text" name="id_zadanie" value="'.$getzadanie["id"].'" style="visibility:hidden;">
                     <h1 style="color:white;margin:auto auto">Оценка:</h1><input type="text" name="estimation" class="ocen">
                     <input type="submit" name="sendocenka" class="send" style="margin-left:auto;margin-right:auto;margin-top: 20px;">
                </form>
                </div>
                 
                </div>
            </div>';
        }
        }
    }
}
    ?>
        </div>
   
    </div>
</body>
</html>