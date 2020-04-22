<?php
if($_SESSION["LoggedInBruger"] == null)
{
    header("Location: Nej.php");// men så skal jeg finde en metode hvorved man undgår at nogen nogensinde kan lave en session udenfor programmet?
}
?>
<form method="POST" action="index.php">
    <input type="submit" name="downloadBirger" value="download birger bolcher" />
</form>