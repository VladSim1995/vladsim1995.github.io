<?php
	include("include/db_connect.php");
    include("functions/functions.php");
    session_start();
    include("include/auth_cookie.php");
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" charset="windows-1251" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href="css/reset.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="/js/jcarousellite_1.0.1.js"></script>
     <script type="text/javascript" src="/js/shop-script.js"></script>
          <script type="text/javascript" src="/js/jquery.cookie.min.js"></script>
     <script type="text/javascript" src="/js/jquery.form.js"></script>
     <script type="text/javascript" src="/js/jquery.validate.js"></script>
     <script type="text/javascript" src="/js/TextChange.js"></script>
	<title>Кафе "Bonjour"</title>
</head>

<body background="images/back.png">

<div id="block-body">
<?php
	include("include/block-header.php");
?>

<div id="block-slider">
<ul id="slides">

<li class="slide showing"></li>

<li class="slide"></li>

<li class="slide"></li>


</ul>
<script>
var slides = document.querySelectorAll('#slides .slide');
var currentSlide = 0;
var slideInterval = setInterval(nextSlide,2000);

function nextSlide() {
slides[currentSlide].className = 'slide';
currentSlide = (currentSlide+1)%slides.length;
slides[currentSlide].className = 'slide showing';
}
</script>
</div>
<div id="block-right">
<?php
    include("include/block-news.php");
?>
</div>
<div id="block-popular">
<p id="for_cont"><center><h1>Доставка и оплата!</h1></center></p>
<p id="delivery-rools">Доставка в нашем кафе бывает двух видов - самовывоз и доставка курьером. 
Оплата производится только после получения готового заказа! 
При заказе блюд через сайт указывайте правильный номер телефона, на который перезвонит наш менеджер для подтверждения вашего заказа.
</p>
</div>
<?php
	include("include/block-footer.php");
?>
</body>
</html>