<?php
if($_SESSION["LoggedInBruger"] == null)
{
    header("Location: Nej.php");
}
?>
<form method="post" action="index.php">
  Kodeord: <input type="password" name="kodeord" value="<?php echo $førValideringVærdier[0];?>">
  <span class="error" style="color: #FF0000">* <?php echo $efterValideringErrBeskeder[0];?></span>
  <br><br>
  Navn: <input type="text" name="fornavn" value="<?php echo $førValideringVærdier[1];?>">
  <span class="error" style="color: #FF0000">* <?php echo $efterValideringErrBeskeder[1];?></span>
  <br><br>
  Efternavn: <input type="text" name="efternavn" value="<?php echo $førValideringVærdier[2];?>">
  <span class="error" style="color: #FF0000"><?php echo $efterValideringErrBeskeder[2];?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $førValideringVærdier[3];?>">
  <span class="error" style="color: #FF0000">* <?php echo $efterValideringErrBeskeder[3];?></span>
  <br><br>
  Website: <input type="text" name="hjemmeside" value="<?php echo $førValideringVærdier[4];?>">
  <span class="error" style="color: #FF0000"><?php echo $efterValideringErrBeskeder[4];?></span>
  <br><br>
  Profil: <textarea name="profil" rows="5" cols="40"><?php echo $førValideringVærdier[5];?></textarea>
  <span class="error" style="color: #FF0000"><?php echo $efterValideringErrBeskeder[5];?></span>
  <br><br>
  <input type="submit" name="redigerBrugerBtn" value="Submit">
  <br>
  <br>
  <br>
</form>