<div id="TestContent01"></div>
<div id="TestContent02"></div>
<div id="TestContent03"></div>
<form method="post" action="index.php">
    <div id="opretBrugerContent"> 
        <input class="opretFormInputs" type="text" name="brugernavn" value="<?php echo $GLOBALS['førValideringVærdier'][0];?>" onfocus="Felt(0)">
        <span class="error">* <?php echo $GLOBALS['efterValideringErrBeskeder'][0];?></span>
        <br />
        <input class="opretFormInputs" type="text" name="kodeord" value="<?php echo $GLOBALS['førValideringVærdier'][1];?>" onfocus="Felt(1)">
        <span class="error">* <?php echo $GLOBALS['efterValideringErrBeskeder'][1];?></span>
        <br />
        <input class="opretFormInputs" type="text" name="fornavn" value="<?php echo $GLOBALS['førValideringVærdier'][2];?>" onfocus="Felt(2)">
        <span class="error">* <?php echo $GLOBALS['efterValideringErrBeskeder'][2];?></span>
        <br />
        <input class="opretFormInputs" type="text" name="efternavn" value="<?php echo $GLOBALS['førValideringVærdier'][3];?>" onfocus="Felt(3)">
        <span class="error"><?php echo $GLOBALS['efterValideringErrBeskeder'][3];?></span>
        <br />
        <input class="opretFormInputs" type="text" name="email" value="<?php echo $GLOBALS['førValideringVærdier'][4];?>" onfocus="Felt(4)">
        <span class="error">* <?php echo $GLOBALS['efterValideringErrBeskeder'][4];?></span>
        <br />
        <input class="opretFormInputs" type="text" name="hjemmeside" value="<?php echo $GLOBALS['førValideringVærdier'][5];?>" onfocus="Felt(5)">
        <span class="error"><?php echo $GLOBALS['efterValideringErrBeskeder'][5];?></span>
        <br />
        <textarea class="opretFormInputs" name="profil" rows="5" cols="40" onfocus="Felt(6)"><?php echo $GLOBALS['førValideringVærdier'][6];?></textarea>
        <span class="error"><?php echo $GLOBALS['efterValideringErrBeskeder'][6];?></span>
        <br />
        <input id="opretSubmit" type="submit" name="opretBrugerBtn" value="Opret">
        <br><br><br>
    </div>
</form>
<script type="text/javascript" src="Scripts/FormScript.js"></script>
<script>
function Felt(FeltIndex) {
    var startValArray = ["Brugernavn", "Kodeord", "Fornavn", "Efternavn", "Email", "Hjemmeside", "Profil"];
    var formInputVals = [document.getElementsByClassName("opretFormInputs")[0].value, document.getElementsByClassName("opretFormInputs")[1].value, document.getElementsByClassName("opretFormInputs")[2].value, document.getElementsByClassName("opretFormInputs")[3].value, document.getElementsByClassName("opretFormInputs")[4].value, document.getElementsByClassName("opretFormInputs")[5].value, document.getElementsByClassName("opretFormInputs")[6].value];
    opretFormScript = new FormScript(startValArray, formInputVals, "opretFormInputs", document.getElementsByClassName("opretFormInputs"));
    opretFormScript.StartKodeordStatus(1);
    opretFormScript.FeltFokus(FeltIndex);
}
Felt();
</script>