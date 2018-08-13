<?php
session_start();
if ($_SESSION['auth_admin'] == "yes_auth")
{
if (isset($_GET["logout"]))
    {
        unset($_SESSION['auth_admin']);
        header("Location: login.php");
    }

  $_SESSION['urlpage'] = "<a href='index.php' >Главная</a> \ <a href='tovar.php' >Блюда</a> \ <a>Добавление блюда</a>";
  include("include/functions.php");
  include("include/db_connect.php");
  
      if ($_POST["submit_add"])
    {
    if($_SESSION['add_tovar'] == '1')
    {
      $error = array();
    
    // Проверка полей
        
       if (!$_POST["form_title"])
      {
         $error[] = "Укажите название блюда";
      }
      
       if (!$_POST["form_price"])
      {
         $error[] = "Укажите цену";
      }
          
       if (!$_POST["form_category"])
      {
         $error[] = "Укажите категорию";         
      }else
      {
       	$result = mysql_query("SELECT * FROM category WHERE id='{$_POST["form_category"]}'",$link);
        $row = mysql_fetch_array($result);
        $selectbrand = $row["type"];

      }
      
 // Проверка чекбоксов
      
       if ($_POST["chk_visible"])
       {
          $chk_visible = "1";
       }else { $chk_visible = "0"; }
                       
      
                                      
       if (count($error))
       {           
            $_SESSION['message'] = "<p id='form-error'>".implode('<br />',$error)."</p>";
            
       }else
       {
                           
              		mysql_query("INSERT INTO table_products(title,price,category,mini_description,visible,type,gramm,category_id)
						VALUES(						
                            '".$_POST["form_title"]."',
                            '".$_POST["form_price"]."',
                            '".$selectbrand."',
                            '".$_POST["form_seo_description"]."',
                            '".$chk_visible."',
                            '".$selectbrand."',
                            '".$_POST["form_gramm"]."',
                            '".$_POST["form_category"]."'               
						)",$link);
                   
      $_SESSION['message'] = "<p id='form-success'>Блюдо успешно добавлено!</p>";
      $id = mysql_insert_id();
                 
       if (empty($_POST["upload_image"]))
      {        
      include("actions/upload-image.php");
      unset($_POST["upload_image"]);           
      } 
      
}

    
 
}
else
{
    $msgerror = 'У вас нет прав на добавление блюд! ';
}
}
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href="css/reset.css" rel="stylesheet" type="text/css" />

    <script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
	<title>Панель управления</title>
</head>

<body background="images/back.png">
<div id="block-body">
<?php
	include("include/block-header.php");
    
?>
<div id="block-content">
<div id="block-parameters">

<p id="title-page">Добавление блюда</p>
</div>
<?php
if (isset($msgerror)) echo '<p id="form-error" align="center">'.$msgerror.'</p>';

		 if(isset($_SESSION['message']))
		{
		echo $_SESSION['message'];
		unset($_SESSION['message']);
		}
        
     if(isset($_SESSION['answer']))
		{
		echo $_SESSION['answer'];
		unset($_SESSION['answer']);
		} 
?>
<form enctype="multipart/form-data" method="post">
<ul id="edit-tovar">

<li>
<label>Название блюда</label>
<input type="text" name="form_title" />
</li>

<li>
<label>Цена</label>
<input type="text" name="form_price"  />
</li>
<li>
<label>Вес</label>
<input type="text" name="form_gramm"  />
</li>

<li>
<label>Краткое описание</label>
<textarea name="form_seo_description"></textarea>
</li>


<li>
<label>Категория</label>
<select name="form_category" size="10" >

<?php
$category = mysql_query("SELECT * FROM category",$link);
    
If (mysql_num_rows($category) > 0)
{
$result_category = mysql_fetch_array($category);
do
{
  
  echo '
  
  <option value="'.$result_category["id"].'" >'.$result_category["type"].'</option>
  
  ';
    
}
 while ($result_category = mysql_fetch_array($category));
}
?> 

</select>
</ul> 
<label class="stylelabel" >Основная картинка</label>

<div id="baseimg-upload">
<input type="hidden" name="MAX_FILE_SIZE" value="5000000"/>
<input type="file" name="upload_image" />

</div>

             
     
<h3 class="h3title" >Настройки блюда</h3>   
<ul id="chkbox">
<li><input type="checkbox" name="chk_visible" id="chk_visible" /><label for="chk_visible" >Показывать блюдо</label></li>
</ul> 


    <p align="right" ><input type="submit" id="submit_form" name="submit_add" value="Добавить блюдо"/></p>     
</form>


</div>
</div>


</body>
</html>
<?php
}else
{
    header("Location: login.php");
}
?>