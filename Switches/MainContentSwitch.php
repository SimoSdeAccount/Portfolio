<?php
if($_SERVER["REQUEST_METHOD"] == "GET")
{
    if ($GLOBALS['Section'] == "Header") 
    {
        if(isset($_GET["opret"]))
        {
            echo "Opret bruger";
        }
        else if(isset($_GET["om"]))
        {
            echo "Om";
        }
        else
        {
            echo "Forside";
        }
    } 
    else if ($GLOBALS['Section'] == "Content")
    {
        if(isset($_GET["opret"]))
        {
            include("Content/OpretBrugerForm.php");
        }
        else if(isset($_GET["om"])) 
        {
            include("Content/Om.php");
        }
        else 
        {
            include("Content/ForsideContent.php");
        }
    }
}

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if($GLOBALS['Section'] == "Header")
    {
        if(isset($_POST["opretBrugerBtn"])) 
        {
            echo "Opret bruger";
        }
        else if(isset($_POST["forside"]))
        {
           echo "Forside";
        }
        else if(isset($_POST["om"])) 
        {
            echo "Om";
        }
        else if(isset($_POST["loginBtn"]) && isset($_SESSION["LoggedInBruger"]))
        {
            echo "Projekter";
        }
        else if(isset($_POST["projekter"]) && isset($_SESSION["LoggedInBruger"]))
        {
            echo "Projekter";
        }
        else if(isset($_POST["redigerform"]) && isset($_SESSION["LoggedInBruger"]))
        {
            echo "Rediger";
        }
        else if((isset($_POST["kontaktform"]) && isset($_SESSION["LoggedInBruger"])) || (isset($_POST["kontaktsubmit"]) && isset($_SESSION["LoggedInBruger"])))
        {
            echo "Kontakt";
        }
        else 
        {
            echo "Forside";
        }
    } 
    else if ($GLOBALS['Section'] == "Content") 
    {
        if(isset($_POST["opretBrugerBtn"]))
        {
            include("Content/OpretBrugerForm.php");
        }
        else if(isset($_POST["loginBtn"]))
        {
            if(isset($_SESSION["LoggedInBruger"]))
            {
                include("Content/ProjektDownloads.php");
            }
            else 
            {
                echo "Du har indtastet forkert information";
            }
        }
        else if(isset($_POST["forside"]))
        {
            include("Content/ForsideContent.php");
        }
        else if(isset($_POST["om"])) 
        {
            include("Content/Om.php");
        }
        else if(isset($_POST["projekter"]) && isset($_SESSION["LoggedInBruger"]))
        {
            include("Content/ProjektDownloads.php");
        }
        else if(isset($_POST["redigerform"]) && isset($_SESSION["LoggedInBruger"]))
        {
            include("Content/RedigerProfilForm.php");
        }
        else if(isset($_POST["redigerBrugerBtn"]) && isset($_SESSION["LoggedInBruger"]))
        {
            include("Content/RedigerProfilForm.php");
        }
        else if((isset($_POST["kontaktform"]) && isset($_SESSION["LoggedInBruger"])) || (isset($_POST["kontaktsubmit"]) && isset($_SESSION["LoggedInBruger"])))
        {
            include("Content/KontaktForm.php");
        }
        else if(isset($_POST["logud"]))
        {
            include("Content/ForsideContent.php");
        }
        else 
        {
            include("Content/ForsideContent.php");
        }
    }
}

