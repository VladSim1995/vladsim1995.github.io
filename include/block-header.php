<div id="block-header">
<div id="header-top-block">
<p align="left" id="block-basket"><img src="../images/backet.png"/><a href="cart.php?action=oneclick">Корзина пуста</a></p>
<?php
	if($_SESSION['auth'] == 'yes_auth')
    {
        echo '<p id="auth-user-info" align="right"><img src="/images/user.png" />Здравствуйте, '.$_SESSION['auth_name'].'!</p>';
    }
    else
    {
        echo'
        <ul id="header-top-menu">
<li><a class="top-auth" href="">Вход</a></li>
<li class="two"><a href="registration.php">Регистрация</a></li>
</ul>
        ';
    }
?>

<div id="block-top-auth">
<form method="post">

<ul id="input-email-pass">

<h3>Вход</h3>

<p id="message-auth">Неверный логин или пароль</p>
<li><center><input type="text" id="auth_login" placeholder="Логин или email" /></center></li>
<li><center><input type="password" id="auth_pass" placeholder="Пароль" /></center></li>


<ul id="list-auth">
<li><input type="checkbox" name="rememberme" id="rememberme" /><label for="rememberme">Запомнить меня</label></li>
<li><a id="remindpass" href="#">Забыли пароль?</a></li>
</ul>
<p align="right" id="button-auth"><a>Вход</a></p>
</ul>

</form>

<div id="block-remind">
<h3>Восстановление<br /> пароля</h3>
<p id="message-remind" class="message-remind-success" ></p>
<center><input type="text" id="remind-email" placeholder="Ваш E-mail" /></center>
<p align="right" id="button-remind" ><a>Готово</a></p>
<p id="prev-auth">Назад</p>

</div>



</div>
</div>
<div id="block-user" >
<ul>
<li><a href="profile.php">Профиль</a></li>
<li><a id="logout" >Выход</a></li>
</ul>
</div>
<img id="img-logo" src="../images/logot.png"/>

<div id="personal-info">
<table id="tab-menu">
<tr>
<td><a href="index.php">Главная</a></td>

<td><a href="menu.php">Меню</a></td>
</tr>
<tr>
<td><a href="contacts.php">Контакты</a></td>
<td><a href="delivery.php">Доставка и оплата</a></td>
</tr>
</table>

</div>


<div id="block-search">
<form method="GET" action="search.php?q=">

<input type="text" id="input-search" name="q" placeholder="Поиск" value="<?php echo $search; ?>" />

<input type="submit" id="button-search" value="Поиск"/>

</form>
<ul id="result-search"></ul>

</div>

</div>