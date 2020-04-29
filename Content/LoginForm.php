<form method='POST' action="index.php">
    <div id="loginContent">
        <input class="loginFormInputs" type="text" name="loginbrugernavn" value="Brugernavn" onfocus="LoginFelt(0)"> <br>
        <input class="loginFormInputs" type="text" name="loginkodeord" value="Kodeord" onfocus="LoginFelt(1)"> <br>
        <input id="loginBtn" type='submit' name="loginBtn" value='login'>
    </div>
</form>
<script type="text/javascript" src="Scripts/FormScript.js"></script>
<script>
function LoginFelt(FeltIndex) {
    var startValArray = ["Brugernavn", "Kodeord"];
    var formInputVals = [document.getElementsByClassName("loginFormInputs")[0].value, document.getElementsByClassName("loginFormInputs")[1].value];
    loginFormScript = new FormScript(startValArray, formInputVals, "loginFormInputs", document.getElementsByClassName("loginFormInputs"));
    loginFormScript.FeltFokus(FeltIndex);
    loginFormScript.StartKodeordStatus(1);
}
LoginFelt();
</script>