<?php
class profil 
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
    private $connection;
    private $Id;
    private $Fornavn;
    private $Efternavn;
    private $Email;
    private $Hjemmeside;
    private $Profil;
    public function setId($Id){$this->Id = $Id;}
    public function getId(){return $this->Id; }
    public function setFornavn($Fornavn){$this->Fornavn = $Fornavn;}
    public function getFornavn(){return $this->Fornavn;}
    public function setEfternavn($Efternavn){$this->Efternavn = $Efternavn;}
    public function getEfternavn(){return $this->Efternavn;}
    public function setEmail($Email){$this->Email = $Email;}
    public function getEmail(){return $this->Email;}
    public function setHjemmeside($Hjemmeside){$this->Hjemmeside = $Hjemmeside;}
    public function gethjemmeside(){return $this->Hjemmeside;}
    public function setProfil($Profil){$this->Profil = $Profil;}
    public function getProfil(){return $this->Profil;}
    public function insert() 
    {
        $sql = "INSERT INTO profil (fornavn, efternavn, email, hjemmeside, profil) VALUES ('".$this->Fornavn."', '".$this->Efternavn."', '".$this->Email."', '".$this->Hjemmeside."', '".$this->Profil."')";
        if (mysqli_query($this->connection, $sql)) 
        {
            $last_id = mysqli_insert_id($this->connection);
            echo "Profil oprettet";
            return $last_id;
        } 
        else 
        {
            echo "Error: " . $sql . "<br>" . mysqli_error($this->connection);
        }
    }
    public function update() 
    {
        $sql = "UPDATE profil SET Fornavn = '" . $this->Fornavn . "', Efternavn = '" . $this->Efternavn. "', Email = '" . $this->Email . "', Hjemmeside= '" . $this->Hjemmeside . "', Profil = '" . $this->Profil. "' WHERE Id = '" . $this->Id . "'";
        if (mysqli_query($this->connection, $sql)) 
        {
            echo "Profil opdateret";
        } 
        else 
        {
            echo "Error: " . $sql . "<br>" . mysqli_error($this->connection);
        }
    }
    public function read() 
    {
        $profilListe = array();
        $counter = 0;
        $sql = "SELECT Id, Fornavn, Efternavn, Email, Hjemmeside, Profil FROM profil";
        $result = mysqli_query($this->connection, $sql);
        if (mysqli_num_rows($result) > 0) 
        {
            while($row = mysqli_fetch_assoc($result)) 
            {
                $tempRow = array($row["Id"], $row["Fornavn"], $row["Efternavn"], $row["Email"], $row["Hjemmeside"], $row["Profil"]);
                for($i = 0; $i < count($tempRow); $i++)
                {
                    $profilListe[$counter][$i] = $tempRow[$i];
                }
                $counter++;
            }
        }
        else
        {
            echo "0 results";
        }
        mysqli_close($this->connection);
        return $loginListe;
    }
    public function readDataFromProfilId() 
    {
        $profilListe = array();
        $sql = "SELECT Fornavn, Efternavn, Email, Hjemmeside, Profil FROM profil WHERE profil.Id = " . $this->Id . "";
        $result = mysqli_query($this->connection, $sql);
        if (mysqli_num_rows($result) > 0) 
        {
            $row = mysqli_fetch_assoc($result);
            $profilData= array($row["Fornavn"], $row["Efternavn"], $row["Email"], $row["Hjemmeside"], $row["Profil"]);
            return $profilData;
        }
        else
        {
            echo "0 results";
        }
    }
}
