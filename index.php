<?php
session_start();
StartEventValidering();
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="Styles/bootstrap-4.4.1-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="Styles/PortfolioStyles.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="row">
            <div class="col-sm-12">
                <?php
                include("menu.php");
                ?>
            </div>
        </div>
        <div class="row">
            <div id="LogoContent" class="col-sm-12">
                Logo
            </div>
        </div>
        <div class="row">
            <div id="MainContainer" class="col-sm-8">
                <div id="Main" class="row">
                    <div class="col-sm-12">
                        <div class="PageHeaders" class="row">
                            <div class="col-sm-12">
                                <?php
                                MainHeader();
                                ?>
                            </div>
                        </div>
                        <div class="PageContents" class="row">
                            <div class="col-sm-12">
                                <?php
                                MainContent();
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="RightContainer" class="col-sm-4">
                <div id="TopRight" class="row">
                    <div class="col-sm-12">
                        <div class="PageHeaders" class="row">
                            <div class="col-sm-12">
                            <?php
                            TopRightHeader();
                            ?>
                            </div>
                        </div>
                        <div class="PageContents" class="row">
                            <div class="col-sm-12">
                            <?php
                            TopRightContent();
                            ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="BottomRight" class="row">
                    <div class="col-sm-12">
                        <div class="PageHeaders" class="row">
                            <div class="col-sm-12">
                            <?php
                            BottomRightHeader();
                            ?>
                            </div>
                        </div>
                        <div class="PageContents" class="row">
                            <div class="col-sm-12">
                            <?php
                            BottomRightContent();
                            ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div id="FooterContainer" class="col-sm-12">
                copyright &copy; portfolio
            </div>
        </div>
    </body>
</html>
<?php 
function StartEventValidering() 
{
    if(isset($_POST["loginBtn"]))
    {
        include("FunktionKlasser/LoginBruger.php");
        $loginBruger = new LoginBruger(mysqli_connect("localhost", "root", "", "portfoliodb"), $_POST["loginbrugernavn"], $_POST["loginkodeord"]);
        $_SESSION["LoggedInBruger"] = $loginBruger->login();
    }
    
    if(isset($_POST["logud"]))
    {
        session_destroy();
        session_unset();
        header("Location: index.php");
    }
    
    if(isset($_POST["downloadBirger"]))
    {
        include("FunktionKlasser/Download.php");
        $download = new Download();
        $download->DownloadFil("Projekter/BirgerBolcherV2.zip");
    }
    
    if(isset($_POST["kontaktsubmit"]))
    {
        include("FunktionKlasser/Kontakt.php");
        $kontakt = new Kontakt(mysqli_connect("localhost", "root", "", "portfoliodb"), $_SESSION["LoggedInBruger"], $_POST["kontaktemne"], $_POST["kontaktbesked"]);
        $kontakt->IndsaetBesked();
    }
}
function MainHeader() 
{
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        MainHeaderGets();
    }
    else if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        MainHeaderPosts();
    }
}
function MainContent() 
{
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        MainContentGets();
    }
    else if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        MainContentPosts();
    }
}
function TopRightHeader() 
{
    echo "header";
}
function TopRightContent() 
{
    echo "content";
}
function BottomRightHeader() 
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
function BottomRightContent() 
{
    if(isset($_SESSION["LoggedInBruger"]))
    {
        echo "Du er logget ind som " . $_SESSION["LoggedInBruger"];
        include("LoggedInMenu.php");
    }
    else 
    {
        include("LoginForm.php");
    }
}
function MainHeaderGets() 
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
function MainContentGets()
{
    if(isset($_GET["opret"]))
    {
        $førValideringVærdier = array("", "", "", "", "", "", "");
        $efterValideringErrBeskeder = array("", "", "", "", "", "", "");
        include("OpretBrugerForm.php");
    }
    else if(isset($_GET["om"])) 
    {
        include("Om.php");
    }
    else 
    {
        include("ForsideContent.php");
    }
}
function MainHeaderPosts() 
{
    if(isset($_POST["loginBtn"]) && isset($_SESSION["LoggedInBruger"]))
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
}
function MainContentPosts()
{
    if(isset($_POST["opretBrugerBtn"]))
    {
        include("FunktionKlasser/OpretBruger.php");
        $førValideringVærdier = array($_POST["brugernavn"], $_POST["kodeord"], $_POST["fornavn"], $_POST["efternavn"], $_POST["email"], $_POST["hjemmeside"], $_POST["profil"]);
        $opretBruger = new OpretBruger(mysqli_connect("localhost", "root", "", "portfoliodb"));
        $efterValideringVærdier = $opretBruger->ReturnerEfterValideringVærdier($førValideringVærdier);
        $efterValideringErrBeskeder = $opretBruger->ReturnerEfterValideringErrBeskeder($førValideringVærdier, $efterValideringVærdier);
        $opretBruger->Opret($efterValideringVærdier);
        include("OpretBrugerForm.php");
    }
    else if(isset($_POST["loginBtn"]))
    {
        if(isset($_SESSION["LoggedInBruger"]))
        {
            include("ProjektDownloads.php");
        }
        else 
        {
            echo "Du har indtastet forkert information";
        }
    }
    else if(isset($_POST["projekter"]) && isset($_SESSION["LoggedInBruger"]))
    {
        include("ProjektDownloads.php");
    }
    else if(isset($_POST["redigerform"]) && isset($_SESSION["LoggedInBruger"]))
    {
        include("FunktionKlasser/RedigerBruger.php");
        $modtagBruger = new RedigerBruger(mysqli_connect("localhost", "root", "", "portfoliodb"));
        $modtagBruger->setBrugernavn($_SESSION["LoggedInBruger"]);
        $førValideringVærdier = $modtagBruger->ReturnerBrugerData();
        $efterValideringErrBeskeder = array("", "", "", "", "", "");
        include("RedigerProfilForm.php");
    }
    else if(isset($_POST["redigerBrugerBtn"]) && isset($_SESSION["LoggedInBruger"]))
    {
        include("FunktionKlasser/RedigerBruger.php");
        $redigerBruger = new RedigerBruger(mysqli_connect("localhost", "root", "", "portfoliodb"));
        $redigerBruger->setBrugernavn($_SESSION["LoggedInBruger"]);
        $førValideringVærdier = array($_POST["kodeord"], $_POST["fornavn"], $_POST["efternavn"], $_POST["email"], $_POST["hjemmeside"], $_POST["profil"]);
        $efterValideringVærdier = $redigerBruger->ReturnerEfterValideringVærdier($førValideringVærdier);
        $efterValideringErrBeskeder = $redigerBruger->ReturnerEfterValideringErrBeskeder($førValideringVærdier, $efterValideringVærdier);
        $redigerBruger->Opdater($efterValideringVærdier);
        include("RedigerProfilForm.php");
    }
    else if((isset($_POST["kontaktform"]) && isset($_SESSION["LoggedInBruger"])) || (isset($_POST["kontaktsubmit"]) && isset($_SESSION["LoggedInBruger"])))
    {
        include("KontaktForm.php");
    }
    else if(isset($_POST["logud"]))
    {
        include("ForsideContent.php");
    }
}
?>