<form method="post" action="index.php">
    <div id="opretBrugerContent"> 
        <input class="opretFormInputs" type="text" name="brugernavn" value="<?php echo $førValideringVærdier[0];?>" onfocus="opretFormScript.FeltKlik(0)">
        <span class="error">* <?php echo $efterValideringErrBeskeder[0];?></span>
        <br />
        <input class="opretFormInputs" type="text" name="kodeord" value="<?php echo $førValideringVærdier[1];?>" onfocus="opretFormScript.FeltKlik(1)">
        <span class="error">* <?php echo $efterValideringErrBeskeder[1];?></span>
        <br />
        <input class="opretFormInputs" type="text" name="fornavn" value="<?php echo $førValideringVærdier[2];?>" onfocus="opretFormScript.FeltKlik(2)">
        <span class="error">* <?php echo $efterValideringErrBeskeder[2];?></span>
        <br />
        <input class="opretFormInputs" type="text" name="efternavn" value="<?php echo $førValideringVærdier[3];?>" onfocus="opretFormScript.FeltKlik(3)">
        <span class="error"><?php echo $efterValideringErrBeskeder[3];?></span>
        <br />
        <input class="opretFormInputs" type="text" name="email" value="<?php echo $førValideringVærdier[4];?>" onfocus="opretFormScript.FeltKlik(4)">
        <span class="error">* <?php echo $efterValideringErrBeskeder[4];?></span>
        <br />
        <input class="opretFormInputs" type="text" name="hjemmeside" value="<?php echo $førValideringVærdier[5];?>" onfocus="opretFormScript.FeltKlik(5)">
        <span class="error"><?php echo $efterValideringErrBeskeder[5];?></span>
        <br />
        <textarea class="opretFormInputs" name="profil" rows="5" cols="40" onfocus="opretFormScript.FeltKlik(6)"><?php echo $førValideringVærdier[6];?></textarea>
        <span class="error"><?php echo $efterValideringErrBeskeder[6];?></span>
        <br />
        <input id="opretSubmit" type="submit" name="opretBrugerBtn" value="Opret">
        <br><br><br>
    </div>
</form>
<script type="text/javascript" src="Scripts/FormScript.js"></script>
<script>
var formInputVals = [document.getElementsByClassName("opretFormInputs")[0].value, document.getElementsByClassName("opretFormInputs")[1].value, document.getElementsByClassName("opretFormInputs")[2].value, document.getElementsByClassName("opretFormInputs")[3].value, document.getElementsByClassName("opretFormInputs")[4].value, document.getElementsByClassName("opretFormInputs")[5].value, document.getElementsByClassName("opretFormInputs")[6].value];
opretFormScript = new FormScript(formInputVals, "opretFormInputs", document.getElementsByClassName("opretFormInputs"));
</script>