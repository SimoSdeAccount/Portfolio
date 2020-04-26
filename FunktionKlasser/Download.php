<?php
class Download {
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
    private $connection;
    private $brugernavn;
    private $projektsti;
    private $projektstier = array();
    public function setBrugernavn($brugernavn){$this->brugernavn = $brugernavn;}
    public function getBrugernavn(){return $this->brugernavn;}
    public function setProjektSti($projektsti){$this->projektsti = $projektsti;}
    public function getProjektSti(){return $this->projektsti;}
    public function setProjektStier($projektstier = array()){$this->projektstier = $projektstier;}
    public function getProjektStier(){return $this->projektstier;}
    public function DownloadFil() 
    {
        if (file_exists($this->projektsti)) 
        {
            $this->RegistrerDownload();
         /*   header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'.basename($this->projektsti).'"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($this->projektsti));
            readfile($this->projektsti);
            exit;*/
        }
        else 
        {
            echo "fandt ikke filen";
        }
    }
    private function RegistrerDownload() 
    {
        include("TabelKlasser/downloads.php");
        include("TabelKlasser/bruger.php");
        $bruger = new bruger($this->connection);
        $bruger->setBrugernavn($this->brugernavn);
        $brugerId = $bruger->readIdFromBrugernavn();
        $projektNavn = $this->FindProjektNavn();
        $tid = $this->Tid();
        $downloadInserter = new Downloads($this->connection);
        $downloadInserter->setBruger($brugerId);
        $downloadInserter->setProjekt($projektNavn);
        $downloadInserter->setTid($tid);
        $downloadInserter->insert();
    }
    private function FindProjektNavn() 
    {
        $projektNavne = array("BirgerBolcher", "Dummy01", "Dummy02");
        for($i = 0; $i < count($this->projektstier); $i++)
        {
            if($this->projektsti == $this->projektstier[$i])
            {
                return $projektNavne[$i];
            }
        }
        return false;
    }
    private function Tid()
    {
        return date('Y-m-d H:i:s', time());
    }
}
