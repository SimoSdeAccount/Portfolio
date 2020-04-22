<?php
if($_SESSION["LoggedInBruger"] == null)
{
    header("Location: Nej.php");
}
?>
<form method="POST" action="index.php">
    <input type="submit" name="projekter" value="Projekter" />
    <input type="submit" name="redigerform" value="Rediger" />
    <input type="submit" name="kontaktform" value="Kontakt" />
    <input type="submit" name="logud" value="Log ud" />
</form>