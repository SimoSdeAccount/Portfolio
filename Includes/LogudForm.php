<?php
if($_SESSION["LoggedInBruger"] == null)
{
    header("Location: Nej.php");
}
?>
<form method="POST" action="index.php">
    <input type="submit" name="logud" value="Log ud" />
</form>