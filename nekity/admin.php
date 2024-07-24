<html>
<head>
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
<?php
    if($_POST["send"]&&$_POST["log"]&&$_POST["pass"]){
        $sql=mysqli_connect("127.0.0.1","root","","gruzi");//подключение к БД
         mysqli_set_charset($sql,"utf8");//русская кодировка
//        проверка на проффилль админа
        $adm=mysqli_query($sql,"select * from admins where login='{$_POST["log"]}' and password='{$_POST["pass"]}'");
        if(mysqli_fetch_assoc($adm)){
           header("Location:aindex.php?log={$_POST["log"]}&pass={$_POST["pass"]}");
        }else{
            echo("<script>alert('не вверный логин или пароль')</script>");
        }
        
    }
    ?>
  <div class="ss2s">
      <form method="POST" class="ss1s">   
      <div class="s2">
          <h1>Авторизация</h1></div>
    <input type="text" class="rec" placeholder="Логин" name="log">
    <input type="text" class="rec" placeholder="Пароль" name="pass">
    <input type="submit" name="send">
</form></div>
</body>
</html>