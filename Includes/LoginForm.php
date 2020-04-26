<form method='POST' action="index.php">
    <div id="loginContent">
        <input class="loginFormInputs" type="text" name="loginbrugernavn" value="Brugernavn" onfocus="loginFormScript.FeltKlik(0)"> <br>
        <input class="loginFormInputs" type="text" name="loginkodeord" value="Kodeord" onfocus="loginFormScript.FeltKlik(1)"> <br>
        <input id="loginBtn" type='submit' name="loginBtn" value='login'>
    </div>
</form>
<script type="text/javascript" src="Scripts/FormScript.js"></script>
<script>
var formInputVals = [document.getElementsByClassName("loginFormInputs")[0].value, document.getElementsByClassName("loginFormInputs")[1].value];
loginFormScript = new FormScript(formInputVals, "loginFormInputs", document.getElementsByClassName("loginFormInputs"));
</script>
