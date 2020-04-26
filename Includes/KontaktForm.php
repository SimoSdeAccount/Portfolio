<?php 
if($_SESSION["LoggedInBruger"] == null)
{
    header("Location: Nej.php");
}
?>
<form method="post" action="index.php">
    <div id="opretBrugerContent"> 
        <input class="kontaktFormInputs" type="text" name="kontaktemne" value="Emne" onfocus="kontaktFormScript.FeltKlik(0)" /><br />
        <textarea class="kontaktFormInputs" name="kontakttekst" rows="5" cols="40" onfocus="kontaktFormScript.FeltKlik(1)">Besked</textarea><br />
        <input type="submit" name="kontaktsubmit" value="Kontakt" />
    </div>
</form>
<script type="text/javascript" src="Scripts/FormScript.js"></script>
<script>
var formInputVals = [document.getElementsByClassName("kontaktFormInputs")[0].value, document.getElementsByClassName("kontaktFormInputs")[1].value];
kontaktFormScript = new FormScript(formInputVals, "kontaktFormInputs", document.getElementsByClassName("kontaktFormInputs"));
</script>

