<?php
if(isset($_POST["loginBtn"]))
{
    include("FunktionKlasser/LoginBruger.php");
    $loginBruger = new LoginBruger(mysqli_connect("localhost", "root", "", "portfoliodb"), $_POST["loginbrugernavn"], $_POST["loginkodeord"]);
    $_SESSION["LoggedInBruger"] = $loginBruger->login();
} 
else if(isset($_POST["logud"]))
{
    session_destroy();
    session_unset();
    header("Location: index.php");
}
else if(isset($_GET["opret"]))
{
    $GLOBALS['førValideringVærdier'] = array("Brugernavn", "Kodeord", "Fornavn", "Efternavn", "Email", "Hjemmeside", "Profil");
    $GLOBALS['efterValideringErrBeskeder'] = array("", "", "", "", "", "", "");
}
else if(isset($_POST["opretBrugerBtn"])) 
{
    include("FunktionKlasser/OpretBruger.php");
    $førValideringVærdier = array($_POST["brugernavn"], $_POST["kodeord"], $_POST["fornavn"], $_POST["efternavn"], $_POST["email"], $_POST["hjemmeside"], $_POST["profil"]);
    $opretBruger = new OpretBruger(mysqli_connect("localhost", "root", "", "portfoliodb"));
    $efterValideringVærdier = $opretBruger->ReturnerEfterValideringVærdier($førValideringVærdier);
    $efterValideringErrBeskeder = $opretBruger->ReturnerEfterValideringErrBeskeder($førValideringVærdier, $efterValideringVærdier);
    $GLOBALS['førValideringVærdier'] = $førValideringVærdier;
    $GLOBALS['efterValideringErrBeskeder'] = $efterValideringErrBeskeder;
    $opretBruger->Opret($efterValideringVærdier);
}
else if(isset($_POST["redigerform"]) && isset($_SESSION["LoggedInBruger"]))
{
    include("FunktionKlasser/RedigerBruger.php");
    $modtagBruger = new RedigerBruger(mysqli_connect("localhost", "root", "", "portfoliodb"));
    $modtagBruger->setBrugernavn($_SESSION["LoggedInBruger"]);
    $førValideringVærdier = $modtagBruger->ReturnerBrugerData();
    $efterValideringErrBeskeder = array("", "", "", "", "", "");
    $GLOBALS['førValideringVærdier'] = $førValideringVærdier;
    $GLOBALS['efterValideringErrBeskeder'] = $efterValideringErrBeskeder;
}
else if(isset($_POST["redigerBrugerBtn"]) && isset($_SESSION["LoggedInBruger"]))
{
    include("FunktionKlasser/RedigerBruger.php");
    $redigerBruger = new RedigerBruger(mysqli_connect("localhost", "root", "", "portfoliodb"));
    $redigerBruger->setBrugernavn($_SESSION["LoggedInBruger"]);
    $førValideringVærdier = array($_POST["kodeord"], $_POST["fornavn"], $_POST["efternavn"], $_POST["email"], $_POST["hjemmeside"], $_POST["profil"]);
    $efterValideringVærdier = $redigerBruger->ReturnerEfterValideringVærdier($førValideringVærdier);
    $efterValideringErrBeskeder = $redigerBruger->ReturnerEfterValideringErrBeskeder($førValideringVærdier, $efterValideringVærdier);
    $GLOBALS['førValideringVærdier'] = $førValideringVærdier;
    $GLOBALS['efterValideringErrBeskeder'] = $efterValideringErrBeskeder;
    $redigerBruger->Opdater($efterValideringVærdier);
}
else if(isset($_POST["kontaktsubmit"]) && isset($_SESSION["LoggedInBruger"]))
{
    include("FunktionKlasser/Kontakt.php");
    $kontakt = new Kontakt(mysqli_connect("localhost", "root", "", "portfoliodb"), $_SESSION["LoggedInBruger"], $_POST["kontaktemne"], $_POST["kontaktbesked"]);
    $kontakt->IndsaetBesked();
}
else if(((isset($_POST["projekter"]) || downloadSet(array("downloadBirger", "downloadDummy1", "downloadDummy2"))) && isset($_SESSION["LoggedInBruger"])) || ((isset($_POST["loginBtn"]) || downloadSet(array("downloadBirger", "downloadDummy1", "downloadDummy2"))) && isset($_SESSION["LoggedInBruger"])))
{
    $downloadSet = false;
    $projektSti = "";
    $projektStier = array("Projekter/BirgerBolcherV2.zip", "Projekter/projektdummy1.zip", "Projekter/projektdummy2.zip");
    $projektPostNames = array("downloadBirger", "downloadDummy1", "downloadDummy2");
    for($i = 0; $i < count($projektPostNames); $i++)
    {
        if(isset($_POST[$projektPostNames[$i]]) && isset($_SESSION["LoggedInBruger"]))
        {
            $downloadSet = true;
            $projektSti = $projektStier[$i];
        }
    }    
    if($downloadSet == true)
    {
        include("FunktionKlasser/Download.php");
        $download = new Download(mysqli_connect("localhost", "root", "", "portfoliodb"));
        $download->setBrugernavn($_SESSION["LoggedInBruger"]);
        $download->setProjektSti($projektSti);
        $download->setProjektStier($projektStier);
        $download->DownloadFil();
    }
}
function downloadSet($projektPostNames = array()) {
    for($i = 0; $i < count($projektPostNames); $i++)
    {
        if(isset($_POST[$projektPostNames[$i]]))
        {
            return true;
        }
    }
}
?>
