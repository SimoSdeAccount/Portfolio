<?php
if($GLOBALS['Section'] == "Header")
{
    if(isset($_SESSION["LoggedInBruger"]))
    {
        echo "logged in content";
    }
    else 
    {
       echo "Log in";
    }
}

if($GLOBALS['Section'] == "Content")
{
    if(isset($_SESSION["LoggedInBruger"]))
    {
        echo "Du er logget ind som " . $_SESSION["LoggedInBruger"];
        include("Content/LogudForm.php");
    }
    else 
    {
        include("Content/LoginForm.php");
    }
}
?>

