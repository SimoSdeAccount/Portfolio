<?php
if($_SESSION["LoggedInBruger"] == null)
{
    header("Location: Nej.php");// men så skal jeg finde en metode hvorved man undgår at nogen nogensinde kan lave en session udenfor programmet?
}
?>
<form method="POST" action="index.php">
    <input type="submit" name="downloadBirger" value="download birger bolcher" /> <br>
    <input type="submit" name="downloadDummy1" value="download dummy 1" /> <br>
    <input type="submit" name="downloadDummy2" value="download dummy 2" />
</form>