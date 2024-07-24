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
            header("Location:estimation.php");
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
            
            
        $queryzadanie=mysqli_query($sql,"SELECT * FROM zadanie where gruppa='".$_GET['gruppa']."' order by id desc");
    
while($getzadanie=mysqli_fetch_assoc($queryzadanie)){
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
$queryres=mysqli_query($sql,"SELECT * FROM estimations where name='".$_GET["user"]."' AND id_zadanie='".$getzadanie["id"]."'");
    $esttimation=mysqli_fetch_assoc($queryres)["estimation"];
$esttimation=$esttimation?$esttimation:"Нет оценки";
    echo ' <div class="footer_zadanie">
       <h1 class="glavText">'.$esttimation.'</h1>
        </form>
        </div>
        </div>
    </div>';
}
}
    ?>

    </div>
   
    </div>
   
   
</body>
</html>