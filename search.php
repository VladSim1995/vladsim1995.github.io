<?php
	include("include/db_connect.php");
    include("functions/functions.php");
    session_start();
    include("include/auth_cookie.php");
    $search = clear_string($_GET["q"]);
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
	<title>Поиск -<?php echo $search; ?></title>
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
<?php

    if(strlen($search) >=3 && strlen($search)<64)
    {
        


?>
  <ul id="block-tovar-grid">
   <?php
   
   $num = 4;
   $page = (int)$_GET['page'];
   
   $count = mysql_query("SELECT COUNT(*) FROM table_products WHERE title LIKE '%$search%' AND visible = '1'", $link);
   $temp = mysql_fetch_array($count);
   
   if ($temp[0] > 0)
   {
    $tempcount = $temp[0];
    
    $total = (($tempcount-1)/ $num) +1;
    $total = intval($total);
    
    $page = intval($page);
    
    if(empty($page) or $page < 0) $page =1;
        if($page > $total) $page = $total;
        
    $start = $page * $num - $num;
    $qury_start_num = " LIMIT $start, $num";
   }
   
      if ($temp[0] > 0)
   {
   
	$result = mysql_query("SELECT * FROM table_products WHERE  title LIKE '%$search%' AND visible= '1'  $qury_start_num",$link);
    
    if (mysql_num_rows($result) > 0)
    {
        $row = mysql_fetch_array($result);
        
        do{
           echo '
           <li>
           <div class="block-images-grid">
           <img class="round" src="uploads_images/'.$row["image"].'"/>
           </div>
           <p class="style-title-grid"><a href="">'.$row["title"].'</a></p>
           <ul class="reviews">
           
           </ul>
           <a class="add-cart-style-grid" tid="'.$row["products_id"].'"></a>
           <p class="style-price-grid"><strong>'.$row["price"].'</strong> руб./<strong>'.$row["gramm"].'</strong>гр.</p>
           <div class="mini-features">
           '.$row["mini_description"].'
           </div>
           </li>
           
           ';
            
        }
        
        while($row = mysql_fetch_array($result));
    }
    echo '</ul>';
    if ($page != 1){ $pstr_prev = '<li><a class="pstr-prev" href="search.php?q='.$search.'&?page='.($page - 1).'">&lt;</a></li>';}
if ($page != $total) $pstr_next = '<li><a class="pstr-next" href="search.php?q='.$search.'&page='.($page + 1).'">&gt;</a></li>';


// Формируем ссылки со страницами
if($page - 5 > 0) $page5left = '<li><a href="search.php?q='.$search.'&page='.($page - 5).'">'.($page - 5).'</a></li>';
if($page - 4 > 0) $page4left = '<li><a href="search.php?q='.$search.'&page='.($page - 4).'">'.($page - 4).'</a></li>';
if($page - 3 > 0) $page3left = '<li><a href="search.php?q='.$search.'&page='.($page - 3).'">'.($page - 3).'</a></li>';
if($page - 2 > 0) $page2left = '<li><a href="search.php?q='.$search.'&page='.($page - 2).'">'.($page - 2).'</a></li>';
if($page - 1 > 0) $page1left = '<li><a href="search.php?q='.$search.'&page='.($page - 1).'">'.($page - 1).'</a></li>';

if($page + 5 <= $total) $page5right = '<li><a href="search.php?q='.$search.'&page='.($page + 5).'">'.($page + 5).'</a></li>';
if($page + 4 <= $total) $page4right = '<li><a href="search.php?q='.$search.'&page='.($page + 4).'">'.($page + 4).'</a></li>';
if($page + 3 <= $total) $page3right = '<li><a href="search.php?q='.$search.'&page='.($page + 3).'">'.($page + 3).'</a></li>';
if($page + 2 <= $total) $page2right = '<li><a href="search.php?q='.$search.'&page='.($page + 2).'">'.($page + 2).'</a></li>';
if($page + 1 <= $total) $page1right = '<li><a href="search.php?q='.$search.'&page='.($page + 1).'">'.($page + 1).'</a></li>';


if ($page+5 < $total)
{
    $strtotal = '<li><p class="nav-point">...</p></li><li><a href="search.php?q='.$search.'&page='.$total.'">'.$total.'</a></li>';
}else
{
    $strtotal = ""; 
}

if ($total > 1)
{
    echo '
    <div class="pstrnav">
    <ul>
    ';
    echo $pstr_prev.$page5left.$page4left.$page3left.$page2left.$page1left."<li><a class='pstr-active' href='search.php?q=".$search."&page=".$page."'>".$page."</a></li>".$page1right.$page2right.$page3right.$page4right.$page5right.$strtotal.$pstr_next;
    echo '
    </ul>
    </div>
    ';
        
    }
    }else
    {
        echo '<center id="cen_search">Ничего не найдено!</center>';
    }
    
        }
        else
        {
            echo '<center id="cen_search">Поисковое значение должно быть от 3 до 64 символов!</center>';
        }
    
    ?>
    
</div>

<?php
	include("include/block-footer.php");
?>
</div>

</body>
</html>