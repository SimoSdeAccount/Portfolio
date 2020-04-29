<?php if($_SESSION["LoggedInBruger"] == null){header("Location: Nej.php");} ?>
<form method="post" action="index.php">
    <div id="opretBrugerContent"> 
        <input class="kontaktFormInputs" type="text" name="kontaktemne" value="Emne" onfocus="Felt(0)" /><br />
        <textarea class="kontaktFormInputs" name="kontaktbesked" rows="5" cols="40" onfocus="Felt(1)">Besked</textarea><br />
        <input type="submit" name="kontaktsubmit" value="Kontakt" />
    </div>
</form>
<script type="text/javascript" src="Scripts/FormScript.js"></script>
<script>
function Felt(FeltIndex) {
    var startValArray = ["Emne", "Besked"];
    var formInputVals = [document.getElementsByClassName("kontaktFormInputs")[0].value, document.getElementsByClassName("kontaktFormInputs")[1].value];
    kontaktFormScript = new FormScript(startValArray, formInputVals, "kontaktFormInputs", document.getElementsByClassName("kontaktFormInputs"));
    kontaktFormScript.FeltFokus(FeltIndex);
}
Felt();
</script>

