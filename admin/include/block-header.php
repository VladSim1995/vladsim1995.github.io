
<div id="block-header">

<div id="block-header1" >
<h3>���� Bonjour. ������ ����������.</h3>
<p id="link-nav" ><?php echo $_SESSION['urlpage']; ?></p> 
</div>

<div id="block-header2" >
<p align="right"><a href="administrators.php" >��������������</a> | <a href="?logout">�����</a></p>
<p align="right">�� - <span><?php echo $_SESSION['admin_role']; ?></span></p>
</div>

</div>

<div id="left-nav">
<ul>
<li><a href="orders.php">������</a><?php echo $count_str1; ?></li>
<li><a href="tovar.php">�����</a></li>
<li><a href="clients.php">�������</a></li>
<li><a href="news.php">�������</a></li>
</ul>
</div>