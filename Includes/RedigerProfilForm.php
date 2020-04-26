<?php
if($_SESSION["LoggedInBruger"] == null)
{
    header("Location: Nej.php");
}
?>
<form method="post" action="index.php">
    <div id="opretBrugerContent"> 
        <input class="redigerFormInputs" onfocus="redigerFormScript.PassivFeltKlik(0)" type="password" name="kodeord" value="<?php echo $førValideringVærdier[0];?>">
        <span class="error">* <?php echo $efterValideringErrBeskeder[0];?></span>
        <br />
        <input class="redigerFormInputs" onfocus="redigerFormScript.PassivFeltKlik(1)" type="text" name="fornavn" value="<?php echo $førValideringVærdier[1];?>">
        <span class="error">* <?php echo $efterValideringErrBeskeder[1];?></span>
        <br />
        <input class="redigerFormInputs" onfocus="redigerFormScript.FeltKlik(2)" type="text" name="efternavn" value="<?php echo $førValideringVærdier[2];?>">
        <span class="error"><?php echo $efterValideringErrBeskeder[2];?></span>
        <br />
        <input class="redigerFormInputs" onfocus="redigerFormScript.PassivFeltKlik(3)" type="text" name="email" value="<?php echo $førValideringVærdier[3];?>">
        <span class="error">* <?php echo $efterValideringErrBeskeder[3];?></span>
        <br />
        <input class="redigerFormInputs" onfocus="redigerFormScript.FeltKlik(4)" type="text" name="hjemmeside" value="<?php echo $førValideringVærdier[4];?>">
        <span class="error"><?php echo $efterValideringErrBeskeder[4];?></span>
        <br />
        <textarea class="redigerFormInputs" onfocus="redigerFormScript.FeltKlik(5)" name="profil" rows="5" cols="40"><?php echo $førValideringVærdier[5];?></textarea>
        <span class="error"><?php echo $efterValideringErrBeskeder[5];?></span>
        <br />
        <input id="redigerSubmit" type="submit" name="redigerBrugerBtn" value="Rediger">
        <br><br><br>
    </div>
</form>
<script type="text/javascript" src="Scripts/FormScript.js"></script>
<script>
var formInputVals = [document.getElementsByClassName("redigerFormInputs")[0].value, document.getElementsByClassName("redigerFormInputs")[1].value, document.getElementsByClassName("redigerFormInputs")[2].value, document.getElementsByClassName("redigerFormInputs")[3].value, document.getElementsByClassName("redigerFormInputs")[4].value, document.getElementsByClassName("redigerFormInputs")[5].value];
redigerFormScript = new FormScript(formInputVals, "redigerFormInputs", document.getElementsByClassName("redigerFormInputs"));
</script>