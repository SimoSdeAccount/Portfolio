<?php if($_SESSION["LoggedInBruger"] == null){header("Location: Nej.php");} ?>
<form method="post" action="index.php">
    <div id="opretBrugerContent"> 
        <input class="redigerFormInputs" onfocus="Felt(0)" type="password" name="kodeord" value="<?php echo $GLOBALS['førValideringVærdier'][0];?>">
        <span class="error">* <?php echo $GLOBALS['efterValideringErrBeskeder'][0];?></span>
        <br />
        <input class="redigerFormInputs" onfocus="Felt(1)" type="text" name="fornavn" value="<?php echo $GLOBALS['førValideringVærdier'][1];?>">
        <span class="error">* <?php echo $GLOBALS['efterValideringErrBeskeder'][1];?></span>
        <br />
        <input class="redigerFormInputs" onfocus="Felt(2)" type="text" name="efternavn" value="<?php echo $GLOBALS['førValideringVærdier'][2];?>">
        <span class="error"><?php echo $GLOBALS['efterValideringErrBeskeder'][2];?></span>
        <br />
        <input class="redigerFormInputs" onfocus="Felt(3)" type="text" name="email" value="<?php echo $GLOBALS['førValideringVærdier'][3];?>">
        <span class="error">* <?php echo $GLOBALS['efterValideringErrBeskeder'][3];?></span>
        <br />
        <input class="redigerFormInputs" onfocus="Felt(4)" type="text" name="hjemmeside" value="<?php echo $GLOBALS['førValideringVærdier'][4];?>">
        <span class="error"><?php echo $GLOBALS['efterValideringErrBeskeder'][4];?></span>
        <br />
        <textarea class="redigerFormInputs" onfocus="Felt(5)" name="profil" rows="5" cols="40"><?php echo $GLOBALS['førValideringVærdier'][5];?></textarea>
        <span class="error"><?php echo $GLOBALS['efterValideringErrBeskeder'][5];?></span>
        <br />
        <input id="redigerSubmit" type="submit" name="redigerBrugerBtn" value="Rediger">
        <br><br><br>
    </div>
</form>
<script type="text/javascript" src="Scripts/FormScript.js"></script>
<script>
function Felt(FeltIndex) {
    var startValArray = ["Kodeord", "Fornavn", "Efternavn", "Email", "Hjemmeside", "Profil"];
    var formInputVals = [document.getElementsByClassName("redigerFormInputs")[0].value, document.getElementsByClassName("redigerFormInputs")[1].value, document.getElementsByClassName("redigerFormInputs")[2].value, document.getElementsByClassName("redigerFormInputs")[3].value, document.getElementsByClassName("redigerFormInputs")[4].value, document.getElementsByClassName("redigerFormInputs")[5].value];
    redigerFormScript = new FormScript(startValArray, formInputVals, "redigerFormInputs", document.getElementsByClassName("redigerFormInputs"));
    redigerFormScript.StartKodeordStatus(0);
    redigerFormScript.FeltFokus(FeltIndex);
}
Felt();
</script>