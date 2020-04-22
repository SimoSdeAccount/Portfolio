<?php
class LoginBruger {
    public function __construct($con, $brugernavn, $kodeord) 
    {
        if (!$con) 
        {
            die("Connection failed: " . mysqli_connect_error());
        }
        else 
        {
            $this->connection = $con;
            $this->brugernavn = $brugernavn;
            $this->kodeord = $kodeord;
        }
    }
    private $brugernavn;
    private $kodeord;
    function login() 
    {
        include("TabelKlasser/login.php");
        $login = new login(mysqli_connect("localhost", "root", "", "portfoliodb"));
        $login->setBrugernavn($this->brugernavn);
        $login->setKodeord($this->kodeord);
        $loginforsøg = $login->readSpecific();
        if($loginforsøg === $this->brugernavn)
        {
            return $loginforsøg;
        }
    }
}
