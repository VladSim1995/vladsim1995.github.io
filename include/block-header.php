<div id="block-header">
<div id="header-top-block">
<p align="left" id="block-basket"><img src="../images/backet.png"/><a href="cart.php?action=oneclick">������� �����</a></p>
<?php
	if($_SESSION['auth'] == 'yes_auth')
    {
        echo '<p id="auth-user-info" align="right"><img src="/images/user.png" />������������, '.$_SESSION['auth_name'].'!</p>';
    }
    else
    {
        echo'
        <ul id="header-top-menu">
<li><a class="top-auth" href="">����</a></li>
<li class="two"><a href="registration.php">�����������</a></li>
</ul>
        ';
    }
?>

<div id="block-top-auth">
<form method="post">

<ul id="input-email-pass">

<h3>����</h3>

<p id="message-auth">�������� ����� ��� ������</p>
<li><center><input type="text" id="auth_login" placeholder="����� ��� email" /></center></li>
<li><center><input type="password" id="auth_pass" placeholder="������" /></center></li>


<ul id="list-auth">
<li><input type="checkbox" name="rememberme" id="rememberme" /><label for="rememberme">��������� ����</label></li>
<li><a id="remindpass" href="#">������ ������?</a></li>
</ul>
<p align="right" id="button-auth"><a>����</a></p>
</ul>

</form>

<div id="block-remind">
<h3>��������������<br /> ������</h3>
<p id="message-remind" class="message-remind-success" ></p>
<center><input type="text" id="remind-email" placeholder="��� E-mail" /></center>
<p align="right" id="button-remind" ><a>������</a></p>
<p id="prev-auth">�����</p>

</div>



</div>
</div>
<div id="block-user" >
<ul>
<li><a href="profile.php">�������</a></li>
<li><a id="logout" >�����</a></li>
</ul>
</div>
<img id="img-logo" src="../images/logot.png"/>

<div id="personal-info">
<table id="tab-menu">
<tr>
<td><a href="index.php">�������</a></td>

<td><a href="menu.php">����</a></td>
</tr>
<tr>
<td><a href="contacts.php">��������</a></td>
<td><a href="delivery.php">�������� � ������</a></td>
</tr>
</table>

</div>


<div id="block-search">
<form method="GET" action="search.php?q=">

<input type="text" id="input-search" name="q" placeholder="�����" value="<?php echo $search; ?>" />

<input type="submit" id="button-search" value="�����"/>

</form>
<ul id="result-search"></ul>

</div>

</div>