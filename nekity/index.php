<!DOCTYPE html>
<html lang="en">
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
    <div class="banner-form-agileinfo">
									<h5>Вам нужен <span>Транспорт</span>?</h5>
									<p>Вы можете быстро оставить заявку</p>
                                    <?php
                                    $sql=mysqli_connect("127.0.0.1","root","","gruzi");
                                    mysqli_set_charset($sql,"utf8");
                                    if($_POST["send"]){
                                    if($_POST["name"]&&$_POST["number"]&&$_POST["fromwhere"]&&$_POST["wheree"]){
                                          $application=mysqli_query($sql,"INSERT INTO `application` (`id`, `name`, `nubmer`, `fromwhere`, `wheree`) VALUES (NULL, '{$_POST["name"]}', '{$_POST["number"]}', '{$_POST["fromwhere"]}', '{$_POST["wheree"]}');");
                                    }else{
                                        echo"<script>alert('Не все данные введены');</script>";
                                    }
                                    }
                                  
                                    ?>
									<form method="post">
										<input type="text" class="email" name="name" placeholder="Имя" required="">
										<input type="tel" class="tel" name="number" placeholder="Номер телефона" required="">
										<select class="form-control option-w3ls" name="wheree">
												<option>Откуда</option>
												<option>Бобров</option>
												<option>Воронеж</option>
												<option>Хреновое</option>
												<option>Москва</option>
												<option>Китай</option>
												<option>Япония</option>
										</select>
										<select class="form-control option-w3ls" name="fromwhere">
												<option>Куда</option>
												<option>Бобров</option>
												<option>Воронеж</option>
												<option>Хреновое</option>
												<option>Москва</option>
												<option>Китай</option>
												<option>Япония</option>
										</select>
										<input type="submit" name="send" class="hvr-shutter-in-vertical" value="Отправить">  	
									</form>
								</div>
<div class="slider">
	<div class="callbacks_container">
		<ul class="rslides" id="slider">
			<li>
				<div class="w3layouts-banner-top w3layouts-banner-top1">
					<div class="banner-dott">
					<div class="container">
						<div class="slider-info">
							<div class="col-md-8">
								<h2>Самая лучшая логистическая компания</h2>
								<div class="w3ls-button">
									<a href="#" data-toggle="modal" data-target="#myModal"> Подробнее о транспорте</a>
								</div>
								<div class="bannergrids">
									<div class="col-md-4 grid1">
										<i class="fa fa-truck" aria-hidden="true"></i>
										<p>Наземный транспорт</p>
									</div>
									<div class="col-md-4 grid1">
										<i class="fa fa-ship" aria-hidden="true"></i>
										<p>Морской транспорт</p>
									</div>
									<div class="col-md-4 grid1">
										<i class="fa fa-bus" aria-hidden="true"></i>
										<p>Самая быстрая доставка</p>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="col-md-4">
								
							</div>
						</div>
					</div>
					</div>
				</div>
			</li>
			<li>
				<div class="w3layouts-banner-top">
					<div class="banner-dott">
					<div class="container">
						<div class="slider-info">
							<div class="col-md-8">
								<h2>Самая быстрая доставка в мире</h2>
								<div class="w3ls-button">
									<a href="#" data-toggle="modal" data-target="#myModal"> Подробнее о транспорте</a>
								</div>
								<div class="bannergrids">
									<div class="col-md-4 grid1">
										<i class="fa fa-truck" aria-hidden="true"></i>
										<p>Наземный транспорт</p>
									</div>
									<div class="col-md-4 grid1">
										<i class="fa fa-ship" aria-hidden="true"></i>
										<p>Морской транспорт</p>
									</div>
									<div class="col-md-4 grid1">
										<i class="fa fa-bus" aria-hidden="true"></i>
										<p>Самая быстрая доставка</p>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							</div>
						</div>
					</div>
					</div>
			</li>
			<li>
				<div class="w3layouts-banner-top w3layouts-banner-top3">
					<div class="banner-dott">
					<div class="container">
						<div class="slider-info">
							<div class="col-md-8">
								<h2>Надёжная морская логистика</h2>
								<div class="w3ls-button">
									<a href="#" data-toggle="modal" data-target="#myModal"> Подробнее о транспорте</a>
								</div>
								<div class="bannergrids">
									<div class="col-md-4 grid1">
										<i class="fa fa-truck" aria-hidden="true"></i>
										<p>Наземный транспорт</p>
									</div>
									<div class="col-md-4 grid1">
										<i class="fa fa-ship" aria-hidden="true"></i>
										<p>Морской транспорт</p>
									</div>
									<div class="col-md-4 grid1">
										<i class="fa fa-bus" aria-hidden="true"></i>
										<p>Самая быстрая доставка</p>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							</div>
						</div>
					</div>
					</div>

			</li>
			<li>
				<div class="w3layouts-banner-top w3layouts-banner-top2">
					<div class="banner-dott">
					<div class="container">
						<div class="slider-info">
							<div class="col-md-8">
								<h2>Самая лучшая логистическая компания</h2>
								<div class="w3ls-button">
									<a href="#" data-toggle="modal" data-target="#myModal"> Подробнее о транспорте</a>
								</div>
								<div class="bannergrids">
									<div class="col-md-4 grid1">
										<i class="fa fa-truck" aria-hidden="true"></i>
										<p>Наземный транспорт</p>
									</div>
									<div class="col-md-4 grid1">
										<i class="fa fa-ship" aria-hidden="true"></i>
										<p>Морской транспорт</p>
									</div>
									<div class="col-md-4 grid1">
										<i class="fa fa-bus" aria-hidden="true"></i>
										<p>Самая быстрая доставка</p>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							</div>
						</div>
					</div>
					</div>

			</li>
			
			<li>
				<div class="w3layouts-banner-top w3layouts-banner-top4">
					<div class="banner-dott">
					<div class="container">
						<div class="slider-info">
							<div class="col-md-8">
								<h2>Огромная капитализация</h2>
								<div class="w3ls-button">
									<a href="#" data-toggle="modal" data-target="#myModal"> Подробнее о транспорте</a>
								</div>
								<div class="bannergrids">
									<div class="col-md-4 grid1">
										<i class="fa fa-truck" aria-hidden="true"></i>
										<p>Наземный транспорт</p>
									</div>
									<div class="col-md-4 grid1">
										<i class="fa fa-ship" aria-hidden="true"></i>
										<p>Морской транспорт</p>
									</div>
									<div class="col-md-4 grid1">
										<i class="fa fa-bus" aria-hidden="true"></i>
										<p>Самая быстрая доставка</p>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							</div>
						</div>
					</div>
					</div>

			</li>
		</ul>
	</div>
	<div class="clearfix"></div>
</div>
	<div class="modal video-modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					Информационная панель
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
				</div>
					<div class="modal-body">
						<img src="images/bg3.jpg" alt=" " class="img-responsive" />
						<p>На данный момент на сайте ведётся технические работы.
							<i> Пожалуйста попробуйте позже.</i></p>
					</div>
			</div>
		</div>
	</div>
<div class="banner-bottom">
	<div class="col-md-7 bannerbottomleft">
			<div class="video-grid-single-page-agileits">
				<div data-video="d3q5mRA5djY" id="video"> <img src="images/bg2.jpg" alt="" class="img-responsive" /> </div>
			</div>
	</div>
	<div class="col-md-5 bannerbottomright">
		<h3>Наши преимущества</h3>
		<p>Одни из самых главных наших качеств которые отличают нас от других компаний</p>
		<h4><i class="fa fa-taxi" aria-hidden="true"></i>Скоростная транспорт-логистическая система</h4>
		<h4><i class="fa fa-shield" aria-hidden="true"></i>Быстрый и лучший сервис по защите товаров</h4>
		<h4><i class="fa fa-ticket" aria-hidden="true"></i>Не дорогие цены</h4>
		<h4><i class="fa fa-space-shuttle" aria-hidden="true"></i>Возможность отправлять товар практически любым транспортом</h4>
		<h4><i class="fa fa-truck" aria-hidden="true"></i>Упаковка и хранение</h4>
	</div>
	<div class="clearfix"></div>
</div>
	<div class="team" id="team">
		<div class="container">
		<div class="heading">
			<h3>Наши сотрудники</h3>
		</div>
			<div class="wthree_team_grids">
				<div class="col-md-3 wthree_team_grid">
					<div class="hovereffect">
						<img src="images/team1.jpg" alt=" " class="img-responsive" />
						<div class="overlay">
							<h6>Олег</h6>
							<div class="rotate">
								<p class="group1">
									<a href="#">
										<i class="fa fa-twitter"></i>
									</a>
									<a href="#">
										<i class="fa fa-facebook"></i>
									</a>
								</p>
									<hr>
									<hr>
								<p class="group2">
									<a href="#">
										<i class="fa fa-instagram"></i>
									</a>
									<a href="#">
										<i class="fa fa-dribbble"></i>
									</a>
								</p>
							</div>
						</div>
					</div>
					<h4>Олег</h4>
					<p>Олег</p>
				</div>
				<div class="col-md-3 wthree_team_grid">
					<div class="hovereffect">
						<img src="images/team2.jpg" alt=" " class="img-responsive" />
						<div class="overlay">
							<h6>Капитан</h6>
							<div class="rotate">
								<p class="group1">
									<a href="#">
										<i class="fa fa-twitter"></i>
									</a>
									<a href="#">
										<i class="fa fa-facebook"></i>
									</a>
								</p>
									<hr>
									<hr>
								<p class="group2">
									<a href="#">
										<i class="fa fa-instagram"></i>
									</a>
									<a href="#">
										<i class="fa fa-dribbble"></i>
									</a>
								</p>
							</div>
						</div>
					</div>
					<h4>Каитан</h4>
					<p>Главный по доставке</p>
				</div>
				<div class="col-md-3 wthree_team_grid">
					<div class="hovereffect">
						<img src="images/team3.jpg" alt=" " class="img-responsive" />
						<div class="overlay">
							<h6>Грузчик</h6>
							<div class="rotate">
								<p class="group1">
									<a href="#">
										<i class="fa fa-twitter"></i>
									</a>
									<a href="#">
										<i class="fa fa-facebook"></i>
									</a>
								</p>
									<hr>
									<hr>
								<p class="group2">
									<a href="#">
										<i class="fa fa-instagram"></i>
									</a>
									<a href="#">
										<i class="fa fa-dribbble"></i>
									</a>
								</p>
							</div>
						</div>
					</div>
					<h4>Андрей</h4>
					<p>Логист на складах</p>
				</div>
				<div class="col-md-3 wthree_team_grid">
					<div class="hovereffect">
						<img src="images/team4.jpg" alt=" " class="img-responsive" />
						<div class="overlay">
							<h6>Женщина</h6>
							<div class="rotate">
								<p class="group1">
									<a href="#">
										<i class="fa fa-twitter"></i>
									</a>
									<a href="#">
										<i class="fa fa-facebook"></i>
									</a>
								</p>
									<hr>
									<hr>
								<p class="group2">
									<a href="#">
										<i class="fa fa-instagram"></i>
									</a>
									<a href="#">
										<i class="fa fa-dribbble"></i>
									</a>
								</p>
							</div>
						</div>
					</div>
					<h4>Анна</h4>
					<p>Уборщица</p>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<div class=" col-md-6 clients">
			<h3>Отзывы</h3>
			<section class="slider">
				<div class="flexslider">
					<ul class="slides">
						<li>
								<div class="client">
									<img src="images/t1.jpg" alt="" />
									<h5>Настя</h5>
									<div class="clearfix"> </div>
								</div>
								<p>Самая лучшая и быстрая компания по логистике</p>
								
						</li>
						<li>	
								<div class="client">
								<img src="images/t2.jpg" alt="" />
									<h5>Олег</h5>
									<div class="clearfix"> </div>
								</div>
								<p>Отличная доставка по морю. Мои клиенты получили товар в срок</p>
								
						</li>
						<li>
								<div class="client">
								<img src="images/t3.jpg" alt="" />
									<h5>Кирилл</h5>
									<div class="clearfix"> </div>
								</div>
								<p>Заказал доставку через поезд.Прикольно</p>
								
						</li>
						<li>
								<div class="client">
								<img src="images/t4.jpg" alt="" />
									<h5>Наталья</h5>
									<div class="clearfix"> </div>
								</div>
								<p>С тех пор как компания расширила свои маршруты отправки стало возможно расширить бизнес в других точках </p>
								
						</li>
					</ul>
				</div>
			</section>
</div>
	<div class="col-md-6 services-bottom">
			<div class="col-md-6 agileits_w3layouts_about_counter_left">
				<div class="countericon">
					<i class="fa fa-truck" aria-hidden="true"></i>
				</div>
				<div class="counterinfo">
					<p class="counter">1126</p> 
					<h3>Едениц транспорта</h3>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="col-md-6 agileits_w3layouts_about_counter_left">
				<div class="countericon">
					<i class="fa fa-fighter-jet" aria-hidden="true"></i>
				</div>
				<div class="counterinfo">
					<p class="counter">180</p> 
					<h3>Филиалов</h3>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="clearfix"> </div>
			<div class="col-md-6 agileits_w3layouts_about_counter_left">
				<div class="countericon">
					<i class="fa fa-calendar" aria-hidden="true"></i>
				</div>
				<div class="counterinfo">
					<p class="counter">20</p>
					<h3>Лет сервису</h3>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="col-md-6 agileits_w3layouts_about_counter_left">
				<div class="countericon">
					<i class="fa fa-user" aria-hidden="true"></i>
				</div>
				<div class="counterinfo">
					<p class="counter">+900</p>
					<h3>Довольные клиенты</h3>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="clearfix"> </div>
	</div>
			<div class="clearfix"> </div>
<section class="blog" id="blog">
	<div class="container">
		<div class="heading">
			<h3>Последние Новости </h3>
		</div>
		<div class="blog-grids">
		<div class="col-md-4 blog-grid">
			<a href="#" data-toggle="modal" data-target="#myModal"><img src="images/bg4.jpg" alt="" /></a>
			<h5>Июнь 10,2023</h5>
			<h4><a href="#" data-toggle="modal" data-target="#myModal">Открытие новых путей логистики</a></h4>
			<p> С 17 Июня мы расширяем диапозон логистических маршрутов. Подробности уточнять у менеджеров</p>
			<div class="readmore-w3">
				<a class="readmore" href="#" data-toggle="modal" data-target="#myModal">Открыть</a>
			</div>
		</div>
		<div class="col-md-4 blog-grid">
			<a href="#" data-toggle="modal" data-target="#myModal"><img src="images/bg7.jpg" alt="" /></a>
			<h5>Июль 23,2023</h5>
			<h4><a href="#" data-toggle="modal" data-target="#myModal">Открытие водных путей логистики</a></h4>
			<p>Теперь можно заказывать услуги логистики на другие континенты</p>
			<div class="readmore-w3">
				<a class="readmore" href="#" data-toggle="modal" data-target="#myModal">Открыть</a>
			</div>
		</div>
		<div class="col-md-4 blog-grid">
			<a href="#" data-toggle="modal" data-target="#myModal"><img src="images/bg8.jpg" alt="" /></a>
			<h5>Август 11,2023</h5>
			<h4><a href="#" data-toggle="modal" data-target="#myModal">Железно-дорожный транспорт</a></h4>
			<p>Эксклюзивный договор с нашей копанией-партнёром для доставка товара по Железно-дорожным путям</p>
			<div class="readmore-w3">
				<a class="readmore" href="#" data-toggle="modal" data-target="#myModal">Открыть</a>
			</div>
		</div>
		<div class="clearfix"></div>
		</div>
	</div>
</section>
<footer>
	<div class="agileits-w3layouts-footer">
		<div class="container">
			<div class="col-md-4 w3-agile-grid">
				<h5>Про нас</h5>
				<p>Логистическая компания “Prime Mover” успешно работает с 2005 года. С момента основания мы значительно расширили свои офисы в Москве и Владивостоке. В дополнение к нашим собственным офисам у нас есть партнеры и агенты по всему миру.</p>
				<div class="footer-agileinfo-social">
					<ul>
						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#"><i class="fa fa-rss"></i></a></li>
						<li><a href="https://vk.com/public196025814"><i class="fa fa-vk"></i></a></li>
					</ul>
				</div>
			</div>
			
			<div class="col-md-4 w3-agile-grid">
				<h5>Адресс</h5>
				<div class="w3-address">
					<div class="w3-address-grid">
						<div class="w3-address-left">
							<i class="fa fa-phone" aria-hidden="true"></i>
						</div>
						<div class="w3-address-right">
							<h6>Номер телефона</h6>
							<p>+7 920 444 23 33</p>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="w3-address-grid">
						<div class="w3-address-left">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</div>
						<div class="w3-address-right">
							<h6>Почта</h6>
							<p>Email :<a href="mailto:example@email.com"> hlkles@govvrn.ru</a></p>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="w3-address-grid">
						<div class="w3-address-left">
							<i class="fa fa-map-marker" aria-hidden="true"></i>
						</div>
						<div class="w3-address-right">
							<h6>Адресс</h6>
							<p> 397743, ул. Большая, 44, с. Слобода, Бобровский район, Воронежская область
							</p>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
			</div>
			<div class="col-md-4 w3-agile-grid">
				<h5>Последние обновления</h5>
				<div class="w3ls-post-grids">
					<div class="w3ls-post-grid">
						<div class="w3ls-post-img">
							<a href="#"><img src="images/p1.jpg" alt="" /></a>
						</div>
						<div class="w3ls-post-info">
							<h6><a href="#" data-toggle="modal" data-target="#myModal">Машина отправилась</a></h6>
							<p>Июнь 10,2023</p>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="w3ls-post-grid">
						<div class="w3ls-post-img">
							<a href="#"><img src="images/p2.jpg" alt="" /></a>
						</div>
						<div class="w3ls-post-info">
							<h6><a href="#" data-toggle="modal" data-target="#myModal">Машина отправилась</a></h6>
							<p>Июнь 17,2023</p>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="w3ls-post-grid">
						<div class="w3ls-post-img">
							<a href="#"><img src="images/p3.jpg" alt="" /></a>
						</div>
						<div class="w3ls-post-info">
							<h6><a href="#" data-toggle="modal" data-target="#myModal">Машина отправилась</a></h6>
							<p>Июнь 26,2023</p>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="w3ls-post-grid">
						<div class="w3ls-post-img">
							<a href="#"><img src="images/p1.jpg" alt="" /></a>
						</div>
						<div class="w3ls-post-info">
							<h6><a href="#" data-toggle="modal" data-target="#myModal">Машина вернулась</a></h6>
							<p>Июнь 26,2023</p>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<div class="copyright">
	</div>
</footer>

	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
<script src="js/SmoothScroll.min.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
	<script type="text/javascript">
		$(document).ready(function() {				
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
	<script src="js/responsiveslides.min.js"></script>
	<script>
		$(function () {
			$("#slider").responsiveSlides({
				auto: true,
				pager:false,
				nav: true,
				speed: 1000,
				namespace: "callbacks",
				before: function () {
					$('.events').append("<li>before event fired.</li>");
				},
				after: function () {
					$('.events').append("<li>after event fired.</li>");
				}
			});
		});
	</script>
<script src="js/simplePlayer.js"></script>
			<script>
				$("document").ready(function() {
					$("#video").simplePlayer();
				});
</script>
				<script src="js/waypoints.min.js"></script> 
				<script src="js/counterup.min.js"></script> 
				<script>
					jQuery(document).ready(function( $ ) {
						$('.counter').counterUp({
							delay: 100,
							time: 1000
						});
					});
				</script>
	<script defer src="js/jquery.flexslider.js"></script>
	<script type="text/javascript">
		$(function(){
			SyntaxHighlighter.all();
				});
				$(window).load(function(){
				$('.flexslider').flexslider({
					animation: "slide",
					start: function(slider){
						$('body').removeClass('loading');
					}
			});
		});
	</script>
</body>
</html>