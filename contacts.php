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
<p id="for_cont"><center><h1>Наши контакты!</h1></center></p>
<center>
<div id="footer-address">

<p>ООО"Bonjour", г. Владивосток
<br />
ул. Уборевича 5А </p>
</div>

<div id="footer-phone">
<p>8(984)-189-64-28
<br />
8(984)-212-32-53</p>
</div>

<div id="footer-time">
<p><b>ПН-ПТ</b>: 9:00-23:00
<br />
<b>CБ</b>: 9:00-22:00
</p></div>
</center>
<a href="https://yandex.ru/maps/?um=constructor%3A552c5e85cc5c3e0643d10156c492bccf3553f6d21d3eb84d8ddded606f2d7aad&amp;source=constructorStatic" target="_blank"><img src="https://api-maps.yandex.ru/services/constructor/1.0/static/?um=constructor%3A552c5e85cc5c3e0643d10156c492bccf3553f6d21d3eb84d8ddded606f2d7aad&amp;width=600&amp;height=450&amp;lang=ru_RU" alt="" style="border: 0;" /></a>
</div>
<?php
	include("include/block-footer.php");
?>
</body>
</html>