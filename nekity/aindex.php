<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prime Mover</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Transporters web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web Designs" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
    function hideURLbar(){ window.scrollTo(0,1); } </script>
    
    <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="all" />
    
    
    <link rel="stylesheet" href="css/bootstrap.css"> 
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" /> 
    <link rel="stylesheet" href="css/font-awesome.css"> 
    <link rel="stylesheet" type="text/css" href="css/s.css">
    <link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
    </head>
    <body>
    <div class="header">
            <nav class="navbar navbar-default">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <h1><a href="index.php">Prime Mover</a></h1>
                        </div>
                        <div class="top-nav-text">
                            <div class="nav-contact-w3ls"><i class="fa fa-phone" aria-hidden="true"></i><p>+7(920)444 23 33 </p></div> 
                        </div>
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-right">
                                <li><a class="hvr-underline-from-center active" href="index.php">Главная</a></li>
                                <li><a href="services.html" class="hvr-underline-from-center">Сервис</a></li>
                                <li><a href="#team" class="hvr-underline-from-center scroll scroll">Команда</a></li>
                                <li><a href="gallery.html" class="hvr-underline-from-center">Галлерея</a></li>
                                <li><a href="contact.html" class="hvr-underline-from-center">Контакты</a>
                            </ul>
                        </div>
    
                        <div class="clearfix"> </div>	
                    </nav>
        </div>
<!--        принятие и отклонения заявок-->
        <?php
        $sql=mysqli_connect("127.0.0.1","root","","gruzi");//подключение к БД
         mysqli_set_charset($sql,"utf8");//русская кодировка
//        проверка на проффилль админа
        $adm=mysqli_query($sql,"select * from admins where login='{$_GET["log"]}' and password='{$_GET["pass"]}'");
       
        if(!mysqli_fetch_assoc($adm)){
            header("Location:admin.php");
        }
        if($_POST["acces"]&&$_POST["id"]){
        $info=mysqli_fetch_assoc(mysqli_query($sql,"select * from application where id={$_POST["id"]}"));
            if($info){
        $insert=mysqli_query($sql,"INSERT INTO `acessed` (`id`, `name`, `nubmer`, `fromwhere`, `wheree`) VALUES (NULL, '{$info["name"]}', '{$info["nubmer"]}', '{$info["fromwhere"]}', '{$info["wheree"]}');");
        $delete=mysqli_query($sql,"DELETE FROM application WHERE `application`.`id` = {$_POST["id"]}");
            }
            $_POST["id"]=null;
        }
        if($_POST["decline"]&&$_POST["id"]){
        $info=mysqli_fetch_assoc(mysqli_query($sql,"select * from application where id={$_POST["id"]}"));
        if($info){
            $insert=mysqli_query($sql,"INSERT INTO `declined` (`id`, `name`, `nubmer`, `fromwhere`, `wheree`) VALUES (NULL, '{$info["name"]}', '{$info["nubmer"]}', '{$info["fromwhere"]}', '{$info["wheree"]}');");
        $delete=mysqli_query($sql,"DELETE FROM application WHERE `application`.`id` = {$_POST["id"]}");
        }
            $_POST["id"]=null;
        }
        ?>
<!--        принятие и отклонения заявок-->
        
        <div class="osnova" style="background-color: #be9b27">
             <p class="zagal" style="  background-color:#ffb41f;">В ожидании</p>
        <div class="panel" style="background-color: #ffeb3a">
            <?php 
            $application=mysqli_query($sql,"select * from application");
            while($dataapp=mysqli_fetch_assoc($application)){
                echo("<div class='atrib'>
                  <div class='box'>
                <p>{$dataapp["name"]}</p>
                </div>
                  <div class='box'>
                <p>{$dataapp["nubmer"]}</p>
                </div>
                <div class='box'>
                <p>{$dataapp["fromwhere"]}</p>
                </div>
                <div class='box'>
                <p>{$dataapp["wheree"]}</p>
                </div>
              <form method='POST' class='box'>
                <input type='text' style='display:none;' name='id' value='{$dataapp["id"]}'>
                <input type='submit' value='+' id='but' name='acces'>
                <input type='submit' value='-' id='but2' name='decline'>
                </form>
            </div>");
            }
            ?>
            </div>
        </div>
        
        <div class="osnova"  style="background-color: #00945b ;color:rgb(0, 0, 0);">
            <p class="zagal" style="  background-color: green;">Принятые</p>
        <div class="panel" style="background-color: #06ce81">
             <?php 
            $application=mysqli_query($sql,"select * from acessed");
            while($dataapp=mysqli_fetch_assoc($application)){
                echo("<div class='atrib'>
                  <div class='box'>
                <p>{$dataapp["name"]}</p>
                </div>
                  <div class='box'>
                <p>{$dataapp["nubmer"]}</p>
                </div>
                <div class='box'>
                <p>{$dataapp["fromwhere"]}</p>
                </div>
                <div class='box'>
                <p>{$dataapp["wheree"]}</p>
                </div>
            </div>");
            }
            ?>
            </div>
        </div>
        
        
        <div class="osnova" style="background-color: #913131 ;color:rgb(0, 0, 0);">
             <p class="zagal" style="  background-color:darkred;">Отклонённые</p>
        <div class="panel" style="background-color: #ff4848">
             <?php 
            $application=mysqli_query($sql,"select * from declined");
            while($dataapp=mysqli_fetch_assoc($application)){
                echo("<div class='atrib'>
                  <div class='box'>
                <p>{$dataapp["name"]}</p>
                </div>
                  <div class='box'>
                <p>{$dataapp["nubmer"]}</p>
                </div>
                <div class='box'>
                <p>{$dataapp["fromwhere"]}</p>
                </div>
                <div class='box'>
                <p>{$dataapp["wheree"]}</p>
                </div>
            </div>");
            }
            ?>
            </div>
        </div>