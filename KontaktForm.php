<?php 
if($_SESSION["LoggedInBruger"] == null)
{
    header("Location: Nej.php");
}
?>
<form method="POST" action="index.php">
    Emne: <input type="text" name="kontaktemne" /> <br />
    Besked: <input type="text" name="kontakttekst" />
    <input type="submit" name="kontaktsubmit" value="send" />
</form>
