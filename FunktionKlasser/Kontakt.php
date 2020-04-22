<?php
class Kontakt {
    public function __construct($con, $brugernavn, $emne, $besked) 
    {
        if (!$con) 
        {
            die("Connection failed: " . mysqli_connect_error());
        }
        else 
        {
            $this->connection = $con;
            $this->brugernavn = $brugernavn;
            $this->emne = $emne;
            $this->besked = $besked;
        }
    }
    private $connection;
    private $brugernavn;
    private $emne;
    private $besked;
    public function IndsaetBesked() 
    {
        include("TabelKlasser/beskeder.php"); 
        $besked = new beskeder($this->connection);
        $besked->setBruger($this->BrugerId());
        $besked->setEmne($this->emne);
        $besked->setBesked($this->besked);
        $besked->setTid($this->Tid());
        $besked->insert();
    }
    private function BrugerId() 
    {
        include("TabelKlasser/bruger.php");
        $bruger = new bruger($this->connection);
        $bruger->setBrugernavn($this->brugernavn);
        return $bruger->readIdFromBrugernavn();
    }
    private function Tid() {
        return date('Y-m-d H:i:s', time());
    }
}
