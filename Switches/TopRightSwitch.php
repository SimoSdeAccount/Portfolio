<?php
if($GLOBALS['Section'] == "Header")
{
    echo "Billede";
}
else if($GLOBALS['Section'] == "Content") 
{
    echo "<img src='Grafik/laptop.jpg'style='width:150px;height:150px;'/>";
}
?>