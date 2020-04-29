<?php
include("Validator.php");
include("TabelKlasser/login.php");
include("TabelKlasser/profil.php");
include("TabelKlasser/bruger.php");
class OpretBruger 
{
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
    private function EfterValideringBrugernavn($brugernavn) 
    {
        $validerBrugernavn = new Validator();
        if($validerBrugernavn->PåkrævetFelt($brugernavn) === false || $validerBrugernavn->TjekBrugernavn($brugernavn, $this->connection) === false)
        {
            return false;
        }
        else 
        {
            return $brugernavn;
        }
    }
    public function ReturnerEfterValideringVærdier($førValideringVærdier = array())
    {
        $validerOprettetBruger = new Validator();
        $this->brugernavn = $this->EfterValideringBrugernavn($førValideringVærdier[0]);
        $this->kodeord = $validerOprettetBruger->PåkrævetFelt($førValideringVærdier[1]);
        $this->fornavn = $validerOprettetBruger->PåkrævetStandardTekstFormat($førValideringVærdier[2]);
        $this->efternavn = $validerOprettetBruger->StandardTekstFormat($førValideringVærdier[3]);
        $this->email = $validerOprettetBruger->PåkrævetStandardEmailFormat($førValideringVærdier[4]);
        $this->hjemmeside = $validerOprettetBruger->StandardHjemmesideFormat($førValideringVærdier[5]);
        $this->profil = $validerOprettetBruger->StandardTekstFormat($førValideringVærdier[6]);
        return $efterValideringVærdier = array($this->brugernavn, $this->kodeord, $this->fornavn, $this->efternavn, $this->email, $this->hjemmeside, $this->profil);
    }
    public function ReturnerEfterValideringErrBeskeder($førValideringVærdier = array(), $efterValideringVærdier = array())
    {
        $this->validerCounter = 0;
        $efterValideringErrBeskeder = array("Ugyldigt brugernavn","Ugyldigt kodeord","Ugyldigt fornavn","Ugyldigt efternavn","Ugyldig email","Ugyldig hjemmeside", "Ugyldig profil");
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
    public function Opret($efterValideringVærdier)
    {
        if($this->validerCounter == count($efterValideringVærdier))
        {
            $insertLogin = new login($this->connection);
            $insertLogin->setBrugernavn($efterValideringVærdier[0]);
            $insertLogin->setKodeord($efterValideringVærdier[1]);
            $insertLogin->insert();
            $insertProfil = new profil($this->connection);
            $insertProfil->setFornavn($efterValideringVærdier[2]);
            $insertProfil->setEfternavn($efterValideringVærdier[3]);
            $insertProfil->setEmail($efterValideringVærdier[4]);
            $insertProfil->setHjemmeside($efterValideringVærdier[5]);
            $insertProfil->setProfil($efterValideringVærdier[6]);
            $profilId = $insertProfil->insert();
            $insertBruger = new bruger($this->connection);
            $insertBruger->setProfil($profilId);
            $insertBruger->setBrugernavn($efterValideringVærdier[0]);
            $insertBruger->insert();
            mysqli_close($this->connection);
            header("location: index.php");
        }
    }
}
