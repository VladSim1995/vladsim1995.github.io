<?php
session_start();
if ($_SESSION['auth_admin'] == "yes_auth")
{
if (isset($_GET["logout"]))
    {
        unset($_SESSION['auth_admin']);
        header("Location: login.php");
    }

  $_SESSION['urlpage'] = "<a href='index.php' >Главная</a> \ <a href='tovar.php' >Блюда</a> \ <a>Изменение блюда</a>";
  include("include/functions.php");
  include("include/db_connect.php");
  $id = clear_string($_GET["id"]);
  $action = clear_string($_GET["action"]);
  if (isset($action))
{
   switch ($action) {

	    case 'delete':
     
     if($_SESSION['edit_tovar'] == '1')
     {    
         if (file_exists("../uploads_images/".$_GET["img"]))
        {
          unlink("../uploads_images/".$_GET["img"]);  
        }
                
    }else
    {
        $msgerror = 'У вас нет прав на изменение блюд!';
    }
	    break;

	} 
}
      if ($_POST["submit_save"])
    {
    if($_SESSION['edit_tovar'] == '1')
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
      
      
             if (empty($_POST["upload_image"]))
      {        
      include("actions/upload-image.php");
      unset($_POST["upload_image"]);           
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
      $querynew = "title='{$_POST["form_title"]}',price='{$_POST["form_price"]}',category='$selectbrand',mini_description='{$_POST["form_seo_description"]}',visible='$chk_visible',type='$selectbrand',gramm='{$_POST["form_gramm"]}',category_id='{$_POST["form_category"]}'";
              		$update = mysql_query("UPDATE table_products SET $querynew WHERE products_id = '$id'",$link);
                      
                   
      $_SESSION['message'] = "<p id='form-success'>Блюдо успешно изменено!</p>";
                 

      
}

    
}
else
{
    $msgerror = 'У вас нет прав на изменение блюд!';
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



<?php
	$result = mysql_query("SELECT * FROM table_products WHERE products_id='$id'",$link);
    
If (mysql_num_rows($result) > 0)
{
$row = mysql_fetch_array($result);
do
{

echo ' 
<form enctype="multipart/form-data" method="post">
<ul id="edit-tovar">

<li>
<label>Название блюда</label>
<input type="text" name="form_title" value="'.$row["title"].'"/>
</li>

<li>
<label>Цена</label>
<input type="text" name="form_price" value="'.$row["price"].'" />
</li>
<li>
<label>Вес</label>
<input type="text" name="form_gramm" value="'.$row["gramm"].'"  />
</li>

<li>
<label>Краткое описание</label>
<textarea name="form_seo_description">'.$row["mini_description"].'</textarea>
</li>


<li>
<label>Категория</label>
<select name="form_category" size="10" >
';
    


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
echo '
</select>
</ul>
';

if  (strlen($row["image"]) > 0 && file_exists("../uploads_images/".$row["image"]))
{
$img_path = '../uploads_images/'.$row["image"];
$max_width = 110; 
$max_height = 110; 
 list($width, $height) = getimagesize($img_path); 
$ratioh = $max_height/$height; 
$ratiow = $max_width/$width; 
$ratio = min($ratioh, $ratiow); 
// New dimensions 
$width = intval($ratio*$width); 
$height = intval($ratio*$height); 

echo '
<label class="stylelabel" >Основная картинка</label>
<div id="baseimg">
<img src="'.$img_path.'" width="'.$width.'" height="'.$height.'" />
<a href="edit_product.php?id='.$row["products_id"].'&img='.$row["image"].'&action=delete" ></a>
</div>

';
   
}else
{  
echo '
<label class="stylelabel" >Основная картинка</label>

<div id="baseimg-upload">
<input type="hidden" name="MAX_FILE_SIZE" value="5000000"/>
<input type="file" name="upload_image" />

</div>
';
}
if ($row["visible"] == '1') $checked1= "checked";
echo'
<h3 class="h3title" >Настройки блюда</h3>   
<ul id="chkbox">
<li><input type="checkbox" name="chk_visible" id="chk_visible" '.$checked1.' /><label for="chk_visible" >Показывать блюдо</label></li>
</ul> 


    <p align="right" ><input type="submit" id="submit_form" name="submit_save" value="Сохранить блюдо"/></p>     
</form>
';
}while ($row = mysql_fetch_array($result));
}
?> 




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