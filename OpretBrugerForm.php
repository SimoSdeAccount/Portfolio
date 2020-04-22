<form method="post" action="index.php">
  Brugernavn: <input type="text" name="brugernavn" value="<?php echo $førValideringVærdier[0];?>">
  <span class="error" style="color: #FF0000">* <?php echo $efterValideringErrBeskeder[0];?></span>
  <br><br>
  Kodeord: <input type="password" name="kodeord" value="<?php echo $førValideringVærdier[1];?>">
  <span class="error" style="color: #FF0000">* <?php echo $efterValideringErrBeskeder[1];?></span>
  <br><br>
  Navn: <input type="text" name="fornavn" value="<?php echo $førValideringVærdier[2];?>">
  <span class="error" style="color: #FF0000">* <?php echo $efterValideringErrBeskeder[2];?></span>
  <br><br>
  Efternavn: <input type="text" name="efternavn" value="<?php echo $førValideringVærdier[3];?>">
  <span class="error" style="color: #FF0000"><?php echo $efterValideringErrBeskeder[3];?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $førValideringVærdier[4];?>">
  <span class="error" style="color: #FF0000">* <?php echo $efterValideringErrBeskeder[4];?></span>
  <br><br>
  Website: <input type="text" name="hjemmeside" value="<?php echo $førValideringVærdier[5];?>">
  <span class="error" style="color: #FF0000"><?php echo $efterValideringErrBeskeder[5];?></span>
  <br><br>
  Profil: <textarea name="profil" rows="5" cols="40"><?php echo $førValideringVærdier[6];?></textarea>
  <span class="error" style="color: #FF0000"><?php echo $efterValideringErrBeskeder[6];?></span>
  <br><br>
  <input type="submit" name="opretBrugerBtn" value="Submit">
  <br>
  <br>
  <br>
</form>