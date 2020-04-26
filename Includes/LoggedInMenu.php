<?php
if($_SESSION["LoggedInBruger"] == null)
{
    header("Location: Nej.php");
}
?>
<form method="POST" action="index.php">
    <nav id="navBar" class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
        <ul class="navbar-nav">
            <li class="nav-item">
                <input class="menuBtns" type="submit" name="forside" value="Forside">
            </li>
            <li class="nav-item">
                <input class="menuBtns" type="submit" name="om" value="Om">
            </li>
            <li class="nav-item">
                <input class="menuBtns" type="submit" name="projekter" value="Projekter" />
            </li>
            <li class="nav-item">
                <input class="menuBtns" type="submit" name="redigerform" value="Rediger" />
            </li>
            <li class="nav-item">
                <input class="menuBtns" type="submit" name="kontaktform" value="Kontakt" />
            </li>
        </ul>
    </nav>
</form>