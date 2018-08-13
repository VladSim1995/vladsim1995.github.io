<div id="block-category">
    <p id="header-title">Категории блюд</p>

    <ul>
    <?php
	
    $result = mysql_query("SELECT * FROM category", $link);
    
    if (mysql_num_rows($result) >0)
    {
        $row=mysql_fetch_array($result);
        do
        {
            echo'
            <li><a href="view_cat.php?type='.strtolower($row["type"]).'"><img src="images/'.$row["img"].'"/>'.$row["type"].'</a></li>
            ';
        }
        while ($row = mysql_fetch_array($result));
    }
?>
    </ul>
    </div>