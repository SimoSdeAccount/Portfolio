<?php
class RedigerBruger {
        public function __construct($con) 
    {
        if (!$con) 
        {
            die("Connection failed: " . mysqli_connect_error());
        }
        else 
        {
            $this->connection = $con;
        }
    }
    private $brugernavn;
    private $kodeord;
    private $fornavn;
    private $efternavn;
    private $email;
    private $hjemmeside;
    private $profil;
    private $validerCounter;
    private $connection;
    
    public function setBrugernavn($brugernavn){$this->brugernavn = $brugernavn;}
    public function getBrugernavn() {return $this->brugernavn;}
    
    public function Opdater($efterValideringVærdier) {
        include("TabelKlasser/bruger.php");
        include("TabelKlasser/login.php");
        include("TabelKlasser/profil.php");
        if($this->validerCounter == count($efterValideringVærdier))
        {
            $bruger = new bruger($this->connection);
            $bruger->setBrugernavn($this->brugernavn);
            $ProfilId = $bruger->readProfilFromBrugernavn();
            $profil = new profil($this->connection);
            $profil->setId($ProfilId);
            $profil->setFornavn($this->fornavn);
            $profil->setEfternavn($this->efternavn);
            $profil->setEmail($this->email);
            $profil->setHjemmeside($this->hjemmeside);
            $profil->setProfil($this->profil);
            $profil->update();
            $login = new login($this->connection);
            $login->setKodeord($this->kodeord);
            $login->setBrugernavn($this->brugernavn);
            $login->update();
            mysqli_close($this->connection);
        }
    }
    public function ReturnerBrugerData() 
    {
        include("TabelKlasser/login.php");
        include("TabelKlasser/profil.php");
        include("TabelKlasser/bruger.php");
        $bruger = new bruger($this->connection);
        $profil = new profil($this->connection);
        $login = new login($this->connection);
        $bruger->setBrugernavn($this->brugernavn);
        $ProfilId = $bruger->readProfilFromBrugernavn();
        $profil->setId($ProfilId);
        $profilData = $this->GenererFørvalideringVærdier($profil->readDataFromProfilId());
        $login->setBrugernavn($this->brugernavn);
        $kodeord = $login->readKodeordFromBrugernavn();
        $brugerData = array($kodeord, $profilData[0], $profilData[1], $profilData[2], $profilData[3], $profilData[4]);
        return $brugerData;
    }
    public function ReturnerEfterValideringVærdier($førValideringVærdier = array())
    {
        include("Validator.php");
        $validerOprettetBruger = new Validator();
        $this->kodeord = $validerOprettetBruger->PåkrævetFelt($førValideringVærdier[0]);
        $this->fornavn = $validerOprettetBruger->PåkrævetStandardTekstFormat($førValideringVærdier[1]);
        $this->efternavn = $validerOprettetBruger->StandardTekstFormat($førValideringVærdier[2]);
        $this->email = $validerOprettetBruger->PåkrævetStandardEmailFormat($førValideringVærdier[3]);
        $this->hjemmeside = $validerOprettetBruger->StandardHjemmesideFormat($førValideringVærdier[4]);
        $this->profil = $validerOprettetBruger->StandardTekstFormat($førValideringVærdier[5]);
        return $efterValideringVærdier = array($this->kodeord, $this->fornavn, $this->efternavn, $this->email, $this->hjemmeside, $this->profil);
    }
    public function ReturnerEfterValideringErrBeskeder($førValideringVærdier = array(), $efterValideringVærdier = array())
    {
        $this->validerCounter = 0;
        $efterValideringErrBeskeder = array("Ugyldigt kodeord","Ugyldigt fornavn","Ugyldigt efternavn","Ugyldig email","Ugyldig hjemmeside", "Ugyldig profil");
        for($i = 0; $i < count($efterValideringErrBeskeder); $i++)
        {
            if($efterValideringVærdier[$i] === $førValideringVærdier[$i])
            {
                $this->validerCounter++;
                $efterValideringErrBeskeder[$i] = "";
            }
        }
        return $efterValideringErrBeskeder;
    }
    private function GenererFørvalideringVærdier($profilData = array()) 
    {
        $BlankVærdiErstatninger = array("Fornavn", "Efternavn", "Email", "Hjemmeside", "Profil");
        for($i=0; $i < count($profilData); $i++)
        {
            if($profilData[$i] == "")
            {
                $profilData[$i] = $BlankVærdiErstatninger[$i];
            }
        }
        return $profilData;
    }
}

